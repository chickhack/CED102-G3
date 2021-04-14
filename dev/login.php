<?php
    session_start();
    if(isset($_POST['create'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登入頁面</title>
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
    <link rel="stylesheet" type="text/css" href="./css/pages/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  </head>

  <body>
    <nav id="nav">
        <div class="logo">
          <h1><a href="../home.html">SPACED</a></h1>
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
              ><img src="../img/icon/header/luggage.png" alt="" class="icon"
            /></a>
          </li>
          <li class="nav-cart">
              <a href="./shop_cart.php">
                  <img src="../img/icon/header/shopping-cart_(1).png" alt="" class="icon"/>
              </a>
          </li> 
          <li>
            <a href="./login.php"
              ><img
                src="../img/icon/header/round-account-button-with-user-inside_(1).png"
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
      
      <script src="../js/header.js"></script>
      
      <div class="container-fluid">
        <section class="login_container col-12">
        <div class="login_banner col-3">
            <h2>加入 SPACED</h2>
            <h2>一同體驗</h2>
            <h2>航行宇宙</h2>
        </div>
        <div class="rightbox col-9 col-sm-9">

            <div class="return_btn margin_left_2">
                <span><a href="home.html"><<</a></span>
                <h4><a href="home.html">返回</a></h4>
            </div>
            <div class="modal-dialog">
                <div class="col-sm-9 main-section">
                    <div class="modal-content margin_top_13">
                        <div class="col-11 form-input">
                            <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="請輸入"></input>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="請輸入" value=""></input>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <input disabled type="submit" class="button_min margin_top_3" value="登入"><a href="./account.html" ></a></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-section margin_top_3">
                <div class="signup">
                    <img src="img/icon/create-group-button.png" width="20" >
                    <a href="register.php">加入會員</a>
                </div>
                <div class="forgot margin_top_2">
                    <img src="img/icon/locked-padlock.png" width="15">
                    <a>忘記密碼</a>
                </div>
            </div>
        </div>

        </section>
    </div>
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
