const burger = document.querySelector(".burger");
const nav = document.querySelector(".nav-links");
const navLinks = document.querySelectorAll(".nav-links li");

const navSlide = () => {
    burger.addEventListener("click",(e) => {
        nav.classList.toggle("nav-active");

        navLinks.forEach((link,index) => {
            if(link.style.animation){
                link.style.animation = "";
            }else{
                link.style.animation = `navLinkFade .5s ease forwards ${index / 5 + 0.8}s`;
            }
        })

        //burger animation
        burger.classList.toggle("toggle");
    })

    document.addEventListener("click",(e) => {
        if(!nav.contains(e.target) && !burger.contains(e.target)){
            nav.classList.remove("nav-active");
            burger.classList.remove("toggle");
            navLinks.forEach((link) => {
                if(link.style.animation){
                    link.style.animation = "";
                }
            })
            // console.log(e.target);
            // console.log(!e.target.classList.contains("burger toggle"));
        }
    })
}

navSlide();