import { gsap } from "gsap";
import {domStorage, globalStorage} from "../_global/storage";
import {$scroll} from "../_global/_renderer";
import {namespace} from "stylelint-scss/dist/utils";


export class NavDrawer {

    constructor() {
        this.nav = document.querySelector("nav");
        if(!this.nav) { return; }
        this.trigger = document.getElementById("hammy");
		if(window.innerWidth > 767) {
			this.navDrawer = document.getElementById("nav-bar");
		}
        this.isOpen = false;
        this.timeline = new gsap.timeline();
        this.bindListeners();

		gsap.set(this.navDrawer, { autoAlpha: 0, scale: 0, yPercent: -50 });

    }

    bindListeners() {
            // this.trigger.addEventListener("click", () => {
			// 	if (this.isOpen) {
			// 		this.close();
			// 	} else {
			// 		this.open();
			// 	}
            // });
    }

    open() {
		this.isOpen = true;
		this.timeline.clear();
		this.timeline.progress(0);
		this.timeline
			.set(this.navDrawer, {pointerEvents: "all"})
			.to(this.navDrawer, {autoAlpha: 1, scale: 1, yPercent: 0, duration: 1.3, force3D: true, ease: "expo.out"})
	}

    close() {
		this.isOpen = false;
        this.timeline.clear();
        this.timeline.progress(0);
		this.timeline
			.set(this.navDrawer, {pointerEvents: "none"})
			.to(this.navDrawer, { autoAlpha: 0, scale: 0, yPercent: -50, duration: 0.3, force3D: true, ease: "sine.inOut" })

    }
}



