const minus = document.querySelector(".minus");
const number = document.querySelector("input[type='number']");
const add = document.querySelector(".add");

minus.addEventListener("click", function(){
    number.stepDown(1);
})

add.addEventListener("click", function(){
    number.stepUp(1);
})