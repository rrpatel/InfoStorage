<?php
// Some useful functions.
include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>
	Search
<?php
include 'middle.php';

// Create header here.
make_header(array('Search'));

// Main content goes here.
?>

<div class="container">
    <form class="well form-search" action="search.php" method="post">
	
	  <label>First Name</label>
	  <input name="firstName" class="input-xlarge" type="text"><br/>
	  <label>Last Name</label>
	  <input name="lastName" class="input-xlarge" type="text"><br/>
  	  
	  <br>
	  <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    </form>


<?php
	if( isset($_POST['firstName']) || isset($_POST['lastName']) ){
	$link = get_db_link();
	$query = "SELECT firstName, lastName, image, id FROM customer ";
	$tempQuery = "";
	
		
	
	if( isset($_POST['firstName']) && $_POST['firstName'] != '' && isset($_POST['lastName']) && $_POST['lastName'] != '' ){
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$tempQuery = " WHERE firstName LIKE '%$firstName%' AND lastName LIKE '%$lastName%'";
	}

	if( isset($_POST['firstName']) && $_POST['firstName'] != '' && $_POST['lastName'] == '' ){
		$firstName=$_POST['firstName'];
		$tempQuery = " WHERE firstName LIKE '%$firstName%' ";
	}
	if( $_POST['firstName']=='' && isset($_POST['lastName'])&& $_POST['lastName' ] != ''  ){
		$lastName=$_POST['lastName'];
		$tempQuery = " WHERE lastName LIKE '%$lastName%'";
	}

	unset($_POST['firstName']);
	unset($_POST['lastName']);

	$query.=$tempQuery;

	$query.= " order by lastName ASC";
	#echo $query;
	$result = mysql_query($query, $link);

		if(!$result) {
			echo 'Error';
		} else if(mysql_num_rows($result) == 0) {
		  	echo '<div class="alert alert-error"><h2>No results found.</h2></div>';
		} else {
		  	$table = '<br><br><table class="table table-striped table-bordered"><thead><tr>';
		  	foreach(array('FirstName', 'LastName', 'Picture ID', 'Proceed') as $k) {
				$table .= "<th>$k</th>";
			}
			$table .= '</tr></thead><tbody>';

			while($row = mysql_fetch_row($result)) {
				$table .= '<tr>';
				$count = 0;
				
				if($row[0]!=""){
				
				//list($id, $name, $category, $price) = $row;
				$table .= "<td>$row[0]</td><td>$row[1]</td>";   //<td>$row[2] </td><td>$row[3] </td>";
				$table .= "<td><img src=$row[2]  /></td>";
				$table .= "<td><a href=\"checkout.php?id=$row[3]\"><i class=\"icon-edit\"></i></a></td>";
				$table .= '</tr>';
				}
			}

			$table .= '</tbody></table>';

			echo $table;
		}
		}
?>

</div>

<?php include 'footer.php'; ?>