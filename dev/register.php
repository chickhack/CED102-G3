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
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"
    />
    <link rel="stylesheet" type="text/css" href="../css/pages/register.css" />
  </head>
  <body>
    <div>
        <?php
        if(isset($_POST['create'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            echo $username - " " - $password;
        }
        ?>
    </div>
      <header>@@include('./layout/header.html')</header>
    <div class="container-fluid">
        <section class="login_container col-12">
        <div class="login_banner col-3">
            <h2>加入 SPACED</h2>
            <h2>一同體驗</h2>
            <h2>航行宇宙</h2>
        </div>
        <div class="rightbox col-8 col-sm-9">

            <div class="return_btn margin_left_2">
                <span><a href="login.html"><<</a></span>
                <h4><a href="login.html">返回登入頁面</a></h4>
            </div>
            <div class="modal-dialog">
                <div class="col-sm-9 main-section">
                    <div class="modal-content margin_top_5">
                        <div class="col-11 form-input">
                            <form id="register_form" method="post">
                            <div class="form-group">
                                <input type="email" id="username" name="username" class="form-control" placeholder="請輸入" required></input>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="請輸入密碼" required onkeyup="return passwordChanged();"></input>
                            </div>
                            <span id="strength"></span>
                            <div class="form-group">
                                <input type="password" id="confirm_password" class="form-control" placeholder="請重新輸入密碼" required></input>
                            </div>
                            <span id='message'></span>
                            <button type="submit" class="button_min margin_top_3" name="create">註冊</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //檢查帳號是否重複
        // $(document).on("ready", function(){
            // $("#username").on("keyup", function(){
                // if($(this).val()!=''){
                    //非空字串才檢查
                // $.ajax({
                    // type : "POST", 
                    //表單傳送的方式
                    // url : "/php/check_username.php", 
                    //目標給哪個檔案
                    // data : {
                        //為要傳過去的資料，使用物件方式呈現，因為變數key值為英文的關係，所以用物件方式送。ex: {name:"輸入的名字",password:"輸入的密碼"}
                    // n : $(this).val()
                    //代表要傳一個n變數值為，username文字方塊裡的值
                    // },
                    // dataType : 'html' 
                    //設定該網頁回應的是html格式
                // }).done(function(data){

                    // console.log(data);
                    
                // }).fail(function(jqXHR, textStatus, errorThrown){
                    //失敗的時候
                    // alert("有錯誤產生，請看console log");
                    // console.log(jqXHR.responseText);
                // })

                // }else{
                    //空字串不檢查

                // }
            // });

            
        // });
        // 檢查兩次密碼是否輸入正確
        $('#password, #confirm_password').on('keyup', function () { 
            // 
            if ($('#password').val() == $('#confirm_password').val() != '') { 
                $('#message').html('密碼確認正確 √').css('color', 'green'); 
            } else $('#message').html('兩次輸入的密碼不一致 ').css('color', 'red'); });
        
        // 檢查密碼強度
        function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{8,}).*", "g");
        var pwd = document.getElementById("password");
        if (pwd.value.length == 0) {
            // strength.innerHTML = 'Type Password';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = '請輸入至少 8 個字元';
        } else if (strongRegex.test(pwd.value)) {
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


