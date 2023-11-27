<?php

    include('admin/config/config.php');
    
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
    $subtotal_f = number_format($subtotal, 2);
    return $subtotal_f;
}

    $subtotal = get_subtotal();
    
    $_SESSION['cart_code'] = generateRandomString(10); 
    
    $insert_cart = " INSERT INTO tbl_cart(id_user, code_cart, cart_status, cart_price, cart_name, cart_email, cart_phone, cart_address, cart_note) 
    VALUES  ('".$id_user."', '".$_SESSION['cart_code']."', 1, '".$subtotal."', '".$_POST['name_customer']."', '".$_POST['email_customer']."', '".$_POST['phone_customer']."', '".$_POST['address_customer']."', '".$_POST['note']."') ";
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
   
    
?>
<div class="mx-20 bg-white text-center p-5" >
    <img src="images/payment-success.jpg" class="mx-auto w-2/12" alt="" >
    <p class="font-bold mt-5">ĐẶT HÀNG THÀNH CÔNG</p>
    <p class="mb-5">Cám ơn bạn đã đặt hàng tại KTRAVEL</p>
    <a href="http://localhost/DACS2/main/mailconfirm.php">
        <button class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" >Trang chủ</button>
    </a>
</div>