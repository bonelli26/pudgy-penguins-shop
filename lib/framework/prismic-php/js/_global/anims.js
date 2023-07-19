import { gsap } from "gsap";
import { globalStorage, domStorage } from "./storage";
import {$scroll} from "./_renderer";
import  EmblaCarousel  from "embla-carousel";
import bodymovin from "lottie-web";


/*
	Page specific animations
-------------------------------------------------- */
export const pageEntrance = (namespace = null)=> {

	/* ----- Establish our timeline ----- */
	let timeline = new gsap.timeline({ paused: true });

	/* ----- Setup cases for specific load-ins ----- */
	switch(namespace){
		/* ----- Our default page entrance ----- */
		default:
			let timeline = new gsap.timeline({ repeat: -1, repeatDelay: 0.25 });

			const heroLine = document.getElementById("hero-line");
			timeline
				.fromTo(heroLine, { scaleY: 0 }, {  transformOrigin: "0 0", scaleY: 1, ease: "expo.easeInOut", duration: 0.25 })
				.fromTo(heroLine, { scaleY: 1 }, {  transformOrigin: "100% 100%", scaleY: 0, ease: "expo.easeOut", duration: 0.25 }, ">+0.3");
			break;


	}

	// timeline.to(domStorage.globalMask, 0.2, { autoAlpha: 0, ease: "sine.inOut", onComplete: ()=>{ globalStorage.transitionFinished = true; }}, 0);
	gsap.set(domStorage.clickMask, { pointerEvents: "none" });

	timeline.play();


	if (globalStorage.firstLoad) {
		globalStorage.firstLoad = false;
	}
};

/*
	Global element animations
-------------------------------------------------- */
export let $slideShow;
export const globalEntrance = ()=>{

	if(globalStorage.firstLoad !== true){
		return;
	}

	/* ----- Establish our timeline ----- */
	// let timeline = new gsap.timeline({ paused: true });
	// let logo = document.querySelector("#header .logo");

	// gsap.set(logo, { y: 26 });


	gsap.to(domStorage.header,{ autoAlpha: 1, duration: .3, ease: "sine.inOut", force3D: true, onComplete: ()=>{
			gsap.delayedCall(.5, () => {
				globalStorage.transitionFinished = true;
			})
		}
	});
};

export const prepDrawers = () => {
	const drawers = document.querySelectorAll(".drawer:not(.bound)")

	for (let i = 0; i < drawers.length; i++) {
		const thisDrawer = drawers[i]
		let width = parseInt(thisDrawer.dataset.at);
		if (globalStorage.windowWidth > width) {
			continue;
		}
		thisDrawer.classList.add("bound")
		const childrenWrapper = thisDrawer.querySelector(".drawer-items")
		const childrenWrapperItems = childrenWrapper.querySelectorAll("p")
		const childrenWrapperHeight = childrenWrapper.offsetHeight

		thisDrawer.addEventListener("click", event => {
			if (!thisDrawer.classList.contains("open")) {
				const openDrawers = document.querySelectorAll(".drawer.open")
				for (let i = 0; i < openDrawers.length; i++) {
					openDrawers[i].classList.remove("open")
					gsap.to(openDrawers[i].querySelector(".drawer-items"), 0.35, { height: 0, force3D: true, ease: "sine.inOut" })
					gsap.to(openDrawers[i].querySelectorAll(".drawer-items p"), 0.35, { opacity: 0, force3D: true, ease: "sine.inOut" })
				}
				thisDrawer.classList.add("open")

				gsap.to(childrenWrapper, 0.35, { height: childrenWrapperHeight, force3D: true, ease: "sine.inOut", onComplete: () => {
						$scroll.resize()
					} })
				gsap.fromTo(childrenWrapperItems, 0.7, { opacity: .2 }, { opacity: 1, force3D: true, ease: "sine.inOut" })
			} else {
				thisDrawer.classList.remove("open")
				gsap.to(childrenWrapper, 0.35, { height: 0, force3D: true, ease: "sine.inOut", onComplete: () => {
						$scroll.resize()
					} })
				gsap.to(childrenWrapperItems, 0.35, { opacity: 0, force3D: true, ease: "sine.inOut" })
			}
		})
		gsap.set(childrenWrapper, { height: 0 })
		let origOffsetTop = thisDrawer.getBoundingClientRect().top - 120
		if ((i === drawers.length - 1) && $scroll) {
			$scroll.resize();
		}
	}
};

export class Marquees {

