<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>行程訂單明細</title>
    <!-- CSS only -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/pages/order-itineray.css">
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">
    <!-- 動態背景 -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
<header>
    <nav id="nav">
  <div class="logo">
    <h1><a href="home.php">SPACED</a></h1>
  </div>
  <ul class="nav-links">
<<<<<<< HEAD
    <li class="margin_left_5"><a href="alltripphp">星球景點</a></li>
    <li class="margin_left_5"><a href="planetphp">星星世界</a></li>
    <li class="margin_left_5"><a href="shopphp">星球商城</a></li>
    <li class="margin_left_5"><a href="photowallphp">太空互動</a></li>
    <li class="margin_left_5"><a href="Leaderboardphp">玩家排行</a></li>
=======
    <li class="margin_left_5"><a href="alltrip.php">星球景點</a></li>
    <li class="margin_left_5"><a href="planet.php">星星世界</a></li>
    <li class="margin_left_5"><a href="shop.php">星球商城</a></li>
    <li class="margin_left_5"><a href="photowall.php">太空互動</a></li>
    <li class="margin_left_5"><a href="Leaderboard.php">玩家排行</a></li>
>>>>>>> dev
    <!-- <li><a href=""><img src="./images/ticket.png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/shopping-cart_(1).png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/round-account-button-with-user-inside_(1).png" alt="" class="icon"></a></li> -->
  </ul>
  <ul class="nav-icons">
    <li>
      <a href="./car-itineray.php"
        ><img src="./img/icon/header/luggage.png" alt="" class="icon"
      /></a>
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
        <?php
            if(isset($_SESSION['mem_no'])){?>
                <a href="./account.php"><img src="./img/icon/header/round-account-button-with-user-inside_(1).png" alt="" class="icon"/></a>
        <?php }else{ ?>
                <a href="./login.php"><img src="./img/icon/header/round-account-button-with-user-inside_(1).png" alt="" class="icon"/></a>
        <?php } ?>
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

    <div class="container-fluid">
            <div id="particles-js">
            <!-- 動態背景 -->
            <script src="./js/background.js"></script>
            
            <!-- <div class="planet_banner">
                <h2 class="margin_top_5">星星世界帶你探索宇宙</h4>
                </div> -->
            </div>
                <form action="#" >
       
            <div class="orderinfo">
                
                    <div class="row">
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7 col-xxl-7">
                            
                            <button class="btn-allAuto" type="button" id="btn-opmenu">訂購人資訊</button>
                            <div id="orderinfo-automenu" class="padding_bottom-80">
                                    <!-- <div class="divider "></div> -->
                                    <div class="row" id="">
                                        <div class="col-7 col-xxl-4 col-lg-4 col-md-8 col-sm-7 ">
                                            <label for="last-name" class="textcolor line_high ">名字</label>
                                            <input type="text" id="last-name" class="letter-spacing-1 " name="last-name" required>
                                            <label for="first-name" class="textcolor line_high">姓氏</label>
                                            <input type="text" id="first-name" class="letter-spacing-1 " name="first-name" required>
                                            
                                        </div>
                                        <div class="col-7 col-xxl-4 col-lg-4 col-md-8 col-sm-7 ">
                                            <label for="identity" class="textcolor line_high">身分證字號</label>
                                            <input type="text" id="identity" pattern="[a-z]{1}[1-2]{1}[0-9]{8}" maxlength="10" required>
                                            <label for="phone" class="textcolor line_high">連絡電話</label>
                                            <input type="tel" id="phone" class="letter-spacing-2 oioi " name="phone" pattern="[0-9]{4}[0-9]{6}" required>
                                        </div>
                                        <div class="col-7 col-xxl-10 col-lg-10 col-md-8 col-sm-7 padding_bottom-1 ">
                                            <label for="email" class="textcolor line_high">電子信箱</label>
                                            <input type="email" name="email" class="letter-spacing-2" id="email" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                
            </div>
            
            <div class="ltineraryinfo">
                
                <div class="row">
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7">
                            <h2 class="titi margin_top_4">訂購行程資訊</h2>
                            <div class="row padding_bottom-20">
                                        <div class="col-3 col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3">

                                            <img src="./img/trip/trip_moon/moon_c1_ps.jpg" alt="">
                                        </div>
                                        <div class="col-7 col-xxl-8 col-xl-8 col-lg-7 col-md-7 col-sm-7 textinfo ">
                                            <div class="row">

                                                <div class="text-div col-11 col-xxl-5 col-xl-6 col-lg-6">
                                                    <p class=" h4 letter-spacing-2 padding_top_2">火星<span class=" text-va">∣</span>宇宙雨林秘境</p>
                                                    <p class="line_low">2021-3-12</p>

                                                </div>
                                                <div class="text-div col-11 col-xxl-2 col-xl-2 col-lg-2 ">
                                                    
                                                    <p>數量2</p>

                                                </div>
                                                <div class="text-div col-11 col-xxl-3 col-xl-3 col-lg-3">
                                                    <p class="line_low">總金額$6000 </p>
                                                    <P>積分800</P>
                                                </div>
                                            </div>    
                                            
                                        </div>
                            </div>
                            <div class="row padding_bottom-20">
                                <div class="col-3 col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3">

                                    <img src="./img/trip/trip_mars/mars_b2_ps.jpg" alt="">
                                </div>
                                <div class="col-7 col-xxl-8 col-xl-8 col-lg-7 col-md-7 col-sm-7 textinfo ">
                                    <div class="row">

                                        <div class="text-div col-11 col-xxl-5 col-xl-6 col-lg-6">
                                            <p class=" h4 letter-spacing-2 padding_top_2">火星<span class=" text-va">∣</span>反射谷及山羊峽谷探險一日遊</p>
                                            <p class="line_low">2021-3-15</p>

                                        </div>
                                        <div class="text-div col-11 col-xxl-2 col-xl-2 col-lg-2 ">
                                            
                                            <p>數量1</p>

                                        </div>
                                        <div class="text-div col-11 col-xxl-3 col-xl-3 col-lg-3">
                                            <p class="line_low">總金額$3000 </p>
                                            <P>積分800</P>
                                        </div>
                                    </div>    
                                    
                                </div>
                    </div>
                            <!-- <div class="row ">
                                <div class="col-11">
                                    <img src="./img/trip/trip_mars/mars_b2_ps.jpg" alt="">
                                    <div class="textinfo padding_left_3">
                                        <p class="h4 letter-spacing-2">火星<span class="text-va">∣</span>反射谷及山羊峽谷探險一日遊</p>
                                        <div class="textinfo-1 line_high">
                                            <p>2021-3-12</p>
                                            <p class="padding_left_3">數量X2</p>
                                            <P class="padding_left_3"><img class="" src="./img/icon/bonus.png" alt="">3000積分</P>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                
                                    <img src="./img/trip/trip_mars/mars_a1_ps.jpg.png" alt="">
                                    <div class="textinfo padding_left_3">
                                        <p class="h4 letter-spacing-2 ">火星 <span class="text-va">∣</span> 攀登太陽系第一高山奧林帕斯山三日遊</p>
                                        <div class="textinfo-1 line_high">
                                            <p>2021-3-12</p>
                                            <p class="padding_left_3">數量X2</p>
                                            <P class="padding_left_3"><img class="" src="./img/icon/bonus.png" alt="">3000積分</P>

                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                </div>
                
            </div>
            <div class="addPay">
                
                    <div class="row">
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7 ">
                            <h2 class="titi">加購專區</h2>
                        </div>
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7 backcol ">
                            <button class="btn-allAuto" type="button" id="addPay-btn"> 請選擇加購內容</button>
                            <div class="automena padding_bottom-2">
                                    <!-- <div class="divider"></div> -->
                                    <div class="row">
                                        <div class="col-11 align-items-center padding_left_5 ">
                                            <input type="checkbox" id="guide-yes" value="是" name="guide" class="checkbox_custom">
                                            <label for="guide-yes" class=" textcolor letter-spacing-1 checkbox_custom_label">加購嚮導（＋3000）</label>
                                            <!-- <label for="guide-yes" class="textcolor padding_left_1 padding_right-1">是</label>
                                            <input type="radio" id="guide-no" value="否" name="guide" class="padding_left_3">
                                            <label for="guide-no" class="textcolor padding_left_1">否</label> -->
                                        
                                        </div>
                                    </div>
                                    <div class="row padding_top_2">
                                        <div class="col-11 textcolor line_low margin-left-12">選擇交通工具</div>
                                    </div>
                                    <div class="row " id="row-traffic">
                                        
                                        <div class="col-10 col-xxl-5 col-xl-5  col-md-6 textcolor   margin_left_3">
                                            <input type="radio" id="traffic-0" value="基本" class="checkbox_custom" name="traffic">
                                            <label for="traffic-0" class="sss checkbox_custom_label">
                                                <img src="./img/trip/others/ships-astero.png" alt="">
                                               <div class="padding_left_2">
                                                   <p class="line_low">基本交通工具</p>
                                                   <p class="line_low">太空梭將以預計的時間到達</p>

                                               </div>
                                            </label>
                                        </div>
                                        <div class="col-10 col-xxl-5 col-xl-5 col-md-6 textcolor" id="fl-traffic">
                                                
                                            <input type="radio" id="traffic-1" value="升級" class="checkbox_custom" name="traffic">
                                            <label for="traffic-1" class="sss checkbox_custom_label">
                                                <img src="./img/trip/others/ships-rifter.png" alt="">
                                                <div class="padding_left_2">
                                                    <p class="line_low">升級交通工具(+2000)</p>
                                                    <p class="line_low">急速太空梭節省1.5倍的時間</p>
                                                </div>
                                                
                                            </label>

                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-11 padding_bottom-1 padding_left_5">
                                            <input type="radio" id="traffic-0" name="traffic" value="基本" class="inputra">
                                            <label for="traffic-0" class="traffic-div">

                                                <img src="./img/shopping-cart_(1).png" alt="" class="imgs">
                                                <div>
                                                    <p class="textcolor textHeight-1">基本太空梭</p>
                                                    <p class="textcolor textHeight-2 letter-spacing-1">基本速度</p>
        
                                                </div>
                                                <div class="coin">
                                                    <p class="textcolor textHeight-2 textRight" style="width: 60px;">＋0幣</p>
                                                </div>
                                            </label> 
                                            <input type="radio" id="traffic-1" name="traffic" value="升級" class="inputra">
                                            <label for="traffic-1" class="traffic-div">

                                                <img src="./img/shopping-cart_(1).png" alt="" class="imgs">
                                                <div class="w-50">
                                                    <p class="textcolor textHeight-2">急速太空梭</p>
                                                    <p class="textcolor textHeight-2 letter-spacing-1">加速1.5倍讓你節省更多時間前往下個旅程</p>
        
                                                </div>
                                                <div class="coin w-25">
                                                    <p class="textcolor textHeight-2 textRight w-100">＋2000幣</p>
                                                </div>
                                            </label> 
                                        </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>

                
            </div>
            <div class="paymethod">
                
                    <div class="row">
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7  margin_top_4">
                            <h2 class="titi">付款方式</h2>
                        </div>
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7 backcol ">
                            <button type="button" class="btn-allAuto" id="btn-paymethod">請選擇付款方式</button>
                            
                            <div class="paymethod-automanu ">
                                <!-- <div class="divider"></div> -->
                                <div class="row justify-content-start padding_left_5">
                                    <div class="col-10 col-xxl-4 col-lg-5 col-md-6 col-sm-10">
                                        <input type="checkbox" class="checkbox-1 checkbox_custom" id="paymethod-coin" name="paymethod-coin" value="宇宙幣">
                                        <label for="paymethod-coin" class="check  textcolor checkbox_custom_label letter-spacing-2 padding_left_1">宇宙幣尚餘50000 </label>
                                    </div>
                                    <div class="col-11 col-xxl-4 col-lg-5 col-md-8 col-sm-11 ">
                                        <label for="paymethod-coin-nu" class="textcolor" >折抵:</label>
                                        <input type="number" id="paymethod-coin-nu" min="0"  class="intput-nu padding_left_1 margin_left_2">
                                        <!-- <input type="button" class="paymethod-coin-btn margin_left_2" value="確認"> -->
                                    </div>
                                </div>
                                <!-- <div class="divider"></div> -->
                                <div class="row justify-content-start padding_left_5 padding_top_2">
                                    <div class="col-12 col-xxl-11" id="">
                                        <input type="checkbox" id="paymethod-automanu-car" class="checkbox_custom">
                                        <label for="paymethod-automanu-car" class="check textcolor padding_left_1 padding_bottom-1 margin_top_3 checkbox_custom_label">信用卡</label>
                                        <div class="paymethod-automanu-car-automanu padding_bottom-1 " id="car-auto">
                                            <!-- <div class="divider"></div> -->
                                            <div class="row ">
                                                <div class="col-7 col-xxl-3 col-xl-3 col-lg-3 col-md-8 col-sm-8">
                                                <label for="carnu" class="textcolor line_low">信用卡號碼</label>
                                                <input type="text" class="textcolor letter-spacing-2 input-focus" id="carnu" pattern="[0-9]{16}" maxlength="16" required placeholder="0000000000000000">
                                                </div>
                                                <div class="col-7 col-xxl-3 col-xl-3 col-lg-3 col-md-8 col-sm-8">
                                                    <label for="cardata" class="textcolor line_low">有效期限</label>
                                                    <input type="text" class="textcolor letter-spacing-1" id="cardata" pattern="[0-9]{2}[/]{1}[0-9]{2}" maxlength="5" placeholder="00/00" required>
                                                </div>
                                                <div class="col-7 col-xxl-1 col-xl-1 col-lg-1 col-md-8 col-sm-8">
                                                    <label for="" class="textcolor line_low">檢查碼</label>
                                                    <input type="text" class="textcolor letter-spacing-2" id="carcheck" pattern="[0-9]{3}" maxlength="3" placeholder="000" required>
                                                </div>
                                               
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="orderDetails">
                
                    <div class="row">
                        <!-- <div class="padding_top_10"></div> -->
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7 margin_top_6 backcol">
                            <button class="btn-allAuto" type="button" id="btn-orderDetails">訂單明細</button>
                            <div class="order-coin padding_top_4">
                                <div class="row">
                                    <div class="col-3 col-xxl-3 col-xl-3 col-lg-3 col-sm-3 order-coin-list">
                                        <p class="h4 ">訂單總金額</p>
                                    </div>
                                    <div class="col-3 col-sm-3"></div>
                                    <div class="col-3 col-xxl-3 col-sm-3 order-coin-right">
                                        <p class="textcolor-1 ">$9000</p>

                                    </div>
                                </div>
                            </div>
                            <div class="orderDetails-automanu padding_top_3" id="orderDetails-automanu">
                                <div class="row">
                                    <div class="col-3 col-xxl-3 col-xl-3 col-lg-3 col-sm-3 orderDetails-automanu-list">
                                        <p class="h6">加購專區</p>

                                    </div>
                                    <div class="col-3 col-xxl-3 col-xl-3 col-sm-3  orderDetails-automanu-right">
                                        <p class="h7 line_low">嚮導</p>
                                        <p class="h7 line_low">升級交通工具</p>
                                    </div>
                                    <div class="col-3 col-xxl-3 col-sm-3 orderDetails-automanu-right">
                                        <p class="textcolor line_low ">$3000</p>
                                        <p class="textcolor line_low ">$2000</p>
                                    </div>
                                </div>

                                    

                                        
                                
                                    <!-- <div class="col-11 padding_left_5 padding_top_3">
                                        <p class="h8">可累積積分</p>
                                        <div class="orderDetails-automanu-textdiv padding_left_3">
                                            <div class="textbox">
                                                
                                                <p class="h9 letter-spacing-2   textRight w-100 padding_right-5">＋1600</p>
                                            </div>
                                            <div class="textbox">
                                                <p class="h8 letter-spacing-2   textRight w-100 padding_right-5">累積後目前有5000積分</p>
                                            </div>
                                        </div>
                                    </div> -->
                            </div>
                            <div class="orderDetails-automanu-allcoin padding_top_1">
                                <div class="row">
                                    <div class="col-3 col-xxl-3 col-sm-3 orderDetails-automanu-allcoin-list">
                                        <p class="h6">加購總金額</p>
                                    </div>
                                    <div class="col-3 col-xxl-3 col-xl-3 col-sm-3"></div>
                                    <div class="col-3 col-xxl-3 col-sm-3 orderDetails-automanu-allcoin-right">
                                        <p class="textcolor-1">$5000</p>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-10 col-sm-9 col-md-8 col-xl-7 margin_top_6 backcol">
                            <div class="allcoinmenu">
                                <div class="row">
                                    <div class="col-3 col-xxl-3 col-sm-3 allcoinmenu-list">
                                    </div>
                                    <div class="col-3 col-xxl-3 col-xl-3 col-sm-3 allcoinmenu-con">
                                        <p class="h6 line_low">總需支付金額</p>
                                        <p class="h6 ">可累積積分</p>
                                    </div>
                                    <div class="col-4 col-xxl-3 col-lg-4 col-md-4 col-sm-4 allcoinmenu-right">
                                        <p class="textcolor-1 line_low">$14000</p>
                                        <p class="textcolor-1 line_low">+1600</p>
                                        <p class="h7 line_low">累積後目前有5000積分</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-7 padding_top_5 allpay-div">
                                <button type="submit" class="button_large-1" id="submit-btn"  >確認付款</button>
                                <!-- onclick="location.href='./order-over.html'" -->
                                <!-- <button disabled class="button_min"></button> -->
                            </div>
                    </div>
                
            </div>
        </form>

    
</div>
<a href="#" class="go-top"></a>
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

        
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/order-itineray.js"></script>
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