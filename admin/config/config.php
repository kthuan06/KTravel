<?php
    $mysqli = new mysqli("localhost", "root", "", "webktravel1");

    if($mysqli->connect_errno){
        echo "Kết nối không thành công";
        exit();
    }

?>