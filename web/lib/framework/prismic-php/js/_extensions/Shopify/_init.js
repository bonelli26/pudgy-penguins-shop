import * as cookies from "js-cookie";
import * as serialize from "form-serialize";
import { gsap } from "gsap";
import { globalStorage } from "../../_global/storage";
import { reformatCheckoutUrl, ajax, hasClass } from "../../_global/helpers";
import { $subscription } from "../../_initialize";

/*
	Shopify Class
-------------------------------------------------- */
export class Shopify {

	constructor(){
		this.checkout = (cookies.get("cart")) ? cookies.get("cart") : undefined;
		this.cart = undefined;
		this.lock = false;
		this.build = true;
		this.miniCartOpen = false;
	}

	/*
	 * init
	 *	- Initialize Shopify
	 */
	init(){

		/* --- Let's get our cached cart --- */
		if(this.checkout){

			/* --- Let's get our promise array setup --- */
			let promises = [];

			/* --- Get our non-subscription cart --- */
			let promiseNonSubscription = new Promise((resolve, reject)=>{

				let request = {
					url: "carts/" + this.checkout
				};

				ajax("/v1/cache/get/", {
					method: "POST",
					type: "json",
					data: JSON.stringify(request)
				}, (result)=>{

					let json = JSON.parse(result);

					/* --- Resolve --- */
					resolve(this.normalizeCart(json));
				});
			});

			promises.push(promiseNonSubscription);

			/* --- Get our subscription cart --- */
			if(typeof $subscription === "object"){

				let promiseSubscription = new Promise((resolve, reject)=>{

					let request = {
						url: "carts/" + $subscription.checkout
					};

					ajax("/v1/cache/get/", {
						method: "POST",
						type: "json",
						data: JSON.stringify(request)
					}, (result)=>{

						let json = JSON.parse(result);

						/* --- Resolve --- */
						resolve($subscription.normalizeCart(json));
					});
				});

				promises.push(promiseSubscription);
			}

			/* --- Settle our carts --- */
			Promise.allSettled(promises).then((results)=>{

				/* --- Check if we have a subscription --- */
				let subscription = $subscription.checkForSubscription(results[1].value);

				/* --- Update our subscription cart --- */
				if(subscription) $subscription.updateCart(results[1].value);

				/* --- Setup data variables --- */
				this.cart = (subscription) ? results[1].value : results[0].value;
				this.checkout = results[0].value.id;
				this.url = reformatCheckoutUrl(this.cart.webUrl);

				/* --- Update our prices displayed --- */
				this.baseline = this.getBaseline(this.cart.lineItems);

				/* --- Build our mini cart --- */
				this.buildMiniCart({ open: false });
				this.displayBaseline();
			});

		/* --- Else do some basic setup --- */
		} else {

			this.buildMiniCart({ open: false });
			this.baseline = this.getBaseline([]);
			this.displayBaseline();
		}

		/* --- Catch our remaining binds --- */
		this.bindCartTrigger();
	}

	/*
	 * getBaseline
	 *	- Put together an object of our totals for display
	 */
	getBaseline(cart){

		let quantity = 0;
		let subtotal = 0;
		let total = 0;
		let discounts = 0;

		/* --- Add in our baseline totals --- */
		Array.prototype.slice.call(cart).forEach((item)=>{

			quantity = quantity + item.quantity;
			total = total + (item.quantity * parseFloat(item.price));

			if(item.discount_type && item.discount_type == "percentage" && item.attributes._order_interval_frequency && item.attributes._order_interval_frequency !== "null"){

				let discount = (item.discount) ? item.discount : 10;

				subtotal = subtotal + (item.quantity * (parseFloat(item.price) / (100 - discount) * 100));

			} else if(item.original_price && item.original_price > item.price) {

				subtotal = subtotal + (item.quantity * parseFloat(item.original_price));

			} else {
				subtotal = subtotal + (item.quantity * parseFloat(item.price));
			}

			discounts = subtotal - total;
		});

		let object = {
			total: total,
			quantity: quantity,
			subtotal: subtotal,
			discounts: discounts
		}

		return object;
	}

