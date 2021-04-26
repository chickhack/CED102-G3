<?php
// start session
 session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>星星世界</title>
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/all.css" />
    <link rel="stylesheet" href="./css/pages/planet.css"></link>
    <!-- THREE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r127/three.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/orbitcontrols.js"></script>
    <!-- 動態背景 -->
    <!-- <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> -->
    
  </head>
  <body>


    <header>
        <nav id="nav">
            <div class="logo">
                <h1><a href="home.php">SPACED</a></h1>
            </div>
            <ul class="nav-links">
                <li class="margin_left_5 now"><a href="alltrip.php">星球景點</a></li>
                <li class="margin_left_5"><a href="planet.php" class="bread">星星世界</a></li>
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
                  <?php
                      if(isset($_SESSION['mem_no'])){?>
                          <div class="member"  onclick="toggle()">
                              <div class="info">
                                  <img src="<?= $_SESSION['mem_pic'] ?>" alt="">
                                  <div class="infoData">
                                      <a href="./account.php">會員中心</a>
                                      <a href="./login.php" onclick="show()">登出</a>
                                  </div>
                              </div>  
                          </div>
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
    <!-- 動態背景 -->
      <!-- <div id="particles-js">
        <script src="./js/background.js"></script>
      </div> -->
      <div class="planet_banner">
        <h2 class="margin_top_5">星星世界帶你探索宇宙</h4>
      </div>
    <!-- 星球頁籤 -->
      <div id="planet" class="planet_tab margin_top_5">
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
                      <canvas><canvas>
                      <script src="./js/mars_planet.js"></script>
                  </div>
                </div>
                <div class="planet_content ">
                  <div class="imgs col-6  margin_top_10 ">
                    <img src="./img/planet/set.png"/>
                  </div>
                    <!-- RWD Carousel -->
                    <div id="carouselExampleControls" class="carousel slide margin_top_6" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="./img/planet/mars_1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="./img/planet/mars_2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="./img/planet/mars_3.jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      </a>
                    </div>
        
                  <div class="desc col-6 margin_top_10">
                    <p>在Space Adventures的安排中，4名乘客將從SpaceX佛州卡納維爾角的基地起飛，而後在地球軌道上繞行，與過往不同的是，這次將不會造訪國際太空站。不過， 這次雙方合作的旅行，高度預計超越過往所有私人太空之旅，乘客將有機會目睹自雙子星計畫後無人見識過的地球樣貌。</p>
                  </div>
        
                </div>
              </div>
          </div>


        </div>

        <div class="planetbtn margin_top_5" align="center">
          <button class="button_min" >更多關於火星</button>
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
                <li><a href="planet.php" class="bread">星星世界</a></li>
                <li><a href="shop.php">星球商城</a></li>
                <li><a href="photowall.php">太空互動</a></li>
                <li><a href="Leaderboard.php">玩家排行</a></li>
            </ul>
        </div>
        <img src="./img/footer_moon.png" alt="" class="footer_moon">
        <img src="./img/smoke.png" alt="" class="smoke">
    </footer>
    </div>
    <!-- 星球頁籤轉移 -->
    <script>
      $(function(){
        var $li = $('ul.tab-title li');
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.tab-inner').hide();

            $li.click(function(){
              $($(this).find('a').attr('href')).show().siblings('.tab-inner').hide();
              $(this).addClass('active').siblings('.active').removeClass('active');
            });
      });


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

        // 會員
        function show(){
                fetch("./php/logout.php");
                window.location.href = "./login.php";
            }                               
            function toggle(){
                const infoData = document.querySelector(".infoData");
                infoData.classList.toggle("show");
            }    
    </script>
  </body>
</html>
