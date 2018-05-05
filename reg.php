<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Registration Page</title>
      <link rel="stylesheet" href="css/login_g.css">
      <style type="text/css">
        body {
          background-image: url("class3.jpg");
          /*background-color: #565656;*/
        }
        body{
  padding:0;
  margin:0;
}
.inner-container{

  width:450px;
  height:1200px;
  position:absolute;
  top:calc(50vh - 300px);
  left:calc(50vw - 200px);
  }
.box{
  position:absolute;
  height:100%;
  width:100%;
  font-family:Helvetica;
  color:#fff;
  background:rgba(0,0,0,0.2);
  padding:30px 0px;
}
.box h1{
  text-align:center;
  margin:30px 0;
  font-size:30px;
}
.box input{
  display:block;
  width:300px;
  margin:20px auto;
  padding:15px;
  background:rgba(0,0,0,0.3);
  color:#fff;
  border:0;
}
.box input:focus,.box input:active,.box button:focus,.box button:active{
  outline:none;
}
.box button{
  background:#742ECC;
  border:0;
  color:#fff;
  padding:10px;
  font-size:20px;
  width:330px;
  margin:20px auto;
  display:block;
  cursor:pointer;
}
.box button:active{
  background:#27ae60;
}
.box p{
  font-size:14px;
  text-align:center;
}
.box p span{
  cursor:pointer;
  color:#666;
}
      </style>
  
</head>

<body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!-- <script src="js/index.js"></script> -->
    <div class="inner-container">
    <div class="box">
    <h1><center>Registration Page</center></h1>

	<form action="reg1.php" method="post">
		Enter Name : <input type="text" name="name" placeholder="Enter Name : "><br>
		Enter Email : <input type="text" name="email" placeholder="Enter Email : "><br>
		Enter password : <input type="password" name="pass" placeholder="Enter password : "><br>
		Enter phone number : <input type="number" name="phone" placeholder="Enter phone number : "><br>
		Enter student ID : <input type="text" name="reg" placeholder="Registration Number"><br>
		Choose sex : <input type="radio" name="sex" value="male">Male &nbsp;&nbsp;
					 <input type="radio" name="sex" value="female">Female
		<br>
		Choose Date of Birth : 
		<input type="date" name="dob" placeholder="Enter D.O.B. : "><br>
		<input type="submit" value="Register kr...">
	</form>

<!-- <p>
  Birthday : <input type="date" name="birthday" required placeholder="Date of Birthday... DD-MM-YYYY ">
</p> -->

</form>
    </div>
</div>
</body>
</html>
