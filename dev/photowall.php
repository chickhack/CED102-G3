<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>互動牆</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css">
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <link rel="stylesheet" href="./css/all.css">
  <link rel="stylesheet" href="./css/pages/photowall.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

  <!-- <header> -->
    <!-- </header> -->
<div class="container-fluid" id="app">
    @@include('./layout/header.html')
     <!-- 動態背景 -->
     <div id="particles-js">
      <script src="./js/background.js"></script>
    </div>
  <div class="photowall_banner">
    <h2 class="margin_top_5">太空旅遊給你美好的回憶</h4>
  </div>
  <div class="grid">
    <!-- ==========資料庫卡片===== -->
    <div data-aos="fade-up" @click="openlightbox(card.post_no)" data-aos-duration="1000" class=" col-md-3 grid-item" v-for="card in getpost" >
    <div class="img1"><img :src="card.post_pic1" alt="" class="lazy">
        <div class="action-box">
			<div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
			<div class="share"><img src="./img/icon/share.png" alt=""></div>
			<div class="message"><img src="./img/icon/comment.png" alt=""></div>
			<button class="button"><img src="./img/icon/more.png" alt=""></button>
        </div>
    </div><!-- 調整 -->
    <div class="article_all">
        <div class="article">
			<div class="member_photo"><img :src="card.mem_pic" alt=""></div>
			<div class="name">{{card.person_name}}</div>
			<div class="post_time">{{card.post_date}}</div>
        </div>
        <div class="text">{{card.post_content}}</div>
    </div>
    </div>

<!-- ===============燈箱區============ -->
<!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== -->
	<div class="light-box-container container_1" id="destination_lightbox" v-show="lightBoxShow">
	<div class="row"></div>
    
    <button class="turnoff_lightbox" id="turnoff_lightbox1"@click="closeLightBox">
        <img src="./img/icon/turnoff.png" alt="">
    </button>

    <div class="img-switch col-12 col-md-12 col-lg-6 col-xl-6">
    <img src="./img/photowall/big/mars_b1.jpg" alt="" id="BIG">
    <div id="SMALL">
    	<img :src="targetPost.post_pic1" alt="" width="150px" id="a"@click="chagePhoto1">


        <img :src="targetPost.post_pic2" alt="" width="150px" id="b"@click="chagePhoto2">


        <img :src="targetPost.post_pic3" alt="" width="150px" id="c" @click="chagePhoto3">
    </div>
    </div>
 <!-- ============發文及留言區============= -->
    <div class="words col-12 col-md-12 col-lg-6 col-xl-6">
       <div class="post_article">
         <div class="member_info">
           <div class="member_photo"><img :src="targetPost.mem_pic" alt=""></div>
           <div class="name">{{targetPost.person_name}}</div>
           <a href="trip.html"><button type="button" class="button_large">{{targetPost.post_sub}}</button></a>
         </div>
         <div class="post_text">
           {{targetPost.post_content}}
            <div class="movement">
              <img src="./img/icon/bookmark-outline.png" alt="" class="collection">
              <img src="./img/icon/share.png" alt=""class="sharing">
              <img src="./img/icon/more.png" alt=""class="more">
             </div>
         </div>
       </div>
		<div class="message_text">

			<p class="message_title">
				留言(3)
			</p>

			<!-- <div class="message_1" v-for="message in getpost_cmt " v-if="getcustomer.mem_no===getpost_cmt.mem_no">
				<div class="member_photo"><img :src="targetPost.mem_pic" alt=""></div>
				<div class="name">{{targetPost.person_name}}</div>
				<div class="message_1_text">{{getpost_cmt.cmt_content}}</div>
				<div class="message_1_more"><img src="./img/icon/more.png" alt="" class="detail"></div>
			</div> -->
      <div class="message_1">
				<div class="member_photo"><img src="./img/userprofile/user18.png" alt=""></div>
				<div class="name">陳美美</div>
				<div class="message_1_text">謝謝！我都是一名熱愛旅遊的旅客</div>
				<div class="message_1_more"><img src="./img/icon/more.png" alt="" class="detail"></div>
			</div>

			<div class="message_2">
				<div class="member_photo"><img src="./img/userprofile/user19.png" alt=""></div>
				<div class="name">劉美人</div>
				<div class="message_2_text">謝謝！我都是一名熱愛旅遊的旅客 </div>
				<div class="message_2_more"><img src="./img/icon/more.png" alt=""></div>
			</div>
			<div class="message_3">
				<div class="member_photo"><img src="./img/userprofile/user19.png" alt=""></div>
				<div class="name">劉曉華</div>
				<div class="message_3_text">謝謝！我都是一名熱愛旅遊的旅客 </div>
				<div class="message_3_more"><img src="./img/icon/more.png" alt="" class="detail"></div>
			</div>
		</div>
		<form action="" class="post_message">
			<input type="text" placeholder="留言...." >
		</form>
		
     	</div>
  	</div>
