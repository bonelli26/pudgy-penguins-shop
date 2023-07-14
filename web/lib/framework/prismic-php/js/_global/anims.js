import { gsap } from "gsap";
import { domStorage, globalStorage } from "./storage";
import bodymovin from "lottie-web";
import { $scroll } from "../_global/_renderer";
import  EmblaCarousel  from "embla-carousel";
import {H} from "../routing";
import {loaderDesktop, loaderMobile} from "./lottiejson";
import Cookies from "js-cookie";
import {swapMedia} from "./helpers";


/*
	Page specific animations
-------------------------------------------------- */
export const pageEntrance = (namespace = null)=>{


	/* ----- Establish our timeline ----- */
	let timeline = new gsap.timeline({ paused: true });

	/* ----- Setup cases for specific load-ins ----- */
	switch(namespace){

		case "home":
			const hero = document.querySelector(".hero")
			const coin1 = hero.querySelector(".coin:first-of-type img")
			const coin2 = hero.querySelectorAll(".coin:nth-of-type(2) img")
			const coin3 = hero.querySelectorAll(".coin:nth-of-type(3) img")
			const pText = hero.querySelector(".copy")
			const innerCoin = document.querySelector(".inner-coin")
			timeline
				.fromTo(coin1, { scale: 0.5, xPercent: -200 }, { scale: 1, xPercent: 0, ease: "sine.out", duration: 1, force3D: true }, 0)
				.fromTo(coin2, { scale: 0.5, xPercent: -200,  yPercent: 20 }, { scale: 1, xPercent: 0, yPercent: 0, ease: "sine.out", duration: .8, stagger: 0.03, force3D: true }, 0.2)
				.fromTo(coin3, { scale: 0.5, xPercent: -200, yPercent: -100 }, { scale: 1, xPercent: 0, yPercent: 0, ease: "sine.out", duration: .8, stagger: 0.03, force3D: true }, 0.4)
				.fromTo(innerCoin, { yPercent: 30, autoAlpha: 0 }, { duration: 1.5, yPercent: 0, rotate: 0, autoAlpha: 1, force3D: true, ease: "elastic.out" }, 0.6)
				.fromTo(pText, { autoAlpha: 0, y: 20 }, { autoAlpha: 1, y: 0, ease: "sine.out", force3D: true }, 0.4)

			$scroll.checkScrollBasedLoadins(true);


			break;

		/* ----- Our default page entrance ----- */
		default:

			// timeline.add(()=>{ console.log("default anims in go here"); });

			break;
	}
	gsap.set(domStorage.globalMask, { pointerEvents: "none" })
	gsap.set(domStorage.eventMask, { pointerEvents: "none" })
	timeline.play();

	if (globalStorage.firstLoad) {
		globalStorage.firstLoad = false;
	}

};

/*
	Global element animations
-------------------------------------------------- */

export const globalEntrance = ()=>{

	if(!globalStorage.firstLoad){
		return;
	}

	let timeline = new gsap.timeline({ paused: true });

	if (!Cookies.get('seen_loader')) {
	/* ----- Establish our timeline ----- */


	const animation = bodymovin.loadAnimation({
		container: domStorage.globalLoader,
		renderer: 'svg',
		loop: false,
		autoplay: false,
		rendererSettings: {
			preserveAspectRatio: 'xMidYMid meet'
		},
		animationData: globalStorage.windowWidth > globalStorage.windowHeight ? loaderDesktop : loaderMobile
	});
	//animation.goToAndStop(27, true)

		animation.setSpeed(1)
		animation.play()
		animation.addEventListener("complete", () => {
			gsap.delayedCall(.35, () => {
				timeline
					.to(domStorage.globalLoader, { autoAlpha: 0, scale: 1.12, transformOrigin: "38% 80%", ease: "sine.out", force3D: true, duration: .22, onComplete: () => {
							globalStorage.transitionFinished = true;
						} })

			})
		});
	} else {
		timeline
			.to(domStorage.globalLoader, { autoAlpha: 0, scale: 1.12, transformOrigin: "38% 80%", ease: "sine.out", force3D: true, duration: .22, onComplete: () => {
					globalStorage.transitionFinished = true;
				} })
	}
	timeline.play();

	Cookies.set('seen_loader', 'true');
};


