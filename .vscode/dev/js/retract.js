const arrow = document.querySelectorAll(".arrow");
const orderer_form = document.querySelector(".orderer_form");

const recipient_click = document.querySelector(".recipient_click");
const recipient = document.querySelector(".recipient");

const payment_click = document.querySelector(".payment_click");
const payment = document.querySelector(".payment");


console.log(arrow[1]);
arrow[0].addEventListener("click",function(){
    orderer_form.classList.toggle("retract");
})

arrow[1].addEventListener("click",function(){
    recipient.classList.toggle("retract");
})

arrow[2].addEventListener("click",function(){
    payment.classList.toggle("retract");
})