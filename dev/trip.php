<?php
session_start();
if(isset($_POST["add"])){
    if(isset($_SESSION["trip-cart"])){
       $item_array_id = array_column($_SESSION["trip-cart"],"spot_id"); 
    
       if(!in_array($_POST["spot_id"], $item_array_id)){
           $count = count($_SESSION["trip-cart"]);
           $item_array = array(
               "spot_id" => $_POST["spot_id"]
           );
           $_SESSION["trip-cart"][$count] =$item_array;
           // echo '<script>window.location="alltrip_test.php"</script>';
       }else{
           echo "<script>alert('已加入我的行程')</script>";
           // echo "<script>window.location ='alltrip_test.php'</script>";
   }
       }else{
           $item_array = array(
               "spot_id" => $_POST["spot_id"]
           );
           $_SESSION["trip-cart"][0] = $item_array;
   }
}

$spot_no = $_GET["spot_no"];
$errMsg = "";
try{
    require_once("./php/connectbooks_kai.php");
    $sql = "select *from spot where spot_no = :spot_no";
    $spot = $pdo->prepare($sql);
    $spot->bindValue(":spot_no", $spot_no);
    $spot->execute();
  }catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages/trip.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Slider-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- 動態背景 -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <title></title>
</head>

<body>
    <header>
        <nav id="nav">
            <div class="logo">
                <h1><a href="home.html">SPACED</a></h1>
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
                    <a href="./login.html"><img src="./img/icon/header/round-account-button-with-user-inside_(1).png"
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
    <!-- php開始 -->
    <?php 
