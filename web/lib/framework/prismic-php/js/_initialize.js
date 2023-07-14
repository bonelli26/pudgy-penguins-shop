import { globalStorage } from "./_global/storage";

if("scrollRestoration" in history){
	history.scrollRestoration = "manual";
}

const eventMask = document.getElementById("global-loader")
eventMask.addEventListener('scroll', (e) => {
	e.stopPropagation()
	e.preventDefault()
})
eventMask.addEventListener('wheel', (e) => {
	e.stopPropagation()
	e.preventDefault()
})

/*
	Init Routing
-------------------------------------------------- */
import "./routing";



/*
	Shopify
	 - uncomment if needed
	 - will load the Storefront API into memory
-------------------------------------------------- */
// import { Shopify } from "./_extensions/Shopify/_init";

// export const $shopify = new Shopify();

/*
	Subscription
	 - will load the Subscription API into memory
	 - set to null or undefined to exclude
-------------------------------------------------- */
// import { ReCharge } from "./_extensions/ReCharge/_init";
//
// export const $subscription = new ReCharge();

/* --- Run our inits --- */
// $shopify.init();
// $subscription.init();

/*
	Constants
-------------------------------------------------- */
const isMobile = require("ismobilejs");

globalStorage.isMobile = isMobile.any || ((/iPad|iPhone|iPod/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1)) && !window.MSStream);

if(globalStorage.isMobile) {
	document.getElementsByTagName('html')[0].classList.add('touch');
}

/*
	Check for Reduced Motion changes
-------------------------------------------------- */
if(globalStorage.reducedMotion){
	window.matchMedia("(prefers-reduced-motion: reduce)").addEventListener("change", ()=>{
		globalStorage.reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
	});
}

import { onReady, onLoad, onResize } from "./_global/_renderer";

/*
	Doc ready
-------------------------------------------------- */
document.addEventListener("DOMContentLoaded", ()=>{
	/* --- Fire onReady --- */
	onReady();
}, false);

/*
	Window onload
-------------------------------------------------- */
window.onload = function(){
	/* --- Fire onLoad --- */
	onLoad();
};

/*
	Window resize
-------------------------------------------------- */
let resizeTimeout = setTimeout(()=>{},0);

window.onresize = function(){

	/* --- Clear the timeout if actively resizing --- */
	clearTimeout(resizeTimeout);

	/* --- Delay resize event --- */
	resizeTimeout = setTimeout(()=>{
		/* --- Fire onResize --- */
		onResize();
	}, 250);
};
