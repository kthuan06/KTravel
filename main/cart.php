<?php
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();


    function add_item($key, $amount) {
        
        if ($amount < 1) return;
    
        // If item already exists in cart, update amount
        if (isset($_SESSION['cart'][$key])) {
            $amount += $_SESSION['cart'][$key]['qty'];
            update_item($key, $amount);
            return;
        }
        include('../admin/config/config.php');
        $sql = "SELECT *FROM tbl_product WHERE product_code = '$_GET[id]'";
        $query = mysqli_query($mysqli , $sql);
        $row = mysqli_fetch_array($query);
        // Add item
        $cost = $row['product_price'];
        $total = $cost * $amount;
        $item = array(
            'name' => $row['product_name'],
            'image' => $row['product_img'],
            'cost' => $cost, 
            'qty'  => $amount,
            'total' => $total
        );
        $_SESSION['cart'][$key] = $item;
    }

    function update_item($key, $amount) {
        $amount = (int) $amount;
        if (isset($_SESSION['cart'][$key])) {
            if ($amount <= 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['qty'] = $amount;
                $total = $_SESSION['cart'][$key]['cost'] *
                         $_SESSION['cart'][$key]['qty'];
                $_SESSION['cart'][$key]['total'] = $total;
            }
        }
    }
    
   
    function get_subtotal() {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['total'];
        }
        $subtotal_f = number_format($subtotal, 2);
        return $subtotal_f;
    }







    if (empty($_SESSION['cart'])) { $_SESSION['cart'] = array(); }
    
    $main = filter_input(INPUT_POST, 'main');
    if ($main === NULL) {
        $main = filter_input(INPUT_GET, 'main');
        if ($main === NULL) {
            $main = 'cart';
        }
    }

    // switch($main) {
    //     case 'add':
    //         $product_key = filter_input(INPUT_POST, 'productkey');
    //         $item_qty = filter_input(INPUT_POST, 'itemqty');
    //         add_item($product_key, $item_qty);
    //         include('cart_view.php');
    //         break;
    //     case 'update':
    //         $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
    //                                      FILTER_REQUIRE_ARRAY);
    //         foreach($new_qty_list as $key => $qty) {
    //             if ($_SESSION['cart'][$key]['qty'] != $qty) {
    //                 update_item($key, $qty);
    //             }
    //         }
    //         include('cart_view.php');
    //         break;
    //     case 'show_cart':
    //         include('cart_view.php');
    //         break;
    //     case 'show_add_item':
    //         include('add_item_view.php');
    //         break;
    //     case 'empty_cart':
    //         unset($_SESSION['cart']);
    //         include('cart_view.php');
    //         break;
    // }


?>