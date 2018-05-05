<!-- Download button -->
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
		border-radius: 8px;
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
		border-radius: 8px;
	}
	.ul111 {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    /*width: 20%;*/
	    background-color: white;
	    /*position: fixed;*/
	    /*height: 100%;*/
	    overflow: auto;
	}

	.ul111 li a {
		text-align: center;
	    display: block;
	    color: #000;
	    padding: 10px 15px;
	    text-decoration: none;
	}

	.ul111 li a:hover {
	    background-color: #555;
	    color: white;
	    transition: 0.2s;
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
	include("nav.php");


	$sql_course="SELECT * FROM course WHERE courseID like '%$courseId%'";
	$qry_course=mysqli_query($dbconnect,$sql_course);
	$rst_course=mysqli_fetch_assoc($qry_course);
	do {
		$course_name=$rst_course['courseName'];
	}while($rst_course=mysqli_fetch_assoc($qry_course));
	echo '<div class="course_name_header">'.$course_name.'</div>';
	echo '<center><h1 style="font-family: "]>Welcome to the very first Lecture - '.$courseId."</center></h1><br>";

echo '
<div class="container">
	<div class="menu">';
		

		echo '<ul class="ul111"';
		$sql2="SELECT * FROM COURSE INNER JOIN stucourse ON course.courseID=stucourse.courseID and stucourse.studID='$studID';";
		$qry2 = mysqli_query($dbconnect,$sql2);
		$rst2= mysqli_fetch_assoc($qry2);
			if(mysqli_num_rows($qry2)!=0){
				echo '<li style="background-color:white;font-size:15px;">The List of courses:</li>';
				do{
					echo '<li><a href="home2.php?course_id='.$rst2['courseID'].'">'.$rst2['courseID'].'-'.$rst2['courseName']."</a></li>";
				}while($rst2=mysqli_fetch_assoc($qry2));
			}
	echo '</ul>';
	echo '</div>';

echo '
		<div class="main">
		<b style="font-size:25px;">Welcome Students,</b><br><br>
		This is the introduction of the new class of <b>'.$course_name.'</b>, we are trying to make this classroom a wonderful place to study.
		</div>
';

		$counter=1;
		$srh_sql="SELECT * FROM article inner join artcourse on (article.articleID=artcourse.articleID and artcourse.courseID = '$courseId');";
		$srh_qry=mysqli_query($dbconnect,$srh_sql);
		if(mysqli_num_rows($srh_qry)!=0) {
			$srh_rst=mysqli_fetch_assoc($srh_qry);
			do{
				echo '<div class="main">';
				echo '<b style="font-size:20px;">Article '.$counter.'. '.$srh_rst['articleName'].'</b><hr>';
				echo 'Students can answer the question in the following ways: <br><br>';
				echo '	<button class="upload1">
							Upload</button>&nbsp;
						<button>Download</button><br><br>';
				echo '	<div class="upload2">';
				echo '	<form action="uploadkr.php" method="post" enctype="multipart/form-data">
    						Select file to upload:
   					 		<input type="file" name="file" id="fileToUpload">
    						<input type="submit" value="Upload File" name="submit">
						</form>
						</div>
				';			
				echo '</div>';
				$counter+=1;
					}while($srh_rst=mysqli_fetch_assoc($srh_qry));
			}
echo '</div>';

//Smartbar ENDS...

echo '<pre>

	</pre>';
	
// <a href="home3.php?article_name='.$srh_rst["articleName"].'">
// print_r($srh_rst["articleName"]);
?>
<hr>
<p style="text-align: center;font-family: sans-serif; ">
Developed by-
SmartClasses Inc. 
</p>
</body>
</html>