<?php
    include('../config/config.php');
    use PHPMailer\PHPMailer\PHPMailer;

        require "../../PHPMailer/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
        require "../../PHPMailer/src/SMTP.php"; //nhúng thư viện vào để dùng
        require '../../PHPMailer/src/Exception.php'; //nhúng thư viện vào để dùng
            if (isset($_GET['email']) && $_GET['type'] == 'confirm') {
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
                $to = $_GET['email'];
                $to_name = '';
                $date = date("d-m-Y");

                $date2 = date("d-m-Y", strtotime("+3 days"));

                $mail->addAddress($to, $to_name); //mail và tên người nhận  
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = "Đơn hàng của bạn đã được gửi: ".$_GET['id'];
                $noidungthu = ' <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><b>Xin chào ' . $to_name . '</b></h3>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <p class="card-text">Chúng tôi xin gửi lời cảm ơn đặt hàng của bạn tại KTRAVEL.
                        Chúng tôi xin thông báo rằng đơn hàng của bạn đã được gửi đi và chúng tôi sẽ cung cấp thông tin vận chuyển dưới đây:</p>
                        <ul>
                         <li>Mã số đơn hàng:'. $_GET['id'] .'</li>
                         <li>Ngày gửi hàng:'. $date .'</li>
                         <li>Phương thức vận chuyển: GHTK</li>
                         <li>Ngày nhận hàng:'. $date2 .'(dự kiến)</li>
                        </ul>
                            <h2>TRÂN TRỌNG, KT TRAVEL</h2>
                        </div>
                        </div> ';
                $mail->Body =  $noidungthu;	
                    
                if($mail->send())
                {
                    header("Location:http://localhost/DACS2/admin/index.php");
                }
                } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                }

}
?>