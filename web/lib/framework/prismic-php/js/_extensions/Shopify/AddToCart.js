import * as serialize from "form-serialize";
import { $shopify } from "../../_initialize";
import { $subscription } from "../../_initialize";
import { Shopify } from "./_init";
import { ajax, hasClass, parseQueryString, remove } from "../../_global/helpers";

/*
	AddToCart Class
-------------------------------------------------- */
export class AddToCart {

	constructor(element){

		this.form = element;
		this.id = this.form.getAttribute("data-product-id");
		this.options = this.form.getElementsByClassName("option");
		this.select = this.form.querySelector(".product-select");
		this.btn = this.form.querySelector(".add-to-cart");
		this.variants = this.select.getElementsByTagName("option");
		this.quantityCap = 500;

		/* --- Subscription --- */
		if(typeof $subscription === "object") $subscription.loadSubscription(this.id, this.form);

		/* --- Start our process --- */
		this.setupFakeSelects();
		this.bindEvents();
		this.bindQuantityIncrement();

		/* --- Let's look for landing variants --- */
		let query = parseQueryString();

		if(query && query.variant){
			this.setupLinkedVariant(query.variant);
		}

		/* --- Get current selection and then check sold out --- */
		this.selected = this.getCurrentSelection();
		this.checkSoldOut(this.form, this.variants, this.selected);

		/* --- See which variants are available and hide the rest --- */
		let available = this.returnAvailableVariants(this.variants, this.selected, this.currentOptions);

		this.hideVariants(available);

		/* --- Bind our fake select events --- */
		let fakeSelects = this.form.getElementsByClassName("fake-select-item");

		Array.prototype.slice.call(fakeSelects).forEach((elem)=>{
			this.bindSelects(this.variants, elem);
		});
	}

	/*
	 * bindEvents
	 *	- bind cart events
	 */
	bindEvents(){

		if(hasClass(this.form, "bound")) return;

		/* --- Setup our form listener --- */
		this.form.classList.add("bound");
		this.form.addEventListener("submit", (event)=>{

			event.preventDefault();

			this.addToCart(this.form);
		});
	}

	/*
	 * bindIncrement
	 *	- bind atc plus/minus
	 */
	bindQuantityIncrement(){

		let incrementWrapper = this.form.querySelector(".increment-wrapper");

		/* --- Bind once --- */
		if(hasClass(incrementWrapper, "bound")) return;

		incrementWrapper.classList.add("bound");

		/* --- Settings --- */
		let plus = incrementWrapper.querySelector("[data-type='plus']");
		let minus = incrementWrapper.querySelector("[data-type='minus']");
		let quantity = this.form.querySelector("[name='quantity']");
		let count = incrementWrapper.querySelector(".count");

		/* --- Binds --- */
		plus.addEventListener("click", (event)=>{

			event.preventDefault();

			/* --- Stop this button --- */
			if(hasClass(plus, "disabled")) return;
			if(hasClass(minus, "disabled")) minus.classList.remove("disabled");
			if(quantity.value + 1 === this.quantityCap) plus.classList.add("disabled");

			let newValue = parseInt(quantity.value) + 1;

			quantity.value = newValue;
			count.textContent = newValue;
		});

		minus.addEventListener("click", (event)=>{

			event.preventDefault();

			/* --- Stop this button --- */
			if(hasClass(minus, "disabled")) return;
			if(hasClass(plus, "disabled")) minus.classList.remove("disabled");
			if(quantity.value - 1 === 1) minus.classList.add("disabled");

			let newValue = parseInt(quantity.value) - 1;

			quantity.value = newValue;
			count.textContent = newValue;
		});
	}

