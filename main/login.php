<?php
	session_start();
	include('../admin/config/config.php');
	function add($data2, $data, $key){
		$item = array(
			'name' => $data2['product_name'],
			'code' => $data2['product_code'],
			'image' => $data2['product_img'] ,
			'cost' => $data2['product_price'],
			'qty'  => $data['product_amount'],
			'total' => $data2['product_price'] * $data['product_amount']
		);
		$_SESSION['cart'][$key] = $item;
		
	}
	if(isset($_POST['Login'])){
		$username = $_POST['Username'];
		$password = md5($_POST['Password']);
		$sql1 = "SELECT * FROM tbl_register WHERE register_phonenumber = '".$username."' AND register_password = '".$password."'  LIMIT 1";
		$sql2 = "SELECT * FROM tbl_register WHERE register_email = '".$username."' AND register_password = '".$password."'  LIMIT 1";
		$row1 = mysqli_query($mysqli, $sql1);
		$row2 = mysqli_query($mysqli, $sql2);
		$count1 = mysqli_num_rows($row1);
		$count2 = mysqli_num_rows($row2);
		if(isset($_SESSION['cart'])){
			unset($_SESSION['cart']);
		}
		if($count1 > 0){
			$row_data = mysqli_fetch_array($row1);
			
			$_SESSION['Register'] = $row_data['register_name'];
			$_SESSION['id_user'] = $row_data['register_id'];
			
			header("Location:http://localhost/DACS2/index.php");
		}elseif($count2 > 0){
			$row_data = mysqli_fetch_array($row2);
			$_SESSION['Register'] = $row_data['register_name'];
			$_SESSION['id_user'] = $row_data['register_id'];
			
			$sql_query_iduser = mysqli_query($mysqli, "SELECT * FROM tbl_session_cart WHERE session_user = '".$_SESSION['id_user']."' ");
			$item;
			while($data = mysqli_fetch_array($sql_query_iduser)){
				$sql_add_item = mysqli_query($mysqli, "SELECT * FROM tbl_product WHERE product_code = '".$data['session_cart']."' ");
				while($data2 = mysqli_fetch_array($sql_add_item)){
					add($data2, $data, $data['session_cart']);
				}
			}
		

			header("Location:http://localhost/DACS2/index.php");
		}
		else{
			
		}
		
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LOGIN</title>
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
						<!-- autocomplete="off" -->
							<form action=""  method="post">
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
								<label class="anim" style="display: flex; justify-content: space-between;">
								<!-- <input type="checkbox" class="checkbox">
									<span>Remember Me</span>  -->
                                    <a href="register.php">Đăng kí</a>
									<a href="#">Quên mật khẩu</a>
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