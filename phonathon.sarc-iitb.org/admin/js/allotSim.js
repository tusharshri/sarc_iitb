var volunteer = null;

function allotSim(a) {
	
	var attr =[];
	var elements = document.getElementsByName("radioSim");
		for (i=0;i<elements.length;i++) {
  		if(elements[i].checked == true) {
   		 var str=elements[i].value;
		 attr = str.split(",");
		 var simlist=attr[0];
		 var status=attr[1];
  		}
		}
		
	var elements = document.getElementsByName("volunteer");
		for (i=0;i<elements.length;i++) {
  		if(elements[i].checked == true) {
   		 var volunteerlist=elements[i].value;
  		}
		}

	if (volunteer === null) {
		alert ("Choose a volunteer.");
		return;
	}
	
	
	to_send = simlist+'|'+volunteerlist;
	if(status==0){
	//alert(to_send);
	if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var aa = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var aa = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//alert ("submit_allotment.php?to_insert=" + to_send);
	aa.open("GET", "submit_simcard.php?to_insert=" + to_send, true);
	aa.send(null);
	aa.onreadystatechange = function() {
    if(aa.readyState == 4 && aa.status == 200) {
        if(aa.responseText!=""){
		alert(aa.responseText);
		}
    }
	
}
	}
	else{
		alert('Sim already alloted');	
	}
}

	function deactive(a,b,c){
		alert(a+' '+b+' '+c);	
			/*var elements = document.getElementsByName("status_1");
		for (i=0;i<elements.length;i++) {
  		if(elements[i].clicked == true) {
   		 var elements_value=elements[i].value;
		 if(elements_value=="Active")
			{
				var sendto=0;
				elements[i].value='Deactive';
			}else{
				sendto=1;
				elements[i].value='Active';
			}
  		}
		}*/
		
		if(b==0){
		document.getElementsByName("status_1")[c].value="Deactive";
		sendto=1;
		}else{
			document.getElementsByName("status_1")[c].value="Active"
			sendto=0;
		}
			
			sendto=sendto+'|'+a;
			alert(sendto);
			if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
		var aa = new XMLHttpRequest();
	}
	else {							// code for IE6, IE5
		var aa = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//alert ("submit_allotment.php?to_insert=" + to_send);
	aa.open("GET", "submit_deactive.php?to_insert=" + sendto, true);
	aa.send(null);
	aa.onreadystatechange = function() {
    if(aa.readyState == 4 && aa.status == 200) {
        if(aa.responseText!=""){
		alert(aa.responseText);
		}
    }
	}
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
