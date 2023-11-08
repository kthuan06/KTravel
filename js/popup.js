var btnOpen = document.querySelector('.add_pro_btn')
var popup = document.querySelector('.popup')
var iconClose  = document.querySelector('.popup_header button')
var btnClose = document.querySelector('.poppup_footer button')

function toggleModal()
{
    popup.classList.toggle('hide')
}

btnOpen.addEventListener('click', toggleModal)
popup.addEventListener('click', toggleModal)
iconClose.addEventListener('click', toggleModal)
btnClose.addEventListener('click', function(e){
    if(e.target == e.currentTarget){
        toggleModal()
    }
})
