<style>
	.course_name_header {
		font-family: verdana;
		font-size: 40px;
		text-align: center;
		padding: 100px 10px;
		margin: 0px;
		background-color: #9badff;
		color: white;
	}
	.ul_sb {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #1d2960;
	}
	body {
		margin:0;
	}
	.ul_sb li {
	    float: left;
	    /*display: inline;*/
	    text-align: center;
	}

	.ul_sb li a {
		font-family: sans-serif;
	    display: block;
	    color: white;
	    text-align: center;
	    padding: 14px 16px;
	    text-decoration: none;
	    border:3px solid transparent;

	}

	/* Change the link color to #111 (black) on hover */
	.ul_sb li a:hover {
		transition: 0.2s;
		border-bottom: 3px solid white;
		border-top: 3px solid white;
		/*font-weight: 400px;*/
	    /*background-color: #3b57d6;*/
	    color: white;
	}
</style>
<?php
include("dbconnect.php");
	include("session.php");
	if(isset($_GET['course_id'])) {
		$courseId=$_GET['course_id'];
	}
	if(isset($_SESSION["email"])){
		$email1=$_SESSION["email"];
	}
	else {
		$email1=0;
	}
		$sql1 = "SELECT * FROM registers where email = '$email1';";
		$qry1 = mysqli_query($dbconnect,$sql1);
		$rst1 = mysqli_fetch_assoc($qry1);
		do{
			$studID=$rst1['studentID'];
			$studName=$rst1['name'];
		}while($rst1=mysqli_fetch_assoc($qry1));
	
	// $Name=$_SESSION['Name'];


//SmartBar - videos(resourseful videos), vr,ar,link for previous lectures, scholar articles...
// upcoming schedules in popup windowlike alert...
?>

	<ul class="ul_sb">
	  <li><a href="home.php" style="margin-left:280px;">Home</a></li>

	  <li><a href="https://scholar.google.com/">Resourseful articles</a></li>
	  <li><a href="https://vr.google.com/">VR &amp; AR content</a></li>
	  <!-- <li><a href="#">Argument Reality content</a></li> -->
	  <li><a href="https://www.youtube.com">Videos &amp; Lectures </a></li>
	  <!-- <li><a href="#">About Us</a></li> -->
	  <li><a href="signout.php" title="SignOut">Hi <?php echo $studName; ?></a></li>
	</ul>

