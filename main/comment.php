<?php
session_start();
include('../admin/config/config.php');
if(isset($_SESSION['Register']) && isset($_POST['cmt'])){
    $sql = mysqli_query($mysqli, "INSERT INTO tbl_comment(comment_content, id_user, id_product, user_name) 
    VALUES ('".$_POST['comment']."','".$_SESSION['id_user']."','".$_GET['idsp']."','".$_SESSION['Register']."')" );
}else{
    $sql = mysqli_query($mysqli, "INSERT INTO tbl_comment(comment_content, id_user, id_product, user_name) 
    VALUES ('".$_POST['comment']."','0','".$_GET['idsp']."','Ẩn danh')" );
}
header("Location:http://localhost/DACS2/index.php?main=product&id=".$_GET['idsp']);
?>