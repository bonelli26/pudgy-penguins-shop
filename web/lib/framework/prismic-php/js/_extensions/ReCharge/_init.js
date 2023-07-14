import * as cookies from "js-cookie";
import { reformatCheckoutUrl, ajax, hasClass } from "../../_global/helpers";

/*
	ReCharge Class
-------------------------------------------------- */
export class ReCharge {

	constructor(){

		this.checkout = (cookies.get("subcart")) ? cookies.get("subcart") : undefined;
		this.cart = undefined;
		this.subscriptions = [];
		this.default = "subscription";
	}

	/*
	 * init
	 *	- Initialize ReCharge
	 */
	init(){

		/* --- Get all our subscriptions, pass them into storage --- */
		// ajax("POST", "/v1/app/subscription/get/", "json", JSON.stringify($request), (data)=>{

			// let json = JSON.parse(data);

			// console.log(json);

			// if(json.data.products && json.data.products[0]){
			// 	this.subscription = json.data.products[0];
			// 	this.buildSubscription(form, dropdown);

			// } else {
			// 	this.buildNonSubscription(form, brushPrice);
			// }
		// });
	}

	/*
	 * updateCheckout
	 *	- need to update these values
	 */
	updateCheckout(token){

		this.checkout = token;
	}

	/*
	 * updateCart
	 *	- need to update these values
	 */
	updateCart(object){

		this.cart = object;
	}

	/*
	 * checkForSubscription
	 *	- need to update these values
	 */
	checkForSubscription(cart){

		if(!cart || !cart.lineItems || cart.lineItems.length <= 0) return false;

		let val = false;

		/* --- Loop and return if cart contains a subscription product --- */
		Array.prototype.slice.call(cart.lineItems).forEach((lineItem)=>{

			if(lineItem.attributes && lineItem.attributes._order_interval_frequency && lineItem.attributes._order_interval_frequency !== "null") val = true;
		});

		return val;
	}

	/*
	 * loadSubscription
	 *	- let's get our subscriptions for the products that need it
	 */
	loadSubscription(id, form){

		/* --- Check if subscription is in storage --- */
		if(this.subscriptions[id]) this.buildSubscription(this.subscriptions[id], form);

		/* --- Otherwise load from endpoint, and then store --- */
		let request = {
			"productId": id
		};

		/* ----- Get ReCharge subscription data for this product ----- */
		ajax("/v1/app/subscription/get/", {
			method: "POST",
			type: "json",
			data: JSON.stringify(request)
		}, (result)=>{

			let json = JSON.parse(result);

			/* --- Store our subscription info --- */
			this.subscriptions[id] = json;

			/* --- Build our subscription html --- */
			this.buildSubscription(json, form);
		});
	}

	/*
	 * buildSubscription
	 *	- create our subscription html
	 */
	buildSubscription(data, form){

		/* --- Grab our wrapper --- */
		let subscriptionWrapper = form.querySelector(".subscription-wrapper");

		/* --- if product doesn't have subscription, place null inputs and return --- */
		if(Object.keys(data).length === 0){

			subscriptionWrapper.innerHTML = this.returnInputFields(null);

			return;
		}

		/* --- Else, let's setup some selection html --- */
		let discountedTotal = (subscriptionWrapper.dataset.price * data.discount_amount) / 100;
		let discountedPrice = subscriptionWrapper.dataset.price - discountedTotal;
		let subscriptionHtml = "";
		let intervalHtml = "";

		/* --- Loop through frequencies --- */
		Array.prototype.slice.call(data.subscription_defaults.order_interval_frequency_options).forEach((option, key)=>{

			intervalHtml += `
				<div class="subscription-interval${(key === 0) ? " active" : ""}" data-interval="${option}">
					<span class="radio-button"></span>
					<span class="type">Every ${option} ${data.subscription_defaults.order_interval_unit}</span>
				</div>
			`;
		});

		// subscriptionHtml += `<h2>${data.title}</h2>`;
		subscriptionHtml += `
			<p class="eyebrow">Recurring delivery (Save ${data.discount_amount}%) <span class="price">$${discountedPrice.toFixed(2)}</span></p>
			<div class="subscription-selection" data-type="subscription">
				<div class="subscribe type">${intervalHtml}</div>
			</div>
		`;

		/* --- Add our onetime html --- */
		if(data.subscription_defaults.storefront_purchase_options === "subscription_and_onetime"){

			subscriptionHtml += `
				<p class="eyebrow">One-time purchase <span class="price">$${subscriptionWrapper.dataset.price}</span></p>
				<div class="subscription-selection non-recurring" data-type="one-time">
					<span class="radio-button"></span>
					<span class="type one-time">One-Time Purchase</span>
				</div>
			`;
		}

		/* --- And finally setup our full html --- */
		let setupHtml = "";

		setupHtml = `
			<div class="subscription-selections">
				${subscriptionHtml}
			</div>
			${this.returnInputFields(data)}
		`;

		subscriptionWrapper.innerHTML = setupHtml;

		/* --- Let's bind some events now --- */
		this.bindSubscriptionEvents(form, data);
	}

