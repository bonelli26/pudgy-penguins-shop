import { gsap } from "gsap";
import { globalStorage, domStorage } from "../_global/storage";
import {ImageLoad} from "../_global/_renderer";
import {loopingAnims, pageAnims} from "../_global/lottieInit";

import { SplitText } from "../_extensions/splitText";
gsap.registerPlugin(SplitText);
(function() {
	const blurProperty = gsap.utils.checkPrefix("filter"),
		blurExp = /blur\((.+)?px\)/,
		getBlurMatch = target => (gsap.getProperty(target, blurProperty) || "").match(blurExp) || [];

	gsap.registerPlugin({
		name: "blur",
		get(target) {
			return +(getBlurMatch(target)[1]) || 0;
		},
		init(target, endValue) {
			let data = this,
				filter = gsap.getProperty(target, blurProperty),
				endBlur = "blur(" + endValue + "px)",
				match = getBlurMatch(target)[0],
				index;
			if (filter === "none") {
				filter = "";
			}
			if (match) {
				index = filter.indexOf(match);
				endValue = filter.substr(0, index) + endBlur + filter.substr(index + match.length);
			} else {
				endValue = filter + endBlur;
				filter += filter ? " blur(0px)" : "blur(0px)";
			}
			data.target = target;
			data.interp = gsap.utils.interpolate(filter, endValue);
		},
		render(progress, data) {
			data.target.style[blurProperty] = data.interp(progress);
		}
	});
})();
export class ScrollBasedAnims {
	constructor(options = {}) {

		this.bindMethods();
		this.el = document.documentElement;
		this.currentView = this.el.querySelector('[data-router-view]');

		this.thisPagesTLs = [];
		this.offsetVal = 0;
		this.body = document.body;
		this.direction = 'untouched';
		this.transitioning = false;
		this.headerScrolled = false;
		this.adjustHeaderDist = document.querySelector(".hero").getBoundingClientRect().bottom;

		const {
			dataFromElems = this.currentView.querySelectorAll('[data-from]'),
			dataHeroFromElems = this.currentView.querySelectorAll('[data-h-from]'),
			heroMeasureEl = document.getElementById('hero-measure-el'),
			scrollBasedElems = this.currentView.querySelectorAll('[data-entrance]'),
			threshold = 0.01,
			footerMeasureEl = document.getElementById('footer-measure-el'),
		} = options;

		this.dom = {
			el: this.el,
			dataFromElems: dataFromElems,
			dataHeroFromElems: dataHeroFromElems,
			scrollBasedElems: scrollBasedElems,
			heroMeasureEl: heroMeasureEl,
			footerMeasureEl: footerMeasureEl
		};

		this.dataFromElems = null;
		this.dataHeroFromElems = null;
		this.scrollBasedElems = null;

		this.raf = null;

		this.state = {
			resizing: false
		};

		let startingScrollTop = this.el.scrollTop;
		this.data = {
			threshold: threshold,
			current: startingScrollTop,
			target: 0,
			last: startingScrollTop,
			ease: 0.12,
			height: 0,
			max: 0,
			scrollY: startingScrollTop,
			window2x: globalStorage.windowHeight * 2
		};

		let length = this.dom.scrollBasedElems.length;
		for (let i = 0; i < length; i++) {
			const entranceEl = this.dom.scrollBasedElems[i];
			const entranceType = entranceEl.dataset.entrance;
			const entranceTL = new gsap.timeline({ paused: true });
			let staggerEls;
			switch (entranceType) {
				case "split-copy":

					this.thisPagesTLs.push("split-copy");
					break;

				case "stagger-fade":
					staggerEls = entranceEl.querySelectorAll('.s-el');
					let delay = 0;

					entranceTL
						.fromTo(staggerEls, 0.5, { y: 40 }, { stagger: 0.07, y: 0, ease: "sine.out", force3D: true })
						.fromTo(staggerEls, 0.48, { opacity: 0 }, { stagger: 0.07, clearProps: "transform", opacity: 1, ease: "sine.out", force3D: true }, 0.02);

					this.thisPagesTLs.push(entranceTL);
					break;

				case "lottie-anim":
					const animName = globalStorage.windowWidth > 768 ? entranceEl.dataset.jsonDesktop : entranceEl.dataset.jsonMobile;

					let animIdx;
					for (let i = 0; i < pageAnims.length; i++) {
						if (pageAnims[i].name === animName && !pageAnims[i].played) {
							animIdx = i;
							break;
						}
					}

					entranceTL
						.fromTo(entranceEl, 0.01, { autoAlpha: 0 }, { autoAlpha: 1, force3D: true, onComplete: () => {
								pageAnims[animIdx].anim.play();
								pageAnims[animIdx].played = true;
							} });

					this.thisPagesTLs.push(entranceTL);
					break;

				case "rise-fade":

					entranceTL
						.fromTo(entranceEl, 0.7, { y: 25 }, { y: 0, ease: "sine.out", force3D: true })
						.fromTo(entranceEl, 0.68, { opacity: 0 }, { opacity: 1, clearProps: "transform", ease: "sine.out", force3D: true }, 0.02);

					this.thisPagesTLs.push(entranceTL);
					break;

				case "basic-fade":

					entranceTL
						.fromTo(entranceEl, 0.3, { opacity: 0 }, { opacity: 1, clearProps: "transform", ease: "sine.inOut", force3D: true });

					this.thisPagesTLs.push(entranceTL);
					break;

				case "bars-scale":
					const bars = entranceEl.querySelectorAll(".bar");
					entranceTL
						.fromTo(bars, { xPercent: -100 }, { xPercent: 0, duration: 0.7, clearProps: "transform", stagger: 0.07, ease: "expo.inOut", force3D: true });

					this.thisPagesTLs.push(entranceTL);
					break;
				default:


			}
		}

		this.init();
	}

