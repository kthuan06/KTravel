<?php
    $sql_edit = "SELECT * FROM tbl_product WHERE 	product_id ='$_GET[id]' LIMIT 1";
    $query_edit = mysqli_query($mysqli, $sql_edit);
?>


<h1>Sửa danh mục sản phẩm</h1>

<style> 
    table, td, tr{
        border: 1px solid;
        border-collapse: collapse;
    }
    input{
        border: 1px solid;
        width: 100%;
    }
    table{
        width: 100%;
    }
    td{
        text-align: center;
    }
    textarea{
        width: 100%;
    }
</style>
<form action="modules/manageProduct/processproduct.php?id=<?php echo $_GET['id'];?>" method="post">
    <table>

    <?php
        while($row = mysqli_fetch_array($query_edit)){
    ?>


        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="product" value="<?php echo $row['product_name']?>"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="code_product" value="<?php echo $row['product_code']?>"></td>
        </tr>
        <tr>
            <td>Địa điểm xuất phát</td>
            <td><input type="text" name="start_location_product" value="<?php echo $row['product_start']?>"></td>
        </tr>
        <tr>
            <td>Địa điểm</td>
            <td>
            <input type="text" name="location_product" value="<?php echo $row['product_location']?>">
            </td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="price_product" value="<?php echo $row['product_price']?>"></td>
        </tr>
        <tr>
            <td>Nội dung chi tiết sản phẩm</td>
            <td><textarea name="detail_product" id="" cols="50" rows="5" ><?php echo $row['product_detail']?></textarea></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm</td>
            <td><input type="text" name="img_product" value="<?php echo $row['product_img']?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 1</td>
            <td><input type="text" name="img_product1" value="<?php echo $row['img_product1']?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 2</td>
            <td><input type="text" name="img_product2" value="<?php echo $row['img_product2']?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 3</td>
            <td><input type="text" name="img_product3" value="<?php echo $row['img_product3']?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 3</td>
            <td><input type="text" name="img_product4" value="<?php echo $row['img_product4']?>"></td>
        </tr>
        <tr>
            <td>Lượt quan tâm</td>
            <td><input type="text" name="like_product" value="<?php echo $row['product_like']?>"></td>
        </tr>
        <tr>
            <td>Giờ khởi hành</td>
            <td><input type="text" name="time_start_product" value="<?php echo $row['product_timestart']?>"></td>
        </tr>
        <tr>
            <td>Giờ có mặt</td>
            <td><input type="text" name="time_product" value="<?php echo $row['product_time']?>"></td>
        </tr>
        
        <tr>
            <td>Phương tiện</td>
            <td><input type="text" name="vehicle_product" value="<?php echo $row['product_vehicle']?>"></td>
        </tr>
        <tr>
            <td>Các điểm tham quan</td>
            <td><input type="text" name="locations_product" value="<?php echo $row['product_locations']?>"></td>
        </tr>
        <tr>
            <td>Ẩm thực</td>
            <td><input type="text" name="amthuc_product" value="<?php echo $row['product_at']?>"></td>
        </tr>
        <tr>
            <td>Khách sạn</td>
            <td><input type="text" name="hotel_product" value="<?php echo $row['product_hotel']?>"></td>
        </tr>
        <tr>
            <td>Thời gian lí tưởng</td>
            <td><input type="text" name="timelt_product" value="<?php echo $row['product_timelt']?>"></td>
        </tr>
        <tr>
            <td>Đối tượng thích hợp</td>
            <td><input type="text" name="object_product" value="<?php echo $row['product_object']?>"></td>
        </tr>
        <tr>
            <td>Ưu đãi</td>
            <td><input type="text" name="promotion_product" value="<?php echo $row['product_promotion']?>"></td>
        </tr>
        
        <tr>
            <td colspan="2"><button type="submit" name="editproduct">Sửa</button></td>
        </tr>

        <?php
        }
        ?>
    </table>
</form>