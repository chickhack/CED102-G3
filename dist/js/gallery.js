new Vue({
    el: '#gallery',
      
      data: { 
          image1 :"/",
          image2 :'/img/home/mars2.jpg',
          image3 :"../img/home/首頁-互動牆壁2.jpg",
          image4 :"../img/home/首頁-互動牆壁8.jpg",
          image5 :"../img/home/首頁-互動牆壁9.jpg",
          image6 :"../img/photowall/big/mars_b1.jpg",
          image7 :"../img/photowall/big/mars_b2.jpg",
          image8 :"../img/photowall/big/mars_b3.jpg",
          image9 :"../img/photowall/big/mars_b4.jpg",
          image10 :"../img/photowall/big/mars_b1.jpg",
        },
      
       methods:{
        changeGallery: function () {	
            this.image1 = this.image6;
            this.image2 = this.image7;
            this.image3 = this.image8;
            this.image4 = this.image9;
            this.image5 = this.image10;
        },
        changeGalleryBack: function(){
            this.image6 = this.image1;
            this.image7 = this.image2;
            this.image8 = this.image3;
            this.image9 = this.image4;
            this.image10 = this.image5;
        }
       }
    
    });