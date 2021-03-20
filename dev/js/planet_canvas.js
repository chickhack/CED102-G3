function doFirst(){
    //先跟HTML畫面產生關連，再建事件聆聽功能
    let canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        image = new Image();
    image.onload = function(){
        var w = 500,
            h = 500;
            image.width = w;
            image.height = h;
            context.drawImage(this, 0, 0 , w, h);
    }
    image.src = '../../dev/img/planet/mars.png'
}
window.addEventListener('load',doFirst);