if( $errMsg != ""){ //例外
  echo "<div><center>$errMsg</center></div>";
}elseif($spot->rowCount()==0){
      echo "<div><center>查無此景點資料</center></div>";
}else{
      $spotRow = $spot->fetchObject();
?>

    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide"><img class="trippic" src="<?php echo $spotRow->spot_pic1;?>" alt="">
            </div>
            <div class="swiper-slide"><img class="trippic" src="<?php echo $spotRow->spot_pic2;?>" alt="">
            </div>
            <div class="swiper-slide"><img class="trippic" src="<?php echo $spotRow->spot_pic3;?>" alt="">
            </div>
            <div class="swiper-slide"><img class="trippic" src="<?php echo $spotRow->spot_pic4;?>" alt="">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div id="app">
        <div class="parent_container">
            <div class="up_container">
                <main class="trip_content_all margin_left_3">
                    <div class="h2 trip_title margin_top_2"><?php echo $spotRow->spot_name;?>
                        <div class="h3 number margin_left_2">{{number}}</div>
                        <div class="trip_bookmark"></div>
                        <!-- <img class="bookmark" src="./img/icon/bookmark-outline.png" alt=""> -->
                    </div>
                    <div class="tab_container">
                        <div class="tab_list_block margin_top_3">
                            <ul class="tab_list">
                                <li><a href="#" data-target="tab1" class="h4 tab -on">景點介紹</a></li>
                                <li><a href="#" data-target="tab2" class="margin_left_3 h4 tab">景點說明</a></li>
                                <li><a href="#" data-target="tab3" class="margin_left_3 h4 tab">注意事項</a></li>
                            </ul>
                        </div>

                        <div class="tab_contents">

                            <div class="margin_top_2 line_low tab tab1 -on">
                                <small class="tag "><?php echo $spotRow->spot_lv;?>景點</small>
                                <small class="tag"><?php echo $spotRow->miles;?>積分</small>
                                <br>
                                <?php echo $spotRow->spot_info;?>
                            </div>

                            <div class="margin_top_2 line_low tab tab2">
                                <?php echo $spotRow->spot_intro;?>
                            </div>

                            <div class="margin_top_2 line_low tab tab3">
                                <?php echo $spotRow->spot_dnt;?>
                            </div>
                        </div>
                    </div>
                </main>
                <div class="book margin_left_10 line_low margin_top_5">
                    <h3><?php echo $spotRow->spot_name;?></h3>
                    <small class="price_dis">最優價格保證</h4>
                        <h3 class="price">$ <?php echo $spotRow->spot_price;?>/ 人</h3>
                        <p class="margin_top_1 small">
                            SPACED會在預訂成功後的1個工作日內確認，並將使用憑證發送至您的電子郵箱，如在註明的時限內還沒收到郵件，請查看垃圾郵件箱或與我們聯絡。
                        </p>
                        <!-- <hr class="margin_top_2"> -->
                        <form class="card" action="trip.php" method="post">
                            <div class="select">
                                <div class="date margin_top_2">
                                    <label for="date-1" class="h4 date_text">選擇出發日期</label><br>
                                    <input type="date" id="date-1" class="btn-date data-down">
                                </div>
                                <div class="amount margin_top_2">
                                    <p class="h4 date_text">數量</p>
                                    <button class="minus btn-pull" id="minus">－</button>
                                    <input type="number" value="1" id="num" class="btn-nu p" min="0">
                                    <button class="add btn-pull" id="add">＋</button>
                                </div>
                            </div>
                            
                            <div class="btn  margin_top_2">
                                
                                <button type="submit" name="add" class="addin small myTrip"><img class="plus"
                                        src="./img/icon/plus.png" alt="">
                                    加入我的行程</button>
                                    <input type="hidden" name="spot_id" :value="spot_no">
                                <button type="submit" name="add" class="button_min p buy margin_left_3"><a href="./car-itineray.php">前往訂購</a></button>
                            </div>
                        </form>
                </div>

                <?php
}
?>

                <div class="comment margin_top_10 margin_left_3">
                    <h3>旅客評論</h3>
                    <div class="score margin_top_1">
                        <p class="h3 number">{{number}}</p>
                        <div class="starMessage margin_left_1">
                            <ul class="stars">
                                <li v-for="star in totalStar" class="star">
                                    <img class="icon" src="./img/shop/star.png">
                                </li>
                            </ul>
                            <div class="messageNum margin_top_1 margin_left_1">100則留言</div>
                        </div>
                        <p class="more">瀏覽評論</p>
                    </div>
                    <ul class="margin_top_5">
                        <li class="messages" v-for="comment in comments">
                            <!-- <img :src="comment.src" alt=""> -->
                            <div class="words margin_left_3">
                                <div class="name">
                                    <p>{{comment.mem_no}}</p>
                                    <hr>
                                    <p>{{comment.trev_date}}</p>
                                </div>
                                <div class="message margin_top_1 line_low">
                                    <p>{{comment.trev}}</p>
                                </div>
                                <!-- <small class="more">瀏覽更多</small> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="recommend">
                <h3 class="margin_top_10 alltrip ">推薦精選景點</h3>
                <div class="tripcard_all  margin_top_6">
                    <div v-for="item in second.slice(0,4)" class="tripcard">
                        <form class="card" action="trip.php" method="post">
                            <a :href="item.url">
                                <img :src="item.spot_pic1" class="spot_pic" alt="spot_pic">
                                <div class="content line_low">
                                    <h4 class="hot2 margin_top_1">{{item.spot_name}}</h4>
                                    <small class="tag">{{item.spot_lv}}</small>
                                    <small class="tag">{{item.miles}}積分</small>
                                    <h4 class="price2 margin_top_1">${{item.spot_price}}</h4>
                                </div>
                            </a>
                            <button type="submit" name="add" class="addin2 small margin_top_2 myTrip"><img class="plus"
                                    src="./img/icon/plus.png" alt="">加入我的行程</button>
                            <!-- <div class="trip_bookmark" id="bookmark"></div> -->
                            <input type="hidden" name="spot_id" :value="item.spot_no">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="padding_top_10">
        <div class="links">
            <div class="logo"><img src="./img/logo.png" alt=""></div>
            <ul class="footer-links margin_top_2">
                <li><a href="alltrip.html">星球景點</a></li>
                <li><a href="planet.html">星星世界</a></li>
                <li><a href="shop.html">星球商城</a></li>
                <li><a href="photowall.html">太空互動</a></li>
                <li><a href="Leaderboard.html">玩家排行</a></li>
            </ul>
        </div>
        <img src="./img/footer_moon.png" alt="" class="footer_moon">
        <img src="./img/smoke.png" alt="" class="smoke">
    </footer>



    <!-- vue -->
    <script>
    let vm = new Vue({
        el: "#app",
        data: {
            number: 4.8,
            totalStar: 5,
            comments: [
            //     {
            //     src: "./img/userprofile/user1.png",
            //     name: "Doris",
            //     date: "21.03.11",
            //     content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
            // }, {
            //     src: "./img/userprofile/user3.png",
            //     name: "Doris",
            //     date: "21.03.11",
            //     content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
            // }, {
            //     src: "./img/userprofile/user5.png",
            //     name: "Doris",
            //     date: "21.03.11",
            //     content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
            // }, 
        ],
            computed: {
                // subContent() {
                //     if (this.content.length > 20) {
                //         return this.content.substr(1, 10);
                //     } else {
                //         return this.content;
                //     }
                // }
            },
            second: [],

        },
        mounted() {
            fetch('./php/getSelectTrip.php').then(res => res.json()).then(data => {
                vm.second = data;
                for (let i = 0; i < data.length; i++) {
                    let url = `trip.php?spot_no=${data[i].spot_no}`;
                    vm.second[i].url = encodeURI(url);
                    console.log(vm.second[i].url)
                }
            });
            fetch('./php/getReviews.php').then(res => res.json()).then(res => this.comments = res);
        },
    })
    </script>

    <!-- 頁籤 -->
    <script>
    $(function() {
        $("a.tab").on("click", function(e) {
            e.preventDefault();

            /* 將頁籤列表移除所有 -on，再將指定的加上 -on */
            $(this).closest("ul").find("a.tab").removeClass("-on");
            $(this).addClass("-on");

            /* 找到對應的頁籤內容，加上 -on 來顯示 */
            $("div.tab").removeClass("-on");
            $("div.tab." + $(this).attr("data-target")).addClass("-on");
        });
    });
    </script>

    <!-- 輪播 -->
    <script>
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1.5,
        spaceBetween: 5,
        centeredSlides: true,
        freeMode: true,
        grabCursor: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        breakpoints: {
            500: {
                slidesPerView: 1
            },
            700: {
                slidesPerView: 1.5
            }
        }
    });
    </script>

    <!-- 加減 -->
    <script>
    $('#add').click(function() {
        let nu = $('#num').val();
        $('#num').val(++nu);
    });
    $('#minus').click(function() {
        let nu = $('#num').val();
        if (nu == 0) {
            return;
        } else {
            $('#num').val(--nu);
        }
    });
    </script>


</body>

</html>