	bindMethods() {
		['run', 'event', 'resize']
			.forEach(fn => this[fn] = this[fn].bind(this));
	}

	init() {
		this.on();
	}

	on() {
		this.dom.el.addEventListener('wheel', this.event, true);
		this.getBounding();
		this.getCache();
		this.requestAnimationFrame();
	}

	event() {
		this.data.scrolling = true;
		clearTimeout(this.scrollTimeout);
		this.scrollTimeout = setTimeout(() => {
			this.data.scrolling = false;
			// this.closestHomeProject();
		}, 300);
	}

	run() {
		if (this.state.resizing || this.transitioning) return;
		this.data.scrollY = this.el.scrollTop;

		if (globalStorage.isMobile) {
			this.data.current = this.data.scrollY;
		} else {
			this.data.current += Math.round((this.data.scrollY - this.data.current) * this.data.ease);
		}

		this.getDirection();
		this.hideShowHeader();
		this.hideShowButton();
		this.data.last = this.data.current;
		this.checkScrollBasedLoadins();
		this.animateDataHeroFromElems();
		this.animateFooterReveal();
		this.playPauseGummy();
		this.animateDataFromElems();
		this.playPauseMarquees();
		this.checkScrolledMedia();
		this.playPauseLottieLoopers();
		this.playPauseVideos();
		this.animateHeroScene();
		this.requestAnimationFrame();
	}

