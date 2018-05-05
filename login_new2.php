<?php

	include("dbconnect.php");
	include("session.php");

	// $name = $_POST[''];
	$email=$_POST['username'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT * from registers where email like '$email';";
	$qry = mysqli_query($dbconnect,$sql);
	$rst = mysqli_fetch_assoc($qry);

	if($rst['password']==$pwd) {
		$_SESSION["fc"] = "green";
		$_SESSION["email"]=$email;
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
 	<script type="text/javascript">
 		if(window.alert("Wrong Input crediancials")) {
 			<?php header("location:index.php"); ?>
 		}
 	</script>
	<?php
		// header('location:login.php');

	}
?>