</div> 
<!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== --><!-- =========點小圖換大圖區=========== -->



<!-- =========載入更多按鈕======= -->
<!-- <div class="col-md-12 text-center">
  <div class="button">
    <button id="showMore" class="button_min"><span>載入更多</span></div>
  </div>
</div> -->

<!-- ============發文按鈕============= -->
<div class="col-md-1">
  <div class="button_2">
    <a href="./post.html"><button class="button_min"><img src="./img/photowall/icon/post.png" alt=""></button></a>
  </div>
  
</div>
<a href="#" class="go-top"></a>
  <footer>
    @@include('./layout/footer.html')
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js "></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<!-- go top -->
<script>
  $(document).ready(function () {
      // Show or hide the sticky footer button
      $(window).scroll(function () {
          if ($(this).scrollTop() > 200) {
              $('.go-top').fadeIn(200);
          } else {
              $('.go-top').fadeOut(200);
          }
      });

      // Animate the scroll to top
      $('.go-top').click(function (event) {
          event.preventDefault();

          $('html, body').animate({ scrollTop: 0 }, 900);
      })
  });
</script>
<!-- =============lazyload 載入更多套件========== -->
<script>
  $("#showMore").click(function(){
    $(".grid .grid-item:hidden").slice(0,4).slideDown();
    iso.layout();
    if($(".grid .grid-item:hidden").length == 0) {

    }
  });
</script>
<script>
  $(function(){
      $("img.lazy").lazyload();
  });
</script>
<!-- ===========燈箱點小圖換大圖套件=========== -->
<!-- ===================開關燈箱============== -->
<!-- <script>
  $(document).ready(function(){

    $('#destination_3').click(function(){
      $('#destination_lightbox').css('display','block');
    });

    $('#turnoff_lightbox1').click(function(){
      $('#destination_lightbox').css('display','none');
    });

  });

  
</script> -->
<!-- =========AOS 動態============== -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>
<!-- =========抓資料====== -->
<script>
  var ppoo = new Vue({
    el:'#app',
    data:{
      getpost:[], 
      getcustomer:[],
      messages: [],
	  getpost_cmt:[],

      targetPost: [],
      lightBoxShow: false,

      text: '',
    },
  
	
    mounted(){
      //res 是區域變數出去後不可使用
      fetch('./php/getPost.php').then(res => res.json()).then(res => {
		    this.getpost = res;
		    console.log("getpostQQ: "+ this.getpost );
		  });
      fetch('./php/getcustomer.php').then(res => res.json()).then(res => this.getcustomer = res);
        
	    fetch('./php/getpost_cmt.php').then(res => res.json()).then(res =>{ 
        for(let i = 0; i < 3; i++){
          this.getpost_cmt.push(res[i].cmt_content);

        }
        console.log(this.getpost_cmt);
      });
    },

    methods: {
		openlightbox(target) {
			  // console.log(this.getpost)
				// console.log(this.getpost[4].post_no)
      console.log('work')

			const filterArray = this.getpost.filter(item => item.post_no === target)
			console.log(filterArray)
			// this.targetPost.push(...filterArray)
			this.targetPost = filterArray[0]
			console.log("targetPost"+this.targetPost)

			this.lightBoxShow = true;
			this.text = filterArray[0].post_content
			console.log(filterArray[0].post_content)



			const bigPhoto = document.getElementById('BIG')
			bigPhoto.setAttribute('src',this.targetPost.post_pic1)
		},
    
		closeLightBox(){
			this.lightBoxShow = false
		},

		chagePhoto1(){
			const bigPhoto = document.getElementById('BIG')
			bigPhoto.setAttribute('src',this.targetPost.post_pic1)
			console.log(this.targetPost.post_pic1)
		},

		chagePhoto2(){
			const bigPhoto = document.getElementById('BIG')
			bigPhoto.setAttribute('src',this.targetPost.post_pic2)
			console.log(this.targetPost.post_pic2)
		},
		chagePhoto3(){
			const bigPhoto = document.getElementById('BIG')
			bigPhoto.setAttribute('src',this.targetPost.post_pic3)
			console.log(this.targetPost.post_pic3)
		},
    },

    computed:{
      detailData(){
        console.log('update')
        return this.targetPost
      }
    }
  });
</script>
</body>
</html>