	getHeroSceneData() {
		const measureEl = document.getElementById("hero-measure-el");
		if (!measureEl) return;
		const bounds = measureEl.getBoundingClientRect();
		const heroHeader = document.getElementById("hero-header");
		const heroLogo = document.getElementById("hero-logo");
		const videoEl = document.getElementById("hero-video");
		const shiftWrappers = document.querySelectorAll(".hero-back .inner");

		const rightShiftEls = [];
		const leftShiftEls = [];

		for (let i = 0; i < shiftWrappers.length; i++) {

			if (i % 2 === 0) {
				rightShiftEls.push(shiftWrappers[i]);
			} else {
				leftShiftEls.push(shiftWrappers[i]);
			}

			let copyEl = shiftWrappers[i].querySelector('.group:nth-child(2)'),
				copyWidth = copyEl.offsetWidth,
				multiplier,
				resetElCount = 2;

			if (copyWidth > globalStorage.windowWidth) {
				multiplier = 1.5;
			} else {
				multiplier = Math.ceil((globalStorage.windowWidth * 2) / copyWidth);
				resetElCount = Math.ceil(globalStorage.windowWidth / copyWidth);
			}


			for (let j = 1; j < multiplier; j++){
				let elementCopy = copyEl.cloneNode(true);
				elementCopy.classList.add("duplicate");
				shiftWrappers[i].appendChild(elementCopy);
			}

			this.duplicates = shiftWrappers[i].querySelectorAll(".duplicate");

		}



		const timeline = new gsap.timeline({ paused: true });


		if(globalStorage.windowWidth < 768) {
			timeline
				.fromTo(videoEl, { scale: 1 }, { duration: 1, scale: 0.4, ease: "none", force3D: true }, 0) // video scale down
				.fromTo(heroHeader, { scale: 1 }, { scale: 0.8, duration: 1, ease: "none", force3D: true }, 0) // header scale down
				.fromTo(heroHeader, { autoAlpha: 1 }, { autoAlpha: 0, duration: 1, ease: "none", force3D: true }, 0) // header fadeout
				.fromTo(rightShiftEls, { xPercent: 0 }, { xPercent: 100,	duration: 1, ease: "none", force3D: true }, 0) //marquees right
				.fromTo(leftShiftEls, { xPercent: 0 }, { xPercent: -100,	duration: 1, ease: "none", force3D: true }, 0) //marquees left
				.fromTo(videoEl, { borderRadius: 0 }, { duration: 1, borderRadius: 24, ease: "none", force3D: true }, 0) //video borderRadius
				.fromTo(heroLogo, { yPercent: 0 }, { yPercent: 200,	duration: 1, ease: "none", force3D: true }, 0) // logo down
				.fromTo(heroLogo, { autoAlpha: 1 }, { autoAlpha: 0, duration: 1, ease: "none", force3D: true }) // logo fadeout
			;
		} else {
			timeline
				.fromTo(videoEl, { scale: 1 }, { duration: 1, scale: 0.4, ease: "none", force3D: true }, 0) // video scale down
				.fromTo(heroHeader, { scale: 1 }, { scale: 0.8, duration: 0.5, ease: "none", force3D: true }, 0) // header scale down
				.fromTo(heroHeader, { autoAlpha: 1 }, { autoAlpha: 0, duration: 0.7, ease: "none", force3D: true }, 0) // header fadeout
				.fromTo(rightShiftEls, { xPercent: 0 }, { xPercent: 100,	duration: 1, ease: "none", force3D: true }, 0) //marquees right
				.fromTo(leftShiftEls, { xPercent: 0 }, { xPercent: -100,	duration: 1, ease: "none", force3D: true }, 0) //marquees left
				.fromTo(videoEl, { borderRadius: 0 }, { duration: 0.3, borderRadius: 24, ease: "none", force3D: true }, 0) //video borderRadius
				.fromTo(heroLogo, { yPercent: 0 }, { yPercent: 200,	duration: 0.3, ease: "none", force3D: true }, 0) // logo down
				.fromTo(heroLogo, { autoAlpha: 1 }, { autoAlpha: 0, duration: 0.3, ease: "none", force3D: true }) // logo fadeout
			;
		}

		this.heroSceneData = {
			top: (bounds.top + this.data.scrollY),
			bottom: (bounds.bottom + this.data.scrollY),
			height: bounds.bottom - bounds.top,
			timeline: timeline,
			reset: true,
			duration: ((globalStorage.windowHeight / bounds.height)).toFixed(2)
		};
	}

	animateHeroScene() {
		if (this.direction === "untouched" || !this.heroSceneData) return;
		const data = this.heroSceneData;
		const { isVisible, start } = this.isVisible(data, 0.01);
		if (!isVisible) {
			if (!data.reset) {
				data.reset = true;
				if (this.direction === "down") {
					data.timeline.progress(1);
				} else {
					data.timeline.progress(0);
				}
			}
			return;
		}
		if (data.reset) {
			data.reset = false;
		}
		let percentageThroughFormula = ((((start).toFixed(2) / this.data.height).toFixed(3) - 1) * -1) * data.duration;
		let percentageThrough = percentageThroughFormula * data.duration;
		if (percentageThrough <= 0) {
			percentageThrough = 0;
		} else if (percentageThrough >= 1) {
			percentageThrough = 1;
		}
		data.timeline.progress(percentageThrough);
	}

