import bodymovin from "lottie-web";
import {globalStorage} from "./storage";
import {getViewport} from "./helpers";

export let pageAnims = [];
export let loopingAnims = [];

export const placeAnims = () => {
    pageAnims = [];
    let lottieWrappers = document.querySelectorAll('.lottie-scroll:not(.bound)');
    let length = lottieWrappers.length;
    for (let i = 0; i < length; i++) {
        let el = lottieWrappers[i];

        el.classList.add('bound');

        let slug = globalStorage.windowWidth < 768 ? lottieWrappers[i].dataset.jsonMobile : lottieWrappers[i].dataset.jsonDesktop;

        if (slug === "none") {
            el.parentNode.removeChild(el);
        } else {
            let path = "/assets/code/lottie-scroll/"+slug+".json";

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

            pageAnims.push({
                name: slug,
                anim: animation,
				played: false
            });
        }

    }

	const loopingWrappers = document.querySelectorAll('.lottie-loop:not(.bound)');
	loopingAnims = [];
	for (let i = 0; i < loopingWrappers.length; i++) {
		let el = loopingWrappers[i];
		if (el.dataset.above) {
			let width = parseInt(el.dataset.above);
			console.log(window.innerWidth, getViewport().width, globalStorage.windowWidth)
			if (globalStorage.windowWidth < width) {
				continue;
			}
		}

		el.classList.add('bound');

		let slug = globalStorage.windowWidth < 768 ? loopingWrappers[i].dataset.jsonMobile : loopingWrappers[i].dataset.jsonDesktop;

		if (slug === "none") {
			el.parentNode.removeChild(el);
		} else {
			let path = "/assets/code/lottie-loop/"+slug+".json";

			let animation = bodymovin.loadAnimation({
				container: el.querySelector(".ar-wrapper"),
				renderer: 'svg',
				loop: true,
				autoplay: false,
				path: path,
				rendererSettings: {
					preserveAspectRatio: el.dataset.preserve ? el.dataset.preserve : 'xMidYMid meet'
				}
			});

			loopingAnims.push({
				name: slug,
				anim: animation,
				played: false
			});
		}

	}
};
