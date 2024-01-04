<?php
    include('../config/config.php');
    if(isset($_POST['add'])){

        $img = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        
        $img1 = $_FILES['img1']['name'];
        $img_tmp1 = $_FILES['img1']['tmp_name'];
         
        $img2 = $_FILES['img2']['name'];
        $img_tmp2 = $_FILES['img2']['tmp_name'];
        
        $img3 = $_FILES['img3']['name'];
        $img_tmp3 = $_FILES['img3']['tmp_name'];
         
        $img4 = $_FILES['img4']['name'];
        $img_tmp4 = $_FILES['img4']['tmp_name'];
        
       


        $sql_add = mysqli_query($mysqli, "INSERT INTO  tbl_product
        (product_name, product_code, product_type, product_location, product_price, product_detail,
         product_img, img_product1, img_product2, img_product3, img_product4)
        VALUES ('".$_POST['name']."', '".$_POST['code']."', '".$_POST['type']."', '".$_POST['location']."', '".$_POST['price']."', '".$_POST['detail']."',
         '".$img."', '".$img1."','".$img2."','".$img3."','".$img4."')");
        move_uploaded_file($img_tmp, 'uploads/'.$img);
        move_uploaded_file($img_tmp1, 'uploads/'.$img1);
        move_uploaded_file($img_tmp2, 'uploads/'.$img2);
        move_uploaded_file($img_tmp3, 'uploads/'.$img3);
        move_uploaded_file($img_tmp4, 'uploads/'.$img4);
        header('Location:../index.php?action=product&query=add');
    }elseif(isset($_POST['edit'])){
      $price = $_POST['price'] * 1000;
        $sql_edit = mysqli_query($mysqli, "UPDATE tbl_product SET 
        product_name = '".$_POST['name']."' , product_type ='".$_POST['type']."', product_location ='".$_POST['location']."',
        product_price ='".$price."', product_detail ='".$_POST['detail']."' WHERE product_code = '$_GET[id]' ");
        header('Location:../index.php?action=product&query=add');
    }elseif(isset($_POST['editimg'])){
        $img = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
         
        $img1 = $_FILES['img1']['name'];
        $img_tmp1 = $_FILES['img1']['tmp_name'];
         
        $img2 = $_FILES['img2']['name'];
        $img_tmp2 = $_FILES['img2']['tmp_name'];
        
        $img3 = $_FILES['img3']['name'];
        $img_tmp3 = $_FILES['img3']['tmp_name'];
         
        $img4 = $_FILES['img4']['name'];
        $img_tmp4 = $_FILES['img4']['tmp_name'];
        
        if($img!=''){
            $sql_del_img = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."' LIMIT 1");
            while($row_delete = mysqli_fetch_array($sql_del_img)){
              unlink('uploads/'.$row_delete['product_img']);
            }
            
        
            $sql_img = mysqli_query($mysqli, "UPDATE tbl_product SET 
            product_img = '".$img."'  WHERE product_code = '$_GET[id]' ");
            move_uploaded_file($img_tmp, 'uploads/'.$img);

        }

        if($img1!=''){
            $sql_del_img1 = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."' LIMIT 1");
            while($row_delete1 = mysqli_fetch_array($sql_del_img1)){
              unlink('uploads/'.$row_delete1['img_product1']);
            }
           
        
            $sql_img1 = mysqli_query($mysqli, "UPDATE tbl_product SET 
            img_product1 = '".$img1."'  WHERE product_code = '$_GET[id]' ");
            move_uploaded_file($img_tmp1, 'uploads/'.$img1);

        }

        if($img2!=''){
            $sql_del_img2 = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."' LIMIT 1");
            while($row_delete2 = mysqli_fetch_array($sql_del_img2)){
              unlink('uploads/'.$row_delete2['img_product2']);
            }
            
            $sql_img2 = mysqli_query($mysqli, "UPDATE tbl_product SET 
            img_product2 = '".$img2."'  WHERE product_code = '$_GET[id]' ");
            move_uploaded_file($img_tmp2, 'uploads/'.$img2);

        }

        if($img3!=''){
            $sql_del_img3 = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."' LIMIT 1");
            while($row_delete3 = mysqli_fetch_array($sql_del_img3)){
              unlink('uploads/'.$row_delete3['img_product3']);
            }
          
            $sql_img3 = mysqli_query($mysqli, "UPDATE tbl_product SET 
            img_product3 = '".$img3."'  WHERE product_code = '$_GET[id]' ");
            move_uploaded_file($img_tmp3, 'uploads/'.$img3);

        }

        if($img4!=''){
            $sql_del_img4 = mysqli_query($mysqli, "SELECT *FROM tbl_product WHERE product_code = '".$_GET['id']."' LIMIT 1");
            while($row_delete4 = mysqli_fetch_array($sql_del_img4)){
              unlink('uploads/'.$row_delete4['img_product4']);
            }
           
        
            $sql_img4 = mysqli_query($mysqli, "UPDATE tbl_product SET 
            img_product4 = '".$img4."'  WHERE product_code = '$_GET[id]' ");
            move_uploaded_file($img_tmp4, 'uploads/'.$img4);

        }
        header('Location:../index.php?action=product&query=add');    }

?>