	animateFooterReveal() {
		if (this.direction === "untouched" || !this.footerMeasureData) return;
		const { isVisible, start, end } = ( this.isVisible(this.footerMeasureData, 0.01) );
		if (!isVisible && !this.footerMeasureData.reversed) {
			this.footerRevealTL.progress(0);
			this.footerMeasureData.reversed = true;
			return;
		}
		let percentageThrough = ((((start).toFixed(2) / this.data.height).toFixed(3) - 1) * -1) * this.footerMeasureData.duration;
		if (percentageThrough <= 0) {
			percentageThrough = 0;
		} else if (percentageThrough >= 0.98) {
			percentageThrough = 1;
		}

		this.footerRevealTL.progress(percentageThrough);
	}


	hideShowButton() {
		if (this.direction === "untouched") { return; }
		// if down && past bottom point, hide
		// if up && above bottom point show
		if (this.direction === "down" && !this.buttonScrolled && this.data.scrollY >= "100") {
			this.buttonScrolled = true;
			gsap.to(domStorage.stickyButton, { autoAlpha: 1, yPercent: -120, duration: 0.3, force3D: true, ease: "sine.out" });
		} else if (this.direction === "up" && this.buttonScrolled && this.data.scrollY <= "100") {
			this.buttonScrolled = false;
			gsap.to(domStorage.stickyButton, { autoAlpha: 0, yPercent: 0, duration: 0.3, force3D: true, ease: "sine.out" });
		}
	}

	hideShowHeader() {
		// this.dist = this.adjustHeaderDist - 400
		// if (this.direction === "untouched") {
		// 	gsap.set(domStorage.wordmarkLogo, { yPercent: 100 });
		// 	return;
		// }
		//
		// if (this.direction === "down" && !this.headerScrolled && this.data.scrollY >= this.dist) {
		// 	console.log(this.dist);
		// 	this.headerScrolled = true;
		// 	gsap.to(domStorage.wordmarkLogo, { autoAlpha: 0, yPercent: -100, duration: 0.2, force3D: true, ease: "sine.inOut" });
		// 	gsap.to(domStorage.nav, { autoAlpha: 1, yPercent: 0, duration: 0.3, force3D: true, ease: "sine.inOut", delay: 0.2 });
		// } else if (this.direction === "up" && this.headerScrolled && this.data.scrollY <= this.adjustHeaderDist) {
		// 	this.headerScrolled = false;
		// 	gsap.to(domStorage.nav, { autoAlpha: 0, yPercent: -100, duration: 0.3, force3D: true, ease: "sine.inOut" });
		// 	gsap.to(domStorage.wordmarkLogo, { autoAlpha: 1, yPercent: 100, duration: 0.2, force3D: true, ease: "sine.inOut" });
		// }

	}



	getMarqueeData() {
		if (globalStorage.marqueeData.length < 1) { return }

		this.marqueeBounds = [];

		for (let i = 0; i < globalStorage.marqueeData.length; i++) {
			let data = globalStorage.marqueeData[i];

			let bounds = data.el.getBoundingClientRect();

			this.marqueeBounds.push({
				top: (bounds.top + this.data.scrollY),
				bottom: (bounds.bottom + this.data.scrollY),
				height: (bounds.bottom - bounds.top)
			});

		}
	}

	playPauseMarquees(force = false) {

		if ((this.direction === "untouched" && force === false) || !this.marqueeBounds) return;
		for (let i = 0; i < this.marqueeBounds.length; i++) {
			let marqueeBounds = this.marqueeBounds[i],
				marqueeData = globalStorage.marqueeData[i];
			let { isVisible } = this.isVisibleStrict(marqueeBounds, 100);

			if (isVisible && this.data.current >= 0) {
				if (!marqueeData.playing) {
					marqueeData.tween.play();
					marqueeData.playing = true;
				}
			} else if ((!isVisible || this.data.current === 0) && marqueeData.playing) {
				marqueeData.tween.pause();
				marqueeData.playing = false;
			}
		}
	}

