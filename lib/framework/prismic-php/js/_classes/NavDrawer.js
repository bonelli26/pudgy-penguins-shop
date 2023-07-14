import { gsap } from "gsap";
import {domStorage, globalStorage} from "../_global/storage";
import {$scroll} from "../_global/_renderer";
import {namespace} from "stylelint-scss/dist/utils";


export class NavDrawer {

    constructor() {
        this.nav = document.querySelector("nav");
        if( !this.nav ) { return; }
        this.trigger = document.getElementById("hammy");
        this.navDrawer = document.getElementById("mobile-menu");
		this.line1 = this.trigger.querySelector('span:first-of-type');
		this.line2 = this.trigger.querySelector('span:nth-of-type(2)');
		this.line3 = this.trigger.querySelector('span:last-of-type');
        this.isOpen = false;
        this.timeline = new gsap.timeline();
        this.bindListeners();

		gsap.set(this.navDrawer, { autoAlpha: 0, scale: 0, yPercent: -50 });

    }

    bindListeners() {
            this.trigger.addEventListener("click", () => {
				if (this.isOpen) {
					this.close();
				} else {
					this.open();
				}
            });
    }

    open() {
		this.isOpen = true;
        this.timeline.clear();
        this.timeline.progress(0);
		this.timeline
			.set(this.navDrawer, {pointerEvents: "all"})
			.to(this.navDrawer, { autoAlpha: 1, scale: 1, yPercent: 0, duration: 1.3, force3D: true, ease: "expo.out" })
			.to(this.line1, { rotation: 45, y: 8 }, 0)
			.to(this.line3, { rotation: -45, y: -8	 }, 0)
			.to(this.line2, { rotation: -45, autoAlpha: 0 }, 0);
    }

    close() {
		this.isOpen = false;
        this.timeline.clear();
        this.timeline.progress(0);
		this.timeline
			.set(this.navDrawer, {pointerEvents: "none"})
			.to(this.navDrawer, { autoAlpha: 0, scale: 0, yPercent: -50, duration: 0.3, force3D: true, ease: "sine.inOut" })
			.to(this.line1, { rotation: 0, y: 0 }, 0)
			.to(this.line3, { rotation: 0, y: 0 }, 0)
			.to(this.line2, { rotation: 0, autoAlpha: 1 }, 0.01	);
    }
}



