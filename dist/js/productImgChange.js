const bigImg = document.querySelector(".bigImg");
const imgDetails = document.querySelectorAll(".imgDetail img");

imgDetails.forEach(img => img.addEventListener("click",function(){
    bigImg.src = img.src;
}));