	getDirection() {
		if (this.data.last - this.data.scrollY < 0) {

			// DOWN
			if (this.direction === 'down' || this.data.scrollY <= 0) { return }
			this.direction = 'down';

		} else if (this.data.last - this.data.scrollY > 0) {

			// UP
			if (this.direction === 'up') { return }
			this.direction = 'up';

		}
	}

	getScrolledMedia() {
		this.data.scrolledMediaCount = 0;
		this.data.scrolledMediaFired = 0;
		this.dom.scrolledMedia = this.currentView.querySelectorAll('.mw');

		if (!this.dom.scrolledMedia) return;
		this.scrolledMediaData = [];
		for (let i = 0; i < this.dom.scrolledMedia.length; i++) {
			const el = this.dom.scrolledMedia[i];

			const bounds = el.getBoundingClientRect();

			this.data.scrolledMediaCount++;
			this.scrolledMediaData.push({
				el: el,
				mediaEls: el.querySelectorAll('.preload'),
				loaded: false,
				top: (bounds.top + this.data.scrollY) > this.data.height ? (bounds.top + this.data.scrollY) : this.data.height,
				bottom: (bounds.bottom + this.data.scrollY),
				height: (bounds.bottom - bounds.top)
			});

		}
	}

	getGummy() {
		if (!domStorage.gummyEl) { return }
		let playPauseGummy = domStorage.gummyEl.querySelectorAll('.gummy-wrapper');
		this.gummyData = [];

		for (let i = 0; i < playPauseGummy.length; i++) {
			const thisGummy = playPauseGummy[i];
			let bounds = thisGummy.getBoundingClientRect();
			const timeline = new gsap.timeline({ paused: true, repeat: -1 });
			timeline
				.fromTo(thisGummy, { y: 0, scale: 0.95 }, { rotate: -5, y: -15, scale: 1, ease: "sine.inOut", duration: 1, force3D: true })
				.to(thisGummy, { rotate: 0,   y: 0, scale: 0.95, ease: "sine.inOut", duration: 1, force3D: true });

			this.gummyData.push({
				el: thisGummy,
				tl: timeline,
				playing: false,
				top: (bounds.top + this.data.scrollY),
				bottom: (bounds.bottom + this.data.scrollY)
			});
		}
		this.gummyDataLength = this.gummyData.length;
	}

	playPauseGummy() {

		if (this.direction === "untouched") return;

		for (let i = 0; i < this.gummyDataLength; i++) {
			let data = this.gummyData[i];
			let {isVisible} = this.isVisible(data, 50);
			if (isVisible) {
				if (!data.playing) {
					data.playing = true;
					data.tl.play();
				}
			} else if (!isVisible && data.playing) {
				data.playing = false;
				data.tl.pause();
			}
		}
	}

	checkScrolledMedia(force = false) {
		if ((this.direction === "untouched" && !force) || !this.scrolledMediaData || this.data.scrolledMediaFired === this.data.scrolledMediaCount) { return; }

		for (let i = 0; i < this.scrolledMediaData.length; i++) {
			let data = this.scrolledMediaData[i];

			if (data.loaded) { continue; }

			if ((this.data.scrollY + this.data.window2x) > data.top) {
				data.el.classList.remove('mw');
				ImageLoad.loadImages(data.mediaEls, "nodeList", () => {
					// console.log('media loaded')
				});
				this.data.scrolledMediaFired++;
				data.loaded = true;
			}
		}
	}

	playPauseVideos() {
		if (this.direction === "untouched" || this.videosDataLength === 0) return;
		for (let i = 0; i < this.videosDataLength; i++) {
			let data = this.videosData[i];
			let { isVisible } = this.isVisibleStrict(data, 50)
			if (isVisible) {
				if (!data.playing) {
					data.el.play();
					data.playing = true;
				}
			} else if (!isVisible && data.playing) {
				data.el.pause();
				data.el.currentTime = 0;
				data.playing = false;
			}
		}
	}

