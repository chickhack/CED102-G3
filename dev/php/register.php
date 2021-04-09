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
    <link rel="stylesheet" type="text/css" href="./css/pages/login.css" />
  </head>
  <body>
    <div class="container">
        <header>@@include('./layout/header.html')</header>
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
                            <form id="register_form" method="post" action="php/add_member.php">
                            <div class="form-group">
                                <input type="email" id="username" class="form-control" placeholder="請輸入"></input>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" placeholder="請輸入密碼"></input>
                            </div>
                            <div class="form-group">
                                <input type="password" id="confirm_password" class="form-control" placeholder="請重新輸入密碼"></input>
                            </div>
                            <button type="submit" class="button_min margin_top_3" >註冊</button>
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
        $(document).on("ready", function(){
            //當帳號輸入後檢查帳號是否重複
            $("#username").on("keyup", function(){
                if($(this).val()!=''){
                    //非空字串才檢查
                $.ajax({
                    type : "POST", //表單傳送的方式
                    url : "./php/check_username.php", //目標給哪個檔案
                    data : {//為要傳過去的資料，使用物件方式呈現，因為變數key值為英文的關係，所以用物件方式送。ex: {name:"輸入的名字",password:"輸入的密碼"}
                    n : $(this).val()//代表要傳一個n變數值為，username文字方塊裡的值
                    },
                    dataType : 'html' //設定該網頁回應的是html格式
                }).done(function(data){

                    console.log(data);
                    
                }).fail(function(jqXHR, textStatus, errorThrown){
                    //失敗的時候
                    alert("有錯誤產生，請看console log");
                    console.log(jqXHR.responseText);
                })

                }else{
                    //空字串不檢查

                }
            });

            //當表單送出去的時候，檢查密碼是否兩個都輸入正確 
            $(document).on("ready", function(){
                $("#register_form").on("submit", function(){
                    if($("#password").val()!= $("#confirm_password").val()){
                        $("#password").parent().parent().addClass('has-error');
                        $("#confirm_password").parent().parent().addClass("has-error");
                        
                        alert("密碼有誤，請再次確認");
                        return false;
                    }
                });
            });

        });
    </script>
  </body>
</html>