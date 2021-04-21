<?php
    require_once('./php/connectbooks_yi.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>加入會員</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"
    />
    <link rel="stylesheet" type="text/css" href="./css/pages/register.css" />
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
       

    <div class="container-fluid">
        <section class="login_container col-12">
        <div class="login_banner col-3">
            <h2>加入 SPACED</h2>
            <h2>一同體驗</h2>
            <h2>航行宇宙</h2>
        </div>
        <div class="rightbox col-8 col-sm-9">
            <div class="return_btn margin_left_2">
                <span><a href="./login.php"><<</a></span>
                <h4><a href="./login.php">返回登入頁面</a></h4>
            </div>
            <div class="modal-dialog">
                <div class="col-sm-9 main-section">
                    <div class="modal-content margin_top_5">
                        <div class="col-11 form-input">
                            <form id="register_form" action="register.php" method="post">
                            <div class="form-group">
                                <input type="email" id="mem_id" name="mem_id" class="form-control" placeholder="請輸入" required></input>
                            </div>
                            <input type="submit" class="button_min check_user" id="check_user" value="檢查"></input>
                            <!-- <span id="message"></span> -->
                            <div class="form-group">
                                <input type="password" id="mem_psw" name="mem_psw" class="form-control" placeholder="請輸入密碼" onkeyup="return passwordChanged();"></input>
                            </div>
                            <span id="strength"></span>
                            <div class="form-group">
                                <input type="password" id="confirm_password" class="form-control" placeholder="請重新輸入密碼"></input>
                            </div>
                            <span id='message'></span>
                            <input type="submit" class="button_min margin_top_3 register_btn" id="register_btn" name="register" value="註冊"></input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>

    </div>

    <script>
        function $id(id){
            return document.getElementById(id);
        }

        //檢查密碼是否符合
        function validatePassword(e) { 

            let password = document.getElementById("mem_psw"); 
            let confirm_password = document.getElementById("confirm_password"); 
            let regex = new RegExp(/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[a-zA-Z!#$%&? "])[a-zA-Z0-9!#$%&?]{8,20}$/);
            
            if(password.value.length < 8 && password!= null ){ 
                alert("密碼不可少於8碼");
                e.preventDefault();
                return;
            } 
            if(password.value.length > 15 ){ 
                alert("密碼長度為8-15碼");
                e.preventDefault();
                return;
            } 
            if(password.value != confirm_password.value) { 
                alert("兩次密碼輸入不一致！");
                e.preventDefault();
                return;
            }
            if((password.value).match(regex) == null){
                alert( "密碼需包含小寫字母、大寫字母、 數字和特殊符號");
                e.preventDefault();
                return;
            }
             


        // 提交後台判斷
            // -----檢查帳號信箱重複
            function checkId(){
                let xhr = new XMLHttpRequest();
                let logMemId = document.getElementById("register_form");
                xhr.onload = function(){//server端已執行完畢
                    console.log("onload : ", xhr.readyState);
                    if(xhr.status == 200){//http status is OK
                        if(xhr.responseText == 2 && logMemId.value != null){
                            // createNewAcc.disabled = false;
                            // createRemind.style.opacity = 0;
                            alert("此帳號可使用");
                        }else{
                            // createNewAcc.disabled=true
                            alert("此帳號已存在, 不可用");
                            // createRemind.style.opacity = 1;
                        }
                    }else{
                        alert(xhr.status);
                    }
                } 
                
                let url = "./php/check_username.php";
                xhr.open("post", url, true);
                xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                let data_AD = `logMemId=${$id("email").value}`;
                xhr.send(data_AD);

            };
            

        }
        
        window.addEventListener("load", function(){
            $id('register_form').onsubmit = validatePassword;
        });
        
        //檢查帳號是否重複
        // $(document).ready(function(){
        //     $("#register_form").on("submit",function(e){
        //         e.preventDefault();
        //         var email = $("#email").val();
        //     if (email !== "") {
        //             $.ajax({
        //             url : "./php/check_username.php",
        //             type : "POST",
        //             cache:false,
        //             data : {email:email},
        //             success:function(result){
        //                 if (result == 1) {
        //                 $("#message").text('此信箱已被註冊！').css("color", "red");
        //                 }else{
        //                 $("#message").text('此帳號可被使用！').css("color", "green");
        //                 }
        //             }
        //             });
        //         }else{
        //         $("#message").text('Please fill the all fields');
        //         }
        //     });
        // });


        // 檢查密碼強度
        function passwordChanged() {
            let strength = document.getElementById('strength');
            let strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            let mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            let enoughRegex = new RegExp("(?=.{8,}).*", "g");
            let pwd = document.getElementById("mem_psw");
            if (strongRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:green">密碼強度：強</span></span>';
            } else if (mediumRegex.test(pwd.value)) {
                strength.innerHTML = '<span style="color:orange">密碼強度：中</span>';
            } else {
                strength.innerHTML = '<span style="color:red">密碼強度：弱</span>';
            }
        }

        
    </script>
  </body>
</html>