	playPauseLottieLoopers() {
		if (this.direction === "untouched") return;
		for (let i = 0; i < this.lottieLoopers.length; i++) {
			let data = this.lottieLoopers[i];
			let { isVisible } = this.isVisible(data, 50)
			// console.log(data)
			if (isVisible) {

				if (!data.playing) {
					loopingAnims[i].anim.play();
					data.playing = true;
				}
			} else if (!isVisible && data.playing) {
				loopingAnims[i].anim.pause();
				data.playing = false;
			}
		}
	}

	getLottieLoopers() {
		let lottieLoopers = document.querySelectorAll('.lottie-loop');
		this.lottieLoopers = [];

		for (let i = 0; i < lottieLoopers.length; i++) {
			const el = lottieLoopers[i]
			if (el.dataset.above) {
				let width = parseInt(el.dataset.above);

				if (globalStorage.windowWidth < width) {
					continue;
				}
			}
			let bounds = el.getBoundingClientRect()
			this.lottieLoopers.push({
				playing: false,
				top: (bounds.top + this.data.scrollY),
				bottom: (bounds.bottom + this.data.scrollY),
			});
		}
	}

	getVideos() {
		let playPauseVideos = document.querySelectorAll('video.auto');
		this.videosData = [];

		for (let i = 0; i < playPauseVideos.length; i++) {
			let bounds = playPauseVideos[i].getBoundingClientRect()
			this.videosData.push({
				el: playPauseVideos[i],
				playing: false,
				top: (bounds.top + this.data.scrollY) > this.data.height ? (bounds.top + this.data.scrollY) : this.data.height,
				bottom: (bounds.bottom + this.data.scrollY),
			});
		}
		this.videosDataLength = this.videosData.length;
	}

	getScrollBasedSections() {
		if (!this.dom.scrollBasedElems) return;
		this.scrollBasedElems = []
		let length = this.dom.scrollBasedElems.length;
		for (let i = 0; i < length; i++) {
			if (i < this.offsetVal) { continue; }
			let el = this.dom.scrollBasedElems[i];
			const bounds = el.getBoundingClientRect();
			this.scrollBasedElems.push({
				el: el,
				played: false,
				top: (bounds.top + this.data.scrollY),
				bottom: (bounds.bottom + this.data.scrollY),
				height: (bounds.bottom - bounds.top),
				offset: globalStorage.windowWidth < 768 ? (el.dataset.offsetMobile * globalStorage.windowHeight) : (el.dataset.offset * globalStorage.windowHeight),
				splits: [],
				splitPrepped: false,
				splitReset: false
			});
		}

	}

	getDataFromElems() {
		if (!this.dom.dataFromElems) return;

		this.dataFromElems = [];

		let useMobile = globalStorage.windowWidth < 768;

		let length = this.dom.dataFromElems.length
		for (let i = 0; i < length; i++) {
			let el = this.dom.dataFromElems[i]

			let from, to, dur;
			const bounds = el.getBoundingClientRect()
			const tl = new gsap.timeline({ paused: true })

			if (useMobile) {
				from = el.dataset.mobileFrom ? JSON.parse(el.dataset.mobileFrom) : JSON.parse(el.dataset.from);
				to = el.dataset.mobileTo ? JSON.parse(el.dataset.mobileTo) : JSON.parse(el.dataset.to);
				if (el.dataset.mobileDur) {
					dur = el.dataset.mobileDur;
				} else {
					dur = el.dataset.dur ? el.dataset.dur : 1;
				}
			} else {
				from = JSON.parse(el.dataset.from);
				to = JSON.parse(el.dataset.to);
				dur = el.dataset.dur ? el.dataset.dur : 1;
			}

			to.force3D = true;

			tl.fromTo(el, 1, from, to)

			this.dataFromElems.push({
				el: el,
				tl: tl,
				top: bounds.top + this.data.scrollY + (el.dataset.delay ? globalStorage.windowHeight * parseFloat(el.dataset.delay) : 0),
				bottom: (bounds.bottom + this.data.scrollY) + (el.dataset.delay ? globalStorage.windowHeight * parseFloat(el.dataset.delay) : 0),
				height: bounds.bottom - bounds.top,
				from: from,
				duration: dur,
				progress: {
					current: 0
				}
			});
		}

	}

