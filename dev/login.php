<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登入頁面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./css/pages/login.css" />
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
                <li class="margin_left_5 now"><a href="alltrip.php">星球景點</a></li>
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
                    <a href="./login.php"><img src="./img/icon/header/round-account-button-with-user-inside_(1).png"
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
      <div class="container-fluid">
        <section class="login_container col-12">
        <div class="login_banner col-3">
            <h2>加入 SPACED</h2>
            <h2>一同體驗</h2>
            <h2>航行宇宙</h2>
        </div>
        <div class="rightbox col-lg-9 col-md-12 col-sm-12" align="center">

        <div class="return_btn margin_left_2 margin_top_2">
                <span><a href="./home.php"><<</a></span>
                <h4><a href="./home.php">返回首頁</a></h4>
        </div>
            <div class="modal-dialog">
                <div class="col-sm-9 main-section">
                    <div class="modal-content margin_top_15">
                        <div class="col-12 form-input">
                            <form id="login_form" action="./php/login_func.php" method="post">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="請輸入"></input>
                            </div>
                            <div class="form-group">
                                <input name="mem_psw" id="mem_psw" type="password" class="form-control" placeholder="請輸入" value=""></input>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <input type="submit" class="button_min margin_top_3 login_btn" value="登入"><a href="./account.html"></a></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-section margin_top_3 " >
                <div class="signup">
                    <img src="img/icon/create-group-button.png" width="20" >
                    <a href="./register.php">加入會員</a>
                </div>
                <div class="forgot margin_top_2">
                    <img src="img/icon/locked-padlock.png" width="15">
                    <a>忘記密碼</a>
                </div>
            </div>
        </div>

        </section>

<!-- container-fluid結尾 -->
    </div>
<!-- footer  -->
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


    <script>
        // 切換密碼可見
        $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
        });

    </script>
  </body>
</html>
