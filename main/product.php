<!--------------------------Product-------------------------->


<?php

    $sql_pro = "SELECT *from tbl_product WHERE product_code = '$_GET[id]'";
    $query_pro = mysqli_query($mysqli, $sql_pro);


    while($row = mysqli_fetch_array($query_pro)){
?>

    
    <section class="product mx-20 mt-10 relative">
        <form action="main/cart_view.php?idsp=<?php echo $row['product_code'] ?>" method="POST">
        <input type="hidden" name="main" value="add">
            <div>
                    <p><a href="index.php" class="mr-2">Trang chủ</a> <span class="mx-2">&#8594;</span> 
                    <a class="mx-2" href="">Địa điểm</a><span class="mx-2">&#8594;</span> 
                    <a class="mx-2" href=""><?php echo $row['product_location'] ?></a>
                </p>
            </div>
            <div class="grid grid-cols-2 mt-5 product-top">
                <div>
                    <p class="font-bold text-2xl"><?php echo $row['product_name'] ?></p>
                    <div class="flex mt-3" >
                        <p class="text-sm"><?php echo $row['product_code'] ?>
                    </p>
                    <button class="open_popup text-red-500 border border-solid py-3 px-7 ml-3 rounded-md"><i class="fa-solid fa-heart"></i><span class="text-black"> <?php echo $row['product_like'] ?></span></button>
                    </div>
                </div>
                <div>
                    <div class="flex">
                        <div class="w-1/3"></div>
                        <div class="grid grid-cols-2">
                            <div><span class="font-bold text-2xl text-red-500"><?php echo $row['product_price'] ?></span><span>/khách</span></div>
                            <div class="ml-3">
                                   <button type="submit" class="bg-red-500 text-white py-3 px-4 rounded-md w-full mb-3"><i class="fa-solid fa-cart-shopping"></i><span> Thêm vào giỏ hàng</span></button> <br>
                                <style>
                                    .lienhetuvan:hover{
                                        background-color: blue;
                                    }
                                    .lienhetuvan:hover {
                                        color: white;
                                    }
                                </style>
                                <button class="lienhetuvan border border-solid border-blue-700 text-blue-700 py-3 px-4 rounded-md w-full"><span><a href="">Liên hệ tư vấn</a></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_content">
                <div class="product_img flex"   >
                    <div class="w-7/12">
                        <img class="h-full rounded-2xl"  src="<?php echo $row['img_product1'] ?>" alt="">
                    </div>
                    <div class="w-5/12">
                        <div class="flex">
                            <div class="mx-2"><img class=" rounded-2xl" src="<?php echo $row['img_product2'] ?>" alt=""></div>
                            <div><img class=" rounded-2xl" src="<?php echo $row['img_product3'] ?>" alt=""></div>

                        </div>
                        <div  class="ml-2 mt-2">
                        <img class=" rounded-2xl" src="<?php echo $row['img_product4'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_information flex flex-wrap my-5 px-5 pt-5  pb-10 rounded-xl" style="background-color: #F0F0F0;" >
                <div class="w-2/5">
                    <p class="text-sm"><?php echo $row['product_detail'] ?></p>
                    <div class="my-5 p-5">
                        <ul>
                            <li>Khởi hành <span class="font-bold"><?php echo $row['product_timestart'] ?></span></li>
                            <li>Tập trung <span class="font-bold"><?php echo $row['product_time'] ?></span></li>
                            <li>Thời gian  <span class="font-bold">4 ngày</span></li>
                            <li>Nơi khởi hành <span class="font-bold"><?php echo $row['product_location'] ?></span></li>
                        </ul>
                    </div>
                    <p>Quý khách cần hỗ trợ?</p>
                    <div style="border: 1px solid blue;" class="w-3/4 rounded-xl flex mt-5">
                        <button class="bg-blue-500 text-white w-1/2 px-6 py-1 rounded-xl "><i class="fa-solid fa-phone"></i><span> Gọi miễn phí qua internet</span></button>
                        <button class="bg-white text-blue-500  w-1/2 px-6 py-1 rounded-xl "><i class="fa-solid fa-envelope"></i><span> Gửi yêu cầu hỗ trợ ngay</span></button>
                </div>
                </div>
                <div class="w-3/5 h-2/3">
                    <div class=" grid grid-cols-4 pl-16">
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/thoi%20gian.png" alt="">
                            <p class="font-bold">Thời gian</p>
                            <p class="text-sm">4 ngày 3 đêm</p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/phuong%20tien%20di%20chuyen.png" alt="">
                            <p class="font-bold">Phương tiện di chuyển</p>
                            <p class="text-sm"><?php echo $row['product_vehicle'] ?></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/diem%20tham%20quan.png" alt="">
                            <p class="font-bold">Điểm tham quan</p>
                            <p class="text-sm"><?php echo $row['product_locations'] ?>/p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/khach%20san.png" alt="">
                            <p class="font-bold">Khách sạn</p>
                            <p class="text-sm"><?php echo $row['product_hotel'] ?></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/thoi%20gian%20ly%20tuong.png" alt="">
                            <p class="font-bold">Thời gian lí tưởng</p>
                            <p class="text-sm"><?php echo $row['product_timelt'] ?></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/doi%20tuong%20thich%20hop.png" alt="">
                            <p class="font-bold">Dối tượng thích hợp</p>
                            <p class="text-sm"><?php echo $row['product_object'] ?></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/am%20thuc.png" alt="">
                            <p class="font-bold">Ẩm thực</p>
                            <p class="text-sm"><?php echo $row['product_at'] ?></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/uu%20dai.png" alt="">
                            <p class="font-bold">Thời gian</p>
                            <p class="text-sm"><?php echo $row['product_promotion'] ?></p>
                        </div>
                       <style>
                        hr{
                            height: 1px ;
                            background-color: #000;
                            border: none;
                        }
                       </style>
                        <hr>
                        <hr>
                        <hr>
                        <hr>
                    </div>
                </div>
            </div>
            
           
            </form>
                    
    </section>
<?php
include('component/popup_add_product.php');
    }
        
?>
