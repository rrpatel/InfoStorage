<?php
session_start();
// store session data
$_SESSION['stmt']='';
#echo $_SESSION['image'];

// Some useful functions.
include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>
	Search
<?php
include 'middle.php';

// Create header here.
make_header(array('Register'));

// Main content goes here.
?>


<div class="container">
    <form action="checkout.php" method="post">
	

<?php
		if( isset($_POST['firstName']) && isset($_POST['lastName']) && $_POST['firstName'] != '' && $_POST['lastName'] != '' ){
			#echo $_POST['firstName'];
			#echo $_POST['lastName'];
			$target_path = "image/";

$target_path = $target_path . basename( $_FILES['image']['name']); 
//echo $_FILES['image']['name']." file path.";

if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
    chmod($target_path, 0644);
    echo "The file ".  basename( $_FILES['image']['name'])." has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}

$name = $_POST['firstName'].'    '.$_POST['lastName'];		
		

		$firstName=$_POST["firstName"];
		$lastName=$_POST["lastName"];
		$image = "http://sweb.uky.edu/~rrpa224/InfoStorage/".$target_path;

		echo $image;


		$table = "<table class=\"table table-striped table-bordered\" >
			   <tr><td>$name</td></tr> 
    			   <tr><td><img src=$image  /></td></tr> 
			   </table>";

	
	$sql = "INSERT INTO customer ( firstName, lastName, image )
                             VALUES ( '$firstName', '$lastName', '$image' );";

	$link = get_db_link();
	
	if(mysql_query($sql,$link))
		echo "Successfully inserted into database.\n";
	else
		echo "Error: SQL\n";     
	echo $table;
	}

?>

<script language="javascript">
<!--
today = new Date();
//document.write("<BR><h3>Checkout time is: ", today.getHours(),":",today.getMinutes());
document.write("<BR><h3>From: ", today.getDate(),"/",today.getMonth()+1,"/",today.getYear());
document.write("<BR>");
//-->
</script> 




<!-- ## HTML Select List Combo That Allows User To Enter Date Of Birth ## -->
<!-- ## Uploaded by James Cullin (james.cullin@humber.ca) ## -->
<!-- ## http://jamescullin.com ## -->

<?php
		if( isset($_POST['firstName']) && isset($_POST['lastName']) && $_POST['firstName'] != '' && $_POST['lastName'] != '' ){

$date = "
<select name=\"DateOfBirth_Month\">
	<option> - Month - </option>
	<option value=\"January\">January</option>
	<option value=\"Febuary\">Febuary</option>
	<option value=\"March\">March</option>
	<option value=\"April\">April</option>
	<option value=\"May\">May</option>
	<option value=\"June\">June</option>
	<option value=\"July\">July</option>
	<option value=\"August\">August</option>
	<option value=\"September\">September</option>
	<option value=\"October\">October</option>
	<option value=\"November\">November</option>
	<option value=\"December\">December</option>
</select>

<select name=\"DateOfBirth_Day\">
	<option> - Day - </option>
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\">5</option>
	<option value=\"6\">6</option>
	<option value=\"7\">7</option>
	<option value=\"8\">8</option>
	<option value=\"9\">9</option>
	<option value=\"10\">10</option>
	<option value=\"11\">11</option>
	<option value=\"12\">12</option>
	<option value=\"13\">13</option>
	<option value=\"14\">14</option>
	<option value=\"15\">15</option>
	<option value=\"16\">16</option>
	<option value=\"17\">17</option>
	<option value=\"18\">18</option>
	<option value=\"19\">19</option>
	<option value=\"20\">20</option>
	<option value=\"21\">21</option>
	<option value=\"22\">22</option>
	<option value=\"23\">23</option>
	<option value=\"24\">24</option>
	<option value=\"25\">25</option>
	<option value=\"26\">26</option>
	<option value=\"27\">27</option>
	<option value=\"28\">28</option>
	<option value=\"29\">29</option>
	<option value=\"30\">30</option>
	<option value=\"31\">31</option>
</select>

<select name=\"DateOfBirth_Year\">
	<option> - Year - </option>
	<option value=\"2004\">2004</option>
	<option value=\"2003\">2003</option>
	<option value=\"2002\">2002</option>
	<option value=\"2001\">2001</option>
	<option value=\"2000\">2000</option>
	<option value=\"1999\">1999</option>
	<option value=\"1998\">1998</option>
	<option value=\"1997\">1997</option>
	<option value=\"1996\">1996</option>
	<option value=\"1995\">1995</option>
	<option value=\"1994\">1994</option>
	<option value=\"1993\">1993</option>
	<option value=\"1992\">1992</option>
	<option value=\"1991\">1991</option>
	<option value=\"1990\">1990</option>
	<option value=\"1989\">1989</option>
	<option value=\"1988\">1988</option>
	<option value=\"1987\">1987</option>
	<option value=\"1986\">1986</option>
	<option value=\"1985\">1985</option>
	<option value=\"1984\">1984</option>
	<option value=\"1983\">1983</option>
	<option value=\"1982\">1982</option>
	<option value=\"1981\">1981</option>
	<option value=\"1980\">1980</option>
	<option value=\"1979\">1979</option>
	<option value=\"1978\">1978</option>
	<option value=\"1977\">1977</option>
	<option value=\"1976\">1976</option>
	<option value=\"1975\">1975</option>
	<option value=\"1974\">1974</option>
	</select>";

echo '</br><h3>To:'.$date;
}
else{
	echo "<div class=\"alert alert-success\"><h2> Enter firstname, lastname and take snapshot. </h2></div>";
}
?>


	 </br>
	 <button type="submit" class="btn btn-primary"><i class="icon-user icon-white"></i> Checkout</button>

    </form>




</div>



<?php include 'footer.php'; ?>

