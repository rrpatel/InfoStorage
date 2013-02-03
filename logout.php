<?php
	session_start();
	$_SESSION['login'] = "";
	$_SESSION['password'] = "";


	session_start();
	session_destroy();
	header('Location: index.php');
?>