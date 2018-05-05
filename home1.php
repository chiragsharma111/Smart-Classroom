<style>
    body {
    	margin: 0;
    }
	.card a{
		padding: 10px 15px;
		text-align: center;
		width: 18%;
		height: 100px;
		background-color: #e8e8e8;
		float: left;
		text-decoration: none;
		font-family: sans-serif;
		color: #333;
	}
	.card a:hover {
		background-color: #333;
		color: white;
		cursor: pointer;
		transition: 0.2s;
	}
</style>
<?php
	include("dbconnect.php");
	// include("session.php");
	include("nav.php");

if(!isset($_GET['submit'])) {
	$srh=$_GET['course_search'];
	$srh = preg_replace("#[^0-9A-Za-z]#i","",$srh);
	$srh_sql="SELECT * FROM course WHERE courseName like '%$srh%'";
	$srh_qry=mysqli_query($dbconnect,$srh_sql);
	echo "Results found: ".mysqli_num_rows($srh_qry)."<br>";
	if(mysqli_num_rows($srh_qry)!=0) {
		$srh_rst=mysqli_fetch_assoc($srh_qry);
		do{
?>
				<p class="card"><a href="home2.php?course_id=<?php echo $srh_rst['courseID']; ?>">	

<?php
				echo $srh_rst['courseID'].'<br>'.$srh_rst['courseName'].'</a></p>';
			
				
				}while($srh_rst=mysqli_fetch_assoc($srh_qry));
		}
	else {
		echo "No result found";
	}
	}


?>
<body>
	<hr>
	<p style="text-align: center;font-family: sans-serif; ">
Developed by-
SmartClasses Inc. 
</p>
	</body>