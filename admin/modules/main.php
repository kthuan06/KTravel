<div>
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        if($tam == 'listproduct' && $query == 'add'){
            include("manageListProduct/addproduct.php");
            include("manageListProduct/select.php");
        }
        elseif($tam == 'listproduct' && $query == 'edit'){
            
            include("manageListProduct/editproduct.php");
        }
        elseif($tam == 'hotel'){

        }
    ?>
</div>