	constructor() {
		this.marquees = document.querySelectorAll('.marquee:not(.prepped)');

		this.init();
	}

	init() {
		this.getCache();
	}

	getCache(resize = false) {
		this.window2x = globalStorage.windowWidth * 2;

		for (let i = 0; i < this.marquees.length; i++) {
			const el = this.marquees[i];
			if (el.dataset.above) {
				let width = parseInt(el.dataset.above);

				if (globalStorage.windowWidth < width) {
					continue;
				}
			}
			let inner = this.marquees[i].querySelector('.inner'),
				copyEl = this.marquees[i].querySelector('[aria-hidden]'),
				copyWidth = copyEl.offsetWidth,
				multiplier,
				resetElCount = 2;

			if (copyWidth > globalStorage.windowWidth) {
				multiplier = 1;
			} else {
				multiplier = Math.ceil((globalStorage.windowWidth * 2) / copyWidth);
				resetElCount = Math.ceil(globalStorage.windowWidth / copyWidth);
			}

			let tween = this.prepMarkup(this.marquees[i], inner, multiplier, copyEl, resetElCount);

			globalStorage.marqueeData.push({
				el: this.marquees[i],
				tween: tween,
				playing: false
			});
		}
	}

	prepMarkup(marquee, inner, multiplier, copyEl, resetElCount) {
		for (let i = 1; i < multiplier; i++){
			let elementCopy = copyEl.cloneNode(true);
			elementCopy.classList.add("duplicate");
			inner.appendChild(elementCopy);
		}

		if(marquee.classList.contains('hover')) {
			inner.addEventListener("mouseenter", () => {
				tween.timeScale(0);
			});
			inner.addEventListener("mouseleave", () => {
				tween.timeScale(1);
			});
		}

		this.duplicates = inner.querySelectorAll(".duplicate");

		let resetDist = marquee.querySelector(".group:nth-child("+resetElCount+")").getBoundingClientRect().left;

		let dur = parseInt(inner.dataset.dur ? inner.dataset.dur : 25);

		let tween = gsap.fromTo(inner,{ x: 0 }, { duration: dur, repeat: -1, x: -resetDist, ease: "none", force3D: true }, 0).pause();

		marquee.classList.add('prepped');

		return tween;
	}


	resize() {
		for (let i = 0; i < this.duplicates.length; i++) {
			this.duplicates[i].remove();
		}

		this.getCache(true);
	}
}

export const prepSliders = () => {

	let prepControls = (slider, dots, prev, next) => {
		if (prev) {
			prev.addEventListener('click', () => {
				slider.scrollPrev();

			});
		}

		if (next) {
			next.addEventListener('click', () => {
				slider.scrollNext();

			});
		}
		if (dots) {
			for (let j = 0; j < dots.length; j++) {
				dots[j].addEventListener('click', () => {
					if (dots[j].classList.contains("active")) { return; }
					slider.scrollTo(j);
				});
			}
			slider.on("select", () => {
				dots[slider.previousScrollSnap()].classList.remove('active');
				dots[slider.selectedScrollSnap()].classList.add('active');
			});
		}

	};

	let sliders = document.querySelectorAll('.slider:not(.prepped)');
	for (let i = 0; i < sliders.length; i++) {
		const el = sliders[i];
		if (el.dataset.at) {
			let width = parseInt(el.dataset.at);

			if (globalStorage.windowWidth > width) {
				continue;
			}
		}
		if (el.dataset.above) {
			let width = parseInt(el.dataset.above);

			if (globalStorage.windowWidth < width) {
				continue;
			}
		}

		const slideWrapper = el.querySelector('.slides');
		const slides = el.querySelectorAll('.slide');
		const prev = el.querySelector('.prev');
		const next = el.querySelector('.next');
		const dotsWrapper = el.querySelector('.dots');
		let slideAlignment = el.dataset.align ? el.dataset.align : 'center';
		let startIndex = el.dataset.index ? parseInt(el.dataset.index) : 0;
		let dots = false;
		if (dotsWrapper) {
			dots = dotsWrapper.querySelectorAll('.dot');
		}

		const options = { loop: !el.classList.contains("no-loop"), inViewThreshold: 0.3, speed: 20, containScroll: true, startIndex: startIndex, align: slideAlignment, skipSnaps: true, dragFree: !el.classList.contains("no-drag-free") };

		const slider = EmblaCarousel(slideWrapper, options);
		slider.on("select", () => {
			slides[slider.previousScrollSnap()].classList.remove('active');
			slides[slider.selectedScrollSnap()].classList.add('active');
		});
		slides[slider.selectedScrollSnap()].classList.add('active');
		prepControls(slider, dots, prev, next);

		el.classList.add("prepped");

	}

};

