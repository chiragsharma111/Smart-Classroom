<!DOCTYPE html>
<html>
<head>
	<title>Welcome to smartclasses</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-3.1.1.js"></script>
	<script>
		$(document).ready(function(){
			$(".signup_content").hide();
			$(".signin_content").hide();

			$(".signup").click(function(){
                $(".signup_content").slideToggle("slow");
                $(".signin_content").hide();
            });

            $(".signin").click(function(){
            	$(".signin_content").slideToggle("slow");
            	$(".signup_content").hide();
            });
		});
	</script>
	<style type="text/css">
		table td {
			text-align: center;
		}
	</style>
</head>
<body>



	<?php
		include("nav.php");
		echo '<div class="course_name_header">Welcome to SmartClasses</div>';

		echo '
			<img src="class1.jpg" style="height: 650px; width: 100%">
		';
				echo '<br><br>';				echo '<br><br>';
	?>

<!-- <button onclick="document.getElementById('loginkr').style.display='block'">
	Click her to squartin
</button> -->

<!-- <button onclick="document.getElementById('SignUpkr').style.display='block'">
	Sign Up
</button>

<button onclick="document.getElementById('Loginkr').style.display='block'">
	Sign In
</button> -->

<div id="loginkr" class="modal">
	<form class="modal_content animate" action="abc.php">
		<div class="imgHolder">
			<img class="profilepic" src="images.jpg">
		</div>
		<hr>
		<input type="text" placeholder="
		Sheryl Sandberg : GO for Growth...">
		<br>
		<input type="text" placeholder="
		Zuck : Cared the most for it...">
		<br>
		<input class="btn" type="submit" value="Submit kr">
	</form>
</div>



<div id="SignUpkr" class="modal">
	<form class="modal_content animate" action="abc.php">
		<div class="imgHolder">
			<img class="profilepic" src="images.jpg">
		</div>
		<hr>
		<input type="text" placeholder="
		Sheryl Sandberg : GO for Growth...">
		<br>
		<input type="text" placeholder="
		Zuck : Cared the most for it...">
		<br>
		<input class="btn" type="submit" value="Submit kr">
			<br>
		<button onclick="document.getElementById('SignUpkr').style.display='none'">
			close
		</button>
	</form>
	
</div>

<!-- <div id="Loginkr" class="modal">
	<!--<?php #include("login.php"); ?>-->	
<!-- 	<form class="modal_content animate" action="login_new2.php" method="post">
		<h1>Welcome, to login page</h1>
		Enter Email : 
		<input type="text" name="username" required /><br />
		Enter password : 
		<input type="password" name="pwd" required /><br />
		<input type="submit" value="Login here">
			<br>
		<button onclick="document.getElementById('Loginkr').style.display='none'">
			close
		</button>
	</form>
 -->

<!-- </div> -->

<script>
	//Get the modal
	var modal = document.getElementById('SignUpkr');
	window.onclick = function (event) {
		if(event.target == modal) {
			modal.style.display = "none";
		}
	}
	var modal = document.getElementById('Loginkr');
	window.onclick = function (event) {
		if(event.target == modal) {
			modal.style.display = "none";
		}
	}

	//Get the modal
	var modal = document.getElementById('loginkr');
	window.onclick = function (event) {
		if(event.target == modal) {
			modal.style.display = "none";
		}
	}

</script>

<?php

	include("dbconnect.php");

?>



<!-- <hr color="blue"> -->
<table width="100%">
	<tr>
		<td>
		<button class="signup"  style="padding: 40px 100px">Sign Up</button>
		
		</td>

		<td>
		<button class="signin"  style="padding: 40px 100px">Login</button>
		</td>
	</tr>

	<tr>
		<td colspan="2">
		<div class="signup_content">
			<a href="reg.php"><button style="padding: 40px 100px">SignUp as Student</button></a>
			<!-- <a href="regt.html"><button>SignUp as Teacher</button></a> -->
		</div>
		
		<div class="signin_content">
			<a href="login_gs.html"><button style="padding: 40px 100px">Login as Student</button></a>
			<!-- <a href="logint.php"><button>Login as Teacher</button></a> -->
		</div>
		</td>
	</tr>
</table>

		<br><br>
		<br><br>

<hr>
<p style="text-align: center;font-family: sans-serif; ">
Developed by-
SmartClasses Inc. 
</p>
</body>
</html>