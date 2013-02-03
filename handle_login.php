<?php

session_start();

 
$login = $_POST['login'];
$password = $_POST['password'];
//$query = "SELECT name, type from person WHERE login = '$login' AND password = '$password';";
//$query = "SELECT * FROM accounts WHERE Username = '$login' AND Password = sha1('$password');";

//$result = mysql_query($query, $link);
if($login!='Test'&&$password!='test') {
	echo 'Error';
	$_SESSION['echstr'] = "Login failed";
	header('Location: index.php');
	
	
} else {
    	
		$_SESSION['login'] = $login;
		
		header('Location: t.php');

	
	}



?>

