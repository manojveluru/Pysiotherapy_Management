<?php
session_start();
session_destroy();
if(isset($_SESSION["isLoggedin"])){
	
	header("Location: logout.php");
}
header("Location: login.php");
?>
