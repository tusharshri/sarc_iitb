function validEmail (email) {
	var invalidChars = " /:,;";
	if (email == "") {
		return true;
	}
	for (var k=0; k<invalidChars.length; k++) {
		var badChar = invalidChars.charAt(k);
		if (email.indexOf(badChar) > -1) {
			return false;
		}
	}
	var atPos = email.indexOf("@",1);
	if (atPos == -1) {
		return false;
	}
	if (email.indexOf("@",atPos+1) != -1) {
		return false;
	}
	var periodPos = email.indexOf(".",atPos);
	if (periodPos < atPos+2) {
		return false;
	}
	if (periodPos+3 > email.length) {
		return false;
	}
	return true;
}

function onlyURL(url) {
    var v = new RegExp(); 
    v.compile("^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/.=]+$");
	if (v.test(url)) return true;
	else return false;
}

function onlyText(text) {
	var allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ. '";
	for (var i = 0; i<text.length; i++) {
		var c = text.charAt (i);
		if (allowed.indexOf(c) == -1) return false;
	}
	return true;
}

function phonenum(phnum) {
	var allowed = "0123456789-+ ";
	for (var i = 0; i<text.length; i++) {
		var c = text.charAt (i);
		if (allowed.indexOf(c) == -1) return false;
	}
	return true;
}

function onlyTextNumSym(text) {
	var allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ. 0123456789-,./#():'";
	for (var i = 0; i<text.length; i++) {
		var c = text.charAt (i);
		if (allowed.indexOf(c) == -1) return false;
	}
	return true;
}

function checkForm(elements,requirements) {
	var errors = new Array();
	for (var i=0; i<elements.length; i++) {
		var element = document.getElementById(elements[i]);
		var value = element.value;
		var required = requirements[i].split(" ");
		errors.push("");
		for (var j in required) {
			switch(required[j]) {
				case "reqd":
					if (value=="") errors[i]+=" empty";
					break;
				case "onlynum":
					if (isNaN(value)) errors[i]+=" onlynuminvalid";
					break;
				case "onlytext":
					if (! onlyText(value)) errors[i]+=" onlytextinvalid";
					break;
				case "compare":
					var otherid = elements[i].substring(0,elements[i].length - 1);
					var other = document.getElementById(otherid);
					var value2 = other.value;
					if (value != value2) errors[i]+=" compareinvalid";
					break;
				case "onlytextnumsym":
					if (! onlyTextNumSym(value)) errors[i]+=" onlytextnumsyminvalid";
					break;
				case "email":
					if (! validEmail(value)) errors[i]+=" emailinvalid";
					break;
				case "url":
					if (! validURL(value)) errors[i]+=" urlinvalid";
					break;
				default:
					if (required[j].indexOf("between") > -1) {
						var l = required[j].indexOf("between");
						var lowerlimit = parseInt(required[j].substring(0,l));
						var upperlimit = parseInt(required[j].substring(l+7));
						if (value.length < lowerlimit) errors[i]+=" lengthless";
						if (value.length > upperlimit) errors[i]+=" lengthmore";
					}
			}
		}
	}
	return errors;
}