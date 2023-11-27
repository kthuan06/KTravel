<?php
    include('../../config/config.php');

    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];

    $sql = mysqli_query($mysqli, "INSERT INTO tbl_test (img) VALUES ('".$img."') ");

    move_uploaded_file($img_tmp, 'uploads/'.$img);
?>