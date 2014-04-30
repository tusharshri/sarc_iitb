addOnload (init);

function init() {
	var form = document.forms[0];
	form.onsubmit = function() {return isValidForm();}
}

function isValidForm() {
	var elements = new Array();
	var requirements = new Array();
	elements.push("firstname");
	elements.push("middlename");
	elements.push("lastname");
	requirements.push("reqd onlytext");
	requirements.push("onlytext");
	requirements.push("reqd onlytext");
	var errors = checkForm(elements,requirements);
	var valid = true;
	for(var i in errors) {
		var element = document.getElementById(elements[i]);
		var detailname = document.getElementById("name");
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