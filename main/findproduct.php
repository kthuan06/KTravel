<?php 
            if(isset($_POST['find'])){
                $keyword = $_POST['keyword'];
            }
                $sql = "SELECT *from tbl_product WHERE tbl_product.product_name LIKE '%$keyword%'OR tbl_product.product_location LIKE '%$keyword%' ";
                $query = mysqli_query($mysqli, $sql);
                
                            
                ?>  


                <p class="font-bold text-xl mt-10">Từ khóa tìm kiếm: <span class="text-red-500">"<?php echo $keyword ?>"</span></p>
                <div class="content grid grid-cols-5  mt-5">
                    <?php
                         while($row3 = mysqli_fetch_array($query)){
                        
                    ?>
                    <div class="mx-3 border border-solid rounded-xl mt-5">
                        <img src="admin/main/uploads/<?php echo $row3['product_img'] ?>" alt="">
                        <div class="p-3">
                            <h2 class="font-bold"><?php echo $row3['product_name'] ?></h2><br>
                            <p>Địa điểm: <span class="font-bold"><?php echo $row3['product_location'] ?></span></p>
                            <p class="text-md font-bold text-red-500 my-5"><?php echo number_format($row3['product_price'], 2, '.', ',') ?>₫</p>
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
                        
                        ?>