<?php

    include('admin/config/config.php');
    require_once("config_vnpay.php");

    $id_user = $_SESSION['id_user'];
    function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
    
   
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }
   
    return $subtotal;
}


    $subtotal = number_format(get_subtotal(), 0, ',','.');
    
    $_SESSION['cart_code'] = generateRandomString(10); 
    if(isset($_POST['off'])){

        $insert_cart = " INSERT INTO tbl_cart(id_user, code_cart, cart_status, cart_payments, cart_price, cart_name, cart_email, cart_phone, cart_address, cart_note) 
        VALUES  ('".$id_user."', '".$_SESSION['cart_code']."', 1, 1, '".$subtotal."', '".$_POST['name_customer']."', '".$_POST['email_customer']."', '".$_POST['phone_customer']."', '".$_POST['address_customer']."', '".$_POST['note']."') ";
        $query = mysqli_query($mysqli, $insert_cart);

        $sql = mysqli_query($mysqli, "DELETE FROM tbl_session_cart WHERE session_user = '".$_SESSION['id_user']."' ");
        
        

        if($insert_cart){
            foreach($_SESSION['cart'] as $key => $value){
                $code_product = $value['code'];
                $amount = $value['qty'];
                $insert_cart_details = "INSERT INTO tbl_cart_details(code_cart, id_product, amout_product) VALUES ('".$_SESSION['cart_code']."','".$code_product."','".$amount."')";
                $query_cart_details = mysqli_query($mysqli, $insert_cart_details);
            }
        }
    }elseif(isset($_POST['on'])){
        //vnpay
        $vnp_TxnRef = $_SESSION['cart_code']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán VNPAY';
        $vnp_OrderType = 'other';
        $vnp_Amount = get_subtotal() * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $expire;
        //Billing
                                          
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
                                            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                                            // "vnp_Bill_Email"=>$vnp_Bill_Email,
                                            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                                            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                                            // "vnp_Bill_Address"=>$vnp_Bill_Address,
                                            // "vnp_Bill_City"=>$vnp_Bill_City,
                                            // "vnp_Bill_Country"=>$vnp_Bill_Country,
                                            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                                            // "vnp_Inv_Email"=>$vnp_Inv_Email,
                                            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                                            // "vnp_Inv_Address"=>$vnp_Inv_Address,
                                            // "vnp_Inv_Company"=>$vnp_Inv_Company,
                                            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                                            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );

       
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // header('Location: ' . $vnp_Url);
        
        
    }
        if(isset($_POST['off'])){

            
?>

<div class="mx-20 bg-white text-center p-5" >
    <img src="images/payment-success.jpg" class="mx-auto w-2/12" alt="" >
    <p class="font-bold mt-5">ĐẶT HÀNG THÀNH CÔNG</p>
    <p class="mb-5">Cám ơn bạn đã đặt hàng tại KTRAVEL</p>
    <a href="http://localhost/DACS2/main/mailconfirm.php">
        <button class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" >Hoàn tất</button>
    </a>
</div>
<?php
}else{

    ?>
    <div class="mx-20 bg-white text-center p-5" >
    <img src="images/payment-success.jpg" class="mx-auto w-2/12" alt="" >
    <p class="font-bold mt-5">THANH TOÁN QUA VNPAY</p>
    <p class="mb-5">Cám ơn bạn đã đặt hàng tại KTRAVEL</p>
    <a href="<?php echo  $vnp_Url ?> ">
        <button class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" >Chuyển đến trang thanh toán</button>
    </a>
</div>
    <?php
}
?>