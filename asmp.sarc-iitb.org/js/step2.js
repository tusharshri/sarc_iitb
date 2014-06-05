addOnload (init);

function init() {
	var form = document.forms[0];
	form.onsubmit = function() {return isValidForm();}
}

function isValidForm() {
	var elements = new Array();
	var requirements = new Array();
	elements.push("phnum");
	elements.push("email1");
	elements.push("email2");
	elements.push("address1");
	//elements.push("address2");
	elements.push("city");
	elements.push("state");
	elements.push("country");
	elements.push("pincode");
	requirements.push("reqd phonenum");
	requirements.push("reqd email");
	requirements.push("email");
	requirements.push("reqd");
	//requirements.push("onlytextnumsym");
	requirements.push("reqd onlytextnumsym");
	requirements.push("reqd onlytextnumsym");
	requirements.push("reqd onlytextnumsym");
	requirements.push("reqd onlynum");
	var errors = checkForm(elements,requirements);
	var valid = true;
	for(var i in errors) {
		var element = document.getElementById(elements[i]);
		var detailname = element.parentNode.parentNode;
		if (errors[i] == "") {
			element.className = "";
			detailname.className = "detailname";
		}
		else {
			element.className = "invalid";
			detailname.className = "detailname invaliddetailname";
			valid = false;
		}
	}
	return valid;
}