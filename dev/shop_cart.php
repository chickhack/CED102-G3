<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages/shop_cart.css">
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/3.6.2/vuex.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
=======
>>>>>>> denis
    <title>星球商城</title>
</head>
<body>
    <div class="container">
        <nav id="nav">
        <div class="logo">
            <h1><a href="home.php">SPACED</a></h1>
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
            <a href="./login.html"
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
        <section class="cart" id="app">
            <form action="">
                <h3 class="h2">我的商品</h3>
                <ul>
                    <cart :item="val" v-for="val in products"></cart>
                </ul>
                <div class="checkout margin_top_8">
                    <div class="total">
                        <div class="totalPrice">
                            <p>商品合計</p>
                            <p class="margin_left_1">${{totalPrice}}</p>
                        </div>
                        <div class="totalIntegral margin_top_1">
                            <small>可累計積分</small>
                            <img src="./img/s.png" class="icon margin_left_1">
                            <small>+{{totalPoints}}</small>
                        </div>
                    </div>
                    <a class="button_min margin_left_3" href="shop_order.html">前往結帳</a>
                </div>
            </form>
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

    </div>
    <script>
        Vue.component("cart", {
            props: ["item"],
            template: `                    
                    <li class="item margin_top_3">
                        <div class="img">
                            <img :src="'./img/shop/'+item.png" alt="">
                        </div>
                        <div class="info">
                            <div class="pdname">
                                <p>{{item.prod_name}}</p>
                                <div class="integral">
                                    <div class="points">
                                        <img src="./img/s.png" alt="" class="icon">
                                        <p>{{item.prod_points}}</p>
                                    </div>
                                    <div class="quantity">
                                        <div class="as margin_top_2">
                                            <span class="minus" @click="subQuantity">&minus;</span>
                                            <input type="number" name="quantity" id="quantity" v-model.number="verified" :min="0" :max="100">
                                            <span class="add" @click="addQuantity">&plus;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="h3">{{item.prod_price}}</p>
                            <img src="./img/icon/trashcan.png" class="icon trashcan">
                        </div>
                    </li>
                    `,
            data() {
                return {
                    verified: 1,
                }
            },
            methods: {
                subQuantity() {
                    if(this.verified ){
                        this.verified -= 1;
                    }
                    
                },
                addQuantity() {
                    this.verified += 1;
                }
            }
        })

        let vm = new Vue({
            el: "#app",
            data:{
                products:[],
            },
            computed: {
                totalPrice(){
                    let total = 0;
                    for(let i=0; i<this.products.length; i++){
                        total += parseInt(this.products[i]["prod_price"]);
                    }
                    return total;
                },
                totalPoints(){
                    let total = 0;
                    for(let i=0; i<this.products.length; i++){
                        total += parseInt(this.products[i]["prod_points"]);
                    }
                    return total;
                }
            }
        })

        
        fetch("./php/getProduct.php").then(res => res.json())
                                     .then(data => {
                                         let arr = [];
                                         for(let i=0 ; i<data.length ; i++){
                                            <?php
                                                if(isset($_SESSION["cart"])){
                                                    foreach($_SESSION["cart"] as $v1) {
                                                        foreach ($v1 as $v2) {?>
                                                            if(i == <?php echo $v2 ?>){
                                                                arr.push(data[i]);
                                                            }
                                                            <?php
                                                            };
                                                        };
                                                    }?>
                                                }
                                            arr.forEach(prod => {
                                                prod.png = prod["prod_pic"].split("==")[0];
                                            })
                                            vm.products = arr;
                                        });
    </script>
    <script src="./js/background.js"></script>
    <script src="./js/gotop.js"></script>
</body>
</html>