<?php
    require_once('./php/connectbooks_yi.php');

    if(isset($_POST['register_btn'])){
        // 接收所有資料
        $mem_id = $_POST['mem_id'];
        $mem_psw = $_POST['mem_psw'];
        // 新增一筆資料
        try{
            $select_stmt=$pdo->prepare("SELECT mem_id FROM customer WHERE mem_id=:mem_id");

            $select_stmt->execute(array(':mem_id'=>$mem_id));
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($row['mem_id']==$mem_id){
                echo "username already exists";
            }else if(!isset($errorMsg)){
                $insert_stmt=$dsn->prepare("INSERT INTO customer (mem_id, mem_psw) VALUES ($mem_id,$mem_psw)");
                if($insert_stmt->execute(array(':mem_id' => $mem_id, ':mem_psw'=> $mem_psw))){
                    echo "Register Successfully";
                }else{
                    echo 'error';
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
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
    <!-- <link rel="stylesheet" type="text/css" href="./css/pages/register.css" /> -->
  </head>
  <body>
    <div>
        <?php

        ?>
    </div>
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
            <a href="./login.html"
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

    <?php
        if(isset($errorMsg))
        {
            foreach($errorMsg as $error)
            {
            ?>
            <div class="alert">
                <strong>WRONG!<?php echo $error;?></strong>
            </div>
                <?php
            }
        }
        if(isset($registerMsg))
        {
            ?>
            <div class="alert">
            <strong><?php echo $registerMsg; ?></strong>
            </div>
        <?php
        }
        ?>

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
                            <div class="form-group">
                                <input type="password" id="mem_psw" name="mem_psw" class="form-control" placeholder="請輸入密碼" required onkeyup="return passwordChanged();"></input>
                            </div>
                            <span id="strength"></span>
                            <div class="form-group">
                                <input type="password" id="confirm_password" class="form-control" placeholder="請重新輸入密碼" required></input>
                            </div>
                            <span id='message'></span>
                            <input type="submit" class="button_min margin_top_3 register_btn" id="register" name="register" value="註冊"></input>
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
            let regex = new RegExp(/^((?=.{8,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*|(?=.{8,}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!\u0022#$%&'()*+,./:;<=>?@[\]\^_`{|}~-]).*)/, "g");
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
            
        }; 
        
        
        window.addEventListener("load", function(){
            $id('register_form').onsubmit = validatePassword;
        })
        
        // 點擊register按鈕後的提示
        // $(function(){
        //     $('#register').click(function(e){
        //         var valid = this.form.checkValidity();
        //         if(valid){
        //             var mem_id = $('#mem_id').val();
        //             var mem_psw = $('#mem_psw').val();
                    
        //             e.preventDefault();
        //             $.ajax({
        //                 type: 'POST',
        //                 url: './login.php',
        //                 data: { mem_id : mem_id, mem_psw : mem_psw},
        //                 success: function(data){
        //                     Swal.fire({
        //                         'title': '恭喜您！',
        //                         'text': "註冊成功",
        //                         'type': 'success'
        //                     })
        //                 },
        //                 errors: function(data){
        //                     Swal.fire({
        //                         'title': '錯誤',
        //                         'text': "註冊失敗",
        //                         'type': 'error'
        //                     })
        //                 }
        //             });
        //         }else{
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