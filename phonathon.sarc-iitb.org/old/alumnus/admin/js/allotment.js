var volunteer = null;

function allotAlums() {
	var alumlist = document.getElementById("alumlist").getElementsByClassName("alum");
	if (volunteer === null) {
		alert ("Choose a volunteer.");
		return;
	}
	var alumni = new Array();
	var len = alumlist.length;
	var table = alumlist[0].parentNode.parentNode.parentNode;
	var deleted = 0;
	for (var i=0; i < len; i++) {
		if (alumlist[i-deleted].checked) {
			alumni.push("(" + alumlist[i-deleted].id +  "," + volunteer.value + ",'Not Attempted')");
			var row = alumlist[i-deleted].parentNode.parentNode;
			table.removeChild(row);
			deleted++;
			volunteer.parentNode.parentNode.children[2].innerHTML = parseInt (volunteer.parentNode.parentNode.children[2].innerHTML) + 1;
		}
	}
	if (alumni.length == 0) {
		alert ("Choose alumni to allot.");
		return;
	}
	to_send = alumni.join(",");
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var aa = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var aa = new ActiveXObject("Microsoft.XMLHTTP");
	}
	//alert ("submit_allotment.php?to_insert=" + to_send);
	aa.open("GET", "submit_allotment.php?to_insert=" + to_send, true);
	aa.send(null);
}

function selectAlum(tr) {
	if (tr.className != "selected") {
		tr.className = "selected";
		tr.children[0].getElementsByTagName("input")[0].checked = true;
	}
	else {
		tr.className = "";
		tr.children[0].getElementsByTagName("input")[0].checked = false;
	}
}

function selectVol(tr) {
	volunteer = tr.children[0].getElementsByTagName("input")[0];
	var allvols = document.getElementById("volunteerlist").getElementsByTagName("input");
	for (var i=0; i<allvols.length; i++) {
		allvols[i].parentNode.parentNode.className = "";
	}
	tr.className = "selected";
	tr.children[0].getElementsByTagName("input")[0].checked = true;
}

function sort(column) {
	var alumlist = document.getElementById("alumlist").getElementsByClassName("alum");
	var alumni = new Array();
	for (var i=0; i<alumlist.length; i++) {
		if (alumlist[i].checked) {
			alumni.push(alumlist[i].id);
		}
	}
	selected = alumni.join(",");
	if (document.getElementById("order").value == column + "_selected") window.location = "allotment.php?selected=" + selected + "&column=" + column + "&order=down";
	else window.location = "allotment.php?selected=" + selected + "&column=" + column;
}
