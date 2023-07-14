import bodymovin from "lottie-web";
import {globalStorage} from "./storage";
import {returnLottieJson} from "./helpers";

export let pageAnims = [];
export let loopingAnims = [];

export const placeAnims = () => {
    pageAnims = [];
    let lottieWrappers = document.querySelectorAll('.lottie-scroll:not(.bound)');
    let length = lottieWrappers.length;

    for (let i = 0; i < length; i++) {
        let el = lottieWrappers[i];

        el.classList.add('bound');

        let slug = globalStorage.windowWidth > 768 ? lottieWrappers[i].dataset.jsonDesktop : lottieWrappers[i].dataset.jsonMobile;

		const animData = returnLottieJson(slug);

        if (slug === "none") {
            el.parentNode.removeChild(el);
        } else {

            let animation = bodymovin.loadAnimation({
                container: el,
                renderer: 'svg',
                loop: false,
                autoplay: false,
                animationData: animData,
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
			if (globalStorage.windowWidth < width) {
				continue;
			}
		}

		el.classList.add('bound');

		let slug = globalStorage.windowWidth < 768 ? loopingWrappers[i].dataset.jsonMobile : loopingWrappers[i].dataset.jsonDesktop;
		const animData = returnLottieJson(slug);
		if (slug === "none") {
			el.parentNode.removeChild(el);
		} else {

			let animation = bodymovin.loadAnimation({
				container: el.querySelector(".ar-wrapper"),
				renderer: 'svg',
				loop: true,
				autoplay: false,
				animationData: animData,
				rendererSettings: {
					preserveAspectRatio: el.dataset.preserve ? el.dataset.preserve : 'xMidYMid meet'
				}
			});
			animation.setSpeed(1.1);
			loopingAnims.push({
				name: slug,
				anim: animation,
				played: false
			});
		}

	}
};
