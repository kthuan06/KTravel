

<!-----------payment1------------->
<?php
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }
    $subtotal_f = number_format($subtotal, 0, ',','.');
    return $subtotal_f;
}

function add_item($key, $amount) {
    include('admin/config/config.php');
   $sql = "SELECT *FROM tbl_product WHERE product_code = '$_GET[code]' ";
   $query = mysqli_query($mysqli , $sql);
   $row = mysqli_fetch_array($query);

  
   // Add item
   $cost = $row['product_price'];
   $total = $cost * $amount;
   $item = array(
       'name' => $row['product_name'],
       'code' => $row['product_code'],
       'image' => $row['product_img'] ,
       'cost' => $cost,
       'qty'  => $amount,
       'total' => $total
   );
   $_SESSION['cart'][$key] = $item;

   

   
}

if(isset($_GET['action']) && $_GET['action'] =='booknow'){
    add_item($_GET['code'], 1);
}
?>

<section class="mx-20 mt-10">
            <div>
                <p><a href="index.php" class="mr-2">Trang chủ</a> <span class="mx-2">&#8594;</span> 
                <a class="mx-2" href="">Địa điểm</a><span class="mx-2">&#8594;</span> 
                <a class="mx-2" href="">Giỏ hàng</a><span class="mx-2">&#8594;</span> 
                <a class="mx-2" href="">Thanh toán</a>
                </p>
            </div>
            <?php foreach( $_SESSION['cart'] as $key => $item ) {
                            $cost  = number_format($item['cost'],  0, ',','.');
                            $total = number_format($item['total'], 0, ',','.');
                        ?>
            <div class="flex my-10">
                <img class="w-3/12 rounded-xl" src="admin/main/uploads/<?php echo $item['image'] ?>" alt="">
                <div class="w-8/12 ml-10">
                <p class="font-bold text-xl"><?php echo $item['name'] ?></p>
                <div class=" py-5">
                        <ul class="text-sm">
                            <li>Mã vé <span class="font-bold"><?php echo $item['code'] ?></span></li>
                            <li>Giá <span class="font-bold"><?php echo $total  ?></span></li>
                            <li>Số lượng  <span class="font-bold"><?php echo $item['qty'] ?></span></li>
                            </ul>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
            <p class="font-bold text-2xl">Thông tin khách hàng</p>
            <div>
                <form action="http://localhost/DACS2/index.php?main=payment" method="post" class="flex mb-10">
                <div class="w-2/3">
                    
                    <div action="#" style="background-color: #F0F0F0;"class="mt-5 p-7 rounded-xl"  >
                        <div class="grid grid-cols-2">
                            <p>Họ và Tên <span class="text-red-500 mr-5">*</span></p>
                            <p>Email <span class="text-red-500">*</span></p>
                            <input class="mr-5 h-10 rounded-md mb-5" name="name_customer" type="text" >
                            <input class=" h-10 rounded-md mb-5" name="email_customer" type="email">
                            <p>Số điện thoại <span class="text-red-500 mr-5">*</span></p>
                            <p>Địa chỉ </p>
                            <input class="mr-5 h-10 rounded-md mb-5" name="phone_customer" type="text">
                            <input class="h-10 rounded-md mb-5" name="address_customer" type="text">
                        </div>
                        <p>Ghi chú thêm</p>
                        <textarea name="note" id="" class="w-full h-40"></textarea>
                        
                    </div>
                </div>

                <div class="w-1/3 ml-5 border border-solid p-5 rounded-xl"><p class="font-bold text-xl">Đơn hàng</p>
                <?php foreach( $_SESSION['cart'] as $key => $item ) {
                            $cost  = number_format($item['cost'],  0, ',','.');
                            $total = number_format($item['total'], 0, ',','.');
                        ?>
                    
                    <div class="flex my-3">
                        <img class="w-3/12 rounded-xl mr-3" src="admin/main/uploads/<?php echo $item['image'] ?>" alt="">
                        <div class="w-8/12">
                            <p class="font-bold text-sm"><?php echo $item['name'] ?></p>
                            <p class="font-bold text-sm"><span class="font-light">Giá :</span>
                                <?php echo $item['total'] ?>đ</p>
                        </div>
                    </div>
                    <p></p>
                    <hr>
                    <?php
                    }
                    ?>
                    <div class="mt-5">
                        <p class="font-bold text-md">Thanh toán</p>
                        <div class="grid grid-cols-2">
                             <hr>   <hr> 
                            <p class="mt-5 text-sm lg:text-xl font-bold">Tổng cộng</p><p style="color: red;" class="mt-5 ml-auto text-2xl font-bold"><?php echo get_subtotal()  ?>đ</p>
                        </div>
                        <div class="flex mt-5 justify-between">
                        <a href="" ><button name="off" type="submit"  class="w-56" style="background-color: black; color: white; border-radius: 10px;  height: 30px; font-weight: bold; ">
                           Thanh toán khi nhận hàng
                        </button></a>
                        <a href=""><button type="submit" name="on" class="w-56" style="background-color: black; color: white; border-radius: 10px;  height: 30px; font-weight: bold; ">
                            Chuyển khoản VieQR
                        </button></a>
                        </div>
                        
                       </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
