var volunteer = null;

	function deactive(c){
		var sendto;
		alert(c);
		var a = document.getElementsByName("simcardno")[c].innerHTML;
		var b = parseInt(document.getElementsByName("status")[c].innerHTML);
		alert(b);
		if(b==0){
			document.getElementsByName("status_1")[c].val("Deactivate");
			sendto=1;
		}else{
			document.getElementsByName("status_1")[c].val("Activate");
			sendto=0;
		}
		var initial_bal = document.getElementsByName("initial_bal")[c].innerHTML;
		var balance = document.getElementsByName("balance")[c].value.trim();
		document.getElementsByName("balance")[c].value= "";
		alert(initial_bal+","+balance);
		if((parseInt(initial_bal)>=parseInt(balance)&&sendto==0)||(parseInt(initial_bal)<=parseInt(balance)&&sendto==1)){ 
			var updated=sendto+'|'+a+'|'+balance;
//			alert(updated);
			if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
			var aa = new XMLHttpRequest();
		}
		else {							// code for IE6, IE5
			var aa = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
	//alert ("submit_allotment.php?to_insert=" + to_send);
		aa.open("GET", "submit_deactive.php?to_insert=" + updated, true);
		aa.send(null);
		aa.onreadystatechange = function() {
    		if(aa.readyState == 4 && aa.status == 200) {
        		if(aa.responseText!=""){
//					alert(aa.responseText);
					document.getElementsByName("initial_bal")[c].innerHTML=balance;
					document.getElementsByName("status")[c].innerHTML=sendto;
				}
				else{
					
				}
    		}
		}
	}
	else{
		alert("Incorrect Balance Entered");
	}
}
