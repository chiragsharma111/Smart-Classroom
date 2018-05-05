<?php
	include("dbconnect.php");
	session_start();

// function test_input($data) {
// 	$data = trim($data);
// 	$data = stripslashes($data);
// 	$sata = htmlspecialchars($data);
// 	return $data;
// }

// 	$name = test_input($_POST['name']);
// 	$email = test_input($_POST['email']);
// 	$pwd = test_input($_POST['pass']);
// 	$phone = test_input($_POST['phone']);
// 	$reg = test_input($_POST['reg']);
// 	$sex = test_input($_POST['sex']);

$email = $_POST['email'];
$sql = "select * from registers where email like '$email';";
$qry = mysqli_query($dbconnect,$sql);
$rst =mysqli_fetch_assoc($qry);
if($rst['password']==$pwd) {
	header('location:home.php');
}
else if(isset($pwd)) {
	if($rst['password']!=$pwd) {
	?>
	<script> windows.alert('Please enter correct information.'); </script>
	<?php
	}
}

	$user = $_POST['username'];
	$pwd = $_POST['pwd'];

	$sql = "SELECT * from users where user_name like '$user';";
	$qry = mysqli_query($dbconnect,$sql);
	$rst = mysqli_fetch_assoc($qry);
		
if($rst['pass']==$pwd) {
	header('Location:home.php');
}
else {
	header('Location:login.html');

}

?>