<div class="header  h-56 w-11/12 my-10 mx-auto ">
            <a href="index.php">
            <img src="./images/banner.png" alt="" class="w-full h-full"></a>
        </div>
        <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

<article x-data="slider" class="relative w-11/12 my-10 mx-auto flex flex-shrink-0 overflow-hidden shadow-2xl">
    <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
        <span x-text="currentIndex"></span>/
        <span x-text="images.length"></span>
    </div>

    <template x-for="(image, index) in images">
        <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
        
        </figure>
    </template>

    <button @click="back()"
        class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </button>

    <button @click="next()"
    class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</article>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                'https://images.vietnamtourism.gov.vn/vn/images/events/2-v-giaithuongdl2023-1920.jpg',
                'https://images.vietnamtourism.gov.vn/vn/images/banners/2023/4-v-giaithuongdl2023-1920.jpg',
                'https://images.vietnamtourism.gov.vn/vn/images/banners/2023/5-v-giaithuongdl2023-1920.jpg',
                'https://images.vietnamtourism.gov.vn/vn/images/events/1-v-giaithuongdl2023-1920.jpg',
                'https://images.vietnamtourism.gov.vn/vn/images/events/3-v-giaithuongdl2023-1920.jpg'
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>
        <p class="text-4xl font-bold text-blue-700 ml-5 mb-5">Ưu đãi</p>
        <div class="">
           
            <div class="flex">
            
            <a href="" class="w-1/5 mx-auto"><img  src="https://media.travel.com.vn/Advertisings/bn_230728_HanhHuongAnDoedit.webp" alt=""></a>
            <a href="" class="w-1/5 mx-auto"><img  src="https://media.travel.com.vn/Advertisings/bn_230818_BANNER_HANQUOC_1011.webp" alt=""></a>
            <a href="" class="w-1/5 mx-auto"><img  src="https://media.travel.com.vn/Advertisings/bn_230911_BannerUuDaiNhom_BannerUudai%20412-309px.webp" alt=""></a>
            <a href="" class="w-1/5 mx-auto"><img  src="https://media.travel.com.vn/Advertisings/bn_230911_BannerLuotSongHan%20412x309px-01.webp" alt=""></div></a>
        </div>

        <p class="text-4xl font-bold text-blue-700 ml-5 my-5">Khám phá sản phẩm</p>
        <div class="flex">
           
                <div  class=" w-1/6 mx-auto">
                    <a href="" style=" position: relative; display: inline-block;">
                        <img style="border-radius: 10px;" src="https://media.travel.com.vn/Advertisings/bn_230629_1-2.webp" alt="">
                        <div style="position: absolute; bottom: 10px;left: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.5);color: white;padding: 5px; font-size: large;">Ưu đãi khách du lịch trong nước</div>
                    </a>
                </div>
                <div  class=" w-1/6 mx-auto">
                    <a href="" style=" position: relative; display: inline-block;">
                        <img style="border-radius: 10px;" src="https://media.travel.com.vn/Advertisings/bn_230809_216x324southkorea.webp" alt="">
                        <div style="position: absolute; bottom: 10px;left: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.5);color: white;padding: 5px; font-size: large;">Ngắm cảnh đẹp khắp thế giới</div>
                    </a>
                </div>
                <div  class=" w-1/6 mx-auto">
                    <a href="" style=" position: relative; display: inline-block;">
                        <img style="border-radius: 10px;" src="https://media.travel.com.vn/Advertisings/bn_230628_bromo3.webp" alt="">
                        <div style="position: absolute; bottom: 10px;left: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.5);color: white;padding: 5px; font-size: large;">Cắm trại và tận hưởng thiên nhiên</div>
                    </a>
                </div>
                <div  class=" w-1/6 mx-auto">
                    <a href="" style=" position: relative; display: inline-block;">
                        <img style="border-radius: 10px;" src="https://media.travel.com.vn/Advertisings/bn_230629_1-1.webp" alt="">
                        <div style="position: absolute; bottom: 10px;left: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.5);color: white;padding: 5px; font-size: large;">Di chuyển đa dạng các phương tiện</div>
                    </a>
                </div>
                <div  class=" w-1/6 ml-auto">
                    <a href="" style=" position: relative; display: inline-block;">
                        <img style="border-radius: 10px;" src="https://media.travel.com.vn/Advertisings/bn_230809_rs%20newyork.webp" alt="">
                        <div style="position: absolute; bottom: 10px;left: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.5);color: white;padding: 5px; font-size: large;">Thăm quan các kì quan thế giới</div>
                    </a>
                </div>
        </div>

        <p class="text-4xl font-bold text-blue-700 ml-5 my-5">Điểm đến yêu thích</p>
        <div class="grid 2xl:grid-cols-4 grid-cols-2 ">
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=32"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_chau-my.webp" alt=""></a>
                <p class="text-2xl font-bold">Hạ Long</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=35"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_cau-rong-ve-dem.webp" alt=""></a>
                <p class="text-2xl font-bold">Đà Nẵng</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=38"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_da-lat.webp" alt=""></a>
                <p class="text-2xl font-bold">Đà Lạt</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=40"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_phu-quoc.webp" alt=""></a>
                <p class="text-2xl font-bold">Phú Quốc</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
        
        
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=49"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_chau-a.webp" alt=""></a>
                <p class="text-2xl font-bold">Nhật Bản</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=46"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_chau-my.webp" alt=""></a>
                <p class="text-2xl font-bold">Argentina</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=44"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_chau-au.webp" alt=""></a>
                <p class="text-2xl font-bold">Pháp</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
            <div  class="2xl:mx-12 mx-auto">
                <a href="index.php?main=location&id=43"><img style="border-radius: 10px;" src="https://media.travel.com.vn/destination/dg_230628_chau-uc.webp" alt=""></a>
                <p class="text-2xl font-bold">Úc</p>
                <p>Hơn 100.000 lượt khách</p>
            </div>
        </div>

        


        

    <p class="text-4xl font-bold text-blue-700 ml-5 my-5">Ưu điểm của KTravel</p>
    
    <div class="grid grid-cols-1  lg:grid-cols-2 xl:grid-cols-3 mb-20">
        <div class=" border border-2 border-solid pb-16 bg-blue-300 mx-16 mb-16" style="border-radius: 20px;">
            <a href="">
                <div style="text-align: center;"><img style=" height: 50px;margin:40px auto ;" src="./icon/location-dot-solid.svg" alt=""></div>
                <p style="text-align: center;" class="text-2xl font-bold">Đa dạng</p>
                <br><p style="text-align: center;">Nhiều địa điểm để bạn lựa chọn</p>
            </a>
        </div>
        <div class=" border border-2 border-solid pb-16 bg-blue-300 mx-16 mb-16" style="border-radius: 20px;">
            <a href="">
                <div style="text-align: center;"><img style=" height: 50px;margin:40px auto ;" src="./icon/check-solid.svg" alt=""></div>
                <p style="text-align: center;" class="text-2xl font-bold">Tiện lợi</p>
                <br><p style="text-align: center;">Booking ngay trên thiết bị thông minh của bạn</p>
            </a>
        </div>
        <div class=" border border-2 border-solid pb-16 bg-blue-300 mx-16 mb-16" style="border-radius: 20px;">
            <a href="">
                <div style="text-align: center;"><img style=" height: 50px;margin:40px auto ;" src="./icon/cart-shopping-solid.svg" alt=""></div>
                <p style="text-align: center;" class="text-2xl font-bold">Giá cả</p>
                <br><p style="text-align: center;">Săn deal du lịch giá siêu rẻ</p>
            </a>
        </div>
        
        <div class=" border border-2 border-solid pb-16 bg-blue-300 mx-16 mb-16" style="border-radius: 20px;">
            <a href="">
                <div style="text-align: center;"><img style=" height: 50px;margin:40px auto ;" src="./icon/suitcase-medical-solid.svg" alt=""></div>
                < <p style="text-align: center;" class="text-2xl font-bold">Hỗ trợ</p>
                <br><p style="text-align: center;">Dịch vụ hỗ trợ khách hàng nhanh gọn</p>
            </a>
        </div>
        <div class=" border border-2 border-solid pb-16 bg-blue-300 mx-16 mb-16" style="border-radius: 20px;">
            <a href="">
                <div style="text-align: center;"><img style=" height: 50px;margin:40px auto ;" src="./icon/headset-solid.svg" alt=""></div>
                <p style="text-align: center;" class="text-2xl font-bold">Hotline</p>
                <br><p style="text-align: center;">0915300090(7h-22h)</p>
            </a>
        </div>
        <div class=" border border-2 border-solid pb-16 bg-blue-300 mx-16 mb-16" style="border-radius: 20px;">
            <a href="">
                <div style="text-align: center;"><img style=" height: 50px;margin:40px auto ;" src="./icon/location-dot-solid.svg" alt=""></div>
                <p style="text-align: center;" class="text-2xl font-bold">Đa dạng</p>
                <br><p style="text-align: center;">Nhiều địa điểm để bạn lựa chọn</p>
            </a>
        </div>
        
        </div>