<?php

    session_start();
    include('../admin/config/config.php');
    if(isset($_SESSION['cart']) && isset($_GET['delete'])){
        if(isset($_SESSION['id_user'])){
            
            $sql = mysqli_query($mysqli, "DELETE FROM tbl_session_cart WHERE session_user = '".$_SESSION['id_user']."' AND session_cart = '".$_GET['delete']."' ");
        }
         $id = $_GET['delete'];
         foreach($_SESSION['cart'] as $key => $item){
            if($item['code'] == $id){
                unset($_SESSION['cart'][$key]);
                header('Location: cart_view.php');
            }
         }
    }
    if(isset($_SESSION['id_user'])){

    }
//them so luong
    if (isset($_SESSION['cart']) && isset($_GET['add'])) {
        $id = $_GET['add'];
        $cart_item = array(); // Khởi tạo mảng mới để chứa sản phẩm
        if(isset($_SESSION['id_user'])){
            $sql = mysqli_query($mysqli, "SELECT *FROM tbl_session_cart WHERE
            session_user = '".$_SESSION['id_user']."' AND session_cart = '".$id."' ");

            while($data = mysqli_fetch_array($sql)){
                $update_amount = $data['product_amount'] + 1 ;
                $sql_update = mysqli_query($mysqli, "UPDATE tbl_session_cart SET product_amount = '".$update_amount."'");
            }
        }
         

        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['code'] != $id) {
                $cart_item[] = array(
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'image' => $item['image'],
                    'cost' => $item['cost'],
                    'qty' => $item['qty'],
                    'total' => $item['total']
                );
            } else {
                $add = $item['qty'] + 1;
                $cart_item[] = array(
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'image' => $item['image'],
                    'cost' => $item['cost'],
                    'qty' => $add,
                    'total' => $item['cost'] * $add // Cập nhật tổng tiền
                );
            }
        }
    
        $_SESSION['cart'] = $cart_item; // Lưu lại giỏ hàng đã cập nhật
        header('Location: cart_view.php');
    }
//Tru so luong
    if (isset($_SESSION['cart']) && isset($_GET['sub'])) {
        $id = $_GET['sub'];
        $cart_item = array(); // Khởi tạo mảng mới để chứa sản phẩm
        if(isset($_SESSION['id_user'])){
            $sql = mysqli_query($mysqli, "SELECT *FROM tbl_session_cart WHERE
            session_user = '".$_SESSION['id_user']."' AND session_cart = '".$id."' ");

            while($data = mysqli_fetch_array($sql)){
                $update_amount = $data['product_amount'] - 1  ;
                $sql_update = mysqli_query($mysqli, "UPDATE tbl_session_cart SET product_amount = '".$update_amount."'");
            }
        }
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['code'] != $id) {
                $cart_item[] = array(
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'image' => $item['image'],
                    'cost' => $item['cost'],
                    'qty' => $item['qty'],
                    'total' => $item['total']
                );
            } else {
                $sub = $item['qty'] - 1;
                if ($sub < 1) {
                    // Nếu số lượng là 0 hoặc âm, loại bỏ sản phẩm khỏi giỏ hàng
                    $sql = mysqli_query($mysqli, "DELETE FROM tbl_session_cart WHERE
                    session_user = '".$_SESSION['id_user']."' AND session_cart = '".$id."' ");
                    continue;
                   
                }
                $cart_item[] = array(
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'image' => $item['image'],
                    'cost' => $item['cost'],
                    'qty' => $sub,
                    'total' => $item['cost'] * $sub // Cập nhật tổng tiền
                );
            }
        }
    
        $_SESSION['cart'] = $cart_item; // Lưu lại giỏ hàng đã cập nhật
        header('Location: cart_view.php');
    
    }
    
    
?>