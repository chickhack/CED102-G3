const navCart = document.querySelector(".nav-cart") ;
// const cart_btn = document.querySelectorAll(".cart_btn") ;
const cart_slide = document.querySelector(".cart_slide") ;
const close_btn = document.querySelector(".close_btn") ;
const cart_info = document.querySelector(".cart_info") ;
const empty = document.querySelector(".cart_info h3") ;

//按ADD TO CART和購物車icon購物車選單從旁邊滑出
const cartSlide = () => {
    close_btn.addEventListener("click" , () => {
        cart_slide.classList.remove("cart-active") ;
    })
    navCart.addEventListener("click",function(e) {
        cart_slide.classList.toggle("cart-active") ;
        e.stopPropagation();
        nav.classList.remove("nav-active");
            burger.classList.remove("toggle");
            navLinks.forEach((link) => {
                if(link.style.animation){
                    link.style.animation = "";
                }
            })
    })

    document.addEventListener("click" , (e) => {
        if(!cart_slide.contains(e.target)){
            cart_slide.classList.remove("cart-active") ;
        }
    })
    // cart_btn.forEach(btn => btn.addEventListener("click" , function(){
    //     cart_slide.classList.add("cart-active") ;
    // })) ;
}
cartSlide();