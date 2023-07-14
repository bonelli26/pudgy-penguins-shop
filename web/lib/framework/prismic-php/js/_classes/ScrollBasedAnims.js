import { gsap } from "gsap";
import { globalStorage, domStorage } from "../_global/storage";
import {ImageLoad} from "../_global/_renderer";
import {loopingAnims, pageAnims} from "../_global/lottieInit";
import {hackerText} from "../_global/anims";
import { SplitText } from "../_extensions/splitText";
gsap.registerPlugin(SplitText);

export class ScrollBasedAnims {
	constructor(options = {}) {

		this.bindMethods();
		this.el = document.documentElement;
		this.currentView = this.el.querySelector('[data-router-view]:last-child');

		this.thisPagesTLs = [];
		this.scrollBasedElems = [];
		this.offsetVal = 0;
		this.body = document.body;
		this.direction = 'untouched';
		this.transitioning = false;
		this.headerScrolled = false;
		this.adjustHeaderDist = globalStorage.windowWidth > 959 ? 150 : 150;

		if (globalStorage.namespace === "products") {
			this.fixedAtcEl = document.querySelector('.fixed-atc');
		}

		const {
			dataFromElems = this.currentView.querySelectorAll('[data-from]'),
			dataHeroFromElems = this.currentView.querySelectorAll('[data-h-from]'),
			heroMeasureEl = this.currentView.querySelector('.hero-measure-el'),
			scrollBasedElems = this.el.querySelectorAll('[data-entrance]'),
			threshold = 0.01
		} = options;

		this.dom = {
			el: this.el,
			dataFromElems: dataFromElems,
			dataHeroFromElems: dataHeroFromElems,
			scrollBasedElems: scrollBasedElems,
			heroMeasureEl: heroMeasureEl
		};

		this.dataFromElems = null;
		this.dataHeroFromElems = null;

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
			ease: 0.075,
			height: 0,
			max: 0,
			scrollY: startingScrollTop,
			window2x: globalStorage.windowHeight * 2
		};

		this.el.addEventListener('scroll', this.run(), true);
		let length = this.dom.scrollBasedElems.length;
		for (let i = 0; i < length; i++) {
			const entranceEl = this.dom.scrollBasedElems[i];
			const entranceType = entranceEl.dataset.entrance;
			const entranceTL = new gsap.timeline({ paused: true });
			let staggerEls;
			let scaleEls;

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

				case "basic-fade":
					entranceTL
						.fromTo(entranceEl, { y: 30 }, { duration: 0.7, y: 0, ease: "sine.inOut", force3D: true })
						.fromTo(entranceEl, { opacity: 0 }, { duration: 0.68, opacity: 1, clearProps: "transform", ease: "sine.inOut", force3D: true }, 0.02);

					this.thisPagesTLs.push(entranceTL);
					break;

				case "scale-fade":
					scaleEls = entranceEl.querySelectorAll('.scale-el');
					const scaleBorder = entranceEl.querySelectorAll('.block-border');

					entranceTL
						.fromTo(scaleEls, { y: 40 }, { duration: 0.6, stagger: 0.05, y: 0, ease: "sine.inOut", force3D: true }, 0)
						.fromTo(scaleEls, { opacity: 0 }, { duration: 0.58, stagger: 0.05, clearProps: "transform", opacity: 1, ease: "sine.out", force3D: true }, 0.02)
						.fromTo(scaleBorder, { scaleX: 0, transformOrigin:"right" }, { transformOrigin:"left", duration: 0.30, stagger: 0.05, clearProps: "transform", scaleX: 1, ease: "sine.out", force3D: true }, 0);

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
		this.getBounding();
		this.getCache();
		this.requestAnimationFrame();
	}

	event(e) {
		this.data.target += Math.round(e.deltaY * -1);
		this.clamp();
	}

	clamp() {
		this.data.target = Math.round(Math.min(Math.max(this.data.target, 0), this.data.max));
	}

	run() {
		if (this.state.resizing || this.transitioning) return;
		this.data.scrollY = this.el.scrollTop;

		if (globalStorage.isMobile) {
			this.data.current = this.data.scrollY;
		} else {
			this.data.current += Math.round((this.data.scrollY - this.data.current) * this.data.ease);
		}

		if (this.data.current === this.data.last) {
			this.requestAnimationFrame();
			return;
		}

		this.getDirection();
		this.data.last = this.data.current;

		this.checkScrollBasedLoadins();
		this.animateDataHeroFromElems();
		this.animateDataFromElems();
		this.playPauseMarquees();
		this.checkScrolledMedia();
		this.playPauseVideos();
		this.playPauseGummy();
		this.requestAnimationFrame();
	}

