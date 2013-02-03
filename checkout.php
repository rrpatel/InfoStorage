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
	if(isset($_GET['id']) && $_GET['id'] != '' ){
		$id=$_GET['id'];
		$sql = "SELECT * FROM customer WHERE id = '$id';";
		$_SESSION['id']=$id;

		$link = get_db_link();
		if(mysql_query($sql,$link)){
			$row=mysql_fetch_row(mysql_query($sql,$link));
			$id=$row[0];
			#echo $result[1].$result[2].$result[3];

			$table = '<br><br><table class="table table-striped table-bordered"><tbody>';

				$table .= '<tr>';
				$table .= "<td>$row[1] $row[2]</td>";  
				$table .= "<td><img src=$row[3]  /></td>";
				$table .= '</tr>';

			$table .= '</tbody></table>';

			echo $table;
		}
		else
			echo "Error: SQL\n";
	$_SESSION['stmt']='confirm';
	}
	
?>
	
		<label>Number of Days</label>
		<select name="days" class="span2">
		<?php
			for($i=1;$i<31;$i+=1) {
				echo "<option>$i</option>";
			}
		?>
	  	</select></br>

	  	<button type="submit" class="btn btn-primary"><i class="icon-user icon-white"></i> Checkout</button>

    		</form>
	       </div>

<?php include 'footer.php'; ?>

