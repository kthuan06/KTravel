<?php

    include('admin/config/config.php');
    
    $id_user = $_SESSION['id_user'];
    $code_order = rand(0,9999);
    
    $insert_cart = " INSERT INTO tbl_cart(id_user, code_cart, cart_status) 
    VALUES  ('".$id_user."', '".$code_order."', 1) ";
    $query = mysqli_query($mysqli, $insert_cart);

    $sql = mysqli_query($mysqli, "DELETE FROM tbl_session_cart WHERE session_user = '".$_SESSION['id_user']."' ");
    
    

    if($insert_cart){
        foreach($_SESSION['cart'] as $key => $value){
            $code_product = $value['code'];
            $amount = $value['qty'];
            $insert_cart_details = "INSERT INTO tbl_cart_details(code_cart, id_product, amout_product) VALUES ('".$code_order."','".$code_product."','".$amount."')";
            $query_cart_details = mysqli_query($mysqli, $insert_cart_details);
        }
    }

    unset($_SESSION['cart']);

?>