<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['Login'])){
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$sql = "SELECT * FROM tbl_admin WHERE username = '".$username."' AND password = '".$password."'  LIMIT 1";
		$row = mysqli_query($mysqli, $sql);
		$count = mysqli_num_rows($row);
		if($count > 0){
			$_SESSION['Login'] = $username;
			header("Location:index.php");
		}else{

		}
		
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Glassy Login Form A Responsive Widget Template :: w3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../css/login_admin.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1>KTRALVER</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
						
							<form action="" autocomplete="off" method="post">
								<div class="form-sub-w3">
									<input type="text" name="Username" placeholder="Username " required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="Password" placeholder="Password" required="" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
								</div>
								<label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Remember Me</span> 
									<a href="#">Forgot Password</a>
								</label> 
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" name="Login" value="Login">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		
		<!--//footer-->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body> 
</html>