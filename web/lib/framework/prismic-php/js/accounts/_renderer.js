import Highway from "@dogstudio/highway";
import { gsap } from "gsap";
import { bindForm } from "../_global/helpers";
import { deleteAddress, editAddress } from "./addresses";
import { tabSelection, prepFormFeedback, feedbackReceived } from "./anims";
import { prepDrawers } from "../_global/anims";
/*
    View Events for Highway

	- Account Page
    - Events are listed in their execution order
-------------------------------------------------- */
class AccountRenderer extends Highway.Renderer{

	onEnter(){

	}

	onEnterCompleted(){

		prepDrawers();
		tabSelection();
		prepFormFeedback();

		/* --- Bind ajax submission to forms --- */
		let forms = document.getElementsByClassName("ajax-form");

		Array.prototype.slice.call(forms).forEach((form)=>{

			bindForm(form, false, null, (result)=>{
				//
				if(result.logout && result.logout === true){
					// Window Location = Login Page
					window.location = "/account/login/?logout=true";
				} else {
					console.log(result);
					feedbackReceived(result);
				}
			});
		});

		/* --- Address Deletion --- */
		if(document.querySelector(".edit-address")) {
			let deleteTriggers = document.getElementsByClassName("address-delete");

			Array.prototype.slice.call(deleteTriggers).forEach((elem)=>{
				elem.addEventListener("click", ()=>{ deleteAddress(elem); });
			});

			let editTriggers = document.getElementsByClassName("edit-address");
			let closeEditForms = document.querySelector(".edit-forms .close");

			closeEditForms.addEventListener("click", () => {
				gsap.set(document.querySelector(".edit-forms"), { display: "none" });
				gsap.set(document.querySelectorAll(".edit-forms form"), { display: "none" });
				gsap.set(document.querySelector(".add-form"), { display: "block" });
			});

			Array.prototype.slice.call(editTriggers).forEach((elem, i)=>{
				elem.addEventListener("click", ()=>{ editAddress(elem, i); });
			});
		}
	}

	onLeave(){

	}

	onLeaveCompleted(){
		
	}
}

export default AccountRenderer;
