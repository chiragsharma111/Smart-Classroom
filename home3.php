<!DOCTYPE html>
<html>
<head>
	<title>Course Page</title>

<style type="text/css">
	body {
		margin: 0px;
		background-color: #f8f8f8;
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
		padding: 15px 10px;
		margin: 10px 0 25px 27%;
		/*box-shadow: 0 5px 20px 5px #a8a8a8;*/
		box-shadow: 0 1px 10px 4px #a8a8a8;
	}
</style>
</head>
<body>

	<?php
	include("dbconnect.php");
	include("session.php");
	if(isset($_GET['course_id'])) {
		$courseId=$_GET['course_id'];
	}
	if(isset($_GET['article_name'])) {
		$articleName=$_GET['article_name'];
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
	
	$sql_course="SELECT * FROM course WHERE courseID like '%$courseId%'";
	$qry_course=mysqli_query($dbconnect,$sql_course);
	$rst_course=mysqli_fetch_assoc($qry_course);
	do {
		$course_name=$rst_course['courseName'];
	}while($rst_course=mysqli_fetch_assoc($qry_course));
	echo '<div class="course_name_header">'.$course_name.'</div>';
	echo '<h1>'.$courseId."</h1>";
	echo '<a href="signout.php">Signout</a>';

	$srh_sql="SELECT * FROM article inner join artcourse on (article.articleID=artcourse.articleID and artcourse.courseID = '$courseId');";
		$srh_qry=mysqli_query($dbconnect,$srh_sql);
		if(mysqli_num_rows($srh_qry)!=0) {
			$srh_rst=mysqli_fetch_assoc($srh_qry);
			do{
				echo '<div class="main">';
				echo $srh_rst['articleName'].'<br>';

				echo '	<button class="upload1'.$srh_rst["articleName"].'">
							<a href="home3.php?article_name='.$srh_rst["articleName"].'">Upload</a></button>&nbsp;
					  	<button>Delete</button>&nbsp;
						<button>Download</button>';
				echo '	<div class="upload2'.$srh_rst["articleName"].'">';
				echo '	<form action="uploadkr.php" method="post" enctype="multipart/form-data">
    						Select file to upload:
   					 		<input type="file" name="file" id="fileToUpload">
    						<input type="submit" value="Upload File" name="submit">
						</form>
						</div>
				';			
				echo '</div>';
					}while($srh_rst=mysqli_fetch_assoc($srh_qry));
			}
echo '</div>';

	?>



</body>
</html>