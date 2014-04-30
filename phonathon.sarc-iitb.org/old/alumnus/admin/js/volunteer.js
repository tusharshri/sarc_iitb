function goto(link) {
	parent.document.getElementById("pmenu").getElementsByTagName("ul")[0].children[1].className = "selected";
	parent.document.getElementById("pmenu").getElementsByTagName("ul")[0].children[4].className = "";
	var expireDate = new Date();
	expireDate.setMonth(expireDate.getMonth()+1);
	parent.document.cookie = "lastpage=alumni.php;path=/;expires=" + expireDate.toGMTString();
	parent.document.cookie = "lasttab=" + 1 + ";path=/;expires=" + expireDate.toGMTString();
	//alert (parent.document.cookie);
	window.location = link;
}