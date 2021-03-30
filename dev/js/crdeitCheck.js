const creditCard = document.querySelectorAll(".credit");
const submitBtn = document.querySelector("input[type='submit']");
let checkCard = () => {
    creditCard.forEach(c => {
        let number = c.value.split("");
        let numArr = [];
        let total = 0;
        number.forEach(num => {
            if(parseInt(num) || parseInt(num) === 0){
                numArr.push(num);
            }
        })
        //判斷卡號為15或16碼
        if(numArr.length == 16){
            numArr.forEach((num,i) => {
                if(i % 2 === 0){
                    if(num * 2 > 10){
                        total += (num * 2) - 9; 
                        console.log(num);
                    }else{
                        total += parseInt(num);
                    }
                }else{
                    total += parseInt(num);
                }
            })
            console.log(total);
        }
    })
}

submitBtn.addEventListener("click", checkCard);