<?php
session_start();
 if(isset($_POST["add"])){
     if(isset($_SESSION["trip-cart"])){
        $item_array_id = array_column($_SESSION["trip-cart"],"spot_id"); 
     
        if(!in_array($_POST["spot_id"], $item_array_id)){
            $count = count($_SESSION["trip-cart"]);
            $item_array = array(
                "spot_id" => $_POST["spot_id"]
            );
            $_SESSION["trip-cart"][$count] =$item_array;
            // echo '<script>window.location="alltrip.php"</script>';
        }else{
            echo "<script>alert('已加入我的行程')</script>";
            // echo "<script>window.location ='alltrip.php'</script>";
    }
        }else{
            $item_array = array(
                "spot_id" => $_POST["spot_id"]
            );
            $_SESSION["trip-cart"][0] = $item_array;
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>星球景點</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <!-- vue cdn-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <!-- jquery cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- 動態背景 -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- 動的火星 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r127/three.min.js"></script>
    <!-- alltrip css -->
    <link rel="stylesheet" href="./css/pages/alltrip.css">

</head>

<body>
    <header>
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

    <!-- 動態背景 -->
    <div id="particles-js">
        <script src="./js/background.js"></script>
    </div>

    <!-- 動的火星 -->
    <div id="marsloc"></div>
    <div class="bk3">
        <img src="../dev/img/trip/bk3-01.png">
    </div>

    <!-- ----------first -->
    <div id="app">

        <div class="first padding_top_5">

            <div class="first_left">
                <h2 class="title line_high h1 animatedText1"><span
                        class="h3">預訂後<span>即刻出發</span></span><br><span>讓你親眼</span><span>見證宇宙</span><br><span>改變你的</span><span>內在世界</span>
                </h2>
            </div>
            <div class="first_right padding_top_4">
                <div class="hottrip ">
                    <div v-for="item in planets.slice(0,3)" :key="item.spot_no" class="planet_top">
                        <form class="card" action="alltrip.php" method="post">
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

            <!-- ----------slider -->
            <!-- <div class="tripselect margin_left_3 margin_top_5">
                    <img class="icon2 swiper-button-prev " src="../dev/img/icon/left.png" alt="">
                    <div class="h4 padding_top_1 select">精選星球景點</div>
                    <img class="icon2 swiper-button-next" src="../dev/img/icon/right.png" alt="">
                </div> -->

        </div>

    </div>

    <!-- ---------流程區 -->
    <div class="stepsection">
        <h2>打造專屬的星球行程</h2>
        <h3 class="margin_top_3 line_low">累積景點積分，獲得更多宇宙幣，讓你無限暢遊宇宙</h3>
        <div class="stepall">

            <div class="step padding_top_2 margin_left_5 flex-2">
                <img src="./img/icon/search-location.png" class="step_icon" alt="icon">
                <div class="step_content h4"><img src="./img/icon/one.png" class="num" alt="num">尋找景點</div>
            </div>

            <div class="step padding_top_2 margin_left_5 flex-2">
                <img src="./img/icon/travel.png" class="step_icon" alt="icon">
                <div class="step_content h4"><img src="./img/icon/two.png" class="num" alt="num">加入我的行程</div>
            </div>

            <div class="step padding_top_2 margin_left_5 ">
                <img src="./img/icon/coins.png" class="step_icon" alt="icon">
                <div class="step_content h4"><img src="./img/icon/three.png" class="num" alt="num">結帳，獲得積分</div>
            </div>

            <div class="step padding_top_2 margin_left_5">
                <img src="./img/icon/4change.png" class="step_icon4" alt="icon">
                <div class="step_content h4"><img src="./img/icon/four.png" class="num" alt="num">累積積分，兌換宇宙幣</div>
            </div>



        </div>
    </div>

    <!-- ---------second -->
    <div class="second margin_top_10">
        <h2 class="alltrip">星球景點總覽</h2>
        <div class="tripcardall">
            <h3 class="padding_top_5 alltrip ">月球景點</h3>
            <div class="tripcard_all  margin_top_5">
                <div v-for="item in spot1.slice(0,3)" class="tripcard ">
                    <form class="card" action="alltrip.php" method="post">
                        <a :href="item.url">
                            <img :src="item.spot_pic1" class="spot_pic" alt="spot_pic">
                            <div class="content line_low">
                                <h4 class="hot2 margin_top_1">{{item.spot_name}}</h4>
                                <small class="tag">{{item.spot_lv}}</small>
                                <small class="tag">{{item.miles}}積分</small>
                                <h3 class="price2 margin_top_2">${{item.spot_price}}</h3>
                            </div>
                        </a>
                        <button type="submit" name="add" class="addin2 small margin_top_2 myTrip"><img class="plus"
                                src="./img/icon/plus.png" alt="">加入我的行程</button>
                        <!-- <div class="trip_bookmark" id="bookmark"></div> -->
                        <input type="hidden" name="spot_id" :value="item.spot_no">

                    </form>
                </div>

            </div>
            <h3 class="padding_top_5 alltrip ">火星景點</h3>
            <div class="tripcard_all  margin_top_5">
                <div v-for="item in spot1.slice(3,6)" class="tripcard ">
                    <form class="card" action="alltrip.php" method="post">

                        <a :href="item.url">
                            <img :src="item.spot_pic1" class="spot_pic" alt="spot_pic">
                            <div class="content line_low">
                                <h4 class="hot2 margin_top_1">{{item.spot_name}}</h4>
                                <small class="tag">{{item.spot_lv}}</small>
                                <small class="tag">{{item.miles}}積分</small>
                                <h3 class="price2 margin_top_2">${{item.spot_price}}</h3>
                            </div>
                        </a>
                        <button type="submit" name="add" class="addin2 small margin_top_2 myTrip"><img class="plus"
                                src="./img/icon/plus.png" alt="">加入我的行程</button>
                        <!-- <div class="trip_bookmark" id="bookmark"></div> -->
                        <input type="hidden" name="spot_id" :value="item.spot_no">

                    </form>
                </div>
            </div>
            <h3 class="padding_top_5 alltrip ">木星景點</h3>
            <div class="tripcard_all  margin_top_5">
                <div v-for="item in spot1.slice(6,9)" class="tripcard ">
                    <form class="card" action="alltrip.php" method="post">
                        <a :href="item.url">
                            <img :src="item.spot_pic1" class="spot_pic" alt="spot_pic">
                            <div class="content line_low">
                                <h4 class="hot2 margin_top_1">{{item.spot_name}}</h4>
                                <small class="tag">{{item.spot_lv}}</small>
                                <small class="tag">{{item.miles}}積分</small>
                                <h3 class="price2 margin_top_2">${{item.spot_price}}</h3>
                            </div>
                        </a>
                        <button type="submit" name="add" class="addin2 small margin_top_2 myTrip"><img class="plus"
                                src="./img/icon/plus.png" alt="">加入我的行程</button>
                        <!-- <div class="trip_bookmark" id="bookmark"></div> -->
                        <input type="hidden" name="spot_id" :value="item.spot_no">

                    </form>
                </div>
            </div>
        </div>
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

    <!-- 第一屏火星背景 -->
    <script src="./js/marsbackground.js"></script>

    <!-- vue -->
    <!-- <script src="./js/alltrip.js"></script> -->

    <!-- vue -->
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






</body>

</html>