	/*
	 * bindSelects
	 *	- bind cart events
	 */
	bindSelects(variants, select){

		let options = select.getElementsByTagName("li");

		/* --- Loop through li --- */
		Array.prototype.slice.call(options).forEach((elem)=>{

			let option = elem.getAttribute("data-name");
			let parent = elem.parentElement;
			let type   = parent.getAttribute("data-type");
			let label  = parent.parentElement.querySelector(".fake-selected");

			/* --- Bind Click --- */
			elem.addEventListener("click", ()=>{

				if(hasClass(elem, "selected")) return;

				/* --- Set selected --- */
				Array.prototype.slice.call(options).forEach((li)=>{

					if(li == elem){

						li.classList.add("selected");
						// Change selected Text
						label.textContent = li.textContent;
					} else {
						li.classList.remove("selected");
					}
				});

				/* --- Get current selection --- */
				let selected = this.getCurrentSelection();

				/* --- Check the sold out state --- */
				this.checkSoldOut(this.form, this.variants, selected);

				/* --- Check what's available based on selection --- */
				let storedVar = this.returnAvailableVariants(this.variants, option);

				/* --- Hide variants --- */
				this.hideVariants(storedVar, type);

				/* --- Select index --- */
				let selectIndex = 0;

				// Loop to get Selected Index
				Array.prototype.slice.call(this.variants).forEach((option, index)=>{

					let splitText = option.textContent.split("||");
					let optionText = splitText[0].toLowerCase();

					// Always compare by transforming "-" -> " " instead of other way around since variants can have both "-" and " "
					if(optionText == selected.replace(/-/g, " ")){

						selectIndex = index;
					}
				});

				/* --- Set our index --- */
				this.select.selectedIndex = selectIndex;
			});
		});
	}

	/*
	 * setupFakeSelects
	 *	- split variants into unique "fake" dropdown markup
	 */
	setupFakeSelects(){

		if(hasClass(this.select, "bound") || hasClass(this.select, "hidden")) return;

		/* --- Setup our fake select menus --- */
		let options = [];
		let images = [];
		let variantObject = {};

		/* --- Get Labels for Variants --- */
		Array.prototype.slice.call(this.options).forEach((option)=>{

			let name = option.textContent.toLowerCase();

			options.push(name);

			variantObject[name] = [];
		});

		/* --- Store color outside loop, as it usually affects image changes --- */
		this.currentOptions = options;
		this.currentColor = undefined;

		/* --- Get our options and pass them into the arrays --- */
		Array.prototype.slice.call(this.variants).forEach((variant)=>{

			/* --- Split our text string --- */
			let setup = variant.textContent.split("||");
			let choices = setup[0].split(" / ");

			/* --- Store variant images for color options --- */
			Array.prototype.slice.call(options).forEach((option, index)=>{

				if(option == "color"){

					if(this.currentColor !== choices[index]){

						images.push({ desktop: setup[2], mobile: setup[3] });
					}

					this.currentColor = choices[index];
				}
			});

			/* --- Loop through our variants --- */
			Array.prototype.slice.call(choices).forEach((choice, key)=>{

				if(variantObject[options[key]].indexOf(choice) === -1){

					variantObject[options[key]].push(choice);
				}
			});
		});

		/* --- Fake Select Wrapper --- */
		let fakeWrapper = this.form.querySelector(".fake-selects-wrapper");
		let baseType;

		Object.keys(variantObject).forEach((key, i)=>{

			let setType = key.replace(/\s+/g, "-").toLowerCase();

			if(i === 0) baseType = key;

			let html = "";
			let div = document.createElement("div");

			div.className = "fake-select-item fake-select-item-" + setType;

			if(key !== "color"){
				html += "<p class='label'>(" + key + ")</p>";
				html += "<p class='fake-selected'>" + variantObject[key][0] + "</p>";
			}

			html += "<ul class='fake-select fake-select-" + setType + "' data-type='" + setType + "'>";

			/* --- Child loop --- */
			Array.prototype.slice.call(variantObject[key]).forEach((selection, index)=>{

				let selectionText = selection.replace(/\s+/g, "-").toLowerCase();
				let selected = "";

				if(index === 0){
					selected = " selected";
				}

				html += "<li data-name='" + selectionText + "' class='" + setType + "-" + selectionText + selected + "' data-variant-img='" + images[index] + "'>" + selection + "</li>";
			});

			html += "</ul>";

			/* --- Color label appears after text --- */
			if(key == "color"){
				html += "<p class='label'>(" + key + ")</p>";
				html += "<p class='fake-selected'>" + variantObject[key][0] + "</p>";
			}

			div.innerHTML = html;

			fakeWrapper.appendChild(div);
		});
	}

