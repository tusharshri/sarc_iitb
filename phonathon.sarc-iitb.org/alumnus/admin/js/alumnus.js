addOnload (initAll);

function initAll() {
	$("#accordion").accordion();
	$(".blocktopic").click( function(){
		if (this.className == "blocktopic collapsed") this.className = "blocktopic";
		else this.className = "blocktopic collapsed";
		$(this.parentNode.children[1]).toggle ("slow", function() {
		});
	});
    $("#callstart").click(CLOCK.start);
    $("#callstop").click(CLOCK.stop);
    $("#callreset").click(CLOCK.reset);
}

$(function() {
	$(".date").datepicker();
});

function back() {
	window.location = "backtoallalumni.php";
}

function attempt() {
	window.location = "attemptprofile.php";
}

function lock() {
	window.location = "lockprofile.php";
}

function SubmitResChecklist() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var src = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var src = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (document.forms[0].inquirynumbers.checked) var to_send = "?inquirynumbers=on";
	else var to_send = "?inquirynumbers=off";
	if (document.forms[0].google.checked) var to_send = to_send + "&google=on";
	else var to_send = to_send + "&google=off";
	var to_send = to_send + "&linkedin=" + document.forms[0].linkedin.value;
	var to_send = to_send + "&whitepages=" + document.forms[0].whitepages.value;
	var to_send = to_send + "&twitter=" + document.forms[0].twitter.value;
	var to_send = to_send + "&facebook=" + document.forms[0].facebook.value;
	if (document.forms[0].zabasearch.checked) var to_send = to_send + "&zabasearch=on";
	else var to_send = to_send + "&zabasearch=off";
	var to_send = to_send + "&others=" + document.forms[0].others.value;
	//src.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//src.setRequestHeader("Content-length",to_send.length);
	//src.setRequestHeader("Connection","close");
	src.open("GET", "submit_reschecklist.php"+to_send, true);
	src.send(null);
    showflashsaved();
}

function SubmitCallInfo() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var sci = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var sci = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (document.forms[0].contacted.checked) var to_send = "?contacted=on";
	else var to_send = "?contacted=off";
	if (document.forms[0].dontcall.checked) var to_send = to_send + "&dontcall=on";
	else var to_send = to_send + "&dontcall=off";
	var to_send = to_send + "&couldntreach=" + document.forms[0].couldntreach.value;
	sci.open("GET", "submit_callinfo.php"+to_send, true);
	sci.send(null);
    showflashsaved();
}

function SubmitMailInfo() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var smi = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var smi = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (document.forms[0].gotreply.checked) var to_send = "?gotreply=on";
	else var to_send = "?gotreply=off";
	if (document.forms[0].mailed.checked) to_send = to_send + "&mailed=on";
	else var to_send = to_send + "&mailed=off";
	smi.open("GET", "submit_mailinfo.php"+to_send, true);
	smi.send(null);
    showflashsaved();
}

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
	var to_send = to_send + "&department=" + document.forms[0].department.value;
	var to_send = to_send + "&class=" + document.forms[0].class.value;
	var to_send = to_send + "&degree=" + document.forms[0].degree.value;
	var to_send = to_send + "&hostel=" + document.forms[0].hostel.value;
	var to_send = to_send + "&dob=" + document.forms[0].dob.value;
	sbd.open("GET", "submit_basicdetails.php"+to_send, true);
	sbd.send(null);
    showflashsaved();
}

function SubmitAgenda() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var sa = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var sa = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var agendachecklist = document.getElementById("agendachecklist").getElementsByTagName("input");
	to_send = "?arbit=off";
	for (var i=agendachecklist.length-2; i >=0 ; i--) {
		if (agendachecklist[i].name != "" && agendachecklist[i].checked) {
				to_send = to_send + "&" + agendachecklist[i].name + "=on";
				agendachecklist[i].parentNode.innerHTML = "Yes";
		}
	}
	//alert("Saved!");
	sa.open("GET", "submit_agenda.php"+to_send, true);
	sa.send(null);
    showflashsaved();
}

function SubmitContactDetails() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var scd = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var scd = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var to_send = "?address=" + document.forms[0].address.value;
	var to_send = to_send + "&city=" + document.forms[0].city.value;
	var to_send = to_send + "&country=" + document.forms[0].country.value;
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
	spd.open("GET", "submit_profdetails.php"+to_send, true);
	spd.send(null);
    showflashsaved();
}

function SubmitCallAgain() {
	var to_send = "";
	var called = new Array();
	var notcalled = new Array();
	var callagains = document.getElementById("callinfo").getElementsByTagName("input");
	for (var i=2; i<callagains.length-3; i++) {
		var callagain = callagains[i];
		if (callagain.checked) {
			callagain.parentNode.innerHTML = "Called";
			called.push("'" + callagain.name + "'");
		}
		//else notcalled.push("'" + callagain.name + "'");
	}
	to_send = "?called=" + called.join(",") + /*"&notcalled=" + notcalled.join(",") + */"&newdate=" + document.forms[0].newdate.value + "&newtime=" + document.forms[0].newtime.value;
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var sca = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var sca = new ActiveXObject("Microsoft.XMLHTTP");
	}
	//alert (to_send);
	//alert("\n Saved \n");
	sca.open("GET", "submit_callagain.php"+to_send, true);
	sca.send(null);
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
	spn.open("GET", "submit_phnums.php"+to_send, true);
	spn.send(null);
    showflashsaved();
}

function SubmitOtherDetails() {
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var sod = new XMLHttpRequest();
	}
	else {					// code for IE6, IE5
		var sod = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var to_send = "?time=" + document.forms[0].timeofcall.value;
	var to_send = to_send + "&remarks=" + document.forms[0].remarks.value;
	sod.open("GET", "submit_otherdetails.php"+to_send, true);
	sod.send(null);
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
	sei.open("GET", "submit_emailids.php"+to_send, true);
	sei.send(null);
    showflashsaved();
}

function showflashsaved(){  
    $('#flash-saved').css('display','block');
    $('#flash-saved').fadeOut(2000,'linear');
}

var CLOCK = function(){
    var start= 0;
    var stop = 0;
    var duration = 0;
    var allow = false;
    return {
        start : function(){
            CLOCK.reset();
            start = new Date();
            start = start.getTime();
            allow = true;
        },
        stop : function(){
            if(allow){
            stop = new Date();
            stop = stop.getTime();
            duration = Math.ceil((stop-start)/6000);
            setCallTime(duration);
            allow=false;
            }
        },
        reset : function(){
            start = 0;
            stop = 0;
            duration = 0;
            allow=false;
        }
    };
}();

function setCallTime(t){
    var prev = $("#callduration").val();
    if(t!=0){
        alert("Your call duration was about " +t+ " min");
        if(prev=='0'){
            $("#callduration").val(t);
        }else{
            $("#callduration").val(parseInt(prev)+t);
        }
    }
}

