<?php
	include("dbconnect.php");
	// include("session.php");
	include("nav.php");
	
	$fc=$_SESSION['fc'];
	$email1=$_SESSION["email"];

	$sql1 = "SELECT * FROM registers where email = '$email1';";
	$qry1 = mysqli_query($dbconnect,$sql1);
	$rst1 = mysqli_fetch_assoc($qry1);
	do{
		$studID=$rst1['studentID'];
	}while($rst1=mysqli_fetch_assoc($qry1));

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="index.css">
<style type="text/css">
body {
    margin: 0;
}

.ul1 {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 20%;
    background-color: #f1f1f1;
    /*position: fixed;*/
    float: left;
    height: 100%;
    overflow: auto;
}

.ul1 li a {
	text-align: center;
    display: block;
    color: #000;
    padding: 10px 15px;
    text-decoration: none;
}

.ul1 li a:hover {
    background-color: #555;
    color: white;
    transition: 0.2s;
}
	.button {
		background-color: #639af2;
		padding: 15px 20px;
		color: white;
		border: 0px;
		border-radius: 6px;
	}
	.button:hover {
		background-color: #0062ff;
		color: white;
		transition: 0.2s;
		cursor: pointer;
	}
</style>
</head>
<body>
<div class="course_name_header">Welcome to SmartClasses</div>
<ul class="ul1">
  <?php
  		$sql2="SELECT * FROM COURSE INNER JOIN stucourse ON course.courseID=stucourse.courseID and stucourse.studID='$studID';";
		$qry2 = mysqli_query($dbconnect,$sql2);
		$rst2= mysqli_fetch_assoc($qry2);
			if(mysqli_num_rows($qry2)!=0){
				echo '<li><a href="home.php" style="background-color:#333;color:white;font-family:verdana; ">The List of courses:</a></li>';
				do{
					echo '<li><a href="home2.php?course_id='.$rst2['courseID'].'">'.$rst2['courseID'].'-'.$rst2['courseName']."</a></li>";
				}while($rst2=mysqli_fetch_assoc($qry2));
			}
  ?>
</ul>

<div style="margin-left: 20%;padding: 10px">

<?php
	

	// echo $fc."-".$email1."<br>";
	// $sql = "select * from registers where email='$email1';";
	// echo $sql."<br>";
	// $qry = mysqli_query($dbconnect,$sql);
	// // echo $qry."cool";
	// $result = mysqli_fetch_assoc(mysqli_query($dbconnect,$sql));
	// do{
	// 	echo "<h2>Welcome,one ".$result['name']."</h2>";
	// }while($result=mysqli_fetch_assoc($qry));
	$studInfo=array();
	echo '<a href="mock_reg.php"><button>Click here for mock Registration</button></a>';
	echo '<pre></pre>';
	$sql1 = "SELECT * FROM registers where email = '$email1';";
	$qry1 = mysqli_query($dbconnect,$sql1);
	$rst1 = mysqli_fetch_assoc($qry1);
	?><p style="text-align: center;font-family: sans-serif; ">
	<?php
	do{
		
		echo "<h2>Welcome, ".$rst1['name']."</h2>";
		echo "<h3>Student ID: ".$rst1['studentID']."</h3>";
		echo "<h3>Email: ".$rst1['email']."</h3>";
		echo "<h3>Gender: ".$rst1['gender']."</h3>";
		array_push($studInfo,$rst1['name']);
		array_push($studInfo,$rst1['studentID']);
		array_push($studInfo,$rst1['email']);
		array_push($studInfo,$rst1['gender']);
		$studID=$rst1['studentID'];
		
	}while($rst1=mysqli_fetch_assoc($qry1));
	echo '</p>';
	echo '<hr color="blue">';
	// Mock Registration STARTS

		// include("mock_reg.php");

	//Mock regsitration ENDS
	// $sql1 = "SELECT * FROM registers where email = '$email1';";
	// $qry1 = mysqli_query($dbconnect,$sql2);
	// $rst1 = mysqli_fetch_assoc($qry2);

	// $sql2="SELECT * FROM COURSE INNER JOIN stucourse ON course.courseID=stucourse.courseID and stucourse.studID='$studID';";
	// $qry2 = mysqli_query($dbconnect,$sql2);
	// $rst2= mysqli_fetch_assoc($qry2);
	// if(mysqli_num_rows($qry2)!=0){
	// 	echo "<p>The list of courses:</p>";
	// 	do{
	// 		echo "<h3>Course Name: ".$rst2['courseID'].' - '.$rst2['courseName']."</h3>";
	// 	}while($rst2=mysqli_fetch_assoc($qry2));
	// }

	
	echo '<pre>	</pre>';

	echo '<center>
		<form method="get" action="home1.php">
			<input type="text" name="course_search" placeholder="Please search course..." required>
			<input type="submit" value="Search">
		</form>
		</center>
	';
	
	$_SESSION['stud_info']=$studInfo;

	echo '<pre>
























</pre>';
	
	?>


</div>
<hr>
<p style="text-align: center;font-family: sans-serif; ">
Developed by-
SmartClasses Inc. 
</p>
</body>
</html>