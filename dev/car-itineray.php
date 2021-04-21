<?php
    session_start();
    if(isset($_POST['remove'])){
        if($_GET['action'] = 'remove'){ 
            foreach($_SESSION['trip-cart'] as $key => $value){
                if($value['spot_id'] == $_GET['id']){
                    unset($_SESSION['trip-cart'][$key]);
                    $_SESSION['trip-cart'] = array_values($_SESSION['trip-cart']);
                    echo "<script>alert('Product has been removed!')</script>";
                    echo "<script>window.history.back()</script>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages/shop_cart.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/3.6.2/vuex.min.js"></script>
    <title>我的行程</title>
    <style>
    .count{
        width: 25px;
      height: 25px;
      background-color: #AD6E4A;
      border-radius: 50%;
      text-align: center;
      line-height: 1.5rem;
      position: absolute;
      transform: translate(50%, -150%);
      display: block;
      color: white; 
    }
    </style>
</head>
<body>
    <div class="container">
        <nav id="nav">
        <div class="logo">
            <h1><a href="home.html">SPACED</a></h1>
        </div>
        <ul class="nav-links">
            <li class="margin_left_5"><a href="alltrip.php">星球景點</a></li>
            <li class="margin_left_5"><a href="planet.html">星星世界</a></li>
            <li class="margin_left_5"><a href="shop.html">星球商城</a></li>
            <li class="margin_left_5"><a href="photowall.html">太空互動</a></li>
            <li class="margin_left_5"><a href="Leaderboard.html">玩家排行</a></li>
            <!-- <li><a href=""><img src="./images/ticket.png" alt="" class="icon"></a></li>
                <li><a href=""><img src="./images/shopping-cart_(1).png" alt="" class="icon"></a></li>
                <li><a href=""><img src="./images/round-account-button-with-user-inside_(1).png" alt="" class="icon"></a></li> -->
        </ul>
        <ul class="nav-icons">
            <li class="nav-itineray">
            <a href="./car-itineray.php"
                ><img src="./img/icon/header/luggage.png" alt="" class="icon"/>
                <?php
                        if(isset($_SESSION["trip-cart"])){
                            $count = count($_SESSION["trip-cart"]);
                            echo "<div class='count'>$count</div>";
                        }else{
                            echo "";
                        }
                        ?>
            </a>
            </li>
            <li class="nav-cart">
                <a href="./shop_cart.php">
                    <img src="./img/icon/header/shopping-cart_(1).png" alt="" class="icon"/>
                    
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
        <section class="cart" id="app">
            <form :action="name+id" method="post">
                <h3 class="h2">我的行程</h3>
                <?php
                print_r($_SESSION["trip-cart"]);
                ?>
                <ul>
                    <cart @get="getId" :item="val" v-for="(val,index) in products"></cart>
                </ul>
                <div class="checkout margin_top_8">
                    <div class="total">
                        <div class="totalPrice">
                            <p>行程合計</p>
                            <p class="margin_left_1">${{totalPrice}}</p>
                        </div>
                        <div class="totalIntegral margin_top_1">
                            <small>可累計積分</small>
                            <img src="./img/s.png" class="icon margin_left_1">
                            <small>+{{totalPoints}}</small>
                        </div>
                    </div>
                    <button type="submit" name="check" class="button_min margin_left_3" @click="location">前往結帳</button>
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
        Vue.use(Vuex);

        const mapState = Vuex.mapState
        const mapMutations = Vuex.mapMutations
        const mapActions = Vuex.mapActions
        const mapGetters = Vuex.mapGetters

        const store = new Vuex.Store({
            state: {
                totalPrice: 0,
                totalPoints: 0,
            },
            mutations:{
                updateAddPrice(state,payload){
                    state.totalPrice += payload;
                },
                updateMinusPrice(state, payload){
                    state.totalPrice -= payload;
                },
                all(state,payload){
                    state.totalPrice = payload;
                },
                pt(state, payload){
                    state.totalPoints = payload;
                }
            }
        })
        console.log(store);

        Vue.component("cart", {
            props: ["item"],
            template: `                    
                    <li class="item margin_top_3">
                        <div class="img">
                            <img :src="item.spot_pic1" alt="">
                        </div>
                        <div class="info">
                            <div class="pdname">
                                <p>{{item.spot_name}}</p>
                                <input type="hidden" :value="item.spot_no" name="spot_id">
                                <div class="integral">
                                    <div class="points">
                                        <img src="./img/s.png" alt="" class="icon">
                                        <p>{{item.miles}}</p>
                                    </div>
                                    <div class="quantity">
                                        <div class="as margin_top_2">
                                            <span class="minus" @click="subQuantity">&minus;</span>
                                            <input type="number" name="quantity" id="quantity" v-model.number="verified" :min="0" :max="100">
                                            <input type="hidden" :name="'spot_qty'+item.spot_no" :value="verified">
                                            <span class="add" @click="addQuantity">&plus;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="h3">$\{{mainPrice}}</p>
                            <button type="submit" name="remove"><img src="./img/icon/trashcan.png" class="icon trashcan" :data-no="item.spot_no" @click="increment"></button>
                        </div>
                    </li>
                    `,
            data() {
                return {
                    verified: this.item.qty,
                    id: 0,
                    name: "",
                }
            },
            computed: {
                mainPrice(){
                    return this.item.spot_price * this.verified ;
                },
                mainPoints(){
                    return this.item.spot_point * this.verified ;
                },
            },
            methods: {
                subQuantity() {
                    if(this.verified > 1){
                        this.verified -= 1;
                        this.$store.commit("updateMinusPrice", parseInt(this.item.spot_price));
                    }
                },
                addQuantity() {
                    this.verified += 1;
                    this.$store.commit("updateAddPrice", parseInt(this.item.spot_price));
                },
                increment(e) {
                    this.id = e.target.dataset.no;
                    this.$emit("get", this.id);
                },
            },
        })

        //global
        let vm = new Vue({
            el: "#app",
            store,
            data:{
                // mydata:[],
                products:[],
                id:0,
                verified: 0,
                name: 'car-itineray.php?action=remove&id=',
            },
            mounted() {
                let total = 0;
                let points = 0;
                // fetch('./php/Leaderboard.php').then(res => res.json()).then(res => this.mydata = res);

                fetch("./php/get_car-itineray_spot.php").then(res => res.json())
                                     .then(data => {
                                         let arr = [];
                                         let qty=[];
                                         let ky =100;
                                        //  let j=1;
                                         for(let i=0 ; i<data.length ; i++){
                                            
                                            <?php
                                                if(isset($_SESSION["trip-cart"])){
                                                    foreach($_SESSION["trip-cart"] as $v1) {?>
                                                            if(ky == <?php echo $v1['spot_id'] ?>){
                                                                // console.log("hi");
                                                                
                                                                data[i-1].qty = <?php echo $v1['spot_qty']?>;
                                                                arr.push(data[i-1]);
                                                                
                                                            }
                                                            <?php
                                                        };
                                                    }?>
                                                    // console.log(qty);
                                                    ky++;
                                                    // j++;
                                                    console.log(arr);
                                                }
                                            arr.forEach(prod => {
                                                prod.png = prod["spot_pic1"];
                                                total += parseInt(prod['spot_price']) * parseInt(prod['qty']);
                                                points += parseInt(prod['miles']);
                                                console.log(points);
                                                console.log(prod['qty']);

                                            })
                                            this.products = arr;
                                            
                                        }).then(()=>{
                                            this.$store.commit('all', total);
                                            this.$store.commit('pt', points);
                                        })
            },
            computed: {
                // totalPrice(){
                //     return this.$store.state.totalPrice;
                // }
                ...mapState(['totalPrice','totalPoints']),
            },
            methods: {
                getId(id){
                    this.id = id ;
                },
                location(e){
                    if(e.target.name = "check"){
                        const form = document.querySelector("form");
                        this.name = "./order-itineray.php";
                        this.id="";
                    }
                }
            },
        })

    </script>
    <script src="./js/background.js"></script>
</body>
</html>