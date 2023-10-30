<?php
   

    $sql_select = "SELECT * FROM tbl_cartegory ORDER BY	cartegory_order DESC";
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
        width: 33%;
    }
    a{
        border: 1px solid;
        padding: 1px 7px;
    }
</style>


<p>Liệt kê danh mục</p>

<table>
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
<?php
    $i = 0;
    while($row = mysqli_fetch_array($query_select)){
        $i++
?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['cartegory_name'];?></td>
        <td>
            <a href="?action=listproduct&query=edit&id=<?php echo $row['cartegory_id'] ?>">Sửa</a> / <a href="modules/manageListProduct/processproduct.php?id=<?php echo $row['cartegory_id'] ?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>

</table>