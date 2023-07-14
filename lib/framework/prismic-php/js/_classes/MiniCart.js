import { gsap } from "gsap";
// import {globalStorage} from "../_global/storage";

export class MiniCart {
	constructor() {
		this.trigger = document.getElementById("mini-cart-trigger");
		if ( !this.trigger ) { return; }
		this.miniCart = document.getElementById("mini-cart");
		this.fadeEls = document.querySelector(".mini-cart .inner");
		this.yDist = this.fadeEls.getBoundingClientRect().height;
		this.closeCart = document.getElementById("nav-close");
		this.isOpen = false;
		this.timeline = new gsap.timeline();
		this.bindListeners();
		gsap.set(this.miniCart, { xPercent: 100 });
		gsap.set(this.fadeEls, { y: this.yDist });

	}

	bindListeners() {
		this.trigger.addEventListener("click", () => {
			this.open();
		});

		this.closeCart.addEventListener("click", () => {
			this.close();
		});
		document.addEventListener('keyup', (event) => {
			const key = event.key;
			if (key === 'Escape' || key === 'Esc') {
				this.close();
			}
		});

	}

	open() {
		if (this.isOpen) { return; }
		this.isOpen = true;
		this.timeline.clear();

		this.timeline
			.to(this.miniCart, { duration: 0.8, xPercent: 0, force3D: true, ease: "expo.out" })
			.to(this.fadeEls, { y: 0, duration: 0.95, force3D: true, ease: "expo.out" }, 0.365);
	}


	close() {
		if (!this.isOpen) { return; }
		this.isOpen = false;
		this.timeline.clear();

		this.timeline
			.to(this.fadeEls, { duration: 0.6, y: this.yDist, force3D: true, ease: "expo.out" })
			.to(this.miniCart, { duration: 0.6, xPercent: 100, force3D: true, ease: "expo.out" },0);
	}

	resize() {
		this.yDist = this.fadeEls.getBoundingClientRect().height;
		if (!this.isOpen) {
			gsap.set(this.fadeEls, { y: this.yDist });
		}
	}
}