	/*
	 * displayBaseline
	 *	- Write our baseline totals to the DOM, total price, total products in cart
	 */
	displayBaseline(options = {}){

		let numberElem = (typeof options.numberElemClass === "undefined") ? document.getElementsByClassName("cart-quantity") : document.getElementsByClassName(options.numberElemClass);
		let discountsElem = (typeof options.subtotalElemClass === "undefined") ? document.getElementsByClassName("cart-discounts") : document.getElementsByClassName(options.discountsElemClass);
		let totalElem = (typeof options.totalElemClass === "undefined") ? document.getElementsByClassName("cart-total") : document.getElementsByClassName(options.totalElemClass);
		let checkoutElem = (typeof options.checkoutElemClass === "undefined") ? document.getElementsByClassName("cart-checkout") : document.getElementsByClassName(options.checkoutElemClass);

		/* --- Display our baseline text --- */
		Array.prototype.slice.call(numberElem).forEach((elem)=>{
			elem.textContent = this.baseline.quantity;
		});

		/* --- Display our baseline totals --- */
		// !!! TODO: Write this to understand local currency format
		Array.prototype.slice.call(totalElem).forEach((elem)=>{
			elem.textContent = "$" + this.baseline.total.toLocaleString("en-US", { minimumFractionDigits: 2, maximumFractionDigits: 2 });
		});

		/* --- Display our discounts --- */
		Array.prototype.slice.call(discountsElem).forEach((elem)=>{

			if(this.baseline.discounts == 0){
				elem.classList.remove("discount");
			} else {
				elem.classList.add("discount");
			}

			elem.innerHTML = "$" + this.baseline.discounts.toLocaleString("en-US", { minimumFractionDigits: 2, maximumFractionDigits: 2 });
		});

		/* --- Write our checkout url --- */
		Array.prototype.slice.call(checkoutElem).forEach((elem)=>{
			elem.href = (this.url) ? this.url : "javascript:void(0);";
		});
	}

	/*
	 * buildMiniCart
	 *	- Put together an object of our totals for display
	 */
	buildMiniCart(options = {}){

		/* --- Mini Cart defaults --- */
		let miniCart = (typeof options.elem === "undefined") ? document.getElementById("mini-cart") : options.elem;
		let openMini = (typeof options.open === "undefined") ? true : false;

		/* --- No mini-cart? no problem, just return --- */
		if(!miniCart) return;

		let miniCartProductWrapper = document.getElementById("mini-cart-products");
		let cart = (this.cart && this.cart.lineItems) ? this.cart.lineItems : [];
		let miniCartHTML = this.returnMiniCartHTML(cart);

		/* --- Let's fade out the products warpper --- */
		gsap.to(miniCartProductWrapper, 0.3, { autoAlpha: 0, onComplete: ()=>{

			/* --- Write our new cart products to the products wrapper --- */
			miniCartProductWrapper.innerHTML = miniCartHTML;

			/* --- !!! TODO: Show no results state --- */
			if(cart.length > 0) this.toggleNoProducts(true);
			if(cart.length <= 0) this.toggleNoProducts();

			/* --- Bind our mini cart events --- */
			this.bindCartEvents();

			/* --- Fade in the products wrapper --- */
			gsap.to(miniCartProductWrapper, 0.3, { autoAlpha: 1 });

			/* --- Open mini cart --- */
			if(openMini) this.openMiniCart();
		}});
	}

