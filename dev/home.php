<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SPACED</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- 3D星球套件 -->
    <script src="https://zimjs.org/cdn/1.2.3/createjs_min.js"></script>
    <script src="https://zimjs.org/cdn/10.7.1/zim.js"></script>
    <script src="https://zimjs.org/cdn/icon5.js"></script>
    <script src="https://zimjs.org/cdn/three_r82.min.js"></script>
    <script src="https://zimjs.org/cdn/three_2.0.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Vue.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js"></script>
    <!-- ScrollMagic -->
    <!-- 導入動畫套件  gsap 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <!-- scrollmagic 主要程式 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <!-- scrollmagic + gsap  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
    <!-- scrollmagic 觸發點指標顯示 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <!-- gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.0/gsap.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/pages/planet.css">
    </link>
    <link rel="stylesheet" href="./css/pages/alltrip.css">
    </link>
    <link rel="stylesheet" href="./css/pages/home.css">
    </link>
</head>

<body>
    <div class="container-fluid" id="fullview">
    <header>
        <nav id="nav">
            <div class="logo">
                <h1><a href="home.php">SPACED</a></h1>
            </div>
            <ul class="nav-links">
                <li class="margin_left_5"><a href="alltrip.php">星球景點</a></li>
                <li class="margin_left_5"><a href="planet.html">星星世界</a></li>
                <li class="margin_left_5"><a href="shop.php">星球商城</a></li>
                <li class="margin_left_5"><a href="photowall.php">太空互動</a></li>
                <li class="margin_left_5"><a href="Leaderboard.php">玩家排行</a></li>
                <!-- <li><a href=""><img src="./images/ticket.png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/shopping-cart_(1).png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/round-account-button-with-user-inside_(1).png" alt="" class="icon"></a></li> -->
            </ul>
            <ul class="nav-icons">
                <li class="nav-trip">
                    <a href="./car-itineray.php">
                        <img src="./img/icon/header/luggage.png" alt="" class="icon" />
                        <?php
                        if(isset($_SESSION["trip-cart"])){
                            $count = count($_SESSION["trip-cart"]);
                            echo "<div class='trip-count'>$count</div>";
                        }else{
                            echo "";
                        }
                     ?>
                    </a>
                </li>
                <li class="nav-cart">
                    <a href="./shop_cart.php">
                        <img src="./img/icon/header/shopping-cart_(1).png" alt="" class="icon" />
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
                    <a href="./login.html"><img src="./img/icon/header/round-account-button-with-user-inside_(1).png"
                            alt="" class="icon" /></a>
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

       

        <div class="video-bg">
            <div class="video-overlay"></div>
            <video playsinline autoplay loop muted="true" style="opacity:1; width: 1600px; "
                src="https://d1titnu6se1qmv.cloudfront.net/uploads/2019/04/home-vbg.mp4"></video>
        </div>
        <div class="banner">
            <div class="slogan">
                <p id="slogan">EXPLORE THE GALAXY</p>
            </div>
        </div>
        <!-- 訂購流程 -->
        <div class="stepsection margin_top_10">
            <h2>打造專屬的星球行程</h2>
            <h3 class="margin_top_3 line_low">累積景點積分，獲得更多宇宙幣，讓你無限暢遊宇宙</h3>
            <!-- trigger -->
            <div id="trigger01"></div>

            <div class="stepall">
                <div class="step margin_left_5">
                    <img src="./img/icon/search-location.png" class="step_icon" alt="icon">
                    <div class="step_content h4"><img src="./img/icon/one.png" class="num" alt="num">尋找景點</div>
                </div>

                <div class="step margin_left_5">
                    <img src="./img/icon/travel.png" class="step_icon" alt="icon">
                    <div class="step_content h4"><img src="./img/icon/two.png" class="num" alt="num">加入我的行程</div>
                </div>

                <div class="step margin_left_5">
                    <img src="./img/icon/coins.png" class="step_icon" alt="icon">
                    <div class="step_content h4"><img src="./img/icon/three.png" class="num" alt="num">結帳，獲得積分</div>
                </div>

                <div class="step margin_left_5">
                    <img src="./img/icon/4change.png" class="step_icon4" alt="icon">
                    <div class="step_content h4"><img src="./img/icon/four.png" class="num" alt="num">累積積分，兌換宇宙幣</div>
                </div>
            </div>
        </div>
        <!-- 精選行程 -->
        <h2 align="center" class="margin_top_10">星球景點</h2>
        <h3 class="margin_top_3 line_low" align="center">預訂後即刻出發，讓你親眼見證宇宙，來挑選喜歡的景點吧!</h3>
        <div class="first_right padding_top_4" id="app">

            <div class="hottrip ">
                <div v-for="item in planets.slice(0,3)" :key="item.spot_no" class="planet_top">
                    <form class="trip_card" action="alltrip.php" method="post">
                        <a :href="item.url">
                            <img :src="item.spot_pic" class="planet" alt="planet">
                            <img :src="item.spot_pics" class="planet_a1" alt="planettrip">
                            <div class="word line_low">
                                <h3 class="hot">精選景點</h3>
                                <h4>{{item.spot_name}}</h3>
                                    <small class="tag margin_top_3">{{item.spot_lv}}</small>
                                    <small class="tag">{{item.miles}}積分</small>
                                    <h4 class="price">${{item.spot_price}}</h4>
                        </a>
                        <button type="submit" name="add" class="addin small myTrip"><img class="plus"
                                src="./img/icon/plus.png" alt="">加入我的行程
                        </button>
                        <input type="hidden" name="spot_id" :value="item.spot_no">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- 星球百科 -->
    <h2 align="center" class="margin_top_10" >星星世界</h2>
        <h3 class="margin_top_3 line_low" align="center">暢遊宇宙之前，進入星星世界，一起了解宇宙知識，做好萬全準備!</h3>
    <div class="planet_box margin_top_15">
        <!-- <h2 align="center" class="">星星世界</h2> -->
        <div id="planet" class="planet_tab">
            <div class="tabList col-LG-12 ">
                <ul class="tab-title">
                    <li><a href="#tab01">火星</a></li>
                    <li><a href="#tab02">月球</a></li>
                    <li><a href="#tab03">木星</a></li>
                    <li><a href="#tab03">水星</a></li>
                    <li><a href="#tab03">金星</a></li>
                    <li><a href="#tab03">土星</a></li>
                    <li><a href="#tab03">天王星</a></li>
                </ul>
            </div>
            <div class="separator col-10"></div>
            <!-- 星球頁籤內容 -->
            <div class="tabContent">
                <div class="taball margin_top_10">
                    <!-- 火星 -->
                    <div id="tab01" class="tab-inner ">
                        <div class="tab_top">
                            <div class="tab_left col-lg-6 col-md-12">
                                <h2>火星</h2>
                                <h4 class="margin_top_4">
                                    火星大氣以二氧化碳為主，既稀薄又寒冷，其表面特徵讓人聯想起月球上的撞擊坑，以及地球上的山谷、沙漠和極地冰蓋。
                                </h4>
                                <div class="data margin_top_4">
                                    <div class="grav">
                                        <div class="dataTop">
                                            <span class="var">38</span>
                                            <span class="data-mid">％</span>
                                        </div>
                                        <p>重力</p>
                                    </div>
                                    <div class="day">
                                        <div class="dataTop">
                                            <span class="var">24</span>
                                            <span class="data-low">HR</span>
                                        </div>
                                        <p>一天</p>
                                    </div>
                                    <div class="temp">
                                        <div class="dataTop">
                                            <span class="data-mid">-</span>
                                            <span class="var">60</span>
                                            <span class="data-top">F</span>
                                        </div>
                                        <p>溫度</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-active col-lg-6 col-md-12 col-sm-12">
                                <!-- 火星動圖 -->
                                <div id="tag" class="col-md-12 col-sm-12" style="width: 1024px; height: 768px;"></div>
                                <script src="./js/mars.js"></script>
                            </div>
                        </div>
                    </div>
                    <!-- 其他tab -->
                    <div id="tab02" class="tab-inner ">
                        <div class="tab_top">
                            <div class="tab_left col-lg-6 col-md-12">
                                <h2>月球</h2>
                                <h4 class="margin_top_4">
                                    月球火山活動的主要後果是顯著的月海。這是由大面積漫溢的低反照率的玄武岩熔岩所構成，覆蓋了月球正面的三分之一。
                                </h4>
                                <div class="data margin_top_4">
                                    <div class="grav">
                                        <div class="dataTop">
                                            <span class="var">38</span>
                                            <span class="data-mid">％</span>
                                        </div>
                                        <p>重力</p>
                                    </div>
                                    <div class="day">
                                        <div class="dataTop">
                                            <span class="var">24</span>
                                            <span class="data-low">HR</span>
                                        </div>
                                        <p>一天</p>
                                    </div>
                                    <div class="temp">
                                        <div class="dataTop">
                                            <span class="data-mid">-</span>
                                            <span class="var">60</span>
                                            <span class="data-top">F</span>
                                        </div>
                                        <p>溫度</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-active margin_top_5 col-lg-6 col-md-12 col-sm-12">
                            <!-- 月球動圖 -->
                            <img src="img/planet/moon.png">
                            <!-- <script src="./js/moon.js"></script>  -->
                        </div>
                    </div>
                    <div id="tab03" class="tab-inner ">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 互動牆 -->
    <section class="home_photowall col-10 ">
        <h2 class="margin_top_10">星球互動</h2>
        <h3 class="margin_top_3 line_low" align="center">上萬則旅遊分享，看看玩家如何玩宇宙</h3>

        <div class="tz-gallery margin_top_10">
            <!-- <div class="row"> -->
            <div class="upper col-10">
                <div class=" col-4">
                    <a class="lightbox" href="./img/home/mars1.jpg">
                        <img src="./img/home/mars2.jpg" alt="Bridge">
                    </a>
                </div>

                <div class="col-4">
                    <a class="lightbox" href="./img/home/mars2.jpg">
                        <img src="./img/home/others/首頁-互動牆壁5.jpg" alt="Park">
                    </a>
                </div>

                <div class="col-4">
                    <a class="lightbox" href="./img/home/首頁-互動牆壁9.jpg">
                        <img src="./img/home/首頁-互動牆壁9.jpg" alt="Tunnel">
                    </a>
                </div>
            </div>
            <div class="lower col-10
              ">
                <div class="col-6">
                    <a class="lightbox" href="./img/home/首頁-互動牆壁8.jpg">
                        <img src="./img/home/首頁-互動牆壁8.jpg" alt="Tunnel">
                    </a>
                </div>

                <div class="col-6">
                    <a class="lightbox" href="./img/home/首頁-互動牆壁2.jpg">
                        <img src="./img/home/others/mars_landscape.jpg" alt="Tunnel">
                    </a>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>
    <!-- 商城 -->
    <div class="shop_box">
        <div class="home_shop">
            <h2>星球商城</h2>
            <h3 class="margin_top_3 line_low" align="center">商城可以滿足你上外太空的一切需求!</h3>

            <div class="shopItem margin_top_10">
                <!-- 第一個商品 -->
                <div class="item1 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="img/home/shop_1.jpeg" alt="">
                        <div class="overlay">
                            <h2><a href="#">太空衣</a></h2>
                        </div>
                    </div>
                </div>
                <!-- 第二個商品 -->
                <div class="item2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive " src="img/home/shop_2.jpeg" alt="">
                        <div class="overlay">
                            <h2><a href="#">太空衣</a></h2>
                        </div>
                    </div>
                </div>
                <!-- 第三個商品 -->
                <div class="item3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="img/home/shop_5.jpeg" style="width:450px;" alt="">
                        <div class="overlay">
                            <h2><a href="#">太空衣</a></h2>
                        </div>
                    </div>
                </div>
                <!-- 第四個商品 -->
                <div class="item4 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="img/home/shop_6.jpeg" alt="">
                        <div class="overlay">
                            <h2><a href="#">宇宙平衡鞋</a></h2>
                        </div>
                    </div>
                </div>
                <!-- 第五個商品 -->
                <div class="item5 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="img/home/shop_4.jpeg" alt="">
                        <div class="overlay">
                            <h2><a href="#">太空衣</a></h2>
                        </div>
                    </div>
                </div>
            </div>


            <!-- RWD -->
            <div class="shopRWD margin_top_10">
                <div id="carouselExampleCaptions" class="carousel shop_carousel slide col-10" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/home/shop_5.jpeg" class="d-block" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>宇宙平衡鞋</h2>
                                <p class="margin_top_2">穿上這雙鞋，協助你在無重力的宇宙暢行無阻!獨家專利打造，讓你的旅程加倍舒適~</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/home/shop_3.jpeg" class="d-block h-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <!-- <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/home/shop_4.jpeg" height="300px" class="d-block h-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <!-- <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <a href="shop.html">
                <button class="button button_min margin_top_5">去逛逛</button>
            </a>
        </div>
    </div>
    <!-- 會員待遇 -->
    <div class="flow_member">
        <h2 align="center">歡迎加入太空世界</h2>
        <h3 class="margin_top_3" align="center">加入會員，享受禮遇，與所有玩家同遊宇宙</h3>
        <div class="flowall margin_top_8" align="center">
            <div class="flow">
                <img src="./img/icon/ribbon.png" class="step_icon" alt="icon">
                <h4 class="flowTitle margin_top_2">會員分級</h4>
                <div class="separator margin_top_2"></div>
                <h4 class="margin_top_2">累積積分 會員升級<br>享受更多特殊禮遇</h4>
            </div>

            <div class="flow ">
                <img src="./img/icon/ranking.png" class="step_icon" alt="icon">
                <h4 class="flowTitle margin_top_2">積分排行</h4>
                <div class="separator margin_top_2"></div>
                <h4 class="margin_top_2">每月排行 挑戰榮耀</h4>
            </div>

            <div class="flow ">
                <img src="./img/icon/post.png" class="step_icon" alt="icon">
                <h4 class="flowTitle margin_top_2">太空互動</h4>
                <div class="separator margin_top_2"></div>
                <h4 class="margin_top_2">玩家分享 互相交流<br>看看別人怎麼玩</h4>
            </div>
        </div>
        <div class="memberbtn">
            <button class="button button_min margin_top_10">加入會員</button>
        </div>
    </div>

    <!-- 置頂火箭 -->
    <a href="#" class="go-top"></a>

    <!-- footer  -->
    <footer class="padding_top_10">
        <div class="links">
            <div class="logo"><img src="./img/logo.png" alt=""></div>
            <ul class="footer-links margin_top_2">
                <li><a href="alltrip.php">星球景點</a></li>
                <li><a href="planet.html">星星世界</a></li>
                <li><a href="shop.php">星球商城</a></li>
                <li><a href="photowall.php">太空互動</a></li>
                <li><a href="Leaderboard.php">玩家排行</a></li>
            </ul>
        </div>
        <img src="./img/footer_moon.png" alt="" class="footer_moon">
        <img src="./img/smoke.png" alt="" class="smoke">
    </footer>

    <!-- container-fluid結尾 -->
    </div>
    <!-- 星球頁籤轉移 -->
    <script src="./js/tabSwitch.js"></script>
    <!-- 精選景點 vue -->
    <script>
    let vm = new Vue({
        el: "#app",
        data: {
            planets: [],
            spot1: [],
        },
        mounted() {
            console.log("load");
            fetch('./php/getSelectTrip.php').then(res => res.json()).then(data => {
                vm.planets = data;
                for (let i = 0; i < data.length; i++) {
                    let url = `trip.php?spot_no=${data[i].spot_no}`;
                    vm.planets[i].url = encodeURI(url);
                    console.log(vm.planets[i].url)
                }
            });
            console.log(this.planets);
            fetch('./php/getTrip.php').then(res => res.json()).then(data => {
                vm.spot1 = data;
                for (let i = 0; i < data.length; i++) {
                    let url = `trip.php?spot_no=${data[i].spot_no}`;
                    vm.spot1[i].url = encodeURI(url);
                    console.log(vm.spot1[i].url)
                }
            });

        },
    });
    </script>


    <script>
    //Header變顏色
    var controller = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
            triggerElement: '#trigger01',
            duration: '600%',
            reverse: true,
        }).on('enter', function() {
            console.log('enter 進入');
            $('#nav').css('background-color', '#0c0d18')
        }).on('leave', function() {
            console.log('leave 離開');
            $('#nav').css('background',
                "linear-gradient(-180deg, rgba(12,13,24,0.4489146000196954) 9%, rgba(12,13,24,0) 100%)")
        })
        .addTo(controller);

    //Slogan延遲出現
    var tl = new TimelineLite({
        delay: 1
    });
    tl.from(['#slogan'], 2, {
        scale: 0.5,
        opacity: 0,
        delay: 0.5,
        ease: Power3.easeIn,
        force3D: true
    })

    //卡片fade in
    // not working
    </script>
    <!-- go top -->
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

        // Animate the scroll to top
        $('.go-top').click(function(event) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: 0
            }, 900);
        })
    });
    </script>




</body>

</html>