	/*
	 * setupLinkedVariant
	 *	- We want to preselect a variant if the query parameter exists
	 */
	setupLinkedVariant(id){

		let selectOptions = this.select.getElementsByTagName("option");
		let selectedIndex = 0;
		let selectedOption;

		/* --- Loop to get selected index --- */
		Array.prototype.slice.call(selectOptions).forEach((option, index)=>{

			if(option.getAttribute("data-raw-id") == id){
				selectedOption = option;
				selectedIndex = index;
			}
		});

		/* --- Set the index --- */
		this.select.selectedIndex = selectedIndex;

		/* --- Figure out which select to trigger a click on --- */
		let selectedValues = selectedOption.textContent.split("||");
		let selectedText = selectedValues[0].split(" / ");
		let fakeSelects = this.form.getElementsByClassName("fake-select-item");

		/* --- Loop through fake selects --- */
		Array.prototype.slice.call(fakeSelects).forEach((elem, key)=>{

			let fakeSelect = elem.querySelector(".fake-select");
			let fakeSelectType = fakeSelect.getAttribute("data-type");
			let fakeOptions = elem.getElementsByTagName("li");
			let checkOption = this.options[key].textContent.toLowerCase();

			/* --- Multiple variants --- */
			if(fakeOptions.length > 1){

				Array.prototype.slice.call(fakeOptions).forEach((option, index)=>{

					let value = option.getAttribute("data-name").replace(/-/g, " ");
					let compare = selectedText[key].toLowerCase();

					if(fakeSelectType == checkOption && value == compare && !hasClass(option, "selected")){

						option.classList.add("selected");

					} else if(value !== compare){

						option.classList.remove("selected");
					}
				});
			}

			let text = elem.querySelector(".fake-selected");

			text.textContent = selectedText[key];
		});
	}

	/*
	 * returnAvailableVariants
	 *	- see what combination of variants are available for other variants
	 */
	returnAvailableVariants(variants, option, options){

		let available = [];
		let current = option;

		if(option.indexOf(" / ") > -1){
			current = current.split(" / ");
			current = current[0];
		}

		/* --- Loop through variants --- */
		Array.prototype.slice.call(variants).forEach((variant)=>{

			// Set Text string
			let string = variant.textContent.toLowerCase().split("||");
				string = string[0].split(" / ");

			if(string.indexOf(current) > -1){

				let stringArray = remove(string, current);

				available = available.concat(stringArray);
			}
		});

		return available;
	}

	/*
	 * checkSoldOut
	 *	- check what's sold out from other variants
	 */
	checkSoldOut(form, variants, option){

		let soldOut = true;
		let productPriceElems = document.getElementsByClassName("product-price");
		let quantity = form.querySelector("[name='quantity']").value;

		/* --- Loop through variants --- */
		Array.prototype.slice.call(variants).forEach((variant)=>{

			let string = variant.textContent.toLowerCase().split("||");
			let price = string[1];

			string = string[0];

			/* --- Grab inventory --- */
			let inventory = parseInt(variant.getAttribute("data-inventory"));

			/* --- Normalize --- */
			if(string.replace(/-/g, " ").indexOf(option.replace(/-/g, " ")) > -1){

				Array.prototype.slice.call(productPriceElems).forEach((priceElem)=>{
					priceElem.setAttribute("data-usd", price);
					priceElem.textContent = "$" + ((price).toLocaleString("en-US", { minimumFractionDigits: 2 }) * quantity);
				});

				/* --- Product is available --- */
				if(inventory > 0){
					soldOut = false;
				}
			}
		});

		/* --- Set button state --- */
		if(soldOut){

			this.btn.classList.add("disabled");
			this.btn.textContent = "Sold Out";

		} else {

			this.btn.classList.remove("disabled");
			this.btn.textContent = "Add To Bag";
		}
	}

