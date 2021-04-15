


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
    <title>火星 | 攀登太陽系第一高山</title>
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
    
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><img class="trippic" src="./img/trip/trip_mars/mars1.jpg" alt="">
                </div>
                <div class="swiper-slide"><img class="trippic" src="./img/trip/trip_mars/mars1_2.jpg" alt="">
                </div>
                <div class="swiper-slide"><img class="trippic" src="./img/trip/trip_mars/mars1_3.jpg" alt="">
                </div>
                <div class="swiper-slide"><img class="trippic" src="./img/trip/trip_mars/mars1_4.jpg" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>

        </div>
        <div id="app">
        <div class="parent_container">
            <div class="up_container">
                <main class="trip_content_all margin_left_3">
                    <div class="h2 trip_title margin_top_2">火星 | 攀登太陽系第一高山
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
                                <small class="tag ">初階景點</small>
                                <small class="tag">3000積分</small>
                                <br>
                                攀登太陽系第一高山為為三日行程。<br>
                                此次旅程將帶您前往不只是火星最高，更是太陽系最高的火山——位於火星西半球、高度21171公尺的奧林帕斯山，一探站在最高峰所望去的景色。<br>
                                嚮導會與您在塔爾西斯太空站會合，並一同前往奧林帕斯山東北方的一號基地營。<br>
                                從此基地營到山頂的直線距離約是200公里，坡度平均為五度，路面平坦，約可以在兩天內完成。<br>
                                走在我們精心設計的路線上，您會見到兩百萬年前的熔岩流，也可親眼觀察直徑達十公里的隕石坑。
                                <br>奧林帕斯山的火山口非常巨大，直徑約有八十公里，您可選擇使用噴射背包（需先提供有效駕駛證照）從空中一覽壯闊景色。
                            </div>

                            <div class="margin_top_2 line_low tab tab2">
                                <span class="g">【交通時間】</span>從地球出發到火星需要三天的時間。<br>
                                <span class="g">【積分】</span>此為高階景點，可獲得1600積分。<br>
                                <span class="g">【費用包含】</span><br>
                                -500萬責任險<br>
                                -導航設備<br>
                                -基本睡袋<br>
                                -健行三餐(主食1份及熱飲)<br>
                                -每日無限量熱水<br>
                                -登山嚮導挑夫（2人配1挑夫總計約25公斤<br>
                                -領隊/當地登山嚮導/挑夫/司機/導遊小費<br>
                                -塔爾西斯太空站至一號基地營來回接駁船<br>
                                -奧林帕斯山登山證、登山地圖等。
                                <br>
                                <span class="g">【團費不含】</span><br>
                                往返塔爾西斯太空站交通、個人急難救助及醫療險（必備，spaceaway可提供相關資料）、額外飲料、營地洗澡費用、上網及充電費用、個人登山裝備。
                            </div>

                            <div class="margin_top_2 line_low tab tab3">
                                由於該星球溫差大（27°C至-111°C），請備妥保暖、可活動之機能服裝。<br>
                                因此為登山行程，請斟酌考量身體因素，如有心血管疾病、曾有高山症等，請在報名前與我們討論。<br>
                                噴射背包為選擇性行程，如您有興趣，請報名時一併提供有效駕駛證照。
                                <br>
                                考慮安全因素，未滿15歲請勿參加本行程。
                                行程可能會因當地天氣狀況取消或改變。
                            </div>
                        </div>
                    </div>
                </main>
                <div class="book margin_left_10 line_low margin_top_5">
                    <h3>火星 | 攀登太陽系第一高山</h3>
                    <small class="price_dis">最優價格保證</h4>
                        <h3 class="price">$2000 / 人</h3>
                        <p class="margin_top_1 small">
                            SPACED會在預訂成功後的1個工作日內確認，並將使用憑證發送至您的電子郵箱，如在註明的時限內還沒收到郵件，請查看垃圾郵件箱或與我們聯絡。
                        </p>
                        <hr class="margin_top_2">
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
                        <!-- <div class="total margin_top_2 h3">總計$2000</div> -->
                        <div class="btn  margin_top_2">
                            <div class="addin small"><img class="plus" src="./img/icon/plus.png" alt=""><a
                                    href="./car-itineray.html">加入我的行程</a></div>
                            <div class="button_min p buy margin_left_3"><a href="./order-itineray.html">前往訂購</a></div>
                        </div>

                </div>
               
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
                            <img :src="comment.src" alt="">
                            <div class="words margin_left_3">
                                <div class="name">
                                    <p>{{comment.name}}</p>
                                    <hr>
                                    <p>{comment.date}</p>
                                </div>
                                <div class="message margin_top_1 line_low">
                                    <p>{{comment.content}}</p>
                                </div>
                                <small class="more">瀏覽更多</small>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            <div class="recommend">
                <h3 class="margin_top_10 alltrip ">其他推薦景點</h3>
                <div class="tripcard_all  margin_top_6">

                    <div v-for="item in second" class="tripcard">
                        <img :src="item.spot" class="spot_pic" alt="spot_pic">
                        <div class="content line_low">
                            <h4 class="hot2 margin_top_1">{{item.title}}</h4>
                            <small class="tag ">{{item.grade}}</small>
                            <small class="tag">{{item.scores}}積分</small>
                            <h4 class="price2 margin_top_1">${{item.price}}</h4>
                            <div class="addin2 samll  margin_top_2"><img class="plus" src="./img/icon/plus.png"
                                    alt="">加入我的行程</div>
                        </div>
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
                    {
                        src: "./img/userprofile/user1.png",
                        name: "Doris",
                        date: "21.03.11",
                        content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
                    }, {
                        src: "./img/userprofile/user3.png",
                        name: "Doris",
                        date: "21.03.11",
                        content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
                    }, {
                        src: "./img/userprofile/user5.png",
                        name: "Doris",
                        date: "21.03.11",
                        content: "我和先生都喜歡玩水，第一次接觸SUP，雖然我不太會游泳，但全程教練們都在一旁讓人感覺很安心，除了專業又幽默的教學外😊"
                    },
                ],
                second: [{
                    spot: "./img/trip/trip_jupiter/jupiter2.jpg",
                    title: "月球 | 太空體驗一日遊",
                    grade: "初階",
                    scores: "5000",
                    price: 1000,
                }, {
                    spot: "./img/trip/trip_jupiter/jupiter1.jpg",
                    title: "月球 | 熱氣球一日遊",
                    grade: "初階",
                    scores: "5000",
                    price: 2000,
                }, {
                    spot: "./img/trip/trip_jupiter/jupiter3.jpg",
                    title: "月球 | 熱氣球一日遊",
                    grade: "初階",
                    scores: "5000",
                    price: 3000,
                }, {
                    spot: "./img/trip/trip_jupiter/jupiter3.jpg",
                    title: "月球 | 太空體驗一日遊",
                    grade: "初階",
                    scores: "5000",
                    price: 1000,
                },],
                computed: {
                    subContent() {
                        if (this.content.length > 20) {
                            return this.content.substr(1, 10);
                        } else {
                            return this.content;
                        }
                    }
                }
            },
        })
    </script>
    
    <!-- 頁籤 -->
    <script>

        $(function () {
            $("a.tab").on("click", function (e) {
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
        $('#add').click(function () {
            let nu = $('#num').val();
            $('#num').val(++nu);
        });
        $('#minus').click(function () {
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