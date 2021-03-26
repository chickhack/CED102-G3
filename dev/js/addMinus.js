const minus = document.querySelector(".minus");
const number = document.querySelector("input[type='number']");
const add = document.querySelector(".add");

minus.addEventListener("click", function(){
    number.stepDown(1);
})

add.addEventListener("click", function(){
    number.stepUp(1);
})

const minus2 = document.querySelector("#minus");
const number2 = document.querySelector("#num");
const add2 = document.querySelector("#add");

minus2.addEventListener("click", function(){
    number.stepDown(1);
})

add2.addEventListener("click", function(){
    number.stepUp(1);
})