	/*
	 * toggleNoProducts
	 *	- show or hide the no Products state
	 */
	toggleNoProducts(show = false){

		let miniCartFull = document.getElementById("mini-cart-full");
		let miniCartEmpty = document.getElementById("mini-cart-empty");

		/* --- Show no Products state --- */
		if(!show){

			gsap.to(miniCartFull, 0.25, { autoAlpha: 0 });
			gsap.to(miniCartEmpty, 0.25, { autoAlpha: 1, delay: 0.25 });

			return;
		}

		gsap.to(miniCartEmpty, 0.25, { autoAlpha: 0 });
		gsap.to(miniCartFull, 0.25, { autoAlpha: 1, delay: 0.25 });
	}

	/*
	 * bindCartTrigger
	 *	- bind the miniCart events
	 */
	bindCartTrigger(){

		let triggers = document.getElementsByClassName("mini-cart-trigger");

		Array.prototype.slice.call(triggers).forEach((trigger)=>{

			trigger.addEventListener("click", (event)=>{

				event.preventDefault();

				if(!this.miniCartOpen){
					this.openMiniCart();
				} else {
					this.closeMiniCart();
				}
			});
		});
	}

	/*
	 * openMiniCart
	 *	- Open the miniCart
	 */
	openMiniCart(){

		if(this.miniCartOpen) return;

		let miniCart = document.getElementById("mini-cart");
		let miniCartBg = document.getElementById("mini-cart-background");

		gsap.to(miniCart, 0.5, { x: "0%", ease: "power3.inOut" });
		gsap.to(miniCartBg, 0.5, { autoAlpha: 1 });

		miniCartBg.style.pointerEvents = "all";

		this.miniCartOpen = true;
	}

	/*
	 * closeMiniCart
	 *	- Close the miniCart
	 */
	closeMiniCart(){

		if(!this.miniCartOpen) return;

		let miniCart = document.getElementById("mini-cart");
		let miniCartBg = document.getElementById("mini-cart-background");

		gsap.to(miniCart, 0.5, { x: "100%", ease: "power3.in" });
		gsap.to(miniCartBg, 0.5, { autoAlpha: 0 });

		miniCartBg.style.pointerEvents = "none";

		this.miniCartOpen = false;
	}

