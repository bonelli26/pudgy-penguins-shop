import Highway from "@dogstudio/highway";
import { H } from "../routing";
import { $shopify } from "../_initialize";

/*  
    View Events for Highway

	- Cart Page
    - Events are listed in their execution order
-------------------------------------------------- */
class CartRenderer extends Highway.Renderer{

	onEnter(){

		// Hide miniCart
		let miniCart = document.getElementById("mini-cart");

		if(miniCart){
			miniCart.className += " hidden";
		}
	}

	onEnterCompleted(){

		// Don't cache cart page
		let map = new Map();

		map = H.cache;
		map.delete(window.location.href);

		H.cache = map;

		$shopify.bindCartEvents();
	}

	onLeave(){
		console.log("onLeave");
	}

	onLeaveCompleted(){

		// Bring miniCart back
		let miniCart = document.getElementById("mini-cart");

		if(miniCart){
			miniCart.classList.remove("hidden");
		}
	}
}

export default CartRenderer;