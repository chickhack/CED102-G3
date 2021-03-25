const orderer_click = document.querySelector(".orderer_click");
const orderer_form = document.querySelector(".orderer_form");

const recipient_click = document.querySelector(".recipient_click");
const recipient = document.querySelector(".recipient");

const payment_click = document.querySelector(".payment_click");
const payment = document.querySelector(".payment");

orderer_click.addEventListener("click",function(){
    orderer_form.classList.toggle("retract");
})

recipient_click.addEventListener("click",function(){
    recipient.classList.toggle("retract");
})

payment_click.addEventListener("click",function(){
    payment.classList.toggle("retract");
})