<h1>Thêm danh mục</h1>

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
<form action="modules/manageListProduct/processproduct.php" method="post">
    <table>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="list"></td>
        </tr>
        <tr>
            <td>Loại sản phẩm</td>
            <td>
                <select name="listtype" id="">
                    <option value="Trong nước">Trong nước</option>
                    <option value="Ngoài nước">Ngoài nước</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Thứ tự sản phẩm</td>
            <td><input type="text" name="listorder"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="addlist">Thêm</button></td>
        </tr>
    </table>
</form>