<?php

include('../../config/config.php');
 
    $nameProduct = $_POST['product'];
    $code_product = $_POST['code_product'];
    $start_location_product = $_POST['start_location_product'];
    $location_product = $_POST['location_product'];
    $price_product = $_POST['price_product'];
    $detail_product = $_POST['detail_product'];
    $like_product = $_POST['like_product'];
    $time_start_product = $_POST['time_start_product'];
    $time_product = $_POST['time_product'];
    $vehicle_product = $_POST['vehicle_product'];
    $locations_product = $_POST['locations_product'];
    $amthuc_product = $_POST['amthuc_product'];
    $hotel_product = $_POST['hotel_product'];
    $timelt_product = $_POST['timelt_product'];
    $object_product = $_POST['object_product'];
    $promotion_product = $_POST['promotion_product'];
    $day1_product = $_POST['day1_product'];
    $day2_product = $_POST['day2_product'];
    $day3_product = $_POST['day3_product'];
    $day4_product = $_POST['day4_product'];

    //xu li hinh anh

    $img_product = $_POST['img_product'];
    $img_product1 = $_POST['img_product1'];
    $img_product2 = $_POST['img_product2'];
    $img_product3 = $_POST['img_product3'];
    $img_product4 = $_POST['img_product4'];

    
    if(isset($_POST['addproduct'])){

        //add
        $sql =  "INSERT INTO tbl_product (product_name, product_code, product_start, product_location, product_price,
         product_detail, product_img, img_product1, img_product2, img_product3, img_product4, product_like, product_timestart, product_time, product_vehicle,
         product_locations, product_at, product_hotel, product_timelt, product_object,
        product_promotion, product_day1, product_day2, product_day3, product_day4)
         VALUES ('".$nameProduct."','".$code_product."','".$start_location_product."','".$location_product."','".$price_product."',
         '".$detail_product."','".$img_product."' ,'".$img_product1."' ,'".$img_product2."' ,'".$img_product3."' ,'".$img_product4."','".$like_product."','".$time_start_product."','".$time_product."','".$vehicle_product."',
         '".$locations_product."','".$amthuc_product."','".$hotel_product."','".$timelt_product."','".$object_product."',
         '".$promotion_product."','".$day1_product."','".$day2_product."','".$day3_product."','".$day4_product."')";
        mysqli_query($mysqli, $sql);

   

        header('Location:../../index.php?action=product&query=add');
    }elseif(isset($_POST['editproduct'])){
        
        //edit
        $sql_update = "UPDATE tbl_product SET product_name = '".$nameProduct."' , product_code = '".$code_product."',
        product_start = '".$start_location_product."',product_location = '".$location_product."',
        product_price = '".$price_product."' , product_detail = '".$detail_product."',
        product_img = '".$img_product."' , img_product1 = '".$img_product1."', img_product2 = '".$img_product2."' , img_product3 = '".$img_product3."',
        img_product4 = '".$img_product4."' , product_like = '".$like_product."', product_timestart = '".$time_start_product."' , product_time = '".$time_product."',
        product_vehicle = '".$vehicle_product."' ,  product_locations = '".$locations_product."',product_at = '".$amthuc_product."',
        product_hotel = '".$hotel_product."', product_timelt = '".$timelt_product."' , product_object = '".$object_product."' ,
         product_promotion = '".$promotion_product."' , product_day1 = '".$day1_product."',
        product_day2 = '".$day2_product."' , product_day3 = '".$day3_product."', product_day4 = '".$day4_product."'

        
        WHERE product_id = '$_GET[id]'";
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=product&query=add');

    }else{
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM tbl_product WHERE 	product_id ='".$id."' ";
        mysqli_query($mysqli, $sql_delete); 
        header('Location:../../index.php?action=product&query=add');
    }



?>