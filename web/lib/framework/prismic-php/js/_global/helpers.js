import * as cookies from "js-cookie";
import * as serialize from "form-serialize";
import { globalStorage } from "./storage";
import { Marquees, prepSliders,  prepDrawers, prepVideos } from "./anims";

import { placeAnims } from "./lottieInit";
import Colcade from "colcade";
/*
 	Store any predefined global functions in here,
	useful for rewriting your favorite jquery function
	into a vanilla JS function.

-------------------------------------------------- */

/*
 	Get viewport
-------------------------------------------------- */
export const getViewport = function(){

	let e = window, a = "inner";

	if(!("innerWidth" in window)){
		a = "client";
		e = document.documentElement || document.body;
	}

	return { width: e[ a + "Width" ], height: e[ a + "Height" ] };
};

/*
 	Remove from array
-------------------------------------------------- */
export const remove = (array, key)=>{
	return array.filter(e => e !== key);
};

/*
 	Return query string params
-------------------------------------------------- */
export const parseQueryString = ()=>{

	/* --- Return if there is no search string --- */
	if(!window.location.search || window.location.search == "") return;

	/* --- Parse the search parameters to a JSON object --- */
	return JSON.parse('{"' + decodeURI(window.location.search.substring(1)).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
};

/*
 	Error Catching
-------------------------------------------------- */
export const tryCatch = ()=>{

};

/*
 	has class
-------------------------------------------------- */
export const hasClass = (element, cls)=>{
	return (" " + element.className + " ").indexOf(" " + cls + " ") > -1;
};

/*
 	ajax
-------------------------------------------------- */
export const ajax = (url, options = {}, callback = null)=>{

	let method = (typeof options.method === "undefined") ? "get" : options.method;
	let type = (typeof options.type === "undefined") ? "json" : options.type.toLowerCase();
	let headers = (typeof options.headers === "undefined") ? [] : options.headers;
	let data = (typeof options.data === "undefined") ? null : options.data;

	/* --- Start our XHR connection --- */
	let xhr = new XMLHttpRequest();

	xhr.open(method, url, true);

	/* --- Add our Headers --- */
	if(type === "json"){
		xhr.setRequestHeader("Accept", "application/json");
		xhr.setRequestHeader("Content-Type", "application/json");
	}

	Array.prototype.slice.call(headers).forEach((header)=>{
		xhr.setRequestHeader(header[0], header[1]);
	});

	/* --- Send our request --- */
	xhr.send(data);

	/* --- Let's check our state change --- */
	xhr.onreadystatechange = ()=>{

		if(xhr.readyState === 4 && xhr.status === 200){

			if(type === "text"){
				callback(xhr.responseText);
			} else {
				callback(xhr.response);
			}
		}
	};
};

/*
 	Form Validation
-------------------------------------------------- */
const formValidation = (form)=>{

	let isValid = true;
	let validate = form.getElementsByClassName("validate");

	Array.prototype.slice.call(validate).forEach((field)=>{

		// Clear Errors
		clearError(field);

		let type  = field.getAttribute("type");
		let tag   = field.tagName;
		let name  = field.getAttribute("name");
		let val   = field.value;

		// Account for Textarea
		if(tag == "textarea"){
			type = "textarea";
		}

		// Switch through Types
		switch(type){

			case "password":

				if(name == "customer[password_confirmation]"){

					let origElem = form.querySelectorAll("input[type='password']");
					let	origPass = origElem[0].value;

					// Check if Passwords Do Not Match
					if(origPass !== val){

						errorHandle(field, "Password's Do Not Match");

						isValid = false;
					}
				}

				// Check Password Length
				if(val.length < 5){

					errorHandle(field, "Your Password Must Be At Least 5 Characters");

					isValid = false;
				}

				break;

			case "text":
			case "textarea":

				if(val === ""){

					errorHandle(field, field.placeholder + " Can Not Be Blank");

					isValid = false;
				}

				break;

			case "email":

				let emailReg = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

				if(val === "" || !(val).match(emailReg)){

					errorHandle(field, "Please enter a valid email");

					isValid = false;
				}

				break;

			default:

				break;
		}
	});

	return isValid;
};

/*
 	Error Handlers
-------------------------------------------------- */
const clearError = (elem)=>{

	let label = elem.previousElementSibling;

	if(!label || label === undefined){
		label = elem.nextElementSibling;
	}

	let placeholder = elem.getAttribute("placeholder");

	if(label.tagName.toLowerCase() == "label"){

		label.textContent = placeholder;
		label.classList.remove("error");
	}

	elem.classList.remove("error");
};

const errorHandle = (elem, msg)=>{

	let label = elem.previousElementSibling;

	if(!label || label === undefined){
		label = elem.nextElementSibling;
	}

	if(label.tagName.toLowerCase() == "label"){

		label.textContent = msg;
		label.className += " error";
	}

	elem.className += " error";
};

/*
 	Form Submissions through Ajax
-------------------------------------------------- */
export const formSubmit = (form, validation = false, url = null, callback = null)=>{

	let action = url ? url : form.action;
	let method = form.method;
	let obj = serialize(form, { hash: true });

	if(method === "get"){
		obj = serialize(form);
	}

	let valid = true;

	if(validation === true){
		valid = formValidation(form);
	}

	if(valid === true){
		if(method === "get"){

			ajax(action + "?" + obj, {
				method: method,
				type: "json"
			}, (result)=>{
				callback(JSON.parse(result));
			});

		} else {

			ajax(action, {
				method: method,
				type: "json",
				data: JSON.stringify(obj)
			}, (result)=>{
				callback(JSON.parse(result));
			});
		}
	}
};

export const bindForm = (form, validation = false, url = null, callback = null)=>{

	if(!hasClass(form, "bound")){
		form.className += " bound";
		form.addEventListener("submit", (event)=>{
			event.preventDefault();
			formSubmit(form, validation, url, (data)=>{
				callback(data);
			});
		});
	}
};

/*
	Sanitize A Tags

	Check to make sure A tags aren't forcing a refresh
	or allowing users to open external pages in the
	same tab.
-------------------------------------------------- */
export const sanitizeLinks = ()=>{

    let allAnchors = document.querySelectorAll("a:not(.same-forbidden)");

    Array.prototype.slice.call(allAnchors).forEach((link)=>{

		link.className += " same-forbidden";
		link.addEventListener("click", (event)=>{

			let target = event.currentTarget;

			if(window.location.href === target.href){
				event.preventDefault();
				event.stopPropagation();
			}
		});

		// Check if Target is set properly
		if(link.hostname !== location.hostname){
			link.setAttribute("target", "_blank");
		}
	});
};

/*
	Lock page scroll

	For when you really don't want users to be able to
	scroll down the main content of the page, like
	when an overlay is up, or a menu is open. Stored
	in the css class .locked on the body tag.
-------------------------------------------------- */
export const lockPageScroll = function(boolean = true){

	switch(boolean){
		case false:
			// unlock
			document.body.classList.remove("locked");
			break;

		default:
			// lock
			document.body.className += " locked";
			break;
	}
};

/*
	Storefront Checkout Url reformatter
-------------------------------------------------- */
export const reformatCheckoutUrl = (url)=>{

	let checkoutUrl = url;

	/* --- Replace Storefront URL with Vanity URL --- */
	// checkoutUrl = checkoutUrl.replace("shop.myshopify.com", "shop.website.com");

	/* --- Carryover all Query Params into the checkout, to account for manual UTM override --- */
	if(globalStorage.queryParams && Object.keys(globalStorage.queryParams).length > 0){

		Object.keys(globalStorage.queryParams).forEach((key, i)=>{

			if(checkoutUrl.indexOf("?") >= 0){
				checkoutUrl = checkoutUrl + "&" + key + "=" + globalStorage.queryParams[key];
			} else {
				checkoutUrl = checkoutUrl + "?" + key + "=" + globalStorage.queryParams[key];
			}
		});

		/* --- Doc referrer override --- */
		if(globalStorage.referrer !== ""){
			checkoutUrl = checkoutUrl + "&dr=" + globalStorage.referrer;
		}

	} else {

		/* --- Doc referrer override --- */
		if(globalStorage.referrer !== ""){

			if(checkoutUrl.indexOf("?") >= 0){
				checkoutUrl = checkoutUrl + "&dr=" + encodeURIComponent(globalStorage.referrer);
			} else {
				checkoutUrl = checkoutUrl + "?dr=" + encodeURIComponent(globalStorage.referrer);
			}
		}
	}

	/* --- Apply Google Linker ID --- */
	if(cookies.get("_ga")){

		let linker = cookies.get("_ga").replace("GA", "");

		if(checkoutUrl.indexOf("?") >= 0){
			checkoutUrl = checkoutUrl + "&_ga=" + linker;
		} else {
			checkoutUrl = checkoutUrl + "?_ga=" + linker;
		}
	}

	return checkoutUrl;
};

/*
	Analytics Helpers

-------------------------------------------------- */
/* global fbq analytics ga */
export const tracking = (type, var1 = null, var2 = null, var3 = null, var4 = null)=>{

	// console.log(type, var1, var2, var3);

	switch(type){
		case "facebook":

			if(typeof fbq === "undefined"){
				// Pixel not loaded
				console.log("FB not initialized");
			} else {

				if(var3){
					fbq(var1, var2, var3);
				} else if(var4) {
					fbq(var1, var2, var3, var4);
				} else {
					fbq(var1, var2);
				}
			}

			break;

		case "segment":

			if(typeof analytics === "undefined"){
				// Segment not loaded
				console.log("Segment not initialized");
			} else {

				switch(var1){
					case "track":

						// analytics.track(event, [properties], [options]);
						if(var4){
							analytics.track(var2, var3, var4);
						} else {
							analytics.track(var2, var3);
						}

						break;

					case "page":
						/* falls through */
					default:

						analytics.page();

						break;
				}
			}

			break;

		case "google":
			/* falls through */
		default:

			if(typeof ga === "undefined"){
				// GA not initialized
				console.log("GA not initialized");
			} else {

				if(var3){
					ga(var1, var2, var3);
				} else if(var4) {
					ga(var1, var2, var3, var4);
				} else {
					ga(var1, var2);
				}
			}

			break;
	}
};

export const beforeScroll = () => {
	new Marquees();
	prepDrawers();
	placeAnims();
	const grid = document.getElementById("video-grid")
	if (grid) {
		const masonryGrid = new Colcade( grid, {
			columns: '.column',
			items: '.video-tile'
		});
	}
};

export const afterScroll = () => {
	prepSliders();
	prepTabs();
	prepVideos();
};

export const loadGlobalScopeImages = () => {
	// let images = document.querySelectorAll(".footer .preload");
	// ImageLoad.loadImages(images, "nodeList", (returned)=>{
		// console.log("global scope images loaded");
	// });
};

export const prepTabs = () => {
	let tabWrappers = document.querySelectorAll(".tabs-inside");
	if (tabWrappers.length < 1) { return; }

	for (let i = 0; i < tabWrappers.length; i++) {
		const loadImages = tabWrappers[i].classList.contains("load-images");

		const tabImagesLoaded = [];

		const triggers = tabWrappers[i].querySelectorAll('.trigger');
		const changeEls = tabWrappers[i].querySelectorAll('.tab');

		for (let j = 0; j < triggers.length; j++) {
			let preloadEls;
			if (loadImages) {
				tabImagesLoaded.push(false);
				preloadEls = tabWrappers[i].querySelectorAll(".preload");
			}

			triggers[j].addEventListener('click', () => {
				if (triggers[j].classList.contains("active")) {
					return;
				}

				tabWrappers[i].querySelector(".trigger.active").classList.remove("active");
				tabWrappers[i].querySelector(".tab.active").classList.remove("active");

				triggers[j].classList.add("active");
				changeEls[j].classList.add("active");

				if (loadImages && !tabImagesLoaded[j]) {
					tabImagesLoaded[j] = true;

					preloadEls.forEach((el) => {
						let src = el.dataset.src;
						el.onload = ()=>{
							el.classList.remove("preload");
						};
						el.src = src;
					});
				}
			});
		}
	}
};

import {
	mewnLogo,
} from "./lottie-json/all";
export const returnLottieJson = (slug) => {
	let data;
	switch (slug) {
		case "mewn-logo":
			data = mewnLogo;
		break;
	}
	return data;
};


export const swapMedia = () => {
	const videos = document.querySelectorAll("video.auto");

	for (let i = 0; i < videos.length; i++) {
		const imgFallback = videos[i].dataset.imageFallback;
		const img = document.createElement('img');
		img.dataset.preloadMobile = imgFallback;
		videos[i].parentElement.prepend(img);
		videos[i].remove();
		for (let j = 0; j < videos[i].classList.length; j++) {
			const classes = videos[i].classList[j];
			img.classList.add(classes);
		}
	}
};
