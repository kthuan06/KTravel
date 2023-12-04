
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
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
					<svg class="h-12" alt="logo" viewBox="0 0 10240 10240">
				        <path xmlns="http://www.w3.org/2000/svg" d="M8284 9162 c-2 -207 -55 -427 -161 -667 -147 -333 -404 -644 -733 -886 -81 -59 -247 -169 -256 -169 -3 0 -18 -9 -34 -20 -26 -19 -344 -180 -354 -180 -3 0 -29 -11 -58 -24 -227 -101 -642 -225 -973 -290 -125 -25 -397 -70 -480 -80 -22 -3 -76 -9 -120 -15 -100 -13 -142 -17 -357 -36 -29 -2 -98 -7 -153 -10 -267 -15 -436 -28 -525 -40 -14 -2 -45 -7 -70 -10 -59 -8 -99 -14 -130 -20 -14 -3 -41 -7 -60 -11 -19 -3 -39 -7 -45 -8 -5 -2 -28 -6 -50 -10 -234 -45 -617 -165 -822 -257 -23 -10 -45 -19 -48 -19 -7 0 -284 -138 -340 -170 -631 -355 -1107 -842 -1402 -1432 -159 -320 -251 -633 -308 -1056 -26 -190 -27 -635 -1 -832 3 -19 7 -59 10 -89 4 -30 11 -84 17 -120 6 -36 12 -77 14 -91 7 -43 33 -174 39 -190 3 -8 7 -28 9 -45 6 -35 52 -221 72 -285 7 -25 23 -79 35 -120 29 -99 118 -283 189 -389 67 -103 203 -244 286 -298 75 -49 178 -103 196 -103 16 0 27 16 77 110 124 231 304 529 485 800 82 124 153 227 157 230 3 3 28 36 54 74 116 167 384 497 546 671 148 160 448 450 560 542 14 12 54 45 90 75 88 73 219 172 313 238 42 29 77 57 77 62 0 5 -13 34 -29 66 -69 137 -149 405 -181 602 -7 41 -14 82 -15 90 -1 8 -6 46 -10 83 -3 37 -8 77 -10 88 -2 11 -7 65 -11 122 -3 56 -8 104 -9 107 -2 3 0 12 5 19 6 10 10 8 15 -10 10 -34 167 -346 228 -454 118 -210 319 -515 340 -515 4 0 40 18 80 40 230 128 521 255 787 343 118 40 336 102 395 113 28 5 53 11 105 23 25 5 59 12 75 15 17 3 41 8 55 11 34 7 274 43 335 50 152 18 372 29 565 29 194 0 481 -11 489 -19 2 -3 -3 -6 -12 -6 -9 -1 -20 -2 -24 -3 -33 -8 -73 -16 -98 -21 -61 -10 -264 -56 -390 -90 -649 -170 -1243 -437 -1770 -794 -60 -41 -121 -82 -134 -93 l-24 -18 124 -59 c109 -52 282 -116 404 -149 92 -26 192 -51 220 -55 17 -3 64 -12 105 -21 71 -14 151 -28 230 -41 19 -3 46 -7 60 -10 14 -2 45 -7 70 -10 25 -4 56 -8 70 -10 14 -2 53 -7 88 -10 35 -4 71 -8 81 -10 10 -2 51 -6 92 -9 101 -9 141 -14 147 -21 3 -3 -15 -5 -39 -6 -24 0 -52 -2 -62 -4 -21 -4 -139 -12 -307 -22 -242 -14 -700 -7 -880 13 -41 4 -187 27 -250 39 -125 23 -274 68 -373 111 -43 19 -81 34 -86 34 -4 0 -16 -8 -27 -17 -10 -10 -37 -33 -59 -52 -166 -141 -422 -395 -592 -586 -228 -257 -536 -672 -688 -925 -21 -36 -43 -66 -47 -68 -4 -2 -8 -7 -8 -11 0 -5 -24 -48 -54 -97 -156 -261 -493 -915 -480 -935 2 -3 47 -21 101 -38 54 -18 107 -36 118 -41 58 -25 458 -138 640 -181 118 -27 126 -29 155 -35 14 -2 45 -9 70 -14 66 -15 137 -28 300 -55 37 -7 248 -33 305 -39 28 -3 84 -9 125 -13 163 -16 792 -8 913 12 12 2 58 9 102 15 248 35 423 76 665 157 58 19 134 46 170 60 86 33 344 156 348 166 2 4 8 7 13 7 14 0 205 116 303 184 180 126 287 216 466 396 282 281 511 593 775 1055 43 75 178 347 225 455 100 227 236 602 286 790 59 220 95 364 120 485 6 28 45 245 50 275 2 14 7 41 10 60 3 19 8 49 10 65 2 17 6 46 9 65 15 100 35 262 40 335 3 39 8 89 10 112 22 225 33 803 21 1043 -3 41 -7 129 -11 195 -3 66 -8 136 -10 155 -2 19 -6 76 -10 125 -3 50 -8 101 -10 115 -2 14 -6 57 -10 95 -7 72 -12 113 -20 175 -2 19 -7 55 -10 80 -6 46 -43 295 -51 340 -2 14 -9 54 -15 90 -5 36 -16 97 -24 135 -8 39 -17 84 -20 100 -12 68 -18 97 -50 248 -19 87 -47 204 -61 260 -14 56 -27 109 -29 117 -30 147 -232 810 -253 832 -4 4 -7 -23 -8 -60z"></path>
			        </svg>
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
           
        </div>
<div class="mx-20 bg-white text-center p-5" >
    <img src="../images/payment-success.jpg" class="mx-auto w-2/12" alt="" >
    <p class="font-bold mt-5">ĐẶT HÀNG THÀNH CÔNG</p>
    <p class="mb-5">Cám ơn bạn đã đặt hàng tại KTRAVEL</p>
    <a href="http://localhost/DACS2/index.php">
        <button class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" >Trang chủ</button>
    </a>
</div>

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
                    <img style="width:60%;" src="../images/qrbank.jpg" alt=""><img style="width:60%;" src="./images/qrfb.jpg" alt="">
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