	/*
	 * returnMiniCartHTML
	 *	- Form our mini cart HTML
	 */
	returnMiniCartHTML(cart){

		let html = `<form id="mini-cart-form" class="cart-form" method="post" action="/v1/app/cart/update/" enctype="multipart/form-data">`;

		/* --- Loop through products --- */
		Array.prototype.slice.call(cart).forEach((item, index)=>{

			let customAttributes = "";

			/* --- Let's get any custom attributes that exist --- */
			Object.keys(item.attributes).forEach((key, i)=>{
				customAttributes += `<input type="hidden" name="[cart][${index}][properties][${key}]" value='${item.attributes[key]}' />`;
			});

			/* --- Check for subscription message --- */
			let subscription_message = "";
			let subscription_discount = "";
			let compare_at_price = "";

			if(item.attributes._order_interval_frequency && item.attributes._order_interval_frequency !== "null"){

				subscription_message += `<p>Delivered Every ${item.attributes._order_interval_frequency} ${item.attributes._order_interval_unit}</p>`;

				/* --- Check for subscription discount --- */
				if(item.discount && item.discount > 0){

					subscription_discount = `<span class="subscription-discount">(${(item.discount_type === "percentage") ? item.discount + "% Off" : "$" + item.discount + " Off"})</span>`;
					compare_at_price = `<del class="compare-price">$${(item.discount_type === "percentage") ? Math.round((item.price / (1 - (item.discount / 100))) * 100) / 100 : item.price + item.discount}</del>`;
				}
			}

			/* --- Check for compare at price --- */
			if(item.original_price && item.original_price !== null){
				compare_at_price = `<del class="compare-price">$${item.original_price}</del>`;
			}

			/* --- Setup product data --- */
			let checkoutId = this.cart.id;
			let productId = item.product_id;
			let variantId = item.variant_id;

			/* --- Try to base64 decode ---*/
			if(this.cart.webUrl.indexOf("myshopify.com") >= 0){
				checkoutId = window.atob(checkoutId);
				checkoutId = checkoutId.split("/Checkout/");
				checkoutId = checkoutId[1].split("?key=");
				checkoutId = checkoutId[0];
			}

			try {
				productId = window.atob(productId);
				productId = productId.split("/Product/");
				productId = productId[1];
			} catch(err){
				// console.log(err);
			}

			try {
				variantId = window.atob(variantId);
				variantId = variantId.split("/ProductVariant/");
				variantId = variantId[1];
			} catch(err){
				// console.log(err);
			}

			let productData = {
				cart_id: checkoutId,
				product_id: productId,
				variant_id: variantId,
				sku: item.sku,
				category: item.product_type,
				name: item.product_title,
				variant: (item.variant_title !== "Default Title") ? item.variant_title : "",
				brand: item.vendor,
				price: item.price,
				quantity: item.quantity,
				url: item.url,
				image_url: item.image
			};

			/* --- Product --- */
			html += `
				<article class="line-item" data-id="${item.variant_id}" data-quantity="${item.quantity}">
					<div class="hidden visuallyhidden">
						<input type="hidden" name="data" value='${JSON.stringify(productData)}' />
						<input type="hidden" name="[cart][${index}][variantId]" value="${item.variant_id}" />
						<input type="number" name="[cart][${index}][quantity]" value="${item.quantity}" />
						${customAttributes}
					</div>
					<div class="flex">
						<img src="${item.image}" alt="${item.product_title}" />
						<div class="line-item-info">
							<h1>${item.product_title}</h1>
							${subscription_message}
							<p class="line-item-price">$${item.price} ${subscription_discount} ${compare_at_price}</p>
						</div>
					</div>
					<div class="actions">
						<div class="increment-wrapper">
							<button name="decrease item quantity" aria-label="decrease item quantity" type="button" class="increment" data-type="minus">&ndash;</button>
							<span class="count">${item.quantity}</span>
							<button name="increase item quantity" aria-label="increase item quantity" type="button" class="increment" data-type="plus">+</button>
						</div>
						<button name="remove item" aria-label="remove item" type="button" class="cart-remove">Remove X</button>
					</div>
				</article>
			`;
		});

		html += `</form>`;

		return html;
	}

	/*
	 * bindCartEvents
	 *	- Bind our cart events
	 */
	bindCartEvents(options = {}){

		/* --- Cart defaults --- */
		let cartForms = (typeof options.cartFormClass === "undefined") ? document.getElementsByClassName("cart-form") : document.getElementsByClassName(options.cartFormClass);
		let removeButtons = (typeof options.removeButtonClass === "undefined") ? document.getElementsByClassName("cart-remove") : document.getElementsByClassName(options.removeButtonClass);

		/* --- Bind our forms --- */
		Array.prototype.slice.call(cartForms).forEach((form)=>{

			/* --- Only bind once --- */
			if(hasClass(form, "bound")) return;

			form.classList.add("bound");
			form.addEventListener("submit", (event)=>{

				event.preventDefault();
			});
		});

		/* --- Bind our remove buttons --- */
		Array.prototype.slice.call(removeButtons).forEach((btn)=>{

			/* --- Only bind once --- */
			if(hasClass(btn, "bound")) return;

			btn.classList.add("bound");
			btn.addEventListener("click", (event)=>{

				if(this.lock) return;

				/* --- Walk the DOM to get product --- */
				// !!! TODO: Redo this to not be heirarchy dependent
				let product = btn.parentElement.parentElement;

				/* --- Remove product from DOM --- */
				product.remove();

				this.updateCart(false);
			});
		});

		/* --- Setup our Increments --- */
		this.bindIncrements();
	}