export const prepDrawers = () => {
	const drawers = document.querySelectorAll(".drawer:not(.bound)")

	for (let i = 0; i < drawers.length; i++) {
		const thisDrawer = drawers[i]

		let width = Number(thisDrawer.dataset.at)
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
					gsap.to(openDrawers[i].querySelector(".drawer-items"), 0.5, { height: 0, force3D: true, ease: "sine.inOut" })
					gsap.to(openDrawers[i].querySelectorAll(".drawer-items p"), 0.35, { opacity: 0, force3D: true, ease: "sine.inOut" })
				}
				thisDrawer.classList.add("open")

				gsap.to(childrenWrapper, 0.5, { height: childrenWrapperHeight, force3D: true, ease: "sine.inOut", onComplete: () => {
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
			$scroll.resize()
		}
	}
}
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
			let width = parseInt(this.marquees[i].dataset.at);
			if (globalStorage.windowWidth > width) {
				continue;
			}
			let inner = this.marquees[i].querySelector('.inner'),
				small = this.marquees[i].classList.contains('small') ? true : false,
				containerWitdth = small ? this.marquees[i].offsetWidth : globalStorage.windowWidth,
				copyEl = this.marquees[i].querySelector('[aria-hidden]'),
				copyWidth = copyEl.offsetWidth,
				multiplier,
				resetElCount = 2;

			if (copyWidth > containerWitdth) {
				multiplier = 1;
			} else {
				multiplier = Math.ceil((containerWitdth * 2) / copyWidth);
				resetElCount = Math.ceil(containerWitdth / copyWidth);
			}

			let tween = this.prepMarkup(this.marquees[i], inner, multiplier, copyEl, resetElCount);

			if (small) {
				globalStorage.smallMarquees.push({
					tween: tween,
					playing: false
				});

			} else {
				globalStorage.marqueeData.push({
					el: this.marquees[i],
					tween: tween,
					playing: false
				});
			}

		}

	}

	prepMarkup(marquee, inner, multiplier, copyEl, resetElCount) {

		for (let i = 1; i < multiplier; i++){
			let elementCopy = copyEl.cloneNode(true);
			elementCopy.classList.add("duplicate");
			inner.appendChild(elementCopy);
		}

		this.duplicates = inner.querySelectorAll(".duplicate");

		let resetDist = marquee.querySelector(".inner > *:nth-child("+resetElCount+")").offsetLeft;

		let dur = parseInt(globalStorage.isGreaterThan767 ? inner.dataset.dur : inner.dataset.mobileDur);

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
		if (el.classList.contains("links-inside")) {
			let links = el.querySelectorAll("a");
			links.forEach((link) => {
				link.addEventListener("click", (e) => {
					e.preventDefault();
					e.stopPropagation();

					if (slider.clickAllowed()) {
						let url;
						if (!e.target.href) {
							url = e.target.closest("a").href;
						} else {
							url = e.target.href;
						}
						H.redirect(url);
					}
				});
			});
		}

		const options = { loop: !el.classList.contains("no-loop"), inViewThreshold: 0.3, containScroll: true, startIndex: startIndex, align: slideAlignment, skipSnaps: true, dragFree: !el.classList.contains("no-drag-free") };

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

export const prepVideos = () => {
	const videoWrapper = document.querySelectorAll(".video-wrapper")

	for (let i = 0 ; i < videoWrapper.length; i++) {
		const video = videoWrapper[i].querySelector("video")
		const cover = videoWrapper[i].querySelector(".cover-image")
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
				gsap.to(cover, { autoAlpha: 0, ease: "sine.inOut", force3D: true, duration: 0.45, delay: .1 })
			})
		})
	}

}


export const hackerText = (splitCopy) => {
	const origText = splitCopy.dataset.origText
	const iterationIncrement = 1/3
	const intDur = 9
	let iteration = -2;
	const scramble = () => {
		const interval = setInterval(() => {
			splitCopy.innerText = origText
				.split("")
				.map((letter, index) => {
					if(index < iteration) {
						return origText[index];
					}
				})
				.join("");

			if(iteration >= origText.length){
				clearInterval(interval);
			}

			iteration += iterationIncrement;
		}, intDur);
	}

	splitCopy.innerText = ""

	return scramble

}
