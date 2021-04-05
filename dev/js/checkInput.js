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
}

form.addEventListener("submit", check);