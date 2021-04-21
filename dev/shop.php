<?php
// start session
 session_start();
 if(isset($_POST["add"])){
    //  print_r($_POST["product_id"])
     if(isset($_SESSION["cart"])){
         $item_array_id = array_column($_SESSION["cart"],"product_id");
        //  print_r($item_array_id);
        // print_r($_SESSION["cart"]);

        if(in_array($_POST["product_id"],$item_array_id)){
            echo "<script>alert('product is already added in the cart')</script>";
            echo "<script>window.history.back()</script>";
        }else{
            $count = count($_SESSION["cart"]);
            $item_array = array(
                "product_id" => $_POST["product_id"],
                "prod_qty" => 1
            );

            $_SESSION["cart"][$count] = $item_array;
            // print_r($_SESSION["cart"]);
        }

     }else{
         $item_array = array(
             "product_id" => $_POST["product_id"],
             "prod_qty" => 1
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
    <title>星球商城</title>
    <link rel="stylesheet" href="./css/pages/shop.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
    <div class="container">
    <header>
    <nav id="nav">
  <div class="logo">
    <h1><a href="home.html">SPACED</a></h1>
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


  </header>
        <div id="particles-js"></div>
        <section class="shop">
            <div class="banner"><h2>在這裡可以滿足你上外太空的一切需求!</h2></div>
            <div id="app">
                <div class="filter margin_top_5">
                    <h2>商品</h2>
                    <div class="custom-select"  @click="pick">
                        <select>
                            <option value="0">排序</option>
                            <option value="1">依時間排序</option>
                            <option value="2">依價格排序</option>
                        </select>
                    </div>
                </div>
                <ul>
                    <li v-for="(card,index) in products">
                        <form class="card" action="shop.php" method="post">
                            <div class="imgBx">
                                <img :src="'./img/shop/'+card.png" alt="">
                                <h3>{{card.prod_name}}</h3>
                                <p class="h3 margin_top_1 price">${{card.prod_price}}</p>
                            </div>
                            <div class="content margin_top_2">
                                <a @click="getId(index)" class="button_min" :href="card.url">查看詳情</a>
                                <button type="submit" name="add" class="button_min margin_top_2">加入購物車</button>
                                <input type="hidden" name="product_id" :value="card.prod_no">
                            </div>
                        </form>
                    </li>
                </ul>
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
    </div>
    <!-- vue -->
    <script>
        let vm = new Vue({
            el: "#app",
            data: {
                products: [],
                cart: [],
            },
            methods: {
                pick(e){
                    switch(e.target.innerHTML){
                        case "依時間排序":
                            this.products.sort((a,b) => {
                                const d1 = new Date(a.prod_ondate);
                                const d2 = new Date(b.prod_ondate);
                                if(d1 > d2){
                                    return 1;
                                }else if(d1 < d2){
                                    return -1;
                                }
                                return 0;
                            })
                            break;
                        case "依價格排序":
                            this.products.sort((a,b) => {
                                const p1 = parseInt(a.prod_price);
                                const p2 = parseInt(b.prod_price);
                                if(p1 > p2){
                                    return 1;
                                }else if(p1 < p2){
                                    return -1;
                                }
                                return 0;
                            })
                            console.log(this.products);
                            break;
                    }
                },
                getId(index){
              
                        sessionStorage.setItem("no", index+1);
              
                }
            },
        })
        
        fetch("./php/getProduct.php").then(res => res.json())
        .then(data => {
            vm.products = data;
            for(let i=0 ; i<data.length ; i++){
                                             vm.products[i].png = data[i]["prod_pic"].split("==")[0];
                                             let url = `product.php?id=${data[i].prod_no}`;
                                             vm.products[i].url = encodeURI(url);
                                             console.log(vm.products[i].url)
                                            }
                                        });
                                        
                                     
    </script>
    <script src="./js/background.js"></script>
    <script src="./js/customSelect.js"></script>
</body>
</html>