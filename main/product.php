<!--------------------------Product-------------------------->


<?php

    $sql_pro = "SELECT *from tbl_product WHERE product_code = '$_GET[id]' LIMIT 1";
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
            <div class="grid grid-cols-2 my-5 product-top">
                <div>
                    <p class="font-bold text-2xl"><?php echo $row['product_name'] ?></p>
                    <div class="flex mt-3" >
                        <p class="text-sm"><?php echo $row['product_code'] ?>
                    </p>
                    
                    </div>
                </div>
                <div>
                    <div class="flex">
                        <div class="w-1/3"></div>
                        <div class="grid grid-cols-2">
                            <div><span class="font-bold text-2xl text-red-500"><?php echo number_format($row['product_price'], 0, ',', '.') ?></span><span>/khách</span></div>
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
                                <button class="lienhetuvan border border-solid border-blue-700 text-blue-700 py-3 px-4 rounded-md w-full"><span><a href="#newsletter">Liên hệ tư vấn</a></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_content">
                <div class="product_img flex"   >
                    <div class="w-7/12">
                        <img class="h-full rounded-2xl"  src="admin/main/uploads/<?php echo $row['img_product1'] ?>" alt="">
                    </div>
                    <div class="w-5/12">
                        <div class="flex">
                            <div class="mx-2"><img class=" rounded-2xl" src="admin/main/uploads/<?php echo $row['img_product2'] ?>" alt=""></div>
                            <div><img class=" rounded-2xl" src="admin/main/uploads/<?php echo $row['img_product3'] ?>" alt=""></div>

                        </div>
                        <div  class="ml-2 mt-2">
                        <img class=" rounded-2xl" src="admin/main/uploads/<?php echo $row['img_product4'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_information flex flex-wrap my-5 px-5 pt-5  pb-10 rounded-xl" style="background-color: #F0F0F0;" >
                <div class="w-2/5">
                    <p class="text-sm"><?php echo $row['product_detail'] ?></p>
                    <div class="my-5 p-5">
                        <ul>
                            <li>Địa điểm <span class="font-bold"><?php echo $row['product_location'] ?></span></li>
                        </ul>
                    </div>
                    <p>Quý khách cần hỗ trợ?</p>
                    <div style="border: 1px solid blue;" class="w-3/4 rounded-xl flex mt-5">
                        <button class="bg-blue-500 text-white w-1/2 px-6 py-1 rounded-xl "><i class="fa-solid fa-phone"></i><span> Gọi miễn phí qua internet</span></button>
                        <div class="bg-white text-blue-500  w-1/2 px-6 py-1 rounded-xl "><a href="#newsletter"><i class="fa-solid fa-envelope"></i><span> Gửi yêu cầu hỗ trợ ngay</span></a></div>
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
                            <p class="text-sm">Xe khách</p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/diem%20tham%20quan.png" alt="">
                            <p class="font-bold">Điểm tham quan</p>
                            <p class="text-sm"><?php echo $row['product_name'] ?></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/khach%20san.png" alt="">
                            <p class="font-bold">Khách sạn</p>
                            <p class="text-sm"></p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/thoi%20gian%20ly%20tuong.png" alt="">
                            <p class="font-bold">Thời gian lí tưởng</p>
                            <p class="text-sm">Mùa hè</p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/doi%20tuong%20thich%20hop.png" alt="">
                            <p class="font-bold">Dối tượng thích hợp</p>
                            <p class="text-sm">Gia đình, cặp đôi</p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/am%20thuc.png" alt="">
                            <p class="font-bold">Ẩm thực</p>
                            <p class="text-sm">Đặc sản địa phương</p>
                        </div>
                        <div class="my-5 mx-2">
                            <img class="w-1/6" src="https://travel.com.vn/Content/Theme/images/icons/uu%20dai.png" alt="">
                            <p class="font-bold">Thời gian</p>
                            <p class="text-sm"></p>
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
                    
            <div class="product_information  my-5 px-5 pt-5  pb-10 rounded-xl" style="background-color: #F0F0F0;" >
                       <h2>
                        Bình luận sản phẩm:
                    </h2>
                       <form action="main/comment.php?idsp=<?php echo $row['product_code'] ?>" method="post">
                        <textarea name="comment" id="" cols="5" rows="3" class="w-full"></textarea>
                        <button style="float: right;" type="submit" name="cmt">
                        <div aria-disabled="true" aria-label="Bình luận" class="x1i10hfl x1qjc9v5 xjqpnuy xa49m3k xqeqjp1 x2hbi6w x9f619 xdl72j9 x2lah0s xe8uvvx x2lwn1j xeuugli x16tdsg8 x1hl2dhg xggy1nq x1ja2u2z x1h6gzvc x1t137rt x1o1ewxj x3x9cwd x1e5q0jg x13rtm0m x1q0g3np x87ps6o x1lku1pv x1a2a7pz xjyslct xjbqb8w x13fuv20 xu3j5b3 x1q0q8m5 x26u7qi x972fbf xcfux6l x1qhh985 xm0m39n x3nfvp2 xdj266r x11i5rnm xat24cr x1mh8g0r xexx8yu x4uap5 x18d9i69 xkhd6sd x1n2onr6 x3ajldb x194ut8o x1vzenxt xd7ygy7 xt298gk x1xhcax0 x1s928wv x10pfhc2 x1j6awrg x1v53gu8 x1tfg27r xitxdhh" role="button" tabindex="-1"><i data-visualcompletion="css-img" class="x1b0d499 xmgbrsx" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/LW7l5LrblCq.png?_nc_eui2=AeGYAPnwcQOBMQXcXH-hipWO5S-xipXi2RflL7GKleLZF1IAVqmqqljBcDJAa4JRadZ8lcKY_ozccgsWVs-EOEBZ&quot;); background-position: -54px -306px; background-size: 74px 342px; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i><div class="x1ey2m1c xds687c xg01cxk x47corl x10l6tqk x17qophe x13vifvy x1ebt8du x19991ni x1dhq9h x14yjl9h xudhj91 x18nykt9 xww2gxu" data-visualcompletion="ignore"></div></div>
                        </button>
                       </form> 
                       <?php
                       $sql = mysqli_query($mysqli, "SELECT * FROM tbl_comment WHERE id_product = '".$row['product_code']."' ");

                       while($row1 = mysqli_fetch_array($sql)){
                        
                        ?>
                        
                        <p class="font-bold"><?php echo $row1['user_name'] ?></p>
                        <p><?php echo $row1['comment_content'] ?></p>
                        <br>
                        <?php
                       }
                       ?>
            </div>
    </section>
<?php
    }
        
?>
