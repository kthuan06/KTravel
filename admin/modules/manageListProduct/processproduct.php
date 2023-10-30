<?php

include('../../config/config.php');

    $nameListProduct = $_POST['list'];
    $order = $_POST['listorder'];

    if(isset($_POST['addlist'])){

        //add
        $sql =  "INSERT INTO tbl_cartegory (cartegory_name, cartegory_order) VALUES ('".$nameListProduct."','".$order."')";
        mysqli_query($mysqli, $sql);
        header('Location:../../index.php?action=listproduct&query=add');
    }elseif(isset($_POST['editlist'])){
        
        //edit
        $sql_update = "UPDATE tbl_cartegory SET cartegory_name = '".$nameListProduct."' , cartegory_order = '".$order."' WHERE cartegory_id = '$_GET[id]'";
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=listproduct&query=add');

    }else{
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM tbl_cartegory WHERE 	cartegory_id ='".$id."' ";
        mysqli_query($mysqli, $sql_delete); 
        header('Location:../../index.php?action=listproduct&query=add');
    }



?>