	getMarqueeData() {
		if (globalStorage.marqueeData.length < 1) { return }

		this.marqueeBounds = [];

		for (let i = 0; i < globalStorage.marqueeData.length; i++) {
			let data = globalStorage.marqueeData[i];
			let bounds = data.el.getBoundingClientRect();

			this.marqueeBounds.push({
				top: (bounds.top + this.data.scrollY) > this.data.height ? (bounds.top + this.data.scrollY) : this.data.height,
				bottom: (bounds.bottom + this.data.scrollY),
				height: (bounds.bottom - bounds.top)
			});
		}

	}

	playPauseMarquees(force = false) {
		if ((this.direction === "untouched" && !force) || !this.marqueeBounds) return;

		for (let i = 0; i < this.marqueeBounds.length; i++) {
			let marqueeBounds = this.marqueeBounds[i],
				marqueeData = globalStorage.marqueeData[i];
			let check = (i === 0);
			let { isVisible } = this.isVisible(marqueeBounds, 50, check);

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
		if (this.direction === "untouched") return;
		for (let i = 0; i < this.videosDataLength; i++) {
			let data = this.videosData[i];
			let { isVisible } = this.isVisible(data, 50)
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

	getVideos() {
		let playPauseVideos = document.querySelectorAll('video.auto');
		this.videosData = [];

		for (let i = 0; i < playPauseVideos.length; i++) {
			let bounds = playPauseVideos[i].getBoundingClientRect();
			this.videosData.push({
				el: playPauseVideos[i],
				playing: false,
				top: (bounds.top + this.data.scrollY) > this.data.height ? (bounds.top + this.data.scrollY) : this.data.height,
				bottom: (bounds.bottom + this.data.scrollY),
			});
		}
		this.videosDataLength = this.videosData.length;
	}

	getGummy() {
		let playPauseGummy = domStorage.gummyEl.querySelectorAll('.gummy-wrapper');
		this.gummyData = [];

		for (let i = 0; i < playPauseGummy.length; i++) {
			const thisGummy = playPauseGummy[i];
			let bounds = thisGummy.getBoundingClientRect();
			const timeline = new gsap.timeline({ paused: true, repeat: -1 });
			timeline
				.fromTo(thisGummy, { y: 0, scale: 0.95 }, { y: -25, scale: 1, ease: "sine.inOut", duration: 0.8, force3D: true })
				.to(thisGummy, { y: 0, scale: 0.95, ease: "sine.inOut", duration: 0.7, force3D: true });

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



	playPauseLottieLoopers() {
		if (this.direction === "untouched") return;
		for (let i = 0; i < this.lottieLoopers.length; i++) {
			let data = this.lottieLoopers[i];
			let { isVisible } = this.isVisible(data, 50)
			console.log(data)
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

	getScrollBasedSections() {
		if (!this.dom.scrollBasedElems) return;

		let length = this.dom.scrollBasedElems.length;
		if (this.scrollBasedElems.length === 0) {
			for (let i = 0; i < length; i++) {
				let el = this.dom.scrollBasedElems[i];
				const bounds = el.getBoundingClientRect();
				this.scrollBasedElems.push({
					el: el,
					played: false,
					top: (bounds.top + this.data.scrollY),
					bottom: (bounds.bottom + this.data.scrollY),
					height: (bounds.bottom - bounds.top),
					offset: globalStorage.windowWidth < 768 ? (el.dataset.offsetMobile * globalStorage.windowHeight) : (el.dataset.offset * globalStorage.windowHeight)
				});
			}
		} else {
			for (let i = 0; i < length; i++) {
				let el = this.dom.scrollBasedElems[i];
				const bounds = el.getBoundingClientRect();
				this.scrollBasedElems[i].top = (bounds.top + this.data.scrollY)
				this.scrollBasedElems[i].bottom = (bounds.bottom + this.data.scrollY)
				this.scrollBasedElems[i].height = (bounds.bottom - bounds.top)
				this.scrollBasedElems[i].offset = globalStorage.windowWidth < 768 ? (el.dataset.offsetMobile * globalStorage.windowHeight) : (el.dataset.offset * globalStorage.windowHeight)
			}
		}

		// console.log(this.scrollBasedElems, this.thisPagesTLs, this.offsetVal)

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
		this.heroMeasureData = {
			top: (bounds.top + this.data.scrollY) > this.data.height ? (bounds.top + this.data.scrollY) : this.data.height,
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
		const { isVisible } = (this.isVisible(this.heroMeasureData, 100));
		if (!isVisible) return;
		let percentageThrough = (this.data.current / this.heroMeasureData.height).toFixed(3);

		if (percentageThrough <= 0) {
			percentageThrough = 0;
		} else if (percentageThrough >= 1) {
			percentageThrough = 1;
		}

		let length = this.dataHeroFromElems.length;
		for (let i = 0; i < length; i++) {
			let data = this.dataHeroFromElems[i]
			data.tl.progress(percentageThrough)
		}
	}

	animateDataFromElems() {
		if (this.direction === "untouched" || !this.dataFromElems) return

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
		let length = this.scrollBasedElems.length;
		for (let i = 0; i < length; i++) {
			let data = this.scrollBasedElems[i];
			if (data.splitPrepped) {
				if ((this.data.scrollY > (data.bottom + 50)) && data.played && !data.splitReset) {
					data.splitReset = true;
					// for (let j = 0; j < data.splits.length; j++) {
					// 	data.splits[j].revert();
					// }
				}

			}

			if (this.thisPagesTLs.length !== this.offsetVal) {
				if (data.played) { continue; }
				if (this.thisPagesTLs[i] === "split-copy" && !data.splitPrepped) {
					if ((this.data.scrollY + data.offset + (this.data.height * 1.5)) > data.top) {
						data.splitPrepped = true;
						let el = this.dom.scrollBasedElems[i];

						const splitLines = new SplitText(el, { type: "lines" });

						// data.splits.push(splitLines);
						const newDivs = splitLines.lines
						const lineHeight = splitLines.lines[0].getBoundingClientRect()
						gsap.set(splitLines.lines, { height: lineHeight.height, width: lineHeight.width })

						let entranceTL = new gsap.timeline({ paused: true });

						for (let j = 0; j < newDivs.length; j++) {
							newDivs[j].dataset.origText = newDivs[j].textContent


							entranceTL.set(this.dom.scrollBasedElems[i], { opacity: 1 });
							const goFunc = hackerText(newDivs[j])
							entranceTL
								.add(() => {
									newDivs[j].classList.add("played")
									goFunc()
								}, j * .2)
						}

						this.thisPagesTLs[i] = entranceTL;
					}
				}
				if ((this.data.scrollY + data.offset) > data.top) {
					this.thisPagesTLs[i].play();
					this.offsetVal++;
					data.played = true;
				}
			} else {
				if (data.played) {
					this.thisPagesTLs[this.offsetVal - 1].progress(0).pause();
					data.played = false;
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

	requestAnimationFrame() {
		this.raf = requestAnimationFrame(this.run);
	}

	cancelAnimationFrame() {
		cancelAnimationFrame(this.raf);
	}

	getCache() {
		this.getMarqueeData();
		this.getVideos();
		this.getGummy();
		this.getScrollBasedSections();
		this.getDataHeroFromElems();
		this.getDataFromElems();
		this.getScrolledMedia();
		this.getHeroMeasureEl();

		this.checkScrolledMedia(true);
		this.playPauseMarquees(true);
	}

	getBounding() {
		this.data.height = globalStorage.windowHeight;
		this.data.max = (this.dom.el.getBoundingClientRect().height - this.data.height) + this.data.scrollY;
	}

	resize(omnibar = false) {
		if (this.state.resizing) { return; }
		this.state.resizing = true;
		if (!omnibar) {
			this.getCache();
			this.getBounding();
		}
		this.checkScrolledMedia(true);
		this.state.resizing = false;
	}

	scrollTo(val, dur = 1, ease = "expo.inOut", fn = false) {
		this.state.scrollingTo = true;
		gsap.to(this.el, dur, { scrollTop: val, ease: "sine.inOut", onComplete: () => {
				this.state.scrollingTo = false;
				if(fn) fn();
			}
		});
		gsap.to(this.el, dur, { scrollTop: val, ease: ease, onComplete: () => { this.state.scrollingTo = false; } });
	}

	destroy() {
		this.transitioning = true;

		this.state.rafCancelled = true;
		this.el.removeEventListener('scroll', this.run(), true)
		this.cancelAnimationFrame();

		this.resize = null;

		this.dom = null;
		this.data = null;
		this.raf = null;
	}
}
