<?php
session_start();
// store session data
#$_SESSION['stmt']='';

// Some useful functions.
include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>
	Confirm Data
<?php
include 'middle.php';

// Create header here.
make_header(array('Register'));

// Main content goes here.
?>
	<div class="container">
	<form action="checkout.php" method="post">
	
<?php
	if( isset($_POST['firstName']) && isset($_POST['lastName']) && $_POST['firstName'] != '' && $_POST['lastName'] != '' && $_SESSION['stmt']=='register' ){
	
	$target_path = "image/";
	#$target_path = $target_path . basename( $_FILES['image']['name']); 
	$target_path = $target_path . time();
	$path = explode('.',$_FILES['image']['name']);
	$target_path.= '.'.end($path);
	$proceed = 0;

	if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
	chmod($target_path, 0644);
	#echo "The file ".  basename( $_FILES['image']['name'])." has been uploaded";
	$proceed = 1;
	} else{
    	echo "Error: Uploading ID\n";
	}

	$name = $_POST['firstName'].'    '.$_POST['lastName'];		
	$firstName=$_POST["firstName"];
	$lastName=$_POST["lastName"];
	$image = "http://sweb.uky.edu/~rrpa224/InfoStorage/".$target_path;
	
	#$table = "<table class=\"table table-striped table-bordered\" >
       #<tr><td>$name</td></tr> 
    	#<tr><td><img src=$image  /></td></tr> 
	#</table>";

	$sql = "INSERT INTO customer ( firstName, lastName, image )
                             VALUES ( '$firstName', '$lastName', '$image' );";

	$link = get_db_link();
	
	if(mysql_query($sql,$link))
		$proceed+=1;#echo "Successfully inserted into database.\n";
	else
		echo "Error: SQL\n";     
	
	if($proceed==2){
		$sql = "SELECT id FROM customer WHERE image = '$image';";

		$link = get_db_link();
		$id=1;	

		if(mysql_query($sql,$link)){
			$result=mysql_fetch_row(mysql_query($sql,$link));
			$id=$result[0];
			echo $result[0]; #echo "Successfully inserted into database.\n";
		}
		else
			echo "Error: SQL\n";
		#echo $table;
		$table = '<br><br><table class="table table-striped table-bordered"><thead><tr>';
		foreach(array('FirstName', 'LastName', 'ID', 'Proceed') as $k) {
				$table .= "<th>$k</th>";
		}
		$table .= '</tr></thead><tbody>';

		$table .= '<tr>';
			
		$table .= "<td>$firstName</td><td>$lastName</td>"; 
		$table .= "<td><img src=$image  /></td>";
		$table .= "<td><a href=\"checkout.php?id=$id\"><i class=\"icon-edit\"></i></a></td>";
		$table .= '</tr>';
		$table .= '</tbody></table>';

		echo $table;
	}
	$_SESSION['stmt']='';
	}
?>
    </form>
    </div>
<?php include 'footer.php'; ?>

