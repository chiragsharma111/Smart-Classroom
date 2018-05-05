<style>
	body {
		margin:0;
	}
</style>
<?php
	include("dbconnect.php");
	include("nav.php");
	echo '<div class="course_name_header">Welcome to Mock Registration</div>';
	echo '<br><br><br><center>';
//Table for course registration START
	$sql_course="SELECT * from course";
	$qry_course=mysqli_query($dbconnect,$sql_course);
	$result_course=mysqli_fetch_assoc($qry_course);
	$len = mysqli_num_rows($qry_course);
?>
	<table border="1" cellpadding="14px" style="font-family: sans-serif;">
		<tr>
			<th>Sr. No.</th>
			<th>Name of the Course</th>
			<th>Course Code</th>
			<th>Price</th>
			<th> </th>
		</tr>
		
<?php
	$sr=1;
	echo '<form method="post" action="main1.php">'; 
	$array_course = array();
	$array_course1 = array();
	$array_course2 = array();
	do{
		$cID=$result_course['courseID'];
		echo "<tr>";
		echo "<td>".$sr++."</td>";
		echo "<td>".$result_course['courseName']."</td>";
		echo "<td>".$result_course['courseID']."</td>";
		echo "<td>$".$result_course['price']."</td>";
		echo '<td><input type="checkbox" id="<?php echo $result_course[\'courseID\']; ?>"
				 value='.$result_course['courseID'].' name="cc[]"></td>';
		echo "</tr>";
		$array_course2['$result_course[\'courseName\']']=$result_course['price'];
		array_push($array_course,$result_course['courseID']);

	}while($result_course=mysqli_fetch_assoc($qry_course));

	echo "</table><br>";
	echo '<input type="submit" value="Submit">';
	echo "</form>";


	$_SESSION['cArr']=$array_course;
	$_SESSION['cArr1']=$array_course1;
	$_SESSION['cArr2']=$array_course2;
	// print_r($array_course1);
	echo '<hr>
	<p style="text-align: center;font-family: sans-serif; ">
Developed by-
SmartClasses Inc. 
</p>';

	//table for course registration END

?>