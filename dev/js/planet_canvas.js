function doFirst(){
    //先跟HTML畫面產生關連，再建事件聆聽功能
    let canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        image = new Image();

    image.onload = function(){
        var w = this.width,
            h = this.height;
        
            canvas.width = w;
            canvas.height = h;
            context.drawImage(this, 0, 0 , w, h);
            context.fillText('Mood', 163, 191); 
    }
    image.src = '../../dev/img/planet/mars.jpg'
    
}
window.addEventListener('load',doFirst);