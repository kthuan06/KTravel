//-----------------Ẩn hiện địa điểm---------

const  iSlideBar = document.querySelectorAll(".locations")
iSlideBar.forEach(function(menu,index){
    menu.addEventListener("click", function(){
        menu.classList.toggle("block")
    })
})