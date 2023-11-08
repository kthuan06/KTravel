
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<div id="">
    <?php
        if(isset($_GET['main'])){
            $tam = $_GET['main'];
        }else{
            $tam = '';
        }
        if($tam == 'location'){
            include("main/location.php");
            
        }
        elseif($tam == 'hotel'){

        }
        elseif($tam == 'product'){
            include("main/product.php");
        }
        elseif($tam == 'payment'){
            include("main/payment.php");
        }
        elseif($tam == 'cart'){
            include("main/cart_view.php");
        }elseif($tam == 'find'){
            include("main/findproduct.php");
        }
        else{
            include("main/content.php");
        }
    ?>
</div>