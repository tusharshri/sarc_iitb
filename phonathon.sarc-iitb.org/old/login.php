<?php
	session_start();
	$page="design.php";
	if (isset($_SESSION['user'])) {
		header("Location: " . $_SESSION['role'] . "/design.php");
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
				padding: 5px; border-style: groove; 
				border-color:#372; border-width:5px;
				position:relative; top: 40px;
			}
            span.error{
                color: #FF5555;
                width: 100%;
                text-align:center;
                font-size: 80%;
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
					if (input[i].value == ""){
						input[i].className = "invalid";
						alert("Incomplete Form");
						return false;
					}
				}
			}
		</script>
	</head>
	<body>
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
			<tr align="center"> 
				<td colspan="2"> 
					<input name="login" type="submit" value="Submit" />
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>
<?php
}
?>
