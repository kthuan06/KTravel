<?php
    include('../config/config.php');
    if(isset($_POST['add'])){
        $sql_add = mysqli_query($mysqli, "INSERT INTO tbl_cartegory (cartegory_name, cartegory_type, cartegory_code)
        VALUES ('".$_POST['name']."', '".$_POST['type']."', '".$_POST['code']."') ");
        header('Location:../index.php?action=cartegory&query=add');
    }elseif(isset($_POST['edit'])){
        $sql_edit = mysqli_query($mysqli, "UPDATE tbl_cartegory SET 
        cartegory_name = '".$_POST['name']."' , cartegory_type ='".$_POST['type']."', cartegory_code ='".$_POST['code']."' WHERE cartegory_id = '$_GET[id]' ");
        header('Location:../index.php?action=cartegory&query=add');
    }

?>