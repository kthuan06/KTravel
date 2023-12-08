
<?php
include "admin/config/config.php";
?>
<?php 
                
    $sql_select_in = "SELECT *from tbl_cartegory WHERE cartegory_type = 'Trong nước'";
    $query_select_in = mysqli_query($mysqli, $sql_select_in);
    
                
    $sql_select_out = "SELECT *from tbl_cartegory WHERE cartegory_type = 'Ngoài nước'";
    $query_select_out = mysqli_query($mysqli, $sql_select_out);




?>     

<?php 
    
    $sql_pro_in = "SELECT *from tbl_product WHERE product_type = 'Trong nước'";
    $query_pro_in = mysqli_query($mysqli, $sql_pro_in);
    
                
    $sql_pro_out = "SELECT *from tbl_product WHERE product_type = 'Ngoài nước'";
    $query_pro_out = mysqli_query($mysqli, $sql_pro_out);
    

            
?>  
<?php
    $tmp_location ;
?>

<!----------Cartegory---------->
    <section class="cartegory mx-auto w-11/12 mt-10">
        <div class="container">
            <div>
                <p><a href="index.php" class="mx-2">Trang chủ</a> <span class="mx-2">&#8594;</span> <a class="mx-2" href="">Địa điểm</a></p>
            </div>
        </div>

        <script>
                const  iSlideBar = document.querySelectorAll(".locations")
                iSlideBar.forEach(function(menu,index){
                menu.addEventListener("click", function(){
                menu.classList.toggle("block")
                        })
                    })
            </script>
        <style>
            /* .locations ul{
                display: none;
            } */
            .locations.block ul{
                display: block;
            }
        </style>

        <div class="flex mt-10 ">
            <div class="w-1/6 mx-auto hidden md:block">
                <ul>
                    <li class="text-2xl font-bold mb-10  locations"><a href="index.php?main=location&id=in">Trong nước</a>
                        <ul class="text-sm font-medium mt-3 ml-5">
                            <?php
                        while($row1 = mysqli_fetch_array($query_select_in)){
                        ?>
                            <li><a href="index.php?main=location&id=<?php echo $row1['cartegory_id'] ?>"><?php echo $row1['cartegory_name']?></a></li>
                            <?php
                            }?>
                        </ul>
                </li>
                    <li class="text-2xl font-bold locations"><a href="index.php?main=location&id=out">Ngoài nước</a>
                    <ul class="text-sm font-medium mt-3 ml-5">
                    <?php
                        while($row2 = mysqli_fetch_array($query_select_out)){
                        ?>
                            <li><a href="index.php?main=location&id=<?php echo $row2['cartegory_id'] ?>"><?php echo $row2['cartegory_name']?></a></li>
                            <?php
                            }?>
                    </ul>
                </li>
                </ul>
            </div>
            
            
           
            <div class="w-5/6 mx-auto"> 
                <div class="grid grid-cols-2">

                    <div>           
                    <p class="text-xl font-bold">
                        <?php
                            if($_GET['id'] == 'in'){
                                echo "Trong nước";
                            }elseif($_GET['id'] == 'out') {
                                echo "Ngoài nước";
                            }else {
                                $sql_title = "SELECT *from tbl_cartegory WHERE cartegory_id = $_GET[id]";
                                $query_title = mysqli_query($mysqli, $sql_title);

                                while($title = mysqli_fetch_array($query_title)){
                                    echo $title['cartegory_name'];
                                    $tmp_location = $title['cartegory_name'];
                                }
                            }
                        ?>
                    </p>
                    </div>
                    <form class="flex" action="index.php?main=find" method="POST">
                            <div class="mx-1">
                                <input type="text" class="border border-solid rounded-md w-full py-2" placeholder="Tim kiem..." name="keyword">
                                 </div>
                            <div class="mx-1" >
                                <select name="order" id="" class="border border-solid px-16 py-2 w-auto rounded-md" style="cursor: pointer;"> 
                                    <option value="">Sắp xếp</option>
                                    <option value="high">Giá cao đến thấp</option>
                                    <option value="low">Giá thấp đến cao</option>
                                </select>
                            </div>
                            <button type="sub" class="block px-4 leading-loose text-xs text-center font-semibold leading-none bg-blue-100 hover:bg-gray-100 rounded-xl" name="find" value="find">Tìm</button>
                           
                    </form>
                </div>
                <!-- <style>
                    .filter_div > div{
                        border: 1px solid;
                        padding: 5px 0px;
                        margin: 2px;
                        border-radius: 5px;
                        text-align: center;
                    }
                    .filter_div > div:hover{
                        background-color: blue;
                        color: #F0F0F0;
                    }
                    
                </style>
                <div class="filter grid grid-cols-3 border border-solid p-2 rounded-xl py-10 my-5 hidden">
                    <div class="mx-5">
                        <p class="text-sm font-medium mb-5">SỐ NGÀY</p>
                        <div class="filter_div grid grid-cols-2">
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        </div>
                    </div>
                    <div class="mx-5">
                        <p class="text-sm font-medium mb-5">SỐ NGƯỜI</p>
                        <div class="filter_div grid grid-cols-2">
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        </div>
                    </div>
                    <div class="mx-5">
                        <p class="text-sm font-medium mb-5">DÒNG TOUR</p>
                        <div class="filter_div grid grid-cols-2">
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        <div>1-3 ngày</div>
                        </div>
                    </div>
                </div> -->


                <?php 
                
                $sql_pro_in = "SELECT *from tbl_product WHERE product_type = 'Trong nước'";
                $query_pro_in = mysqli_query($mysqli, $sql_pro_in);
                
                            
                $sql_pro_out = "SELECT *from tbl_product WHERE product_type = 'Ngoài nước'";
                $query_pro_out = mysqli_query($mysqli, $sql_pro_out);
            
                ?>  



                <div class="content grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1  mt-5">
                    <?php
                        if($_GET['id'] == 'in'){
                            while($row3 = mysqli_fetch_array($query_pro_in)){
                        
                    ?>
                    <div class="mx-3 border border-solid rounded-xl mt-5">
                        <img src="admin/main/uploads/<?php echo $row3['product_img'] ?>" alt="">
                        <div class="p-3">
                            <h2 class="font-bold"><?php echo $row3['product_name'] ?></h2><br>
                            <p>Địa điểm: <span class="font-bold"><?php echo $row3['product_location'] ?></span></p>
                            <p class="text-md font-bold text-red-500 my-5"><?php echo number_format($row3['product_price'], 0, ',', '.') ?>₫</p>
                            <p class="text-sm font-bold my-5"> Mã: <?php echo $row3['product_code'] ?></p>
                            <div style="display:flex; justify-content: space-between;">
                                <a href="index.php?main=payment2&action=booknow&code=<?php echo $row3['product_code'] ?>"><button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button></a>
                                <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="index.php?main=product&id=<?php echo $row3['product_code'] ?>">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }elseif($_GET['id'] == 'out'){
                            while($row4 = mysqli_fetch_array($query_pro_out)){
                        
                   ?>
                   <div class="mx-3 border border-solid rounded-xl mt-5">
                        <img src="admin/main/uploads/<?php echo $row4['product_img'] ?>" alt="">
                        <div class="p-3">
                            <h2 class="font-bold"><?php echo $row4['product_name'] ?></h2><br>
                            <p>Địa điểm: <span class="font-bold"><?php echo $row4['product_location'] ?></span></p>
                            <p class="text-md font-bold text-red-500 my-5"><?php echo number_format($row4['product_price'], 0, ',', '.') ?>₫</p>
                            <p class="text-sm font-bold my-5"> Mã: <?php echo $row4['product_code'] ?></p>
                            <div style="display:flex; justify-content: space-between;">
                                <a href="index.php?main=payment2&action=booknow&code=<?php echo $row4['product_code'] ?>"><button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button></a>
                                <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="index.php?main=product&id=<?php echo $row4['product_code'] ?>">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }else{
                            $sql_pro = "SELECT *from tbl_product WHERE product_location = '".$tmp_location."'";
                            $query_pro = mysqli_query($mysqli, $sql_pro);

                            



                            while($row5 = mysqli_fetch_array($query_pro)){
                        
                    ?>
                        <div class="mx-3 border border-solid rounded-xl mt-5">
                        <img src="admin/main/uploads/<?php echo $row5['product_img'] ?>" alt="">
                        <div class="p-3">
                            <h2 class="font-bold"><?php echo $row5['product_name'] ?></h2><br>
                            <p>Địa điểm: <span class="font-bold"><?php echo $row5['product_location'] ?></span></p>
                            <p class="text-md font-bold text-red-500 my-5"><?php echo number_format($row5['product_price'], 0, ',', '.') ?>₫</p>
                            <p class="text-sm font-bold my-5"> Mã: <?php echo $row5['product_code'] ?></p>
                            <div style="display:flex; justify-content: space-between;">
                                <a href="index.php?main=payment2&action=booknow&code=<?php echo $row5['product_code'] ?>"><button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button></a>
                                <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="index.php?main=product&id=<?php echo $row5['product_code'] ?>">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>