	getHeroMeasureEl() {
		if (!this.dom.heroMeasureEl) return;
		const el = this.dom.heroMeasureEl;
		const bounds = el.getBoundingClientRect();

		let heroMedia = document.querySelectorAll("#hero-scene img");

		const timeline = new gsap.timeline({ paused: true });
		timeline
			.fromTo(heroMedia[0], { y: 0 }, { y: 50, ease: "none" })
			.fromTo(heroMedia[1], { y: 0, scale: 1, z: 0 }, { transformOrigin: "50% 20%", z: 80, y: -35, scale: 1.03, ease: "none" }, 0)
			.fromTo(heroMedia[2], { scale: 1, z: 0 }, { transformOrigin: "50% 80%", z: 81, scale: 1.05, ease: "none" }, 0)

		this.heroMeasureData = {
			tl: timeline,
			top: (bounds.top + this.data.scrollY),
			bottom: (bounds.bottom + this.data.scrollY),
			height: bounds.bottom - bounds.top,
			progress: {
				current: 0
			}
		};
	}

	getDataHeroFromElems() {
		if (!this.dom.dataHeroFromElems) return;

		this.dataHeroFromElems = [];
		const useMobile = globalStorage.windowWidth < 768;
		for (let i = 0; i < this.dom.dataHeroFromElems.length; i++) {
			let el = this.dom.dataHeroFromElems[i]
			let from, to;
			const tl = new gsap.timeline({ paused: true });

			if (useMobile) {
				from = el.dataset.hMobileFrom ? JSON.parse(el.dataset.hMobileFrom) : JSON.parse(el.dataset.hFrom);
				to = el.dataset.mobileTo ? JSON.parse(el.dataset.mobileTo) : JSON.parse(el.dataset.to);
			} else {
				from = JSON.parse(el.dataset.hFrom);
				to = JSON.parse(el.dataset.to);
			}

			tl.fromTo(el, 1, from, to);

			this.dataHeroFromElems.push({
				el: el,
				tl: tl,
				progress: {
					current: 0
				}
			})
		}
	}

	animateDataHeroFromElems() {
		if (this.direction === "untouched" || !this.heroMeasureData) return;
		const { isVisible } = this.isVisible(this.heroMeasureData, 100);
		if (!isVisible) return;
		let percentageThrough = parseFloat((this.data.current / this.heroMeasureData.height).toFixed(3));

		if (percentageThrough <= .007) {
			percentageThrough = 0;
		} else if (percentageThrough >= 1) {
			percentageThrough = 1;
		}

		this.heroMeasureData.tl.progress(percentageThrough);
	}

	animateDataFromElems(force = false) {
		if ((this.direction === "untouched" && !force) || !this.dataFromElems) return

		let length = this.dataFromElems.length;
		for (let i = 0; i < length; i++) {
			let data = this.dataFromElems[i]

			const { isVisible, start, end } = this.isVisible(data, 100);

			if (isVisible) {

				this.intersectRatio(data, start, end)

				data.tl.progress(data.progress.current)
			}
		}
	}

	checkScrollBasedLoadins(force = false) {
		if ((this.direction === "untouched" && !force) || !this.scrollBasedElems) { return }
		if (this.thisPagesTLs.length !== this.offsetVal) {
			let length = this.scrollBasedElems.length;
			for (let i = 0; i < length; i++) {
				let data = this.scrollBasedElems[i];

				if (data.played) { continue; }

				if ((this.data.scrollY + data.offset) > data.top) {
					this.thisPagesTLs[i].play();
					this.offsetVal++;
					data.played = true;
				}
			}
		}
	}

	intersectRatio(data, top, bottom) {
		const start = top - this.data.height;

		if (start > 0) { return; }
		const end = (this.data.height + bottom + data.height) * data.duration;
		data.progress.current = Math.abs(start / end);
		data.progress.current = Math.max(0, Math.min(1, data.progress.current));
	}

	isVisible(bounds, offset) {
		const threshold = !offset ? this.data.threshold : offset;
		const start = bounds.top - this.data.current;
		const end = bounds.bottom - this.data.current;
		const isVisible = start < (threshold + this.data.height) && end > -threshold;
		return {
			isVisible,
			start,
			end
		};
	}

