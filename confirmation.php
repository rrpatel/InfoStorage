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
	<form enctype="well form-search" action="confirmation.php" method="post">
	
<?php
	if($_SESSION['stmt']=='confirm'){
		$id=$_SESSION['id'];
		$days=$_POST['days'];
		$sql = "INSERT INTO registration ( customer_id, checkin, days )
                             VALUES ( '$id', CURDATE() , '$days' );";
		
		$link = get_db_link();
		if(mysql_query($sql,$link))
			echo '<div class="alert alert-success"><h2>Succefully processed.</h2></div>';
		else
			echo "Error: SQL\n";
	}
		$today = date("F j, Y, g:i a"); 
		$id=$_SESSION['id'];		
		$days=$_POST['days'];
		$sql = "SELECT * FROM customer WHERE id = '$id';";

		$link = get_db_link();
	

		if(mysql_query($sql,$link)){
			$result=mysql_fetch_row(mysql_query($sql,$link));
		#echo $table;
		$table = '<br><br><table class="table table-striped table-bordered"><thead><tr>';
		foreach(array('FirstName', 'LastName', 'ID', 'Checkin', 'Day(s)') as $k) {
				$table .= "<th>$k</th>";
		}
		$table .= '</tr></thead><tbody>';

		$table .= '<tr>';
			
		$table .= "<td>$result[1]</td><td>$result[2]</td>"; 
		$table .= "<td><img src=$result[3]  /></td>";
		$table .= "<td>$today</td>";
		$table .= "<td>$days</td>";
		$table .= '</tr>';
		$table .= '</tbody></table>';

		echo $table;

		}
		else
			echo "Error: SQL\n";
		
		$_SESSION['stmt']='';
	
	
?>
    		</form>
	       </div>

<?php include 'footer.php'; ?>

