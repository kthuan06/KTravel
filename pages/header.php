<?php
    if(isset($_GET['logout']) && $_GET['logout'] == 1){
        unset($_SESSION['cart']);
        unset($_SESSION['Register']);
        unset($_SESSION['id_user']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/popup.css">
    <link rel="stylesheet" href="../js/popup.js">
</head>


<body class="bg-white">
    <div class="header">
        <ul class="menu flex justify-around bg-blue-500 font-bold text-white">
            <?php
                include('admin/config/config.php');
                

                $sql_select_menu = "SELECT *FROM list_menu";
                $query = mysqli_query($mysqli, $sql_select_menu);
            
                while($row = mysqli_fetch_array($query)){
            ?>
                 <li><a class="" href="<?php echo $row['list_address']?>"><?php echo $row['list_name']?></a>
                    <ul class="sub-menu">
                    <?php
        
                        $sql_select_menu_item = "SELECT *FROM list_menu_item WHERE item_type = '".$row['list_code']."'";
                        $query_item = mysqli_query($mysqli, $sql_select_menu_item);
                    
                        while($row1 = mysqli_fetch_array($query_item)){
                    ?>
                        <li><a href="<?php echo $row1['item_address']?>"><?php echo $row1['item_name']?></a></li>
                        <?php
                        }
                        ?>
                       
                    </ul>
                </li>
            
                <!-- <li><a class="mt-2" href="index.php">Trang chủ</a></li>
                <li><a href="index.php?main=location&id=in">Địa điểm du lịch</a></li>
                <li><a href="index.php?main=hotel">Khách sạn</a></li>
                <li><a href="index.php?main=promotion">Khuyến mãi</a></li>
                <li><a href="index.php?main=contact">Liên hệ</a></li>
                <li><a href="index.php?main=cart">Giỏ hàng</a></li>

                <li class="border border-blue-200 border-solid flex" style="padding: 1px;"><input style="padding: 2px; border-radius: 2px;" class="w-52" type="text" name="search" placeholder="Tìm kiếm">
                <img style="width: 20px; background-color: white; padding: 2px; border-radius: 2px;" src="./icon/magnifying-glass-solid.svg" alt=""></li>
                <li><a href="user.php"><img src="./icon/user-regular.svg" alt="" style="width: 100%; height: 20px;"></a></li> -->
                <?php
                }
                ?>
                 
                    <?php
                        if(isset($_SESSION['Register'])){
                            echo '<li> <a href="index.php?logout=1" >Xin chào: '.$_SESSION['Register'].' <i class="fa-solid fa-right-from-bracket"></i></a></li>';
                        }
                    ?> 
                    
            </ul>   
        </div>