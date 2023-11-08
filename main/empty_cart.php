<?php
// empty_cart.php

// Bắt đầu session
session_start();

// Unset session 'cart'
unset($_SESSION['cart']);
if(isset($_SESSION['id_user'])){
    include('../admin/config/config.php');
    $sql = mysqli_query($mysqli, "DELETE FROM tbl_session_cart WHERE session_user = '".$_SESSION['id_user']."' ");
}
// Chuyển người dùng về trang cart (cart_view.php)
header('Location: cart_view.php');
?>