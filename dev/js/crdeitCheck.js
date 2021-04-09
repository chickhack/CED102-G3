const creditCard = document.querySelectorAll(".credit");
const submitBtn = document.querySelector("input[type='submit']");
let checkCard = () => {
    creditCard.forEach(c => {
        let number = c.value.split("");
        let numArr = [];
        let total = 0;
        number.forEach(num => {
            if(parseInt(num) || parseInt(num) === 0){
                console.log(num);
                numArr.push(num);
            }
        })
        let last = numArr.pop();
    })
}

submitBtn.addEventListener("click", checkCard);