	/*
	 * bindSubscriptionEvents
	 *	- bind our subscription events
	 */
	bindSubscriptionEvents(form, data){

		let selects = form.querySelectorAll(".subscription-selection");
		let intervals = form.querySelectorAll(".subscription-interval");
		let typeField = form.querySelector("[name='properties[_order_interval_unit]']");
		let intervalField = form.querySelector("[name='properties[_order_interval_frequency]']");

		/* --- Loop through our selections --- */
		Array.prototype.slice.call(selects).forEach((selection)=>{

			/* --- Bind once --- */
			if(hasClass(selection, "bound")) return;

			let type = selection.getAttribute("data-type");

			/* --- Make this selection active --- */
			if(type === this.default) selection.classList.add("active");

			selection.classList.add("bound");
			selection.addEventListener("click", ()=>{

				/* --- Do nothing if already selected --- */
				if(hasClass(selection, "active")) return;

				let curActiveInterval = form.querySelector(".subscription-interval.active");
				let curActiveSelection = form.querySelector(".subscription-selection.active");

				/* --- Reset field values --- */
				if(type === "one-time"){

					typeField.value = "null";
					intervalField.value = "null";

				} else {

					typeField.value = data.subscription_defaults.order_interval_unit;
					intervalField.value = curActiveInterval.getAttribute("data-interval");
				}

				/* --- Swap which radio is selected --- */
				curActiveSelection.classList.remove("active");
				selection.classList.add("active");
			});
		});

		/* --- Bind Interval Selections --- */
		Array.prototype.slice.call(intervals).forEach((interval)=>{

			/* --- Bind once --- */
			if(hasClass(interval, "bound")) return;

			interval.classList.add("bound");
			interval.addEventListener("click", ()=>{

				/* --- Do nothing if active --- */
				if(hasClass(interval, "active")) return;

				let curActiveInterval = form.querySelector(".subscription-interval.active");

				/* --- Remove if it exists --- */
				if(curActiveInterval) curActiveInterval.classList.remove("active");

				intervalField.value = interval.getAttribute("data-interval");

				interval.classList.add("active");
			});
		});
	}

	/*
	 * normalizeCart
	 *	- restructure our cart to match uniform integration cart object
	 */
	normalizeCart(cart){

		/* --- since this is a ReCharge cart, we'll keep the id and webUrl --- */
		let object = {
			"id": cart.token,
			"lineItems": [],
			"webUrl": "https://checkout.rechargeapps.com/r/checkout/" + cart.token
		};

		if(cart.line_items){

			/* --- Loop through our line items, convert to gid format for the ids --- */
			Array.prototype.slice.call(cart.line_items).forEach((lineItem)=>{

				let lineItemObject = {
					"product_id": window.btoa("gid://shopify/Product/" + lineItem.product_id),
					"variant_id": window.btoa("gid://shopify/ProductVariant/" + lineItem.variant_id),
					"quantity": lineItem.quantity,
					"note": "",
					"image": lineItem.image,
					"price": parseFloat(lineItem.price),
					"discount": (this.subscriptions[lineItem.product_id]) ? this.subscriptions[lineItem.product_id].discount_amount : 10,
					"discount_type": (this.subscriptions[lineItem.product_id]) ? this.subscriptions[lineItem.product_id].discount_type : "percentage",
					"variant_title": lineItem.variant_title,
					"product_title": lineItem.title,
					"sku": lineItem.sku,
					"product_type": lineItem.product_type,
					"vendor": lineItem.vendor,
					"attributes": lineItem.properties
				};

				object.lineItems.push(lineItemObject);
			});
		}

		return object;
	}

	/*
	 * returnInputFields
	 *	- restructure our cart to match uniform integration cart object
	 */
	returnInputFields(data){

		let intervalUnit = (data === null) ? null : data.subscription_defaults.order_interval_unit;
		let interval = (data === null) ? null : data.subscription_defaults.order_interval_frequency_options[0];

		/* ----- Reset Form Inputs ----- */
		let inputHtml = `
			<input type="hidden" name="properties[_order_interval_unit]" value="${intervalUnit}" />
			<input type="hidden" name="properties[_order_interval_frequency]" value="${interval}" />
		`;

		return inputHtml;
	}
}
