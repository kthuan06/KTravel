<?php
    session_start();
    if(!isset($_SESSION['Login'])){
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <p class="text-center text-3xl font-bold my-10 text-blue-500">ADMIN</p>
    <div class="w-11/12 border border-solid mx-auto">
        <?php
            include('config/config.php');
            include "modules/header.php";
            include "modules/menu.php";
            include "modules/main.php";
            include "modules/footer.php";
        ?>
       
    </div>
</body>
</html>