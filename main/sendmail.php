<?php
include('../admin/config/config.php');
use PHPMailer\PHPMailer\PHPMailer;

          require "../PHPMailer/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
          require "../PHPMailer/src/SMTP.php"; //nhúng thư viện vào để dùng
          require '../PHPMailer/src/Exception.php'; //nhúng thư viện vào để dùng
if (isset($_GET['email'])) {
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
        $to_name = $_GET['name'];

        $mail->addAddress($to, $to_name); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "Xác nhận đăng ký thành công";
		$noidungthu = ' <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><b>Xin chào ' . $to_name . '</b></h3>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">Chúng tôi đánh giá cao sự tin tưởng của bạn và cam kết cung cấp dịch vụ tốt nhất cho bạn.
<br>
                    Nếu bạn cần bất kỳ hỗ trợ nào hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email này. Chúng tôi luôn sẵn sàng để hỗ trợ bạn.
 <br>                   
                    Chúc bạn một ngày tốt lành!</p>
                    <h2>TRÂN TRỌNG, KT TRAVEL</h2>
                </div>
                </div> ';
        $mail->Body =  $noidungthu;	
			
        if($mail->send())
		   {
			header("Location:http://localhost/DACS2/index.php");
		   }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }	
}elseif(isset($_POST['newsletter'])){
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
        $to = $_POST['email'];
        $to_name = 'bạn';
        

        $mail->addAddress($to, $to_name); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "Hỗ trợ khách hàng";
		$noidungthu = ' <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><b>Xin chào ' . $to_name . '</b></h3>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">Cảm ơn bạn đã liên hệ với chúng tôi để được hỗ trợ. Chúng tôi rất tiếc về sự bất tiện mà bạn đang gặp phải.
<br>
                    Chúng tôi sẽ nhanh chóng liên hệ với bạn để giải quyết vấn đề
 <br>                   
                    Chúc bạn một ngày tốt lành!</p>
                    <h2>TRÂN TRỌNG, KT TRAVEL</h2>
                </div>
                </div> ';
        $mail->Body =  $noidungthu;	
        if($mail->send())
        {
         header("Location:http://localhost/DACS2/index.php");
        }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }	
}else{
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

        $sql = mysqli_query($mysqli, "SELECT *FROM tbl_register WHERE register_id = '".$_SESSION['id_user']."' LIMIT 1 ");
        while($row = mysqli_fetch_array($sql)){
            $to = $row['register_email'];
            $to_name = $row['register_name'];
            

            $mail->addAddress($to, $to_name); //mail và tên người nhận  
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = "Đặt hàng thành công - [".$_GET['code']."]";
            $noidungthu = ' <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><b>Chào ' . $to_name . '</b></h3>
                        
                        
                        <p>Mã đơn hàng của bạn:'.$_GET['code'].'</p>
                        
                        
                       
                        <p class="card-text">Chúng tôi sẽ tiếp tục cập nhật với bạn về tình trạng của đơn hàng và thông tin vận chuyển trong thời gian sắp tới.
    <br>
    Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ, vui lòng liên hệ với chúng tôi thông qua email này.
    <br>                   
    Chúng tôi xin chân thành cảm ơn sự tin tưởng của bạn và hy vọng bạn sẽ hài lòng với sản phẩm của mình.
    <br>
                        Chúc bạn một ngày tốt lành!</p>
                        <h2>TRÂN TRỌNG, KT TRAVEL</h2>
                    </div>
                    </div> ';
            $mail->Body =  $noidungthu;	
        }

      
        if($mail->send())
        {
         header("Location:http://localhost/DACS2/index.php");
        }
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }	
}


?>