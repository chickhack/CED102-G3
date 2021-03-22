//控制表單縮放
$('#btn-opmenu').click(function(){
    //自動縮放
    $('#orderinfo-automenu').slideToggle();
    //自動判斷添加class替換before內容
    $('#btn-opmenu').toggleClass("svgRight");
});
$('.btn-addPay').click(function(){
    $('.automena').slideToggle();
    $('.btn-addPay').toggleClass("svgRight");
    
});
$('.btn-paymethod').click(function(){
    $('.paymethod-automanu').slideToggle();
    $('.btn-paymethod').toggleClass("svgRight");
    
});
$('.btn-orderDetails').click(function(){
    $('#orderDetails-automanu').slideToggle();
    $('.btn-orderDetails').toggleClass("svgRight");
    
});
$('#paymethod-automanu-car').click(function(){
    $('#car-auto').slideToggle();
});