const form = document.querySelector(".form");
const modal = document.querySelector(".modal");

function check(e){
    //名字一定要填
    const ofName = document.querySelector("#ofName");
    const fName = document.querySelector("#fName");

    if(ofName.value == "" && fName.value == ""){
        alert("名字未填寫");
        e.preventDefault();
        return;
    }
    //姓氏一定要填
    const olName = document.querySelector("#olName");
    const lName = document.querySelector("#lName");

    if(olName.value == "" && lName.value == ""){
        alert("姓氏未填寫");
        e.preventDefault();
        return;
    }
    //手機一定要填
    const omobile = document.querySelector("#omobile");
    const mobile = document.querySelector("#mobile");

    if(omobile.value < 10 && mobile.value < 10){
        alert("手機號碼未滿10碼");
        e.preventDefault();
        return;
    }
    //電子信箱一定要填
    const oemail = document.querySelector("#oemail");
    const email = document.querySelector("#email");

    if(oemail.value == "" && email.value == ""){
        alert("電子信箱未填寫");
        e.preventDefault();
        return;
    }
    //收件地址一定要填
    const address = document.querySelector("#address");

    if(address.value == ""){
        alert("收件地址未填寫");
        e.preventDefault();
        return;
    }

    //信用卡檢查
    const credit = document.querySelector(".credit");
    let odd = 0;
    let even = 0;
    let total = 0;

    if(credit.value){
        let cNum = credit.value.split("-").join("").split("");
        let checkNum = cNum.pop();
        let reverseNum = cNum.reverse();

        reverseNum.forEach((num,i) => {
            let trueNum = reverseNum[i] * 2;
            //16碼
            if(reverseNum.length == 15){
                if((i+1) % 2 == 1){
                    trueNum >= 10 ? trueNum -= 9 : trueNum;
                    odd += trueNum;
                    // console.log(odd);
                }else{
                    even += parseInt(num);
                }
            //15碼
            }else if(reverseNum.length == 14){
                if(i % 2 == 1){
                    odd += parseInt(num);
                }else{
                    trueNum >= 10 ? trueNum -= 9 : trueNum;
                    even += trueNum;
                }
            }
            total = odd + even ;
        })
        let final = total % 10;
        if(10 - final != checkNum){
            alert("信用卡卡號錯誤")
            e.preventDefault();
            return;
        }
    }
}

form.addEventListener("submit", check);