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
<?php
	//$objID = sanitize($_GET['obj_id']);
	if( $_GET['obj_id'] != '' )
	$_SESSION['echoSubObj'] = sanitize($_GET['obj_id']);

?>

    <form class="well form-search" action="graph.php" method="get">
	 <b>From:</b>
	 <select name="from" class="span2">
	    <option>All</option>
	    <?php
			foreach(get_years() as $c) {
				echo "Inside ";
				echo "<option>$c</option>";
			}
		?>
	  </select>

	
 	<b>To:</b>
	<select name="to" class="span2">
	    <option>All</option>
	    <?php
			foreach(get_years() as $c) {
				echo "<option>$c</option>";
			}
		?>
	  </select>

	<br><br>
	<b> Check to exclude Relations: </b>
	<br><br>
	    <?php
			$c = get_exclusions();
			for($i = 0; $i < 16; $i += 4){
			$cls="checkbox";
			echo "<label class=$cls>";
    			echo "<input type=\"checkbox\" name= \"exclude[]\" value=$i > $c[$i] ";
		  	echo "</label>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo "<label class=$cls>";
			$j = $i+1;
    			echo "<input type=\"checkbox\" name= \"exclude[]\" value=$j> $c[$j] ";
		  	echo "</label>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			$k = $i+2;
			echo "<label class=$cls>";
    			echo "<input type=\"checkbox\" name= \"exclude[]\" value=$k> $c[$k] ";
		  	echo "</label>";
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			$l = $i+3;
			echo "<label class=$cls>";
    			echo "<input type=\"checkbox\" name= \"exclude[]\" value=$l> $c[$l] ";
		  	echo "</label>";
			if($i < 12)
			echo "<br>";			
			}

			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo "<label class=\"checkbox\">";
    			echo "<input type=\"checkbox\" name= \"exclude[]\" value=16> $c[16] ";
		  	echo "</label>";

		?>
	  </select>


	  <br><br>
	  <button type="submit" class="btn btn-primary"><i class="icon-edit icon-white"></i> Graph It!</button>
    </form>


<?php
	if(isset($_GET['submit'])){
		echo "Draw Graph Now...............";
	}
	if( $_SESSION['echoStr'] != '' ) {
			echo sprintf('<div class="alert alert-success"><h2><em>Objective: </em><em>%s</em> </div>', htmlspecialchars(stripcslashes($_SESSION['echoStr'])));
			//$_SESSION['echoStr'] = '';	
		}
	if( $_SESSION['echoSubObj'] != "" ){ //isset($_GET['obj_id']) && $_GET['obj_id'] != '') {
		$objID = sanitize($_GET['obj_id']);
		echo sprintf('<div class="alert alert-success"><h2><em>Sub-objective: </em><em>%s</em> </div>', htmlspecialchars(stripcslashes(getSubObjDesc($_SESSION['echoSubObj']))));
	}
	//echo "Hello";
	if(isset($_GET['objective']))
		echo sprintf('<div class="alert alert-success"><h2><em>For: </em><em>%s</em> </div>', htmlspecialchars(stripcslashes($_GET['objective'])));
?>



</div>

<?php include 'footer.php'; ?>