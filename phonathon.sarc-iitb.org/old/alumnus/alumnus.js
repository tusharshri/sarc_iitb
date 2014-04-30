addOnload (initAll);

function initAll() {
}

$(function() {
	//$(".date").datepicker();
});

function SubmitBasicDetails() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var sbd = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var sbd = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var to_send = "?firstname=" + document.forms[0].firstname.value;
	var to_send = to_send + "&middlename=" + document.forms[0].middlename.value;
	var to_send = to_send + "&lastname=" + document.forms[0].lastname.value;
	var to_send = to_send + "&nickname=" + document.forms[0].nickname.value;
	var to_send = to_send + "&department=" + document.forms[0].department.value;
	var to_send = to_send + "&class=" + document.forms[0].class.value;
	var to_send = to_send + "&degree=" + document.forms[0].degree.value;
	var to_send = to_send + "&hostel=" + document.forms[0].hostel.value;
	var to_send = to_send + "&dob=" + document.forms[0].dob.value;
    var to_send = to_send + "&PID=" + document.forms[0].PID.value;
    var to_send = to_send + "&key=" + document.forms[0].key.value;
	sbd.open("GET", "submit_basicdetails.php"+to_send, true);
	sbd.send(null);
    showflashsaved();
}

function SubmitContactDetails() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var scd = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var scd = new ActiveXObject("Microsoft.XMLHTTP");
	}
    scd.onreadystatechange=function(){ if (scd.readyState==4 && scd.status==200){ if(scd.responseText!="") alert(scd.responseText); }}
	var to_send = "?address=" + document.forms[0].haddress.value;
	var to_send = to_send + "&address2=" + document.forms[0].haddress2.value;
	var to_send = to_send + "&city=" + document.forms[0].hcity.value;
	var to_send = to_send + "&country=" + document.forms[0].hcountry.value;
	var to_send = to_send + "&postal_code=" + document.forms[0].hpostal_code.value;
    var to_send = to_send + "&PID=" + document.forms[0].PID.value;
    var to_send = to_send + "&key=" + document.forms[0].key.value;
	scd.open("GET", "submit_contactdetails.php"+to_send, true);
	scd.send(null);
    showflashsaved();
}

function SubmitProfDetails() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var spd = new XMLHttpRequest();
	}
	else {					// code for IE6, IE5
		var spd = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var to_send = "?designation=" + document.forms[0].designation.value;
	var to_send = to_send + "&company=" + document.forms[0].company.value;
	var to_send = to_send + "&address1=" + document.forms[0].waddress1.value;
	var to_send = to_send + "&address2=" + document.forms[0].waddress2.value;
	var to_send = to_send + "&city=" + document.forms[0].wcity.value;
	var to_send = to_send + "&state=" + document.forms[0].wstate.value;
	var to_send = to_send + "&country=" + document.forms[0].wcountry.value;
	var to_send = to_send + "&postal_code=" + document.forms[0].wpostal_code.value;
    var to_send = to_send + "&PID=" + document.forms[0].PID.value;
    var to_send = to_send + "&key=" + document.forms[0].key.value;
	spd.open("GET", "submit_profdetails.php"+to_send, true);
	spd.send(null);
    showflashsaved();
}

function SubmitPhoneNums() {
	var phnums = document.getElementById("contactdetails").getElementsByClassName("phnum");
	if (phnums.length == 0) return;
	to_send = "?phnums='" + phnums[0].parentNode.parentNode.children[0].children[0].value + "','" + phnums[0].value + "'";
	for (var i=1; i < phnums.length; i++) {
		if (phnums[i].value != "") to_send = to_send + ";'" + phnums[i].parentNode.parentNode.children[0].children[0].value + "','" + phnums[i].value + "'";
	}
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var spn = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var spn = new ActiveXObject("Microsoft.XMLHTTP");
	}
    var to_send = to_send + "&PID=" + document.forms[0].PID.value;
    var to_send = to_send + "&key=" + document.forms[0].key.value;
	spn.open("GET", "submit_phnums.php"+to_send, true);
	spn.send(null);
    showflashsaved();
}

function SubmitEmailIDs() {
	var emails = document.getElementById("contactdetails").getElementsByClassName("email");
	if (emails.length == 0) return;
	to_send = "?emails='" + emails[0].parentNode.parentNode.children[0].children[0].value + "','" + emails[0].value + "'";
	for (var i=1; i < emails.length; i++) {
		if (emails[i].value != "") to_send = to_send + ";'" + emails[i].parentNode.parentNode.children[0].children[0].value + "','" + emails[i].value + "'";
	}
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var sei = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var sei = new ActiveXObject("Microsoft.XMLHTTP");
	}
    var to_send = to_send + "&PID=" + document.forms[0].PID.value;
    var to_send = to_send + "&key=" + document.forms[0].key.value;
	sei.open("GET", "submit_emailids.php"+to_send, true);
	sei.send(null);
    showflashsaved();
}

function showflashsaved(){  
    $('#flash-saved').css('display','block');
    $('#flash-saved').fadeOut(2000,'linear');
}

