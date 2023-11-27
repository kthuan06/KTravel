<?php
    include('../config/config.php');
    if(isset($_POST['add'])){
        $sql_add = mysqli_query($mysqli, "INSERT INTO list_menu (list_name, list_address, list_code)
        VALUES ('".$_POST['name']."', '".$_POST['address']."', '".$_POST['code']."') ");
        header('Location:../index.php?action=menu&query=add');
    }elseif(isset($_POST['edit'])){
        $sql_edit = mysqli_query($mysqli, "UPDATE list_menu SET 
        list_name = '".$_POST['name']."' , list_address ='".$_POST['address']."', list_code ='".$_POST['code']."' WHERE list_id = '$_GET[id]' ");
        header('Location:../index.php?action=menu&query=add');
    }

?>