	/*
	 * bindIncrements
	 *	- bind miniCart plus/minus
	 */
	bindIncrements(){

		let forms = document.getElementsByClassName("cart-form");

		/* --- Loop through our forms --- */
		Array.prototype.slice.call(forms).forEach((form)=>{

			if(hasClass(form, "bound-increment")) return;

			/* --- Settings --- */
			let products = form.getElementsByClassName("line-item");

			/* --- Loop through our products --- */
			Array.prototype.slice.call(products).forEach((product, key)=>{

				let quantity = product.querySelector(`[name='[cart][${key}][quantity]']`);
				let plus = product.querySelector("[data-type='plus']");
				let minus = product.querySelector("[data-type='minus']");
				let count = product.querySelector(".count");
				let lock = false;

				/* --- Binds --- */
				plus.addEventListener("click", (event)=>{

					event.preventDefault();

					/* --- Stop this button --- */
					if(lock) return;
					if(hasClass(plus, "disabled")) return;
					if(hasClass(minus, "disabled")) minus.classList.remove("disabled");

					/* --- Lock it up --- */
					lock = true;

					let newValue = parseInt(quantity.value) + 1;

					quantity.value = newValue;
					count.textContent = newValue;
					product.setAttribute("data-quantity", newValue);

					this.updateCart(false, (message)=>{
						lock = false;
					});
				});

				minus.addEventListener("click", (event)=>{

					event.preventDefault();

					/* --- Stop this button --- */
					if(lock) return;
					if(hasClass(minus, "disabled")) return;
					if(hasClass(plus, "disabled")) minus.classList.remove("disabled");

					/* --- Lock it up --- */
					lock = true;

					let newValue = parseInt(quantity.value) - 1;

					/* --- Let's remove our product in a 0 case --- */
					if(newValue === 0) product.remove();

					quantity.value = newValue;
					count.textContent = newValue;
					product.setAttribute("data-quantity", newValue);

					this.updateCart(false, (message)=>{
						lock = false;
					});
				});
			});

			/* --- Add bound --- */
			form.classList.add("bound-increment");
		});
	}

	/*
	 * submitData
	 *	- This submits our cart data
	 */
	submitData(form, data, callback = null){

		this.lock = true;

		/* --- Let's get our promise array setup --- */
		let promises = [];

		/* --- Submit our form --- */
		let promiseNonSubscription = new Promise((resolve, reject)=>{

			ajax(form.action, {
				method: form.method,
				type: "json",
				data: JSON.stringify(data)
			}, (result)=>{

				let json = JSON.parse(result);

				/* --- Return on error --- */
				if(json.error){

					reject(json.error);

					return;
				}

				/* --- Give this a type --- */
				json.request.checkout.type = "one-time";

				/* --- Resolve --- */
				resolve(this.normalizeCart(json.request.checkout));
			});
		});

		promises.push(promiseNonSubscription);

		/* --- Check if Subscription is setup --- */
		if(typeof $subscription === "object"){

			let promiseSubscription = new Promise((resolve, reject)=>{

				let url = ($subscription.checkout) ? "/v1/app/subscription/update/" : "/v1/app/subscription/create/";

				/* --- Add in our subscription checkout id --- */
				data.subscription_checkout = $subscription.checkout;

				ajax(url, {
					method: "POST",
					type: "json",
					data: JSON.stringify(data)
				}, (result)=>{

					let json = JSON.parse(result);

					/* --- Return on error --- */
					if(json.error){

						reject(json.error);

						return;
					}

					/* --- Give this a type --- */
					json.checkout.type = "subscription";

					/* --- Update our checkout token --- */
					$subscription.updateCheckout(json.checkout.token);

					/* --- Resolve --- */
					resolve($subscription.normalizeCart(json.checkout));
				});
			});

			promises.push(promiseSubscription);
		}

		Promise.allSettled(promises).then((results)=>{

			/* --- Check if we have a subscription --- */
			let subscription = $subscription.checkForSubscription(results[1].value);

			/* --- Update our subscription cart --- */
			if(subscription) $subscription.updateCart(results[1].value);

			/* --- Setup data variables --- */
			this.cart = (subscription) ? results[1].value : results[0].value;
			this.checkout = results[0].value.id;
			this.url = reformatCheckoutUrl(this.cart.webUrl);

			/* --- Update our prices displayed --- */
			this.baseline = this.getBaseline(this.cart.lineItems);
			this.displayBaseline();

			/* --- Build the mini cart --- */
			if(this.build){
				this.buildMiniCart();
			}

			/* --- Unlock our events & reset build --- */
			this.lock = false;
			this.build = true;

			/* --- Callback --- */
			if(typeof callback === "function") callback("Update Successful");
		});
	}

