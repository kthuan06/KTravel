<?php
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();


    if(isset($_GET['logout']) && $_GET['logout'] == 1){
        unset($_SESSION['cart']);
        unset($_SESSION['Register']);
        unset($_SESSION['id_user']);
    }


    function add_item($key, $amount) {
         include('../admin/config/config.php');
        $sql = "SELECT *FROM tbl_product WHERE product_code = '$_GET[idsp]'";
        $query = mysqli_query($mysqli , $sql);
        $row = mysqli_fetch_array($query);
        if(isset($_SESSION['id_user'])){

                $row_count = mysqli_query($mysqli, "SELECT * FROM tbl_session_cart WHERE session_user = '".$_SESSION['id_user']."' AND session_cart = '".$row['product_code']."' ");
                $count = mysqli_num_rows($row_count);
                if($count > 0){
                        $data_amount = mysqli_fetch_array($row_count);
                        $update_amount = $data_amount['product_amount'] + 1 ;
                        $sql_update = mysqli_query($mysqli, "UPDATE tbl_session_cart  SET product_amount = '".$update_amount."' 
                        WHERE session_user = '".$data_amount['session_user']."' AND session_cart = '".$data_amount['session_cart']."' ");
                }else{
                    include('../admin/config/config.php');
                    $sql = mysqli_query($mysqli, "INSERT INTO tbl_session_cart(session_user, session_cart, product_amount) VALUES ('".$_SESSION['id_user']."', '".$row['product_code']."', 1) ");
                }
        }

        if ($amount < 1) return;
    
        // If item already exists in cart, update amount
        if (isset($_SESSION['cart'][$key])) {
            $amount += $_SESSION['cart'][$key]['qty'];
            update_item($key, $amount);
            return;
        }
       
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

    function update_item($key, $amount) {
        $amount = (int) $amount;
        if (isset($_SESSION['cart'][$key])) {
            if ($amount <= 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['qty'] = $amount;
                $total = $_SESSION['cart'][$key]['cost'] *
                         $_SESSION['cart'][$key]['qty'];
                $_SESSION['cart'][$key]['total'] = $total;
            }
        }
    }
    
    
    

 

   
    function get_subtotal() {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['total'];
        }
        $subtotal_f = number_format($subtotal, 0, ',','.');
        return $subtotal_f;
    }

    if (empty($_SESSION['cart'])) { $_SESSION['cart'] = array(); }
    
    $main = filter_input(INPUT_POST, 'main');
    if ($main === NULL) {
        $main = filter_input(INPUT_GET, 'main');
        if ($main === NULL) {
            $main = 'cart';
        }
    }

    
    switch($main) {
        case 'add':
            $product_key = $_GET['idsp'];
            $item_qty = 1;
            add_item($product_key, $item_qty);
            
            break;
        case 'update':
            $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                         FILTER_REQUIRE_ARRAY);
            foreach($new_qty_list as $key => $qty) {
                if ($_SESSION['cart'][$key]['qty'] != $qty) {
                    update_item($key, $qty);
                }
            }
            include('cart_view.php');
            break;
        case 'show_cart':
            include('cart_view.php');
            break;
        case 'show_add_item': 
            include('add_item_view.php');
            break;
        case 'empty_cart':
            unset($_SESSION['cart']);
            header('Location:index.php/main?main=location&id=in');
            break;
    }

    if(isset($_GET['logout']) && $_GET['logout'] == 1){
        unset($_SESSION['Register']);
        header("Location:../index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KTRAVEL</title>
    <link rel="shortcut icon" href="../images/logo1.png" />
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/popup.css">
    <link rel="stylesheet" href="../js/popup.js">
    <link rel="stylesheet" href="../css/style.css">
</head>


<body class="bg-white">
    
    <div class="">
    <nav class="relative px-4 py-4 flex justify-between items-center bg-blue-100">
		<a class="text-3xl font-bold leading-none" href="#">
        <img src="../images/logo1.png" class="hidden lg:block w-12 h-12 rounded-2xl" alt="">
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-blue-600 p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <?php
                include('../admin/config/config.php');
                

                $sql_select_menu = "SELECT *FROM list_menu";
                $query = mysqli_query($mysqli, $sql_select_menu);
            
                while($row = mysqli_fetch_array($query)){
            ?>
        
        <li><a class="font-bold text-black-400 hover:text-gray-500"  href="<?php echo $row['list_address']?>"><?php echo $row['list_name']?></a></li>
			<li class="text-gray-300">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
				</svg>
			</li>
            <?php
                }if(isset($_SESSION['Register'])){
                    ?>
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold text-black-400 hover:bg-blue-50 hover:text-blue-600 rounded"  href=""><i class="fa-solid fa-user"></i></a>
                    </li>
                    <?php
                }    
            
                ?>
			
		</ul>
        <?php
            if(isset($_SESSION['Register'])){
                echo ' <a href="?logout=1" class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" >Xin chào: '.$_SESSION['Register'].' <i class="fa-solid fa-right-from-bracket"></i></a>';
            }else{
        ?> 
		<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200" href="http://localhost/DACS2/main/login.php">Đăng nhập</a>
		<a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200"href="http://localhost/DACS2/main/register.php">Đăng kí</a>
        <?php
            }
            ?>
    </nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img src="../images/logo1.png" class=" w-12 h-12 rounded-2xl" alt="">
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
                <?php
                include('../admin/config/config.php');
                

                $sql_select_menu = "SELECT *FROM list_menu";
                $query = mysqli_query($mysqli, $sql_select_menu);
            
                while($row = mysqli_fetch_array($query)){
            ?>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-black-400 hover:bg-blue-50 hover:text-blue-600 rounded"  href="<?php echo $row['list_address']?>"><?php echo $row['list_name']?></a>
					</li>
					
                    <?php
                }
                ?>
				</ul>
			</div>
			<div class="mt-auto">
                    <?php
                       if(isset($_SESSION['Register'])){
                        echo '<a href="?logout=1" class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl">Xin chào: '.$_SESSION['Register'].' <i class="fa-solid fa-right-from-bracket"></i></a>';
                    }else{
                    ?> 
				<div class="pt-6">
					<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="http://localhost/DACS2/main/login.php">Đăng nhập</a>
					<a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" href="http://localhost/DACS2/main/register.php">Đăng kí</a>
				</div>
                <?php
                        }
                        ?>
				
			</div>
		</nav>
	</div>
</body>

<script>
// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script> 
            <img src="../images/banner_main.png"  class=" w-11/12 m-auto mt-10 rounded-lg" alt="">
        </div>

    <main class="w-10/12 m-auto my-20">
    <form action="." method="post" >
            <input type="hidden" name="action" value="update">
        
            <?php if (empty($_SESSION['cart']) || 
                        count($_SESSION['cart']) == 0) : ?>
                    <div class="w-full text-center">
                        <img src="https://bizweb.dktcdn.net/100/363/411/themes/761926/assets/empty-cart.png?1664347180510" class="w-1/12 m-auto" alt="">
                        <p class="text-center font-bold mt-5">Không có sản phẩm nào trong giỏ hàng</p>
                        <button class="border border-solid bg-blue-400 text-white px-10 py-3 rounded-lg my-5"><a href="http://localhost/DACS2/index.php?main=location&id=in">Tiếp tục mua sắm</a></button>
                        <p>Khi cần trợ giúp vui lòng gọi <span class="text-blue-400">0915300091</span> (7h30 - 22h)</p>
                    </div>
                    <?php else: ?>
                <div class="flex flex-wrap">
                  <div class="lg:w-3/5 p-5 rounded-xl w-full">
                    
                        <?php foreach( $_SESSION['cart'] as $key => $item ) :
                            $cost  = number_format($item['cost'],  0, ',','.');
                            $total = number_format($item['total'], 0, ',','.');
                        ?>
                        <div style="background-color: #F0F0F0;" class=" my-5 rounded-xl p-5">
                            <div class="flex" >
                                <div class="w-1/3">
                                    <img src="../admin/main/uploads/<?php echo  $item['image']; ?>" class="rounded-xl" alt="">
                                    
                                </div>
                                <div class="w-2/3 ml-5">
                                <p class="font-bold text-sm"><?php echo $item['name']; ?></p>

                                    <p class="mt-2">Số lượng: </p>
                                    <div class="mt-2 flex text-sm font-bold">
                                        <a href="delete_product.php?sub=<?php echo $item['code'] ?>" class="border border-solid px-2">-</a>
                                        <p class="border border-solid px-3"><?php  echo $item['qty']; ?></p>
                                                        <!-- <input style="background-color: #F0F0F0;" type="text" class="cart_qty font-bold text-sm"
                                                            name="newqty[<?php echo $key; ?>]"
                                                            value= "<?php echo $item['qty']; ?>"> -->
                                        <a href="delete_product.php?add=<?php echo $item['code'] ?>" class="border border-solid px-2">+</a>
                                        </div>

                                    <p class="mt-2">Tổng:  <span class="text-red-500 font-bold text-sm"><?php echo $total; ?>đ</span></p>
                                    
                                </div>
                                
                            </div>
                            <div class="text-center"><button class="font-bold text-red-500 border border-solid px-3 py-2 bg-white rounded-lg"><a href="delete_product.php?delete=<?php echo $item['code'] ?>">Xoá sản phẩm</a></button></div>
                        </div>
                        <?php endforeach; ?>

                    
                        <div class="flex justify-between">
                        <style>
                                .bt-del:hover{
                                    background-color: red;
                                }
                                .bt-del:hover a{
                                    color: white;
                                }
                                .bt-add:hover{
                                    background-color: blue;
                                }
                                .bt-add:hover a{
                                    color: white;
                                }
                            </style>
                            <div><button class="border border-solid p-2 rounded-lg bt-del"><a href="empty_cart.php" class="text-red-500 font-bold text-sm">Xóa tất cả đơn hàng</a></button></div>
                            <div class="border border-solid p-2 rounded-lg bt-add"><a href="../index.php?main=location&id=in" class="text-blue-500 font-bold text-sm">Thêm sản phẩm mới</a></div>
                        </div>
                    
                    
                     
                
             </div>
                    <div class="lg:w-2/5 mt-10 w-full">
                        <form>
                            <h2 class="text-2xl font-bold mb-5">ĐẶT VÉ NGAY</h2>
                                
                                    <img class="w-full" src="../images/payment_banner.png" alt="">
                                
                                <p class="mt-5"><b>Tổng tất cả đơn hàng:</b> <span class="text-red-500 font-bold"> <?php echo get_subtotal(); ?>đ</span></p> 
                            <?php
                                if(isset($_SESSION['Register'])){
                            ?>
                            <button type="submit" name="order" class="mt-5 text-center border border-solid p-2 rounded-lg bt-add"><a href="http://localhost/DACS2/index.php?main=payment2" class="text-blue-500 font-bold text-lg">Đặt hàng</a></button>
                            <?php
                            }else{
                            ?>
                            <div class="mt-5 text-center border border-solid p-2 rounded-lg bt-add"><a href="http://localhost/DACS2/main/login.php" class="text-blue-500 font-bold text-lg">Đăng nhập để đặt hàng</a></div>
                            <?php
                            }
                            ?>
                            </a></p>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
    </form>
                       
            
                   
        
        

    </main>

    <div style="background-color: #F0F0F0;" class="footer pb-16">
        
        <div class="flex" >
            <div class="w-4/6 grid grid-cols-3 mt-16" >
                <div class="mx-16">
                <p class="text-xl font-bold">Du lịch trong nước</p>
                    <div class="grid grid-cols-2">
                        <ul class="text-sm">
                            <li class="my-3">Hà Nội</li>
                            <li class="my-3">Hạ Long</li>
                            <li class="my-3">Huế</li>
                            <li class="my-3">Quảng Bình</li>
                            <li class="my-3">Đà Nẵng</li>
                            <li class="my-3">Quảng Nam</li>
                            <li class="my-3">Nha Trang</li>
                            <li class="my-3">Đà Lạt</li>
                        </ul>
                        <ul class="text-sm">
                            <li class="my-3">Phan Thiết</li>
                            <li class="my-3">Bà Rịa - Vũng Tàu</li>
                            <li class="my-3">Phú Quốc</li>
                            <li class="my-3">Cần Thơ</li>
                            <li class="my-3">HÀ TIÊN</li>
                            <li class="my-3">Bắc Kạn</li>
                            <li class="my-3">Hà Giang</li>
                            <li class="my-3">Côn Đảo</li>
                        </ul>
                    </div>
                </div>
                <div class="mx-16">
                <p class="text-xl font-bold">Du lịch nước ngoài</p>
                    <div class="grid grid-cols-2">
                        <ul class="text-sm">
                            <li class="my-3">Trung Quốc</li>
                            <li class="my-3">Thái Lan</li>
                            <li class="my-3">Malaysia</li>
                            <li class="my-3">Singapore</li>
                            <li class="my-3">Hàn Quốc</li>
                            <li class="my-3">Úc</li>
                            <li class="my-3">Mỹ - Hoa Kỳ</li>
                            <li class="my-3">Nhật Bản</li>
                        </ul>
                        <ul class="text-sm">
                            <li class="my-3">Ấn Độ</li>
                            <li class="my-3">Philippines</li>
                            <li class="my-3">Maldives</li>
                            <li class="my-3">Na Uy</li>
                            <li class="my-3">Tây Ban Nha</li>
                            <li class="my-3">Hà Lan</li>
                            <li class="my-3">Đức</li>
                            <li class="my-3">Anh</li>
                        </ul>
                    </div>
                </div>
                <div class="mx-16">
                <p class="text-xl font-bold">Các dòng tour</p>
                    
                        <ul class="text-sm">
                            <li class="my-3">Cao cấp</li>
                            <li class="my-3">Tiêu chuẩn</li>
                            <li class="my-3">Tiết kiệm</li>
                            <li class="my-3">Giá tốt</li>
                         
                        </ul>
                        
                    </div>
                </div>
       
            <div class="w-2/6 mt-16 ml-32" >
                <p class="text-xl font-bold mb-5">Ứng dụng di động</p>
                <div class="grid grid-cols-2">
                    <img src="https://travel.com.vn/Content/Theme/images/ggp.webp" alt=""><img src="https://travel.com.vn/Content/Theme/images/aps.webp" alt="">
                    <p>Android</p>
                    <p>iOS</p>
                    <img style="width:60%;" src="../images/qrbank.jpg" alt=""><img style="width:60%;" src="../images/qrfb.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-10">
            <div class="grid grid-cols-2">
                <div class="mx-16">
                    <p class="text-xl font-bold">Liên hệ</p>
                    <ul class="text-sm">
                            <li class="my-3">Tiên Hiệp, Tiên Phước, Quảng Nam</li>
                            <li class="my-3">+84915300091</li>
                            <li class="my-3">+84946069054</li>
                            <li class="my-3">thuankim2214@gmail.com</li>
                    </ul>
                    <p class="text-xl font-bold">Mạng xã hội</p>
                    <ul class="flex mt-3">
                        <a href="https://www.facebook.com/kimthuan2210">
                            <li><img style="width: 50%;" src="./icon/facebook-app-symbol.png" alt=""></li>
                        </a>
                        <a href="https://www.instagram.com/_kthuan.22/">
                            <li><img style="width: 50%;" src="./icon/instagram.png" alt=""></li>
                        </a>
                        <a href="">
                            <li><img style="width: 50%;" src="./icon/whatsapp.png" alt=""></li>
                        </a>
                        <a href="">
                            <li><img style="width: 50%;" src="./icon/twitter.png" alt=""></li>
                        </a>
                        <a href="">
                            <li><img style="width: 50%;" src="./icon/youtube.png" alt=""></li>
                        </a>
                    </ul>
                    <div class="flex text-white bg-red-500 justify-center py-3 w-5/6 rounded-xl mt-5">
                        <p class="text-2xl font-bold ">+84915300091</p>
                    </div>
                </div>
                <div class="mx-16">
                    <p class="text-xl font-bold">Thông tin</p>
                    <ul class="text-sm">
                            <li class="my-3">Tạp chí du lịch</li>
                            <li class="my-3">Cẩm nang du lịch</li>
                            <li class="my-3">Tin tức</li>
                            <li class="my-3">Sitemap</li>
                            <li class="my-3">FAQs</li>
                            <li class="my-3">Chính sách riêng tư</li>
                            <li class="my-3">Thỏa thuận sử dụng</li>
                    </ul>
                </div>
            </div>

            <div>
                <form action="">
                    <p class="text-xl font-bold mb-3">Newsletter</p>
                    <div style="margin-bottom: 15px; width: 300px; border: 1px solid; border-color:#22668D; background-color: white; border-radius: 10px; padding-left: 10px;">
                        <input style="padding: 10px; width: 240px; border-right: 1px solid #22668D;" type="email" name="" id="" placeholder="Email của quý khách">
                        <input class="bg-white pl-2" type="submit" value="Gửi">
                    </div>
                   </form>
                <form action="">
                    <p class="text-xl font-bold mb-3">Tìm kiếm thông tin</p>
                    <div style="margin-bottom: 15px;width: 300px; border: 1px solid; border-color:#22668D; background-color: white; border-radius: 10px; padding-left: 10px;">
                        <input style="padding: 10px; width: 240px; border-right: 1px solid #22668D;" type="email" name="" id="" placeholder="Địa điểm du lịch">
                        <input class="bg-white pl-2" type="submit" value="Tìm">
                    </div>
                
                </form>
                <div class="flex flex-wrap" >
                    <div class="mr-10">
                        <p class="text-xl font-bold mb-3">Chứng nhận</p>
                        <img src="https://travel.com.vn/Content/Theme/images/image39.webp" alt=""><img src="https://travel.com.vn/Content/Theme/images/image40.webp" alt="">
                    </div>
                    <div class="mx-10">
                    <p class="text-xl font-bold mb-3">Kênh thanh toán</p>
                        <div class="grid grid-cols-3">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/image41.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/vnpay_qr1_1.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/vs.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/mtc.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/jcb.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/vrvs.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/shopeepay.webp" alt="">
                            <img class="my-3 w-4/6" src="https://travel.com.vn/Content/Theme/images/msb.webp" alt="">
                            
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>





<div class="py-5">
    <p class="text-sm ml-28">Bản quyền của Vietravel ® 2016. Bảo lưu mọi quyền. <br>
Ghi rõ nguồn "www.travel.com.vn" ® khi sử dụng lại thông tin từ website này. <br>
Số giấy phép kinh doanh lữ hành Quốc tế: 79-234/2014/TCDL-GP LHQT</p>
</div>
</body>
</html>
