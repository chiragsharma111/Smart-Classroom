<?php

	include("dbconnect.php");
	session_start();

	// $name = $_POST[''];
	$email=$_POST['username'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT * from registert where email like '$email';";
	$qry = mysqli_query($dbconnect,$sql);
	$rst = mysqli_fetch_assoc($qry);

	if($rst['password']==$pwd) {
		header('location:home.php');
	}

	else {
		?>
<!-- 		<script type="text/javascript">
			var c = confirm("If, you are '<?php #echo $email; ?>'Then enter correctly...");
			if(c==true) {
				<?php #header('location:login.php'); ?>
			}
			else {

			}
		</script>
 -->
	<?php
		header('location:login.php');

	}
?>