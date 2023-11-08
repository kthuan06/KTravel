<?php
	session_start();
    include('../admin/config/config.php');

    if(isset($_POST['Register'])){
        $username = $_POST['Username'];
        $phonenumber = $_POST['TelephoneNumber'];
        $password = md5($_POST['Password']);
        $address = $_POST['Address'];
        $email = $_POST['Email'];
        $sql_register = mysqli_query($mysqli, "INSERT INTO 
		tbl_register(register_name, register_phonenumber, register_password, register_address, register_email)
		VALUES ('".$username."', '".$phonenumber."','".$password."','".$address."','".$email."')");
		if(isset($_SESSION['cart'])){
			$string = implode($_SESSION['cart']);
			$sql_add_sscart = mysqli_query($mysqli, "INSERT INTO tbl_session_cart(session_user, session_cart)
			VALUES ('".$email."', '".$string."')") ;
		}


		if($sql_register){
			$_SESSION['Register'] = $username;

			$_SESSION['id_user'] = mysqli_insert_id($mysqli);
			header('Location:http://localhost/DACS2/index.php');
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
<link rel="stylesheet" href="../css/register.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<style>
	.email{
		width: 85%;
    padding: 15px 66px 15px 19px;
    text-align: left;
    background-color: rgba(0, 0, 0, 0.16);
    border: 0;
    border-left: 2px solid #00c6d7;
    font-size: 15px;
    letter-spacing: 1.5px;
    color: #fff;
    outline: 0;
    -webkit-box-shadow: 0 6px 12px 0 rgb(37, 37, 37);
    -moz-box-shadow: 0 6px 12px 0 rgb(37, 37, 37);
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.4);
    font-family: 'Open Sans', sans-serif;
	}
</style>
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
                                        <input type="text" name="Username" placeholder="Họ tên" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
								</div>
								<div class="form-sub-w3">
                                        <input type="text" name="TelephoneNumber" placeholder="Số điện thoại" required="" />
                                    <div class="icon-w3">
                                         <i class="fa-solid fa-phone" aria-hidden="true"></i>
								    </div>
								</div>
                                <div class="form-sub-w3">
                                        <input type="password" name="Password" placeholder="Mật khẩu" required="" />
                                    <div class="icon-w3">
                                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
								    </div>
								</div>
                                <div class="form-sub-w3">
                                        <input type="text" name="Address" placeholder="Địa chỉ" required="" />
                                    <div class="icon-w3">
                                       <i class="fa-solid fa-location-dot" aria-hidden="true"></i>    
								    </div>
								</div>
                               
                                <div class="form-sub-w3">
                                        <input class="email" type="email" name="Email" placeholder="Email" required="" />
                                    <div class="icon-w3">
                                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
								    </div>
								</div>
								<!-- <label class="anim">
								<input type="checkbox" class="checkbox">
									<span>Remember Me</span> 
									<a href="#">Forgot Password</a>
								</label>  -->
								<div class="clear"></div>
								<div class="submit-agileits">
									<input type="submit" name="Register" value="Đăng kí">
									
								</div>
								<div class="submit-agileits">
								<a href="login.php" style="font-weight: bold; color: white;">Đăng nhập</a>
									
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