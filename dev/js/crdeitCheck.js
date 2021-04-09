const credit = document.querySelector("#credit");
const credit_icon = document.querySelector(".credit_icon");
const credit_check = document.querySelector(".credit_check");
credit.addEventListener("change",function(){
    if(this.checked){
        credit_icon.style.display = "block";
        credit_check.style.display = "flex";
    }else{
        credit_icon.style.display = "none";
        credit_check.style.display = "none";
    }
})