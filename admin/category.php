<?php
include "header.php";
include "sidebar.php";
include "class/cartegory_class.php"
?>
<?php
$cartegory = new cartegory;
$cartegory_name_add;
if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $cartegory_name_add = $_POST["cartegory_name_add"];
    $insert_cartegory = $cartegory -> insert_cartegory($cartegory_name_add);
}

?>
<div class="w-4/5">
            <div class="add_cartegory m-5">
                <h1 class="text-xl font-bold">Thêm danh mục</h1>
                <form action="category.php" method="POST" class="mt-5">
                    <input name="cartegory_name_add" type="text" placeholder="Thêm danh mục sản phẩm" style="border: 1px solid brown; width: 250px; height: 30px; padding: 5px;">
                    <button type="submit" style="display: block; border: 1px solid; background-color: brown; color: white; width: 100px; height: 30px; margin-top: 10px;">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>