new Cleave("#discount",{
    numeral: true,
    numeralThousandGroupStyle: "thousand"
})

new Cleave(".credit",{
    creditCard: true,
    delimiter: "-",
    onCreditCardTypeChanged: function(type){
        if(type === "visa"){
            document.querySelector(".fa-cc-visa").classList.add("use");
        }else if(type === "jcb"){
            document.querySelector(".fa-cc-jcb").classList.add("use");
        }else if(type === "amex"){
            document.querySelector(".fa-cc-amex").classList.add("use");
        }else if(type === "diners"){
            document.querySelector(".fa-cc-diners-club").classList.add("use");
        }else if(type === "mastercard"){
            document.querySelector(".fa-cc-mastercard").classList.add("use");
        }else if(type === "discover"){
            document.querySelector(".fa-cc-discover").classList.add("use");
        }else{
            document.querySelector(".fa-cc-visa").classList.remove("use");
            document.querySelector(".fa-cc-jcb").classList.remove("use");
            document.querySelector(".fa-cc-diners-club").classList.remove("use");
            document.querySelector(".fa-cc-amex").classList.remove("use");
            document.querySelector(".fa-cc-mastercard").classList.remove("use");
            document.querySelector(".fa-cc-discover").classList.remove("use");
        }
    }
})

new Cleave('#mobile', {
    phone: true,
    phoneRegionCode: 'TW'
});

new Cleave("#creditDate", {
    date: true,
    datePattern: ['m', 'y']
})
