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

	echo "<hr>";

	$sql1 = "SELECT * FROM stucourse where studID = '$studentID';";
	$qry1 = mysqli_query($dbconnect,$sql1);
	$rst1 = mysqli_fetch_assoc($qry1);
	do{
			

	}while($rst1=mysqli_fetch_assoc($qry1));

	header('location: home.php');

	?>