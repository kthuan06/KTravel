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
        elseif($tam == 'payment1'){
            include("main/payment1.php");
        }
        else{
            include("main/content.php");
        }
    ?>
</div>