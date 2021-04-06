// 用js抓到CSS屬性
// var sub1= document.getElementById('orderinfo-automenu');
// var sub =window.getComputedStyle(sub1).display;
// var sub=sub1.style.display;
// alert(sub);
// 用JQ抓到CSS屬性
// var subjq = $('#orderinfo-automenu').css("display");
// alert(subjq);
//控制表單縮放
// var sub = $('#orderinfo-automenu').css("display");
$('#btn-opmenu').click(function(){
    // var sub1= document.getElementById('orderinfo-automenu');
    // var sub =window.getComputedStyle(sub1).display;
    // console.log(sub);
    //自動縮放 有非同步問題資料抓取要先行
    $('#orderinfo-automenu').slideToggle();
    // alert(sub);
    // alert(sub);

    // console.log(sub1.getAttribute('style'));
    // console.log(sub1.style.cssText);
    // alert($('#orderinfo-automenu').css("display"));
    //自動判斷添加class替換before內容
    $('#btn-opmenu').toggleClass("svgRight");
    // if(subjq == 'block'){
    //     alert("dddddd");
    //     $('#submit-btn').attr("disabled",true);
    // }
});
$('#addPay-btn').click(function(){
    $('.automena').slideToggle();
    $('#addPay-btn').toggleClass("svgRight");
    
});
$('#paymethod-automanu-car').click(function(){
    $('#car-auto').slideToggle();
});
$('#btn-paymethod').click(function(){
    $('.paymethod-automanu').slideToggle();
    $('#btn-paymethod').toggleClass("svgRight");
    
});
//表單欄位檢查
document.getElementById('submit-btn').addEventListener('click',function(){
    // 抓取姓
    let lastnames = document.getElementById('last-name');
    // 抓取名
    let firstnames = document.getElementById('first-name');
    // 抓取電話
    let phones = document.getElementById('phone');
    // 抓取email
    let emails = document.getElementById('email');
    // alert('1111');
    //強制表單展開
    document.getElementById('orderinfo-automenu').style.display='block';
    document.getElementById('car-auto').style.display='block';

    if(lastnames.value ==""){
        return;
    }else if(firstnames.value == ""){
        return;
    }else if(phones == ''){
        return;
    }else if(emails ==''){
        return;
    }else{
        document.getElementById("submit-btn").submit();
    }



});