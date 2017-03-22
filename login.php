<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Love Advice</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

	<link rel="shortcut icon" href="img/icons/la_logo.png">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
            background-image: url("img/background_img3.jpg");
        }
    </style>
</head>

  <body background: url('img/background_img3.jpg') >

    <div class="container">

      <form class="login-form" action="login.php" method="post">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
			<p><strong>Enter username and password to log in:</strong></p>
            <div class="input-group">
              <span class="input-group-addon" "required"><i class="icon_profile"></i></span>
              <input value="admin" type="text" class="form-control" placeholder="Username:" name="username" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon" "required"><i class="icon_key"></i></span>
                <input value="admin" type="password" class="form-control" placeholder="Password:" name="password" required>
            </div>
                <span class="pull-right"> <a href="#"><b> Forgot Password?</b></a></span>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
        </div>
      </form>

    </div>

	<?php

	 include('include/mysqli_connection.php');

	 if(isset($_POST['submit']))
	 {

	 $admin_username= $dbcon->real_escape_string(trim($_POST["username"]));
	 $admin_password= $dbcon->real_escape_string(trim($_POST["password"]));

	 $check_admin_user="select * from admin_tbl WHERE username = '$admin_username' and password = '$admin_password'";

	 $run_admin=mysqli_query($dbcon,$check_admin_user);

	 if(mysqli_num_rows($run_admin))
	 {
		echo "<script>window.open('basic_table.php','_self')</script>";

		$_SESSION['username']=$admin_username;
	 }
	 else {
		 echo "<script>alert('Username or Password is incorrect!')</script>";
		}
	 }
	?>
  </body>
</html>
