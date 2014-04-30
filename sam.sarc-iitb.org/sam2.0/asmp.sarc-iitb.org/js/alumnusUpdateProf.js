window.onload = function() {
	document.getElementById("addnewphnum").firstChild.onclick=showConfirm;
}

function showConfirm(e){
    if(!e) var e = window.event;
    var navigate = confirm("You may loose any unsaved changes. \n Do you want to continue?");
    if(navigate==true){
        return true;
    }else{	
        //e.cancelBubble is supported by IE - this will kill the bubbling process.
        e.cancelBubble = true;
        e.returnValue = false;
        //e.stopPropagation works only in Firefox.
        if (e.stopPropagation) {
	        e.stopPropagation();
	        e.preventDefault();
        }
        return false;
    }
}
