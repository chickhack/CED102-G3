<?php
    session_start();
    //立即購買按鈕
    if(isset($_POST['buy'])){
        if(isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
           //  print_r($_SESSION["cart"]);
   
           if(in_array($_POST["product_id"],$item_array_id)){
               echo "<script>window.location.href = './shop_cart.php'</script>";
           }else{
               $count = count($_SESSION["cart"]);
               $item_array = array(
                   "product_id" => $_POST["product_id"],
                   "prod_qty" => $_POST['prod_qty']
               );
   
               $_SESSION["cart"][$count] = $item_array;
               // print_r($_SESSION["cart"]);
               echo "<script>window.location.href = './shop_cart.php'</script>";
           }
   
        }else{
            $item_array = array(
                "product_id" => $_POST["product_id"],
                "prod_qty" => $_POST['prod_qty']
            );
           //  create new session variable
           $_SESSION["cart"][0] = $item_array;
           // print_r($_SESSION["cart"]);
        }
    }

    //加入購物車按鈕
    if(isset($_POST["add"])){
        //  print_r($_POST["prod_qty"]);
         if(isset($_SESSION["cart"])){
             $item_array_id = array_column($_SESSION["cart"],"product_id");
            //  print_r($_SESSION["cart"]);
    
            if(in_array($_POST["product_id"],$item_array_id)){
                echo "<script>alert('product is already added in the cart')</script>";
                echo "<script>window.history.back()</script>";
            }else{
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    "product_id" => $_POST["product_id"],
                    "prod_qty" => $_POST['prod_qty']
                );
    
                $_SESSION["cart"][$count] = $item_array;
                // print_r($_SESSION["cart"]);
            }
    
         }else{
             $item_array = array(
                 "product_id" => $_POST["product_id"],
                 "prod_qty" => $_POST['prod_qty']
             );
            //  create new session variable
            $_SESSION["cart"][0] = $item_array;
            // print_r($_SESSION["cart"]);
         }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/pages/trip.css"></link>
    <link rel="stylesheet" href="./css/pages/product.css">
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">
    <title>星球商城</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
</head>
<body>
    <nav id="nav">
  <div class="logo">
    <h1><a href="home.php">SPACED</a></h1>
  </div>
  <ul class="nav-links">
    <li class="margin_left_5"><a href="alltrip.php">星球景點</a></li>
    <li class="margin_left_5"><a href="planet.php">星星世界</a></li>
    <li class="margin_left_5"><a href="shop.php" class="bread">星球商城</a></li>
    <li class="margin_left_5"><a href="photowall.php">太空互動</a></li>
    <li class="margin_left_5"><a href="Leaderboard.php">玩家排行</a></li>
    <!-- <li><a href=""><img src="./images/ticket.png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/shopping-cart_(1).png" alt="" class="icon"></a></li>
        <li><a href=""><img src="./images/round-account-button-with-user-inside_(1).png" alt="" class="icon"></a></li> -->
  </ul>
  <ul class="nav-icons">
    <li>
      <a href="./car-itineray.php"
        ><img src="./img/icon/header/luggage.png" alt="" class="icon"
      /></a>
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
      <a href="./login.php"
        ><img
          src="./img/icon/header/round-account-button-with-user-inside_(1).png"
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

