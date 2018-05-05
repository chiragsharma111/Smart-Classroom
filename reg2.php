<?php

include("dbconnect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pwd = $_POST['pass'];
$dob = $_POST['dob'];
$reg = $_POST['reg'];
$gender = $_POST['sex'];

$sql = "INSERT into registert(name,email,password,phone,gender,dob,teacherID) values(
	'".mysql_real_escape_string($_POST['name'])."',
	'".mysql_real_escape_string($_POST['email'])."',
	'".mysql_real_escape_string($_POST['pass'])."',
	'".$_POST['phone']."',
	'".mysql_real_escape_string($_POST['sex'])."',
	'".mysql_real_escape_string($_POST['dob'])."',
	'".mysql_real_escape_string($_POST['reg'])."');";

$qry = mysqli_query($dbconnect,$sql);
if(isset($qry)) {
	echo "Successfull...<br>"
	?>
		<img src="#" width="100" height="100">
<?php
	;
}
else {
	echo "Thik kr";
}

?>