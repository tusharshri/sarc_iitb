function changePass(){
	var pass = $('#mydetails_table tr:nth-child(3) td:nth-child(2)').html();
	var passrow = "<td>Password</td><td><input type='textbox' value='"+pass+"'/></td><td><input type='button' onclick='savePass()'; value='save'/></td><td><input type='button' onclick='cancelPass(\""+pass+"\")'; value='cancel'/></td>";
	$('#mydetails_table tr:nth-child(3)').html(passrow);
}

function cancelPass(){
	var pass = $('#mydetails_table tr:nth-child(3) td:nth-child(2) :input').attr('value');
	var passrow = "<td>Password</td><td>"+pass+"</td><td><input type='button' onclick='changePass();' value='Change Password'/></td>";
	$('#mydetails_table tr:nth-child(3)').html(passrow);
}

function savePass(){
	var newpass = $('#mydetails_table tr:nth-child(3) td:nth-child(2) :input').attr('value');
	$('#newpass').attr('value',newpass);
	$('#savepass').submit();
}