var volunteer = null;

	function deactive(c,simcardno){
		var sendto;
		var a = document.getElementById("simcardno_"+simcardno).innerHTML;
		var b = parseInt(document.getElementById("status_"+simcardno).innerHTML);
		var initial_bal = document.getElementById("initial_bal_"+simcardno).innerHTML;
		var balance = document.getElementById("balance_"+simcardno).value.trim();
		if(b==0){
			sendto=1;
		}else if(b==1){
			sendto=2;
		}else{
			sendto = 0;
			balance = 0;
		}
		document.getElementById("balance_"+simcardno).value= "";
//		alert(initial_bal+","+balance);
		if((parseInt(initial_bal)>=parseInt(balance)&&sendto==2)||(sendto==1&&parseInt(balance)>0)||sendto==0){ 
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
					document.getElementById("initial_bal_"+simcardno).innerHTML=balance;
					document.getElementById("status_"+simcardno).innerHTML=sendto;
					document.getElementById("volunteername_"+simcardno).innerHTML=aa.responseText;
					if(sendto==1){
						document.getElementById("status_1_"+simcardno).value="Deactivate";
					}else if(sendto ==0){
						document.getElementById("status_1_"+simcardno).value="Activate";
					}else{
						document.getElementById("status_1_"+simcardno).value="Close";
					}
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

	function remove_me(c,simcardno){
		var a = document.getElementById("simcardno_"+simcardno).innerHTML;
		var updated=a;
//			alert(updated);
		if (window.XMLHttpRequest) {	// code for IE7+, Firefox, Chrome, Opera, Safari
			var aa = new XMLHttpRequest();
		}
		else {							// code for IE6, IE5
			var aa = new ActiveXObject("Microsoft.XMLHTTP");
		}
	
	//alert ("submit_allotment.php?to_insert=" + to_send);
		aa.open("GET", "remove_sim.php?to_insert=" + updated, true);
		aa.send(null);
		aa.onreadystatechange = function() {
    		if(aa.readyState == 4 && aa.status == 200) {
        		if(aa.responseText!=""){
					var element=document.getElementById(a);
					element.parentNode.removeChild(element);
				}
				else{
					alert("Error,Reload and Try again.");
				}
    		}
			else{
			}
		}
	}