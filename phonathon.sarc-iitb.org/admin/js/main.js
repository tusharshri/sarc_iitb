window.onunload = saveLastPage;

addOnload (initLinks);

var pageLoaded = "pending.php";
var tabLoaded = 0;

function initLinks() {
	lastpage = cookieVal("lastpage");
	if (lastpage != "") loadPage(lastpage);
	else loadPage("pending.php");
	lasttab = cookieVal("lasttab");
	if (lasttab != "") selected(lasttab);
	else selected(0);
}

function loadPage(url) {
	pageLoaded = url;
	document.getElementById("content").src = url;
}

function saveLastPage() {
	var expireDate = new Date();
	expireDate.setMonth(expireDate.getMonth()+1);
	document.cookie = "lastpage=" + pageLoaded + ";path=/;expires=" + expireDate.toGMTString();
	document.cookie = "lasttab=" + tabLoaded + ";path=/;expires=" + expireDate.toGMTString();
}

function cookieVal(cookieName) {
	var thisCookie = document.cookie.split("; ");
	for (var i=0; i<thisCookie.length; i++) {
		if (cookieName == thisCookie[i].split("=")[0]) {
			return thisCookie[i].split("=")[1];
		}
	}
	return "";
}

function showList (list) {
	//alert (document.getElementById ("smenu"));
	var secondaryLinks = list.getElementsByClassName ("smenu");
	secondaryLinks = secondaryLinks[0];
	secondaryLinks.style.display = "block";
}

function hideList (list) {
	//alert (document.getElementById ("smenu"));
	var secondaryLinks = list.getElementsByClassName ("smenu");
	secondaryLinks = secondaryLinks[0];
	secondaryLinks.style.display = "none";
}

function logout() {
	window.location = "../logout.php";
}

function selected(num) {
	tabLoaded = num;
	removeSelected();
	var link = document.getElementById("pmenu").getElementsByTagName("ul")[0].children[num];
	link.className = "selected";
}

function removeSelected() {
	var selectedlinks = document.getElementsByClassName ("selected");
	for (var i in selectedlinks) {
		var selectedlink = selectedlinks[i];
		selectedlink.className = "";
	}
}