<?php
session_start();
if(isset($_POST['remove'])){
    if($_GET['action'] = 'remove'){ 
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>alert('Product has been removed!')</script>";
                echo "<script>window.history.back()</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的行程</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/pages/car-itineray.css">
</head>
<body>
<nav id="nav">
  <div class="logo">
    <h1><a href="home.html">SPACED</a></h1>
  </div>
  <ul class="nav-links">
    <li class="margin_left_5"><a href="alltrip.html">星球景點</a></li>
    <li class="margin_left_5"><a href="planet.html">星星世界</a></li>
    <li class="margin_left_5"><a href="shop.html">星球商城</a></li>
    <li class="margin_left_5"><a href="photowall.html">太空互動</a></li>
    <li class="margin_left_5"><a href="Leaderboard.html">玩家排行</a></li>
    <!-- <li><a href=""><img src="./images/ticket.png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/shopping-cart_(1).png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/round-account-button-with-user-inside_(1).png" alt="" class="icon"></a></li> -->
  </ul>
  <ul class="nav-icons">
    <li>
      <a href="./car-itineray.html"
        ><img src="./img/icon/header/luggage.png" alt="" class="icon"
      /></a>
    </li>
    <li class="nav-cart">
      <a href="./shop_cart.html">
        <img
          src="./img/icon/header/shopping-cart_(1).png"
          alt=""
          class="icon"
        />
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
<div class="container-fluid">
    <!-- <form action="#"> -->
        
        <div class="row w-100" id="nextTop">
            <div class="col-11 col-xxl-12 col-xl-12 col-md-12">
                <p class="text-1 line_high">我的行程</p>
            
                <!-- // if(!empty($_SESSION["trio-cart"])){ -->
                    <!-- // $total = 0; -->
                    <!-- // foreach($_SESSION["trio-cart"] as $key => $val){ -->
                        
                
                        <div class="row backcol w-100 " > 
                            <div class="col-2 allcol">

                                    <img src="./img/trip/trip_jupiter/jupiter_a_ps.png" alt="" class="imgsr">
                            </div>
                            <div class="col-5 col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 allcol" 
                                    v-for="me in medata" 
                                    v-if="<?php echo $_SESSION["trio-cart"]["spot_id"];?>==me.spot_no">
                                <p class="p-text-1">{{me.spot_name}}</p>
                                <p class="p-text-2 padding_top_1">積分{{me.miles}}</p>
                               
                            
                            </div>
                            <div class="col-4 col-md-2 col-sm-4 allcol">
                                <input type="date" id="date-1" class="btn-date data-down margin_top_2">

                            </div>
                            <div class="col-4 col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-4 datacol">
                                <div class="margin-bottom-2">
                                    <p 
                                        class="padding_top_2 padding-bottom-1">
                                        數量
                                    </p>
                                    <button 
                                        class=" btn-pull" 
                                        @click="minus">
                                        －
                                    </button>
                                    <input 
                                        type="number" 
                                        v-model.number="total" 
                                        class="btn-nu" 
                                        min="0">
                                    <button 
                                        class=" btn-pull btn-p " 
                                        @click="add"
                                        >
                                        ＋
                                    </button>
                                </div>    
                            </div>
                            <div 
                                class="col-2 col-sm-1 allcol"> 
                                <p 
                                    class="padding_top_2">
                              
                                    {{all1}}
                                </p>
                            </div>
                            <div class="col-1 allcol">
                                <img src="./img/icon/rubbish-bin-delete-button.png" alt="" class="icon-g">
                            
                            </div>
                       
                        </div>
                    <!-- }  -->
                <!-- } -->
            </div>
            
            <div class="col-11 col-xxl-12 col-xl-12 col-md-12 margin_top_5 backcol allcoin">
                <div class="coin-left">
                    <p class="line_low letter-1">可累積積分800</p>
                    <p class="letter-1">商品合計:${{allcoin}}</p>

                </div>
                <div class="coin-right">
                    <a href="./order-itineray.html" class="button_min btn-coin">前往結帳</a>
                    
                </div>
                
            </div>
        </div>
    <!-- </form> -->
</div>
<a href="#" class="go-top"></a>

<footer class="padding_top_10">
    <div class="links">
        <div class="logo"><img src="./img/logo.png" alt=""></div>
        <ul class="footer-links margin_top_2">
            <li><a href="alltrip.html">星球景點</a></li>
            <li><a href="planet.html">星星世界</a></li>
            <li><a href="shop.html">星球商城</a></li>
            <li><a href="photowall.html">太空互動</a></li>
            <li><a href="Leaderboard.html">玩家排行</a></li>
        </ul>
    </div>
    <img src="./img/footer_moon.png" alt="" class="footer_moon">
    <img src="./img/smoke.png" alt="" class="smoke">
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- <script src="./js/addMinus.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
<script>
    $(document).ready(function() {
        // Show or hide the sticky footer button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('.go-top').fadeIn(200);
            } else {
                $('.go-top').fadeOut(200);
            }
        });
</script>
<script>
var app1 = new Vue({
    el:'#nextTop',
    data:{
        medata:[],
        medata1:[],
        total:1,
        to1:0,//2000
        all1:0,
        // allcoin:'',
    },
    
    mounted() {
        // console.log('work')
        fetch(`./php/Leaderboard_copy.php`).then(res => res.json()).then(res => this.medata = res);
        // fetch(`./php/Leaderboard_copy.php?id=${val}`//帶變數回傳去這個檔案).then(res => res.json()).then(res => this.medata = res);   
        setTimeout(() => {
            console.log(this.medata);
        }, 1000);  


        this.all1=<?php echo $_SESSION["trio-cart"]["spot_sal"];?>;
        this.to1=this.all1;
        
    },
    methods: {
        add(){
            this.total +=1;
            this.all1=this.total*this.to1;
        },

        minus(){
            if(this.total>0){
                this.total -=1;
                this.all1= this.total * this.to1;
            }
        },
        
    },
    computed:{
        allcoin(){
            // for(var i=1;1=this.all1.length;i++){
            return this.all1; 

            // }
        },
    },
})

</script>
</body>
</html>