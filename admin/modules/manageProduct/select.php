<?php
   

    $sql_select = "SELECT * FROM tbl_product ORDER BY product_id";
    $query_select = mysqli_query($mysqli, $sql_select);

 
?>

<style>
    table, td, tr, th{
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
    td, th{
        text-align: center;
       
    }
    a{
        border: 1px solid;
        padding: 1px 7px;
    }
</style>


<p>Liệt kê sản phẩm</p>

<table style="width: 100%;">
    <tr>
    <td>Tên sản phẩm</td>
    <td>Mã sản phẩm</td>
    <td>Địa điểm xuất phát</td>
    <td>Địa điểm</td>
    <td>Giá sản phẩm</td>
    <td>Nội dung chi tiết sản phẩm</td>
    
    <td>Lượt quan tâm</td>
    <td>Giờ khởi hành</td>
    <td>Giờ có mặt</td>
    <td>Phương tiện</td>
    <td>Các điểm tham quan</td>
    <td>Ẩm thực</td>
    <td>Khách sạn</td>
    <td>Thời gian lí tưởng</td>
    <td>Đối tượng thích hợp</td>
    <td>Ưu đãi</td>
    
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_select)){
        $i++
?>
    <tr>
        <td><?php echo $row['product_name']?> </td>
        <td><?php echo $row['product_code']?> </td>
        <td><?php echo $row['product_start']?></td>
        <td><?php echo $row['product_location']?></td>
        <td><?php echo $row['product_price']?></td>
        <td><?php echo $row['product_detail']?></td>
        
        <td><?php echo $row['product_like']?></td>
        <td><?php echo $row['product_timestart']?></td>
        <td><?php echo $row['product_time']?></td>
        <td><?php echo $row['product_vehicle']?></td>
        <td><?php echo $row['product_locations']?></td>
        <td><?php echo $row['product_at']?></td>
        <td><?php echo $row['product_hotel']?></td>
        <td><?php echo $row['product_timelt']?></td>
        <td><?php echo $row['product_object']?></td>
        <td><?php echo $row['product_promotion']?></td>
      
        
      
        <td>
            <a href="?action=product&query=edit&id=<?php echo $row['product_id'] ?>">Sửa</a> / <a href="modules/manageProduct/processproduct.php?id=<?php echo $row['product_id'] ?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>

</table>