<?php
    $sql_edit = "SELECT * FROM tbl_cartegory WHERE 	cartegory_id ='$_GET[id]' LIMIT 1";
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
        width: 50%;
    }
    td{
        text-align: center;
    }
</style>
<form action="modules/manageListProduct/processproduct.php?id=<?php echo $_GET['id'];?>" method="post">
    <table>

    <?php
        while($row = mysqli_fetch_array($query_edit)){
    ?>

        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="list" value=" <?php echo    $row['cartegory_name']?>"> </td>
        </tr>
        <tr>
            <td>Thứ tự sản phẩm</td>
            <td><input type="text" name="listorder" value=" <?php echo    $row['cartegory_order']?>"> </td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="editlist">Sửa</button></td>
        </tr>

        <?php
        }
        ?>
    </table>
</form>