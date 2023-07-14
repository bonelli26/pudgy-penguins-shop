import { gsap } from "gsap";
import { unstable_renderSubtreeIntoContainer } from "react-dom";
import { domStorage, globalStorage } from "../_global/storage";

// export class MegaNav {
// 	constructor() {
// 		this.megaNav = document.getElementById("mega-nav");
// 		this.openNav = document.getElementById("nav-open");
// 		this.closeNav = document.getElementById("nav-close");
// 		this.triggerWrapper = document.getElementById("trigger-wrapper");

// 		this.links = this.megaNav.querySelectorAll("a")
// 		this.isOpen = false;
// 		this.timeline = new gsap.timeline();
// 		this.bindListeners();

// 		gsap.set(this.closeNav, { xPercent: 0, scaleX: 0 });
// 		gsap.set(this.openNav, { xPercent: 0 });
// 		gsap.set(this.links, { xPercent: 0 });

// 	}

// 	bindListeners() {

// 		this.openNav.addEventListener("click", () => {
// 			this.open();
// 		});

// 		this.closeNav.addEventListener("click", () => {
// 			this.close();
// 		});

// 		document.addEventListener("click", (event) => {
// 			if (!event.target.closest()) {
// 				this.close();
// 			}
// 		});

// 		for (let i = 0; i < this.links.length; i++) {
// 			this.links[i].addEventListener("mouseenter", () => {
// 				globalStorage.smallMarquees[i].tween.play()
// 			})
// 			this.links[i].addEventListener("mouseleave", () => {
// 				globalStorage.smallMarquees[i].tween.pause()
// 			})
// 		}

// 	}



// 	open() {
// 		if (this.isOpen) { return; }
// 		gsap.set(this.megaNav, { pointerEvents: "all" });
// 		this.isOpen = true;
// 		this.timeline.clear();
// 		this.timeline.progress(0)
// 		this.timeline
// 			.to(this.closeNav, { scaleX: 1 ,transformOrigin: 'right', duration: .5, ease: "espo.inOut"})
// 			.to(this.openNav, { scaleX: 0, transformOrigin: 'left', duration: .3, ease: "espo.inOut" }, "<")
//             .to(this.triggerWrapper, { duration: .5, x: -264, force3D: true, ease: "expo.inOut" }, "-=.5")						
// 			.to(this.links, { duration: .5, xPercent: -100, stagger: .06, force3D: true, ease: "expo.inOut" }, 0.1)
// 			.set(this.megaNav, { overflow: "visible", pointerEvents: "all" });
			
// 	}


// 	close(instant = false) {
// 		if (!this.isOpen) { return; }
// 		gsap.set(this.megaNav, { pointerEvents: "none" });
// 		this.isOpen = false;
// 		this.timeline.clear();
// 		this.timeline.progress(0)
// 		if (instant) {
// 			this.timeline
// 			.set(this.megaNav, { overflow: "hidden", pointerEvents: "none" })
// 				.to(this.links, { duration: .5, xPercent: 0, stagger: .04, force3D: true, ease: "expo.out" })
// 				.to(this.triggerWrapper, { duration: .35, x: 0, force3D: true, ease: "expo.out" }, "-=.3")	
// 				.to(this.closeNav, { scaleX: 0, duration: .2, transformOrigin: 'right', ease: "expo.out" }, "-=.2")									
// 				.to(this.openNav, { scaleX: 1, transformOrigin: 'left', duration: .2, ease: "expo.out" }, "-=.35")
				
// 		} else {
// 			this.timeline
// 				.set(this.megaNav, { overflow: "hidden", pointerEvents: "none" })
// 				.to(this.links, { duration: .5, xPercent: 0, stagger: .04, force3D: true, ease: "expo.out" })
// 				.to(this.triggerWrapper, { duration: .35, x: 0, force3D: true, ease: "expo.out" }, "-=.3")	
// 				.to(this.closeNav, { scaleX: 0, duration: .2, transformOrigin: 'right', ease: "expo.out" }, "-=.2")									
// 				.to(this.openNav, { scaleX: 1, transformOrigin: 'left', duration: .2, ease: "expo.out" }, "-=.35")
// 		}


// 	}
// }
