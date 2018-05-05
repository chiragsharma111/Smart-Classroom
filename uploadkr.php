<!DOCTYPE html>
<html>
<head>
	<title>Course Page</title>

<style type="text/css">
	body {
		margin: 0px;
		background-color: #e8e8e8;
	}
	.artclass {
		font-family: sans-serif;
		padding: 5px 8px;
		/*border:1px solid #333;*/
	}
	.artclass:hover {
		background-color: blue;
		color: white;
		transition: 0.2s;
	}
	.ul_sb {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #1d2960;
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
	.course_name_header {
		font-family: verdana;
		font-size: 40px;
		text-align: center;
		padding: 100px 10px;
		margin: 0px;
		background-color: #9badff;
		color: white;
	}
	.container {
		/*float: left;*/
	}
	.menu {
		margin-left: 5%;
		width: 19%;
		height: auto;
		float: left;
		/*border: 1px solid red; */
		background-color: white;
		padding: 10px; 
		box-shadow: 0 5px 20px 5px #a8a8a8;
	}
	.main {
		font-family: sans-serif;
		background-color: white;
		/*margin-left: 27%;*/
		width: 69%;
		/*border: 1px solid green;*/
		padding: 20px 15px;
		margin: 10px 0 25px 27%;
		/*box-shadow: 0 5px 20px 5px #a8a8a8;*/
		box-shadow: 0 1px 10px 4px #a8a8a8;
	}
	.status {
		padding: 30px 30px;
		margin: 5% 10%;
		background-color: white;
		box-shadow: 0 1px 10px 4px #a8a8a8;
		font-family: verdana;
		font-size: large;
	}
	button {
		background-color: #639af2;
		padding: 15px 20px;
		color: white;
		border: 0px;
		border-radius: 6px;
	}
	button:hover {
		background-color: #0062ff;
		color: white;
		transition: 0.2s;
		cursor: pointer;
	}
</style>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery-3.1.1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".upload1").click(function(){
			$(".upload2").slideToggle();
		})
	});
</script>

<!-- Jquery off -->

</head>
<body>
<?php
	include("dbconnect.php");
	include("session.php");
	if(isset($_GET['course_id'])) {
		$courseId=$_GET['course_id'];
	}
	// $Name=$_SESSION['Name'];

	

//SmartBar - videos(resourseful videos), vr,ar,link for previous lectures, scholar articles...
// upcoming schedules in popup windowlike alert...
?>

	<ul class="ul_sb">
	  <li><a href="home.php" style="margin-left: 200px;">Home</a></li>

	  <li><a href="home2.php?course_id=<?php echo $courseId; ?>&amp;video=video_id">Resourseful articles</a></li>
	  <li><a href="#">Virtual Reality content</a></li>
	  <li><a href="#">Argument Reality content</a></li>
	  <li><a href="home2.php?course_id=<?php echo $courseId; ?>&amp;videoLect=videoLect_id">Videos &amp; Lectures </a></li>
	  <li><a href="#">About Us</a></li>
	</ul>

<?php
	include("dbconnect.php");

	// $student_info=array();
	// $student_info = $_SESSION['stud_info'];
	// echo $student_info[0];
	// echo $student_info[1];
	
	$allowedExts = array("docx","jpeg","jpg","png","pdf","txt");
	$extension = end(explode(".",$_FILES["file"]["name"]));
	if ((($_FILES["file"]["type"]=="application/docx")
		|| ($_FILES["file"]["type"]=="image/jpeg")
		|| ($_FILES["file"]["type"]=="image/jpg")
		|| ($_FILES["file"]["type"]=="image/png")
		|| ($_FILES["file"]["type"]=="application/pdf")
		|| ($_FILES["file"]["type"]=="application/txt")
	)
		&& ($_FILES["file"]["size"]<200000000)
		&& in_array($extension,$allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		    {
		    echo "Return Code: ".$_FILES["file"]["error"]."<br>";
		    }
		else
		    {

		    echo '<center><div class="status">';
		    echo "<p>File Name: ".$_FILES["file"]["name"]."</p><br>";
		    echo "<p>Type: ".$_FILES["file"]["type"]."</p><br>";
		    echo "<p>Size: ".($_FILES["file"]["size"]/1024)."kB</p><br>";
		    echo "<p>Temp file: ".$_FILES["file"]["tmp_name"]."<p><br>";
		    if (file_exists("uploaded/".$_FILES["file"]["name"]))
		      {       echo '<p>File '.$_FILES["file"]["name"]." already exists.</p>";       }
		    else
	      	   {
	      	    move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded/".$_FILES["file"]["name"]);
      			echo "<p>Stored in: uploaded/".$_FILES["file"]["name"].'</p>';
      		
      		}
  			  }
  	}
		else
{
		    echo "Invalid file";
}
	
	echo '
		<a href="home.php"><button>Home</button></a> &nbsp; <a href="signout.php"><button>Logout</button></a>
	';

echo '</center></div>';
?>
<body>
	<hr>
	<p style="text-align: center;font-family: sans-serif; ">
Developed by-
SmartClasses Inc. 
</p>
</body>