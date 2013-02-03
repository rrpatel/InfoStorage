<?php
session_start();

// Global header.
$header_array = array('Home' => 't.php', 
                      'Search' => 'search.php',
			 'Register' => 'register.php',
			 'Login' => 'login.php',
 			 'Logout' => 'logout.php'
  			);

function is_logged_in() {
	return isset($_SESSION['login']) && $_SESSION['login'] != '';
}

function make_header($active_items) {
	global $header_array;

	$stripes = '';
	$links = '';

	foreach($header_array as $name => $link) {
		if(!(is_logged_in() && $name == 'Login') && !(!is_logged_in() && $name == 'Logout')) {
	 		$stripes = $stripes . "<span class=\"icon-bar\"></span>\n";
		
	 		if(in_array($name, $active_items))
				$links = $links . '<li class="active">';
			else
				$links = $links . '<li>';
			if($name == 'Home') {
				$name = "<i class=\"icon-home icon-white\"></i> $name";
			} else if($name == 'Search') {
				$name = "<i class=\"icon-search icon-white\"></i> $name";
			} else if($name == 'Register') {
			  	$name = "<i class=\"icon-user icon-white\"></i> $name";
			}
			$links = $links . "<a href=\"$link\">$name</a></li>\n";
		}
	}

	$format = <<<EOT
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	    $stripes
      </a>
      <a class="brand" href="t.php">Customer Information</a>
      <div class="nav-collapse">
        <ul class="nav">
          $links
        </ul>
      </div>
	</div>
  </div>
</div>
EOT;

	echo $format;
}

function get_db_link() {

	$host="mysql.cs.uky.edu";
	$user="rrpa224";
	$password="u0794929";
	$db="rrpa224";

	$link = mysql_connect($host, $user, $password);
	if(!$link) {
		echo 'Couldn\'t connect.';
	}

	mysql_select_db($db, $link);

	return $link;
}

function sanitize($str) {
	return mysql_real_escape_string(stripslashes($str));
}

function check_logged_in() {
	if(!is_logged_in()) {
		header("Location: t.php");
	}
}

function check_admin() {
	if(!(is_logged_in() && $_SESSION['type'] == 'admin')) {
		header("Location: login.php");
	}
}
?>