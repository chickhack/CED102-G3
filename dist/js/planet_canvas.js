function doFirst(){
    //先跟HTML畫面產生關連，再建事件聆聽功能
    let canvas = document.getElementById('canvas');
    let context = canvas.getContext('2d');
    
    //劃格線
    for(let i = 0; i < 100; i++){
        let position = i * 50;
        //水平線
        context.moveTo(0, position);
        context.lineTo(canvas.width, position);
        context.fillText(position, 0, position);

        //垂直線
        context.moveTo(position, 0);
        context.lineTo(position, canvas.height);
        context.fillText(position, position, 10);

    }
    context.strokeStyle='rgba(0,0,0,0.3)';    
    context.stroke();

    let pic = new Image();
    pic.src = '../../images/cityscape.jpg';
    pic.addEventListener('load',function(){
        // context.drawImage(pic, 100, 100);
        context.drawImage(pic, 0, 0, canvas.width, canvas.height);
    });
}
window.addEventListener('load',doFirst);

