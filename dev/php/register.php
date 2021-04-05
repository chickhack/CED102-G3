
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"><script>
        <script>
            $(document).on("ready", function(){
                //當帳號輸入後檢查帳號是否重複
                $("#email").on("keyup", function(){
                    if($(this).val()!=''){
                        //非空字串才檢查
                    $.ajax({
                        type : "POST", //表單傳送的方式
                        url : "php/check_username.php", //目標給哪個檔案
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