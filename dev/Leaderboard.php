<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>排行榜</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/pages/Leaderboard.css">
</head>
<style>
 #particles-js {
  z-index: -1;
  position: fixed;
  width: 100%;
  height: 100%;
}
</style>
<body>
   <header>
      <nav id="nav">
  <div class="logo">
    <h1><a href="home.php">SPACED</a></h1>
  </div>
  <ul class="nav-links">
    <li class="margin_left_5"><a href="alltrip.php">星球景點</a></li>
    <li class="margin_left_5"><a href="planet.php">星星世界</a></li>
    <li class="margin_left_5"><a href="shop.php">星球商城</a></li>
    <li class="margin_left_5"><a href="photowall.php">太空互動</a></li>
    <li class="margin_left_5"><a href="Leaderboard.php" class="bread">玩家排行</a></li>
    <!-- <li><a href=""><img src="./images/ticket.png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/shopping-cart_(1).png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/round-account-button-with-user-inside_(1).png" alt="" class="icon"></a></li> -->
  </ul>
  <ul class="nav-icons">
    <li>
      <a href="./car-itineray.php">
      <img src="./img/icon/header/luggage.png" alt="" class="icon"/>
      <?php
            if(isset($_SESSION["trip-cart"])){
               $count = count($_SESSION["trip-cart"]);
               echo "<div class='count'>$count</div>";
            }else{
                  echo "";
               }
      ?>
      </a>
    </li>
    <li class="nav-cart">
      <a href="./shop_cart.php">
        <img src="./img/icon/header/shopping-cart_(1).png" alt="" class="icon"/>

        <?php
                if(isset($_SESSION["cart"])){
                    $count = count($_SESSION["cart"]);
                    echo "<div class='count'>$count</div>";
                }else{
                    echo "";
                }
            ?>
      </a>
    </li> 
    <li>
      <a href="./login.php"
        ><img
          src="./img/icon/header/round-account-button-with-user-inside_(1).png"
          alt=""
          class="icon"
      /></a>
    </li>
  </ul>
  <div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
</nav>

