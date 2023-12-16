<?php
session_start();
include('../admin/config/config.php');
use PHPMailer\PHPMailer\PHPMailer;

          require "../PHPMailer/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
          require "../PHPMailer/src/SMTP.php"; //nhúng thư viện vào để dùng
          require '../PHPMailer/src/Exception.php'; //nhúng thư viện vào để dùng

    $mail = new  PHPMailer(true); //true: enables exceptions
    try {
      //  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $nguoigui = 'kttravel06@gmail.com';
        $matkhau = 'bhbncdlurpnldamu';
        $tennguoigui = 'KT TRAVEL';
        $mail->Username = $nguoigui; // SMTP username
        $mail->Password = $matkhau;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom($nguoigui, $tennguoigui);
        $sql = mysqli_query($mysqli, "SELECT *FROM tbl_cart WHERE code_cart = '".$_SESSION['cart_code']."'  ");
        while($row = mysqli_fetch_array($sql)){
            $to = $row['cart_email'];
            $to_name = $_GET['cart_name'];
        }
        

        $mail->addAddress($to, $to_name); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "Đơn hàng của bạn";
		$noidungthu1 = ' <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><b>Xin chào</b></h3>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">Mã đơn hàng:' .$_SESSION['cart_code']. '<br>
                    <p>Chi tiết: </p>
                </div>
                </div> ';

        foreach( $_SESSION['cart'] as $key => $item ) {
            $total = number_format($item['total'], 0, ',','.');
            $noidungthu2= '<p>'.$item['name'].' : Số lượng : '.$item['qty'].' : Giá : '. $total.'</p>';
            $noidung = $noidung.$noidungthu2;
        }
        
        
        function get_subtotal() {
            $subtotal = 0;
            foreach ($_SESSION['cart'] as $item) {
                $subtotal += $item['total'];
            }
            $subtotal_f = number_format($subtotal, 0, ',' ,'.');
            return $subtotal_f;
        }
        
        
        $noidungthu3 = 'Tổng số tiền: '.get_subtotal();;
        
        $noidungthu4 = '<div>   
        Chúc bạn một ngày tốt lành!</p>
        <h2>TRÂN TRỌNG, KT TRAVEL</h2>   </div> ';
        $mail->Body =  $noidungthu1.$noidung.$noidungthu3.$noidungthu4 ;	
			
        if($mail->send())
		   {
            unset($_SESSION['cart_code']);
            unset($_SESSION['cart']);
			header("Location:http://localhost/DACS2/index.php");
		   }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }	



?>