	isVisibleStrict(bounds, offset) {
		const threshold = !offset ? this.data.threshold : offset;
		const start = bounds.top - this.data.scrollY;
		const end = bounds.bottom - this.data.scrollY;
		const isVisible = start < (threshold + this.data.height) && end > -threshold;
		return {
			isVisible,
			start,
			end
		};
	}

	requestAnimationFrame() {
		this.raf = requestAnimationFrame(this.run);
	}

	cancelAnimationFrame() {
		cancelAnimationFrame(this.raf);
	}

	getCache() {
		this.getMarqueeData();
		//this.getDataHeroFromElems();
		this.getHeroSceneData()
		// this.getMobileScrollMasks();
		this.getFooterMeasureEl();
		this.getVideos();
		this.getScrollBasedSections();
		this.getDataFromElems();
		this.getGummy()
		this.getScrolledMedia();
		this.getHeroMeasureEl();
		this.checkScrolledMedia(true);
		this.playPauseMarquees(true);
		this.animateDataFromElems(true);
		this.getLottieLoopers();
	}

	getFooterMeasureEl() {
		if (!this.dom.footerMeasureEl) return;
		const el = this.dom.footerMeasureEl;
		const bounds = el.getBoundingClientRect();
		const lastSection = document.querySelector(".faq-section")
		const footerImg = document.querySelector(".instagram-section .inner")
		this.footerRevealTL = new gsap.timeline({ paused: true })
		this.footerRevealTL
			.fromTo(lastSection, { scale: 1, borderBottomLeftRadius: 4, transformOrigin: "50% 0%", borderBottomRightRadius: 4 }, { scale: 0.95, borderBottomLeftRadius: 50, borderBottomRightRadius: 50, ease: "none", force3D: true, duration: 1 })
			.fromTo(footerImg, { opacity: 0, blur: 4, scale: 1.01, transformOrigin: "50% 100%" }, { opacity: 1, blur: 0, scale: 1, ease: "none", force3D: true, duration: 0.9 }, 0.1);

		this.footerMeasureData = {
			top: bounds.top + this.data.scrollY,
			bottom: (bounds.bottom + this.data.scrollY),
			height: bounds.bottom - bounds.top,
			reversed: true,
			duration: (this.data.height / (bounds.bottom - bounds.top)).toFixed(2)
		};
	}

	// closestHomeProject() {
	// 	if (this.direction === "untouched" || !this.homeProjectData || this.data.scrollingTo) { return }
	// 	for (let i = 0; i < this.homeProjectData.length; i++) {
	// 		let data = this.homeProjectData[i]
	// 		let { isVisible, start } = this.isVisibleStrict(data, 0.01);
	//
	// 		if (isVisible && start < this.bottomEdge && start > this.topEdge) {
	//
	// 			this.scrollTo(data.inPos)
	// 			break
	// 		}
	// 	}
	// }

	getBounding() {
		this.data.height = globalStorage.windowHeight;
		this.data.max = Math.floor((this.dom.el.querySelector("[data-router-view]").getBoundingClientRect().height - this.data.height) + this.data.scrollY);
	}

	resize(omnibar = false) {
		if (this.state.resizing) { return; }
		this.state.resizing = true;
		if (!omnibar) {
			this.getCache();
			this.getBounding();
		}
		// this.checkScrolledMedia(true);
		// this.state.resizing = false;
		//
		// for (let i = 0; i < this.duplicates.length; i++) {
		// 	this.duplicates[i].remove();
		// }
	}

	scrollTo(val, dur = 1, ease = "expo.inOut", fn = false) {
		this.state.scrollingTo = true;
		gsap.to(this.el, dur, { scrollTop: val, ease: ease, onComplete: () => {
				this.state.scrollingTo = false;
				if(fn) fn();
			}
		});
	}

	destroy() {
		this.transitioning = true;

		this.state.rafCancelled = true;
		document.body.removeEventListener('wheel', this.event, true)
		this.cancelAnimationFrame();

		this.resize = null;

		this.dom = null;
		this.data = null;
		this.raf = null;
	}
}
