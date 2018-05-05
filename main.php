<?php

	include("dbconnect.php");
	include("session.php");

	$email1=$_SESSION["email"];
	$sql1 = "SELECT * FROM registers where email = '$email1';";
	$qry1 = mysqli_query($dbconnect,$sql1);
	$rst1 = mysqli_fetch_assoc($qry1);
	do{
		echo "<h2>Welcome, ".$rst1['name']."</h2>";
		$studentID=$rst1['studentID'];
	}while($rst1=mysqli_fetch_assoc($qry1));
	
	$courseArray=$_SESSION['cArr'];
	print_r($courseArray);
	$courseArray1=$_SESSION['cArr1'];
	print_r($courseArray1);
	$c=$_POST['cc'];
	echo "<hr>";

	if(!empty($_POST['cc'])) {
	$course_count=count($_POST['cc']);
	echo "<h1>Course Page</h1>";
	echo "<h2>Successfully selected ".$course_count." courses.<br><h2>";
	
		}
	$count=count($c);
	print_r($c);
	echo $count;
	for($i=0;$i<$count;$i++) {
		$insert_sql_course="insert into stucourse(studID,courseID) values('$studentID','$c[$i]')";
		$insert_qry_course=mysqli_query($dbconnect,$insert_sql_course);
	}
?>	