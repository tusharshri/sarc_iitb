<?php
	session_start();
	error_reporting (E_ALL ^ E_NOTICE);
	$page="design.php";
	if (isset($_SESSION['user'])) {
		$_SESSION['role'] = "volunteer";
		header("Location: volunteer/design.php");
	}	
	else{ 
?>
<html>
	<head>
		<style type="text/css">
			body {
				color : #000;
				background-color : white;
			}

			input.invalid{
				background-color : #FF9;
				border : 2px red inset;
			}
			.mytable{
				background-color:white;
				padding: 5px; 
				
				
			}
            span.error{
                color: #FF5555;
                width: 100%;
                text-align:center;
                font-size: 80%;
            }
			
			#maindivfooter{
			margin:auto auto auto 10px;
			}
		</style>
		<script type="text/javascript">
			window.onload = initAll;
			function initAll() {
				document.forms[0].onsubmit = checkFilled;
			}
			function checkFilled(){
				var input = document.getElementsByTagName("input")
				var login = document.getElementById("loginEntry");
				var password = document.getElementById("passwordEntry");
				for (i =0; i < input.length; i++){
					input[i].className = "";
				}
				for (i = 0; i < input.length; i++){
					if (input[i].value == "" || input[i].trim.value="0"){
						input[i].className = "invalid";
						alert("Incomplete Form");
						return false;
					}
				}
			}
		</script>
	</head>
	<body>
	<div id="maindiv">
		<div id="maindivheader">
		
		</div>
		
		<span class="error"><?php echo $_SESSION['invalid'];?></span>
		
		
		
		<form action="login_verify.php" method="post">
		<table class="mytable" cellspacing = "5px" align ="center">
			<tr>
				<td>Login</td>
				<td>
					<input name="username" type="text" size="20px" id="loginEntry" />
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input name="password" type="password" size="20px" id="passwordEntry"/>
				</td>
			</tr>
			<?php 
				if($_SESSION['role']=="volunteer"):
			?>
            <tr>
				<td>Sim card No</td>
				<td>
					<input name="simcardNo" type="text" size="20px" id="simcardnoEntry"/>
				</td>
			</tr>
			<?php 
			endif; ?>
			<tr align="center"> 
				<td colspan="2"> 
					<input name="login" type="submit" value="Submit" />
				</td>
			</tr>
		</table>
		</form>
		
        
		
	</div>
	</body>
</html>
<?php
}
?>
