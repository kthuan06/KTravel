<?php
    if(isset($_GET['logout']) && $_GET['logout'] ==1){
        unset($_SESSION['Login']);
        header("Location:login.php");
    }

?>


<ul class="flex justify-around">
    <li><a href="index.php?action=listproduct&query=add">Quản lí danh mục sản phẩm</a></li>
    <li><a href="index.php?action=product&query=add">Quản lí sản phẩm</a></li>
    <li><a href="index.php?logout=1">Log out : <?php  if(isset($_SESSION['Login'])){
      echo  $_SESSION['Login'];
    }  ?></a></li>
</ul>