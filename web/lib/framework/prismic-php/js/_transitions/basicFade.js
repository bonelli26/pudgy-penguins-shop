import Highway from "@dogstudio/highway";
import { gsap } from "gsap";
import { domStorage, globalStorage } from "../_global/storage";
import {$megaMenu, $mobileMenu} from "../_global/_renderer";

let globalMask = document.getElementById("global-mask");

/*
	Default Highway Transition
-------------------------------------------------- */
class BasicFade extends Highway.Transition{

	out({from, trigger, done}){

		gsap.set(domStorage.globalMask, { pointerEvents: "all" })
		globalStorage.transitionLottie.setDirection(1)
		globalStorage.transitionLottie.play()
		globalStorage.transitionLottie.addEventListener("complete", () => {
			gsap.delayedCall(0.05, () => {
				if ($megaMenu.isOpen) {
					$megaMenu.close(true)
				}
				done();
			})
		});
	}

	in({from, to, trigger, done}){

		globalStorage.namespace = to.dataset.routerView;

		// Move to top of page
		window.scrollTo(0, 0);

		// Remove old view
		from.remove();
		globalStorage.transitionFinished = true;

		done();
	}
}

export default BasicFade;
