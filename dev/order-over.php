<?php
session_start();
unset($_SESSION["trip-cart"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>訂單完成</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
   
    <link rel="stylesheet" href="./css/pages/all.css">
    <link rel="stylesheet" href="./css/pages/order-over.css">
</head>
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
    <div class="container">
            <div id="particles-js">
                <!-- 動態背景 -->
                <script src="./js/background.js"></script>
                
            </div>
        <div class="row">
            <div class="col-9 col-xxl-3 col-xl-4 col-md-5 col-sm-6 ma">
                <p class="line_high text-1 padding_top_8">訂購完成</p>
                <p class="">感謝您的訂購</p>
                <!-- <p class="padding_top_1">訂單編號為hhdw498242</p> -->
                <div class="sub ">
                    <a href="./account.php" class="button_min btn-coin">查看訂單明細</a>
                    <!-- <a href="../alltrip.html" class="button_min btn-coin margin_left_5">看更多景點</a> -->
                </div>
            </div>
        </div>
    </div>
        





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
</body>
</html>