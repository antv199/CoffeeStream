<?php
	session_start();
	session_unset();
	$_SESSION=array();
	unset($_SESSION);
	session_destroy();
	$_SESSION = array();

	setcookie("userLoggedIn", "", time()+86400);
	setcookie("userEmail", "", time()+86400);
	setcookie("userPassword", "", time()+86400);

	header('Location: ./login.php?error=3');
?>