<?php
if(substr($_SERVER["SERVER_NAME"],0, 4)!="www."){
	header("Location: http://www.".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);	
	exit();
}
session_start();

echo $_SESSION['uid'];
echo '<br>'.$_SESSION['level'];


echo substr($_SERVER["SERVER_NAME"],0, 4).'<br>';
echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]

?>