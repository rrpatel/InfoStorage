<?php
session_start();
// store session data
$_SESSION['stmt']='register';

// Some useful functions.
include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>
	Register
<?php
include 'middle.php';

// Create header here.
make_header(array('Register'));

// Main content goes here.
?>

    <div class="container">
    <form enctype="multipart/form-data" action="displayInfo.php" method="post">
	
	  <?php
	  if(isset($_SESSION['stmt']) && $_SESSION['stmt']!='')
		$i=1;#echo $_SESSION['stmt'];
	  ?>
	  <label>First Name</label>
	  <input name="firstName" class="input-xlarge" type="text"><br/>
	  <label>Last Name</label>
	  <input name="lastName" class="input-xlarge" type="text"><br/>
	
	  <label>Picture ID</label><br/>
	  <input type="file"  class="input-xlarge" name="image" /><br/>
	  	  
	  <button type="submit" class="btn btn-primary"><i class="icon-user icon-white"></i> Register</button>

    </form>
    </div>
<?php include 'footer.php'; ?>