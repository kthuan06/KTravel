<h1>Thêm sản phẩm</h1>

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
        width: 50%;
    }
    td{
        text-align: center;
    }
</style>
<form action="modules/manageProduct/processproduct.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="product"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="code_product"></td>
        </tr>
        <tr>
            <td>Trong/ngoai nuoc</td> 
            <td><input type="text" name="start_location_product"></td>
        </tr>
        <tr>
            <td>Địa điểm</td>
            <td>
                <select name="location_product" id="">
                <?php 
                
                $sql_select = "SELECT * FROM tbl_cartegory ORDER BY	cartegory_order DESC";
                $query_select = mysqli_query($mysqli, $sql_select);

                while($row = mysqli_fetch_array($query_select)){
                ?>     
                    <option value="<?php echo $row['cartegory_name']?>"> <?php echo $row['cartegory_name']?> </option>
                <?php
                }
                ?>
                </select></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="price_product"></td>
        </tr>
        <tr>
            <td>Nội dung chi tiết sản phẩm</td>
            <td><textarea name="detail_product" id="" cols="50" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm</td>
            <td><input type="text" name="img_product"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 1</td>
            <td><input type="text" name="img_product1"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 2</td>
            <td><input type="text" name="img_product2"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 3</td>
            <td><input type="text" name="img_product3"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm 4</td>
            <td><input type="text" name="img_product4"></td>
        </tr>
        <tr>
            <td>Lượt quan tâm</td>
            <td><input type="text" name="like_product"></td>
        </tr>
        <tr>
            <td>Giờ khởi hành</td>
            <td><input type="text" name="time_start_product"></td>
        </tr>
        <tr>
            <td>Giờ có mặt</td>
            <td><input type="text" name="time_product"></td>
        </tr>
        
        <tr>
            <td>Phương tiện</td>
            <td><input type="text" name="vehicle_product"></td>
        </tr>
        <tr>
            <td>Các điểm tham quan</td>
            <td><input type="text" name="locations_product"></td>
        </tr>
        <tr>
            <td>Ẩm thực</td>
            <td><input type="text" name="amthuc_product"></td>
        </tr>
        <tr>
            <td>Khách sạn</td>
            <td><input type="text" name="hotel_product"></td>
        </tr>
        <tr>
            <td>Thời gian lí tưởng</td>
            <td><input type="text" name="timelt_product"></td>
        </tr>
        <tr>
            <td>Đối tượng thích hợp</td>
            <td><input type="text" name="object_product"></td>
        </tr>
        <tr>
            <td>Ưu đãi</td>
            <td><input type="text" name="promotion_product"></td>
        </tr>
        
        <tr>
            <td colspan="2"><button type="submit" name="addproduct">Thêm</button></td>
        </tr>
    </table>
</form>