<script src="./js/header.js"></script>


    <div id="particles-js"></div>
    <a href="#" class="go-top"></a>
    <section class="container" id="app">
        <div class="product">
            <div class="imgs">
                <div class="img">
                    <img :src="'./img/shop/'+products[0].img" alt="" class="bigImg">
                    <div class="smallImg margin_top_2">
                        <div class="imgDetail img1" v-for="pic in products[0]['prod_pic']" @click="changeImg">
                            <img :src="'./img/shop/'+ pic" alt="">
                        </div>  
                    </div>
                </div>
            </div>
            <form class="detail margin_left_4" 
                    action="product.php?id=<?php echo $_GET["id"]?>"
                    method="post">
                <p>裝備</p>
                <h3 class="margin_top_2">{{products[0]["prod_name"]}}</h3>
                <hr class="margin_top_2">
                <p class="margin_top_2 line_low">{{products[0]["prod_info"]}}</p>
                <p class="margin_top_2"><strong>價格</strong></p>
                <p class="h3 margin_top_2 price">${{products[0]["prod_price"]}}</p>
                <div class="quantity margin_top_3">
                    <label for="quantity">數量</label>
                    <div class="as margin_top_2">
                        <span class="minus" @click="subQuantity">&minus;</span>
                        <input type="number" name="quantity" id="quantity" v-model.number="verified" :min="0" :max="100">
                        <input type="hidden" name="prod_qty" :value="verified">
                        <span class="add" @click="addQuantity">&plus;</span>
                    </div>
                    <button type="submit" name="add" class="button_large margin_top_2">加入購物車</button>
                    <input type="hidden" name="product_id" value=<?php echo $_GET["id"]?>>
                    <button type="submit" name="buy" class="button_large margin_top_2 margin_left_1 buy" href="./shop_cart.php">立即購買</button>
                </div>
                <img src="./img/icon/bookmark-outline.png" alt="" class="icon favorites">
            </form>
        </div>
        <p class="describe line_low">{{products[0]["prod_intro"]}}</p>
        <div>
            <!-- <div class="recommend">
                <h3 class="margin_top_10 alltrip ">建議搭配景點</h3>
                <div class="tripcard_all  margin_top_5">

                    <a href="trip.html" v-for="item in second" class="tripcard">
                        <img :src="item.spot" class="spot_pic" alt="spot_pic">
                        <div class="content line_low">
                            <h4 class="hot2 margin_top_1">{{item.title}}</h4>
                            <small class="tag ">{{item.grade}}</small>
                            <small class="tag">{{item.scores}}積分</small>
                            <h4 class="price2 margin_top_1">${{item.price}}</h4>
                            <div class="addin2 samll  margin_top_2"><img class="plus" src="./img/icon/plus.png"
                                    alt="">加入我的行程</div>
                        </div>
                    </a>

                </div>
            </div> -->
            <div class="comment">
                <h3>買家評論</h3>
                <div class="score margin_top_1">
                    <p class="h3 number">{{scores}}</p>
                    <div class="starMessage margin_left_1">
                        <ul class="stars">
                            <li v-for="star in stars" class="star">
                                <img class="icon" src="./img/shop/star.png">
                            </li>
                        </ul>
                        <div class="messageNum margin_top_1 margin_left_1">{{products.length}}則留言</div>
                    </div>
                    <p v-if="products.length > 3" class="more">瀏覽評論</p>
                </div>
                <ul class="margin_top_5">
                    <message :msg="comment" v-for="comment in products"></message>
                    <!-- <li class="messages" v-for="comment in products">
                        <img :src="comment.mem_pic" alt="">
                        <div class="words margin_left_3">
                            <div class="name">
                                <p>{{comment.last_name}}{{comment.first_name}}</p>
                                <hr>
                                <p>{{comment["date(pt.prev_date)"]}}</p>
                            </div>
                            <div class="message margin_top_1 line_low">
                                <p v-if="comment.prev.length > 50">{{comment.prev}}</p> 
                                <p v-else>{{comment.prev.substring(0,50)}}</p> 
                            </div>
                            <p class="more" v-if="comment.prev.length > 50"  @click="allComment">瀏覽更多</p>

                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </section>
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
    <script src="./js/addMinus.js"></script>
    <script src="./js/productImgChange.js"></script>
    <script>
        Vue.component('message',{
            props:["msg"],
            template: `
                        <li class="messages">
                            <img :src="msg.mem_pic" alt="">
                            <div class="words margin_left_3">
                                <div class="name">
                                    <p>{{msg.last_name}}{{msg.first_name}}</p>
                                    <hr>
                                    <p>{{msg["date(pt.prev_date)"]}}</p>
                                </div>
                                <div class="message margin_top_1 line_low">
                                    <p v-if="msg.prev.length > 50">{{message}}</p> 
                                    <p v-else>{{msg.prev.substring(0,50)}}</p> 
                                </div>
                                <p class="more" v-if="msg.prev.length > 50"  @click="allComment">瀏覽更多</p>

                            </div>
                        </li>
                        `,
            data(){
                return{
                    message: this.msg.prev.substring(0,50)
                }
            },
            methods: {
                allComment(e){
                    // const message = document.querySelector(".message");
                    // console.log(this.message);
                    this.message = this.msg.prev;
                    e.target.style.opacity = 0 ;
                }
            }
        })
        let vm = new Vue({
            el: "#app",
            data:{
                verified: 1,
                products:[],
                // second: [{
                //     spot: "./img/trip/trip_jupiter/jupiter_a1_ps2.jpg",
                //     title: "月球 | 太空體驗一日遊",
                //     grade: "初階",
                //     scores: "5000",
                //     price: 1000,
                // }, {
                //     spot: "./img/trip/trip_jupiter/jupiter_b1_ps2.jpg",
                //     title: "月球 | 熱氣球一日遊",
                //     grade: "初階",
                //     scores: "5000",
                //     price: 2000,
                // }, {
                //     spot: "./img/trip/trip_jupiter/jupiter_c4_ps2.jpg",
                //     title: "月球 | 熱氣球一日遊",
                //     grade: "初階",
                //     scores: "5000",
                //     price: 3000,
                // },],
                // comments: [
                //     {
                //         src: "./img/shop/user.png",
                //         name: "Doris",
                //         date: "21.03.11",
                //         content: "選用高質感的超細纖維皮革，具有真皮的透氣度與柔軟度，軟可彎折，輕量好攜帶，精緻銜扣設計讓整體質感大提升，兩種可後踩設計，出門方便又省時，橡膠防滑鞋底，有效降低打滑危機"
                //     },{
                //         src: "./img/shop/user.png",
                //         name: "Doris",
                //         date: "21.03.11",
                //         content: "選用高質感的超細纖維皮革，具有真皮的透氣度與柔軟度，軟可彎折，輕量好攜帶，精緻銜扣設計讓整體質感大提升，兩種可後踩設計，出門方便又省時，橡膠防滑鞋底，有效降低打滑危機"
                //     },{
                //         src: "./img/shop/user.png",
                //         name: "Doris",
                //         date: "21.03.11",
                //         content: "選用高質感的超細纖維皮革，具有真皮的透氣度與柔軟度，軟可彎折，輕量好攜帶，精緻銜扣設計讓整體質感大提升，兩種可後踩設計，出門方便又省時，橡膠防滑鞋底，有效降低打滑危機"
                //     },
                // ],
            },
            methods: {
                changeImg(e){
                    const bigImg = document.querySelector(".bigImg");
                    bigImg.src = e.target.src;
                },
                subQuantity() {
                    if(this.verified ){
                        this.verified -= 1;
                    }
                    
                },
                addQuantity() {
                    this.verified += 1;
                },
            },
            computed: {
                stars(){
                    let total = 0;
                    // let avg = 0;
                    this.products.forEach(product => {
                        total += parseInt(product.score);
                    })
                    return parseInt(total / this.products.length);
                },
                scores(){
                    let total = 0;
                    // let avg = 0;
                    this.products.forEach(product => {
                        total += parseInt(product.score);
                    })
                    return (total / this.products.length).toFixed(1);
                }
            },
            mounted(){
                let id = sessionStorage.getItem("no");
                fetch(`./php/getId.php?id=${id}`).then(res => res.json())
                                                .then(data => {                                        
                                                        vm.products = data;
                                                        vm.products[0].img = data[0]["prod_pic"].split("==")[1];
                                                        let picArr = data[0]["prod_pic"].split("==");
                                                        picArr.shift();
                                                        vm.products[0]["prod_pic"] = picArr;
                    });
            }
        });

                                            
    </script>
    <script src="./js/background.js"></script>
    <script src="./js/gotop.js"></script>
</body>
</html>