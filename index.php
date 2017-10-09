<?php
   include("databaseFiles/database_connections.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string ($con,$_POST['password']); 
	  $mypassword = md5($mypassword); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		  $_SESSION['myusername']="myusername";
         /* session_register("myusername"); */
         $_SESSION['login_user'] = $myusername;
         
         header("location: crud_page.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>CRUD Login Form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel="stylesheet" href="css/login_style.css">
</head>
<body>
<div class="pen-title">
  <h1>CRUD Login Form</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle">
    
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form method="post" action="#">
      <input type="text" placeholder="Username" name="username"/>
      <input type="password" placeholder="Password" name="password"/>
      <button>Login</button>
    </form>
  </div>

 
</div>



</body>
</html>