<script src="./js/header.js"></script>


   </header>
   <div id="particles-js">
      <!-- 動態背景 -->
      <script src="./js/background.js"></script>
      
      <!-- <div class="planet_banner">
          <h2 class="margin_top_5">星星世界帶你探索宇宙</h4>
          </div> -->
      </div>
   <div class="container-fluid">
    
      <div class="banner">
       
            <h2 class="title">榮耀至上，一起衝進玩家排行榜!</h2>
      </div>
    <div class="row justify-content-center " id="top-4">
       
        <div class="col-10 le-color line-he-85 margin_top_5" >
        
            <div class="row">

               <div class="col-4 col-xxl-2 col-md-2 ">排行</div>
               <div class="col-4 col-xxl-2 col-md-2 ">旅行者</div>
               <div class="col-4 col-xxl-2 col-md-2 del">等級</div>
               <div class="col-4 col-xxl-2 col-md-2">累積積分</div>
               <div class="col-4 col-xxl-2 col-md-2 del">累積景點</div>
               <div class="col-4 col-xxl-2 col-md-2 del">累積星球</div>
            </div>
        </div>
        <div class="col-10 text-color line-he-75 hovers" id="top0">
           <div class="row ">

              <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-75 ">{{me.Lead}}</div>
              <div class="col-4 col-xxl-2 col-md-2 text-01 line-he-75"><img :src="me.mesrc" alt="" class="icon-2">{{me.name}}</div>
              <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-75 del"><img :src="me.src" alt="" class="leve"></div>
              <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-75">{{me.integral}}</div>
              <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-75 del">{{me.itin}}</div>
              <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-75 del">{{me.sp}}</div>
           </div>
        </div>
        <div class="col-10 text-color-1 line-he-65 hovers" id="top-1" >
               <div class="row justify-content-center"> 
                  <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65"><img :src="leve.top1src" alt="" class="leve-1"></div>
                  <div class="col-4 col-xxl-2 col-md-2 text-01 line-he-65"><img :src="top1.mem_pic" alt="" class="icon-3">{{top1.last_name}}{{top1.first_name}}</div>
                  <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del"><img V-if="top1.mem_lv == '天星者'" :src="medal.medalSrc1"  alt="" class="leve-1"><img v-else :src="medal.medalSrc2"alt="" class="leve-1"> </div>
                  <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65">{{top1.miles}}</div>
                  <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{top1.mem_arr}}</div>
                  <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{top1.mem_sp}}</div>
                  

               </div>
                     <!-- <div class="bra-line ba-color"></div>      -->
         </div>

        <div class="col-10 text-color-1 line-he-65 hovers" id="top-2" >
           <div class="row">

            <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65"><img :src="leve.top2src" alt="" class="leve-1"></div>
            <div class="col-4 col-xxl-2 col-md-2 text-01 line-he-65"><img :src="top2.mem_pic" alt="" class="icon-3">{{top2.last_name}}{{top2.first_name}}</div>
            <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del"><img V-if="top2.mem_lv == '天星者'" :src="medal.medalSrc1"  alt="" class="leve-1"><img v-else :src="medal.medalSrc2"alt="" class="leve-1"> </div>
            <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 ">{{top2.miles}}</div>
            <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{top2.mem_arr}}</div>
            <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{top2.mem_sp}}</div>
           </div>

         </div>
         <div class="col-10 text-color-1  line-he-65 hovers" id="top-3" >
            <div class="row">

               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65"><img :src="leve.top3src" alt="" class="leve-1"></div>
               <div class="col-4 col-xxl-2 col-md-2 text-01 line-he-65"><img :src="top3.mem_pic" alt="" class="icon-3">{{top3.last_name}}{{top3.first_name}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del"><img V-if="top3.mem_lv == '天星者'" :src="medal.medalSrc1"  alt="" class="leve-1"><img v-else :src="medal.medalSrc2"alt="" class="leve-1"> </div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65">{{top3.miles}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{top3.mem_arr}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{top3.mem_sp}}</div>
            </div>
         </div>
         <div class="col-10 text-color-1 line-he-65 hovers" v-for="(to1,index) in mydata.slice(3,17)">
            <div class="row">

               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65">{{index+4}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-01 line-he-65"><img :src="to1.mem_pic" alt="" class="icon-3">{{to1.last_name}}{{to1.first_name}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del"><img V-if="to1.mem_lv == '天星者'" :src="medal.medalSrc1"  alt="" class="leve-1"><img v-else :src="medal.medalSrc2"alt="" class="leve-1"> </div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65">{{to1.miles}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{to1.mem_arr}}</div>
               <div class="col-4 col-xxl-2 col-md-2 text-00 line-he-65 del">{{to1.mem_sp}}</div>
            </div>

         </div>
      </div>
      
      
      
      
      
   </div>
   <footer>
      <footer class="padding_top_10">
    <div class="links">
        <div class="logo"><img src="./img/logo.png" alt=""></div>
        <ul class="footer-links margin_top_2">
            <li><a href="alltrip.php">星球景點</a></li>
            <li><a href="planet.php">星星世界</a></li>
            <li><a href="shop.php">星球商城</a></li>
            <li><a href="photowall.php">太空互動</a></li>
            <li><a href="Leaderboard.php">玩家排行</a></li>
        </ul>
    </div>
    <img src="./img/footer_moon.png" alt="" class="footer_moon">
    <img src="./img/smoke.png" alt="" class="smoke">
    
</footer>

  </footer>
   </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script>
 var top0= new Vue({
     el:'#top0',
     data:{
         me:{
            Lead:88,
            name:'Melody',
            src:'./img/account/lev1.png',
            mesrc:'./img/userprofile/user9.png',
            integral:2023,
            sp:5,
            itin:3,
         },
      }
 });

var top4 = new Vue({
   el:'#top-4',
   data:{
      mydata:[],
      top1:[],
      top2:[],
      top3:[],
      leve:{
         top1src:'./img/account/026-medal.png',
         top2src:'./img/account/019-medal.png',
         top3src:'./img/account/049-medal.png',
// <img v-if="dd.ddd="123"" :src="leve.top1src" >
// <img v-else :src="leve.top2src" >
      },
      medal:{
         medalSrc1:'./img/icon/天星者.png',
         medalSrc2:'./img/icon/初星者.png',
      }
   },
      mounted() {
      // res是區域變數出去後不可使用
      fetch('./php/Leaderboard.php').then(res => res.json()).then(res => this.mydata = res);
      setTimeout(()=>{
         // console.log( this.mydata);
         this.top1=this.mydata[0];
         this.top2=this.mydata[1];
         this.top3=this.mydata[2];
         // this.mydata1.push(this.mydata[3]);
         // console.log( this.mydata1)

         
      },1000);
   },    
   
      
   
});


</script>
</body>
</html>