	/*
	 * updateCart
	 *	- Update our cart object by resubmitting the form
	 */
	updateCart(build = true, callback = null){

		/* --- Return if locked --- */
		if(this.lock) return;

		/* --- Tell our miniCart to Build --- */
		this.build = build;

		// !!! TODO: one day remove the /cart page and build in a mini-cart view
		let cartForm = document.getElementById("cart-form");
		let form = (cartForm) ? cartForm : document.getElementById("mini-cart-form");
		let object = serialize(form, { hash: true, isJSON: true });

		/* --- Add in our checkout id --- */
		object.checkout = {
			id: this.checkout
		};

		let productsArray = [];

		/* --- Loop through products --- */
		if(object.cart){

			Array.prototype.slice.call(object.cart).forEach((item)=>{

				/* --- Grab our line item properties --- */
				if(item.properties){

					let customAttributes = [];

					Object.keys(item.properties).forEach((key, i)=>{

						let propObj = {
							"key": key,
							"value": item.properties[key]
						};

						customAttributes.push(propObj);
					});

					/* --- Normalize the Cart object for update --- */
					productsArray.push({ "quantity": parseInt(item.quantity), "variantId": item.variantId, "customAttributes": customAttributes });

				} else {

					/* --- Normalize the Cart object for update --- */
					productsArray.push({ "quantity": parseInt(item.quantity), "variantId": item.variantId });
				}
			});
		}

		object.cart = productsArray;

		/* --- Show no results --- */
		if(object.cart.length < 1){
			this.toggleNoResults();
		}

		this.submitData(form, object, (message)=>{
			if(typeof callback === "function") callback(message);
		});
	}

	/*
	 * normalizeCart
	 *	- restructure our cart to match uniform integration cart object
	 */
	normalizeCart(cart){

		/* --- since this is a Shopify cart, we'll keep the id and webUrl --- */
		let object = {
			"id": cart.id,
			"lineItems": [],
			"webUrl": cart.webUrl
		};

		if(cart.lineItems && cart.lineItems.edges){

			/* --- Loop through our line items --- */
			Array.prototype.slice.call(cart.lineItems.edges).forEach((lineItem)=>{

				let lineItemObject = {
					"product_id": lineItem.node.variant.product.id,
					"variant_id": lineItem.node.variant.id,
					"quantity": lineItem.node.quantity,
					"note": "",
					"image": lineItem.node.variant.image.src,
					"price": parseFloat(lineItem.node.variant.priceV2.amount),
					"original_price": (lineItem.node.variant.compareAtPriceV2 !== null) ? parseFloat(lineItem.node.variant.compareAtPriceV2.amount) : null,
					"variant_title": lineItem.node.variant.title,
					"product_title": lineItem.node.title,
					"url": "/products/" + lineItem.node.variant.product.handle + "/",
					"sku": lineItem.node.variant.sku,
					"product_type": lineItem.node.variant.product.productType,
					"vendor": lineItem.node.variant.product.vendor,
					"attributes": {}
				};

				/* --- check for custom attributes --- */
				if(lineItem.node.customAttributes.length > 0){

					/* --- Loop through our custom attributes if they exist --- */
					Array.prototype.slice.call(lineItem.node.customAttributes).forEach((attribute)=>{
						lineItemObject.attributes[attribute.key] = attribute.value;
					});
				}

				object.lineItems.push(lineItemObject);
			});
		}

		return object;
	}
}
