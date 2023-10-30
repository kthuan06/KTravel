

<!----------Cartegory---------->
    <section class="cartegory mx-20 mt-10">
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

        <div class="flex mt-10">
            <div class="w-1/6 mx-auto">
                <ul>
                    <li class="text-2xl font-bold mb-10  locations"><a href="#">Trong nước</a>
                        <ul class="text-sm font-medium mt-3 ml-5">
                            <li><a href=""></a>Hà Nội</li>
                            <li><a href=""></a>Hạ Long</li>
                            <li><a href=""></a>Huế</li>
                            <li><a href=""></a>Quảng Bình</li>
                            <li><a href=""></a>Đà Nẵng</li>
                            <li><a href=""></a>Quảng Nam</li>
                            <li><a href=""></a>Nha Trang</li>
                            <li><a href=""></a>Đà Lạt</li>
                            <li><a href=""></a>Phan Thiết</li>
                            <li><a href=""></a>Bà Rịa - Vũng Tàu</li>

                        </ul>
                </li>
                    <li class="text-2xl font-bold locations"><a href="#">Ngoài nước</a>
                    <ul class="text-sm font-medium mt-3 ml-5">
                        <li><a href=""></a>Trung Quốc</li>
                        <li><a href=""></a>Thái Lan</li>
                        <li><a href=""></a>Malaysia</li>
                        <li><a href=""></a>Singapore</li>
                        <li><a href=""></a>Hàn Quốc</li>
                        <li><a href=""></a>Úc</li>
                        <li><a href=""></a>Mỹ - Hoa Kỳ</li>
                        <li><a href=""></a>Nhật Bản</li>
                        <li><a href=""></a>Ấn Độ</li>
                        <li><a href=""></a>Philippines</li>
                    </ul>
                </li>
                </ul>
            </div>
            
            
            <script>
                const boloc = document.querySelector(".button_filter")
                if(boloc){
                    boloc.addEventListener("click", function(){
                        document.querySelector(".filter").style.display = "block"
                    })
                }
            </script>
            <div class="w-5/6 mx-auto">
                <div class="grid grid-cols-2">
                    <div>           
                    <p class="text-xl font-bold">Hà nội</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="mx-1">
                            <button class="border border-solid px-16 py-1 w-full rounded-md button_filter" style="cursor: pointer;"><span>---Bộ lọc---</span></button>
                        </div>
                        <div class="mx-1" >
                            <select name="" id="" class="border border-solid px-16 py-1 w-full rounded-md" style="cursor: pointer;"> 
                                <option value="">Sắp xếp</option>
                                <option value="Giá cao đến thấp"></option>
                                <option value="Giá thấp đến cao"></option>
                            </select>
                        </div>
                    </div>
                </div>
                <style>
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
                </div>
                <div class="content grid grid-cols-4  mt-5">
                    <div class="mx-3 border border-solid rounded-xl">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <a href="payment1.php"><button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button></a>
                                <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="index.php?main=product">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="mx-3 border border-solid rounded-xl my-3">
                        <img src="https://media.travel.com.vn/destination/tf_220715111546_272791.jpg" alt="">
                        <div class="p-3">
                            <h2 class="font-bold">Hà Nội - Vịnh Hạ Long - Chùa Bái Đính - Tràng An - Tuyệt Tịnh Cốc (Khách sạn 4 sao) | Kích cầu du lịch</h2><br>
                            <p>Nơi khởi hành: <span class="font-bold">TP. Hồ Chí Minh</span></p>
                            <p class="text-md font-bold text-red-500 my-5">7,990,000₫</p>
                            <div style="display:flex; justify-content: space-between;">
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md"><i class="fa-solid fa-cart-shopping"></i><span> Đặt ngay</span></button>
                              <style>
                                    .chitiet:hover {
                                        background-color: blue;
                                
                                    }
                                    .chitiet:hover >a {
                                        color: #F0F0F0;
                                    }
                                </style>
                                <button class="chitiet py-1 px-2 rounded-md" style="border: 1px solid blue; color: blue;"><a href="product.php">Xem chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