	/*
	 * getCurrentSelection
	 *	- return what variants are currently selected
	 */
	getCurrentSelection(){

		let selectionString = "";
		let selected = this.form.querySelectorAll(".fake-select .selected");

		Array.prototype.slice.call(selected).forEach((item, key)=>{

			if(key === 0){
				selectionString += item.getAttribute("data-name");
			} else {
				selectionString += " / " + item.getAttribute("data-name");
			}
		});

		return selectionString;
	}

	/*
	 * hideVariants
	 *	- Hide / disable variants that aren't available
	 */
	hideVariants(array, type){

		let fakeSelects = this.form.getElementsByClassName("fake-select");

		/* --- Update other fake selects --- */
		Array.prototype.slice.call(fakeSelects).forEach((select)=>{

			let dataType = select.getAttribute("data-type");

			if(dataType !== type){

				/* --- Check if child value is in array --- */
				let children = select.getElementsByTagName("li");

				Array.prototype.slice.call(children).forEach((child)=>{

					if(array.indexOf(child.textContent.toLowerCase()) > -1){
						child.classList.remove("disabled");
					} else {
						child.classList.add("disabled");
					}
				});
			}
		});
	}

	/*
	 * addToCart
	 *	- trigger our add to cart
	 */
	addToCart(){

		let productObject;
		let object = serialize(this.form, { hash: true, isJSON: true });

		/* --- Add the checkout id --- */
		if($shopify.checkout){

			object.checkout = {
				id: $shopify.checkout
			};
		}

		if($shopify.cart && $shopify.cart.lineItems.length > 0){
			productObject = this.addItem($shopify.cart.lineItems, object);
		} else {

			/* --- Grab our line item properties --- */
			if(object.properties){

				let customAttributes = [];

				Object.keys(object.properties).forEach((key, i)=>{

					let propObj = {
						"key": key,
						"value": object.properties[key]
					};

					customAttributes.push(propObj);
				});

				productObject = [{ "quantity": parseInt(object.quantity), "variantId": object.id, "customAttributes": customAttributes }];
			} else {
				productObject = [{ "quantity": parseInt(object.quantity), "variantId": object.id }];
			}
		}

		object.cart = productObject;

		$shopify.submitData(this.form, object, (result)=>{
			console.log(result);
		});
	}

	/*
	 * addItem
	 *	- trigger our add to cart
	 */
	addItem(cart, object){

		let inCart = false;
		let currentId = object.id;
		let checkoutObject = [];

		/* --- Loop through the cart to see if product exists --- */
		Array.prototype.slice.call(cart).forEach((item, key)=>{

			let addObj;
			let varId = item.variant_id;
			let quantity = item.quantity;

			/* --- Check against ID and properties object --- */
			if(varId == currentId && this.compareObjects(object.properties, item.attributes) === true){
				quantity = quantity + parseInt(object.quantity);
				inCart = true;
			}

			if(Object.keys(item.attributes).length > 0){

				let newCustomAttributes = [];

				Object.keys(item.attributes).forEach((key, i)=>{

					let propObj = {
						"key": key,
						"value": item.attributes[key]
					};

					newCustomAttributes.push(propObj);
				});

				addObj = { "quantity": parseInt(quantity), "variantId": varId, "customAttributes": newCustomAttributes };
			} else {
				addObj = { "quantity": parseInt(quantity), "variantId": varId };
			}

			checkoutObject.push(addObj);
		});

		if(inCart === false){

			let newObj;

			if(object.properties){

				let newCustomAttributes = [];

				Object.keys(object.properties).forEach((key, i)=>{

					let propObj = {
						"key": key,
						"value": object.properties[key]
					};

					newCustomAttributes.push(propObj);
				});

				newObj = { "quantity": parseInt(object.quantity), "variantId": object.id, "customAttributes": newCustomAttributes };
			} else {
				newObj = { "quantity": parseInt(object.quantity), "variantId": object.id };
			}

			checkoutObject.push(newObj);
		}

		return checkoutObject;
	}

	/*
	 * compareObjects
	 *	- object compare helper
	 */
	compareObjects(object1, object2){

		const keys1 = Object.keys(object1);
		const keys2 = Object.keys(object2);

		if(keys1.length !== keys2.length) return false;

		for(let key of keys1){

			if(object1[key] !== object2[key]) return false;
		}

		return true;
	}
}