export const prepModals = (modalTrigger) => {

	const modalWrapper = document.getElementById('modal-wrapper');
	if (!modalWrapper) return;
	const modalWrapperClone = modalWrapper.cloneNode(true)
	modalWrapper.remove()
	document.body.appendChild(modalWrapperClone)

	for (let i = 0; i < modalTrigger.length; i++) {
		const modalName = modalTrigger[i].dataset.modal;
		const modalBg = document.querySelector('.modal-bg');
		const modal = document.querySelector('.modal[data-modal="'+ modalName +'"]');
		const modalWrapper = modal.parentElement;
		const closeTrigger = modal.querySelector('.close-modal');
		const timeline = new gsap.timeline();

		if (globalStorage.windowWidth > 767) {
				gsap.set(modal, { autoAlpha: 0, xPercent: 100 })
				gsap.set(closeTrigger, {autoAlpha: 0, rotation: -360 })
		}

		gsap.set(modalBg, { autoAlpha: 0 })
		gsap.set(modalWrapper, { autoAlpha: 0, pointerEvents: "none"})
		gsap.set(modal, { autoAlpha: 0,  yPercent: 100 });
		gsap.set(closeTrigger, {autoAlpha: 0 })

		modalTrigger[i].addEventListener('click', () => {
			timeline.clear()
			timeline
				.to(modalBg, { autoAlpha: 1, ease: "sine.inOut", duration: 0.25, force3D: true })
				.to(modalWrapper, { autoAlpha: 1, pointerEvents: "all", ease: "sine.inOut", duration: 0.25, force3D: true })
				.to(modal, { autoAlpha: 1, yPercent: 0, ease: "sine.inOut", duration: 0.3, force3D: true }, 0.15)
				.to(closeTrigger, { autoAlpha: 1, ease: "sine.inOut", duration: 0.2, force3D: true });

			if (globalStorage.windowWidth > 767) {
				timeline.clear()
				timeline
					.to(modalBg, { autoAlpha: 1, ease: "sine.inOut", duration: 0.25, force3D: true })
					.to(modalWrapper, { autoAlpha: 1, pointerEvents: "all", ease: "sine.inOut", duration: 0.25, force3D: true  })
					.to(modal, { autoAlpha: 1,  xPercent: 0, ease: "sine.inOut", duration: 0.3, force3D: true }, 0.15)
					.to(closeTrigger, { autoAlpha: 1, rotation: 0, ease: "expo.out", duration: 1.2, force3D: true })
			}

		});

		modal.addEventListener('click', (e) => {
			e.stopPropagation()
		});

		closeTrigger.addEventListener('click', () => {
			timeline.clear()
			timeline.progress(0)
			timeline
				.to(closeTrigger, {  ease: "sine.inOut", duration: 0.2, force3D: true }, 0)
				.to(modalWrapper, { autoAlpha: 0, pointerEvents: "none", ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
				.to(modal, { autoAlpha: 0, yPercent: 100, ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
				.to(modalBg, { autoAlpha: 0, ease: "sine.inOut", duration: 0.2, force3D: true }, 0.05)

			if (globalStorage.windowWidth > 767) {
				timeline.clear()
				timeline.progress(0)
				timeline
					.to(closeTrigger, { autoAlpha: 1, rotation: -360, ease: "expo.out", duration: 1.2, force3D: true }, 0)
					.to(modalWrapper, { autoAlpha: 0, pointerEvents: "none", ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
					.to(modal, { autoAlpha: 0, xPercent: 100, ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
					.to(modalBg, { autoAlpha: 0, ease: "sine.inOut", duration: 0.2, force3D: true }, 0.05)
			}

		});

		modalWrapper.addEventListener('click', () => {
			timeline.clear()
			timeline.progress(0)
			timeline
				.to(closeTrigger, {  ease: "sine.inOut", duration: 0.2, force3D: true }, 0)
				.to(modalWrapper, { autoAlpha: 0, pointerEvents: "all", ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
				.to(modal, { autoAlpha: 0, yPercent: 100, ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
				.to(modalBg, { autoAlpha: 0, ease: "sine.inOut", duration: 0.2, force3D: true }, 0.05)

			if (globalStorage.windowWidth > 767) {
				timeline.clear()
				timeline.progress(0)
				timeline
					.to(closeTrigger, { autoAlpha: 1, rotation: -360, ease: "expo.out", duration: 1.2, force3D: true }, 0)
					.to(modalWrapper, { autoAlpha: 0, pointerEvents: "all", ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
					.to(modal, { autoAlpha: 0, xPercent: 100, ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
					.to(modalBg, { autoAlpha: 0, ease: "sine.inOut", duration: 0.2, force3D: true }, 0.05)
			}
		});

		document.addEventListener('keyup', (event) => {
			let key = event.key;
			if (key === 'Escape' || key === 'Esc') {
				timeline.clear()
				timeline.progress(0)
				timeline
					.to(closeTrigger, { autoAlpha: 0, ease: "expo.out", duration: 1, force3D: true }, 0)
					.to(modalWrapper, { autoAlpha: 0, pointerEvents: "none", ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
					.to(modal, { autoAlpha: 0, yPercent: 100, ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
					.to(modalBg, { autoAlpha: 0,  ease: "sine.inOut", duration: 0.2, force3D: true }, 0.05);

				if (globalStorage.windowWidth > 767) {
					timeline.clear()
					timeline.progress(0)
					timeline
						.to(closeTrigger, { autoAlpha: 1, rotation: -360, ease: "expo.out", duration: 1.2, force3D: true }, 0)
						.to(modalWrapper, { autoAlpha: 0, pointerEvents: "none", ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
						.to(modal, { autoAlpha: 0, xPercent: 100, ease: "sine.inOut", duration: 0.25, force3D: true }, 0.05)
						.to(modalBg, {  autoAlpha: 0, ease: "sine.inOut", duration: 0.2, force3D: true }, 0.05);

				}

			}
		});
	}

};

export const contentShifter = () => {
	let shiftLotties = [];
	let playedLotties = false
	let lottieWrappers = document.querySelectorAll('.lottie-shift:not(.bound)');
		let length = lottieWrappers.length;
		for (let i = 0; i < length; i++) {
			let el = lottieWrappers[i];

			el.classList.add('bound');

			let slug = globalStorage.windowWidth < 768 ? lottieWrappers[i].dataset.jsonMobile : lottieWrappers[i].dataset.jsonDesktop;

			if (slug === "none") {
				el.parentNode.removeChild(el);
			} else {
				let path = "/assets/code/lottie-shift/"+slug+".json";

				let animation = bodymovin.loadAnimation({
					container: el,
					renderer: 'svg',
					loop: false,
					autoplay: false,
					path: path,
					rendererSettings: {
						preserveAspectRatio: el.dataset.preserve ? el.dataset.preserve : 'xMidYMid meet'
					}
				});

				shiftLotties.push(animation);
			}

	}

	const shift = document.querySelector('.shift');

	for (let i = 0; i < length; i++) {

		const trigger = document.querySelector('.shift .trigger:first-of-type');
		const trigger1 = document.querySelector('.shift .trigger:last-of-type');
		const shiftEl = document.querySelectorAll('.shift .shift-element');
		const shiftBar = document.querySelectorAll('.bars-shift .bar')
		let isAnimating = false;

		trigger1.addEventListener('click', () => {
			if (isAnimating || trigger1.classList.contains("active")) {
				return;
			}

			gsap.delayedCall(.4, () => {
				if (!playedLotties) {
					playedLotties = true;
					shiftLotties[0].play();
					shiftLotties[1].play();
				}
			});

			isAnimating = true;
			document.querySelector('.trigger.active').classList.remove('active');
			trigger1.classList.add('active');

			gsap.to(shiftEl, { duration: 0.8, yPercent: -100, ease: "expo.out" , stagger: 0.08, onComplete: function onComplete() {
					isAnimating = false;
				}
			});

			gsap.fromTo(shiftBar, { xPercent: -100 }, { xPercent: 0, duration: 0.7, clearProps: "transform", stagger: 0.07, ease: "expo.inOut", force3D: true });

		});

		trigger.addEventListener("click", () => {
			if (isAnimating || trigger.classList.contains("active")) {
				return;
			}

			isAnimating = true;
			document.querySelector('.trigger.active').classList.remove('active');
			trigger.classList.add('active');

			gsap.to(shiftEl, { duration: 0.8, yPercent: 0, ease: "expo.out", stagger: -0.08, onComplete: function onComplete() {
					isAnimating = false;
				}
			});
		});

	}

};

export const prepTabs = () => {
	let tabWrappers = globalStorage.isGreaterThan767 ? document.querySelectorAll(".tab-set") : document.querySelectorAll(".tab-set:not(.formula-tab)");
	for (let i = 0; i < tabWrappers.length; i++) {
		let el = tabWrappers[i],
			tabs = el.querySelectorAll('[data-tab="'+ el.dataset.tabs +'"]'),
			triggers = el.querySelectorAll('[data-trigger="'+ el.dataset.triggers +'"]'),
			activeIdx = 0;

		for (let j = 0; j < triggers.length; j++) {
			let trigger = triggers[j],
				tab = tabs[j];

			trigger.addEventListener("click", () => {
				if (trigger.classList.contains("active")) { return; }
				let currentTab = tabs[activeIdx];
				el.querySelector(".trigger.active").classList.remove("active");
				trigger.classList.add("active");
				activeIdx = j;

				gsap.to(currentTab, { autoAlpha: 0, ease: "sine.inOut", duration: 0.35, onComplete: () => {
						gsap.set(currentTab, { position: "absolute" });
						gsap.set(tab, { position: "relative" });
						gsap.to(tab, { autoAlpha: 1, ease: "sine.inOut", duration: 0.35 } );
					}
				});
			});
		}
	}
};




export const playButtonFade = () => {
	const playBtn = document.getElementById('play-button');
	if(!playBtn) {return}
	const playGradient = document.getElementById('play-gradient');

	playBtn.addEventListener("click", () => {
		gsap.to(playGradient, { duration: 0.3, autoAlpha: 0, force3D: true, ease: "sine.inOut" });
	});

};

export const externalLinks = () => {

	const optionText = document.querySelector(".option-name > p");
	const link = document.querySelector(".variants .purple-btn");
	const triggers = document.querySelectorAll(".option-trigger");
	const description = document.querySelector(".option-description > p");
	const images = document.querySelectorAll(".option-image");
	for (let i = 0; i < triggers.length; i++) {
		let el = triggers[i],
			isAnimating = false;

		el.addEventListener('click', () => {
			if (isAnimating || el.classList.contains("active")) {
				return;
			}
			document.querySelector('.option-trigger.active').classList.remove('active')
			el.classList.add('active');
			link.href = el.dataset.link;
			optionText.innerText = el.dataset.flavor;
			description.innerText = el.dataset.descript;

			if (i === 0) {
				gsap.to(images[0], { autoAlpha: 1, duration: 0.22, force3D: true, ease: "sine.inOut"})
				gsap.to(images[1], { autoAlpha: 0, duration: 0.22, force3D: true, ease: "sine.inOut" });
			} else {
				gsap.to(images[1], { autoAlpha: 1, duration: 0.22, force3D: true, ease: "sine.inOut"})
				gsap.to(images[0], { autoAlpha: 0, duration: 0.22, force3D: true, ease: "sine.inOut" });
			}
		});

	}
}

export const pulsingCircles = () => {
	const pulseAnims = document.querySelectorAll(".pulse-anim")
	for (let i = 0; i < pulseAnims.length; i++) {
		const paths = pulseAnims[i].querySelectorAll(".border");
		gsap.set([paths[0], paths[1]], {opacity: 0});
		console.log(paths)
		gsap.fromTo([paths[0], paths[1]], { scaleX: 0.98, scaleY: 0.95 }, {
			scaleX: 1.06,
			scaleY: 1.28,
			duration: 1.6,
			stagger: {
				each: 0.5,
				repeat: -1
			},
			ease: "sine.inOut"
		});

		gsap.to([paths[0], paths[1]], {
			opacity: 1,
			duration: 0.8,
			stagger: {
				each: 0.5,
				repeat: -1,
				yoyo: true
			},
			ease: "none"
		});
	}
}

export const prepVideos = () => {
	const videoWrapper = document.querySelectorAll(".video-wrapper")

	for (let i = 0 ; i < videoWrapper.length; i++) {
		const video = videoWrapper[i].querySelector("video")
		const button = videoWrapper[i].querySelector("button")
		let played = false;

		videoWrapper[i].addEventListener('click', () => {
			if ( played === true ) {
				return;
			}

			if (!globalStorage.isMobile) {
				video.source += '&autoplay=1';
			}
			gsap.delayedCall(.3, () => {
				gsap.to(button, { autoAlpha: 0, ease: "sine.inOut", force3D: true, duration: 0.35 })
			})
		})
	}

}
