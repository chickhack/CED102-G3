// 用js抓到CSS屬性
var sub1= document.getElementById('orderinfo-automenu');
var sub =window.getComputedStyle(sub1).display;
alert(sub);
// 用JQ抓到CSS屬性
var subjq = $().css()
//控制表單縮放
// var sub = $('#orderinfo-automenu').css("display");
$('#btn-opmenu').click(function(){
    //自動縮放
    $('#orderinfo-automenu').slideToggle();
    //自動判斷添加class替換before內容
    $('#btn-opmenu').toggleClass("svgRight");
    
});
$('#addPay-btn').click(function(){
    $('.automena').slideToggle();
    $('#addPay-btn').toggleClass("svgRight");
    
});
$('.btn-paymethod').click(function(){
    $('.paymethod-automanu').slideToggle();
    $('.btn-paymethod').toggleClass("svgRight");
    
});
$('#btn-orderDetails').click(function(){
    $('#orderDetails-automanu').slideToggle();
    $('#btn-orderDetails').toggleClass("svgRight");
    
});
$('#paymethod-automanu-car').click(function(){
    $('#car-auto').slideToggle();
});
$('#btn-paymethod').click(function(){
    $('.paymethod-automanu').slideToggle();
    $('#btn-paymethod').toggleClass("svgRight");
    
});