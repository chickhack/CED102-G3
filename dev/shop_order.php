<?php
    session_start();
    $arr = [];
    for($i=1; $i < count($_SESSION['cart'])+1 ; $i++){
        $no = $_SESSION['cart'][$i-1]['product_id'];
        if($no){
            array_push($arr, $_POST["prod_qty$no"]);
        }
    };
    print_r($arr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pages/shop_order.css">
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js'></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-cleave-component@2"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <title>星球商城</title>
</head>
<body>
    <div class="container">
        <header>
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


        </header>
        <div id="particles-js"></div>
        <a href="#" class="go-top"></a>

        <div id="app">
            <section class="orderDetail order">
                <h3>商品購買明細</h3>
                <ul class="margin_top_3">
                    <li v-for="product in products" class="margin_top_5">
                        <div class="imgWord">
                            <a href="product.html" class="prod"><img :src="'./img/shop/'+product.png"></a>
                            <div class="imgRight">
                                <div class="name">
                                    <p>{{product.prod_name}}</p>
                                    <div class="integral margin_top_2">
                                        <img src="./img/s.png" class="icon">
                                        <p>+{{product.prod_points}}積分</p>
                                    </div>
                                </div>
                                <p>數量{{product.qty}}</p>
                                <div class="price">
                                    <p>總金額</p>
                                    <p class="margin_top_2 h3">${{product.prod_price * product.qty}}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="orderer">
                <form class="form" method="POST">
                    <div class="orderer_form retract">
                        <div class="arrow">
                            <img src="./img/date-chevron-down.svg" alt="">
                            <h3 class="margin_left_1 orderer_click">訂購人資訊</h3>
                        </div>
                        <div class="icon"></div>
                        <div class="info">
                            <div class="input_group">
                                <label for="ofName">名字</label>
                                <input type="text" class="margin_top_1" name="ofName" id="ofName">
                            </div>
                            <div class="input_group">
                                <label for="olName">姓氏</label>
                                <input type="text" class="margin_top_1" name="olName" id="olName">
                            </div>
                            <div class="input_group">
                                <label for="omobile">手機</label>
                                <input type="tel" class="margin_top_1" name="omobile" id="omobile" maxlength="10">
                            </div>
                            <div class="input_group">
                                <label for="oemail">電子信箱</label>
                                <input type="email" class="margin_top_1" name="oemail" id="oemail" >
                            </div>
                        </div>
                    </div>
                    <div class="recipient retract">
                        <div class="arrow">
                            <img src="./img/date-chevron-down.svg" alt="">
                            <h3 class="margin_left_1 recipient_click">收件人資訊</h3>
                        </div>
                        <div class="checkbox_group">
                            <input type="checkbox" name="same" id="same" class="checkbox_custom">
                            <label class="checkbox_custom_label" for="same" @click="getValue">收件人資訊與寄件人資訊相同</label>
                        </div>
                        <div class="info margin_top_2">
                            <div class="input_group">
                                <label for="fName">名字</label>
                                <input type="text" class="margin_top_1" name="fName" id="fName">
                            </div>
                            <div class="input_group">
                                <label for="lName">姓氏</label>
                                <input type="text" class="margin_top_1" name="lName" id="lName">
                            </div>
                            <div class="input_group">
                                <label for="mobile">手機</label>
                                <input type="tel" class="margin_top_1" name="mobile" id="mobile" maxlength="10">
                            </div>
                            <div class="input_group">
                                <label for="email">電子信箱</label>
                                <input type="email" class="margin_top_1" name="email" id="email" max-length="30">
                            </div>
                            <div class="input_group long">
                                <label for="address">收件地址</label>
                                <input type="text" class="margin_top_1" name="address" id="address">
                            </div>
                        </div>
                    </div>
                    <h3 class="payTitle">付款方式</h3>
                    <div class="payment retract">
                        <div class="arrow">
                            <img src="./img/date-chevron-down.svg" alt="">
                            <h3 class="margin_left_1 orderer_click">請選擇付款方式</h3>
                        </div>
                        <div class="info margin_top_4">
                            <div class="group">
                                <div class="checkbox_group">
                                    <input type="checkbox" name="coins" id="coins" class="checkbox_custom">
                                    <label for="coins" class="checkbox_custom_label" id="coin">宇宙幣</label>
                                    <p>尚餘</p>
                                    <span class="margin_left_1">$50000</span>
                                    <img src="./img/dollar_(1).png" alt="" class="icon margin_left_1">
                                </div>
                                <div class="checkbox_group margin_left_2">
                                    <label for="discount">折抵</label>
                                    <input type="text" name="discount" id="discount" class="margin_left_1">
                                </div>
                            </div>
                            <div class="checkbox_group long margin_top_2">
                                <input type="checkbox" name="credit" id="credit" class="checkbox_custom">
                                <label for="credit" class="checkbox_custom_label">信用卡</label>
                                <div class="credit_icon margin_left_4">
                                    <cleave v-model="card" :options="options" class="credit"></cleave> 
                                    <i class="fab fa-cc-amex"></i>
                                    <i class="fab fa-cc-jcb"></i>
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-diners-club"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                    <i class="fab fa-cc-discover"></i>
                                </div>
                                <div class="credit_check margin_left_4 margin_top_2">
                                    <label for="creditDate" class="creditInput">有效期限</label>
                                    <cleave v-model="date" :options="option" id="creditDate"></cleave>
                                    <label for="check" class="creditInput">檢查碼</label>
                                    <input type="text" name="check" id="check" class="short creditInput" maxlength="4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="margin_top_4">訂單明細</h3>
                    <div class="detail margin_top_2">
                        <div class="total">
                            <p class="h3">支付金額</p>
                            <p class="h3">${{totalPrice}}</p>
                        </div>
                        <div class="integral margin_top_2">
                            <p>可累積積分</p>
                            <div class="count">
                                <img src="./img/s.png" class="icon">
                                <p>+{{totalPoints}}</p>
                            </div>
                        </div>
                        <small class="margin_top_1">累積後目前有50000積分</small>
                    </div>
                    <input type="button" value="確認付款" class="button_min" name="checkOut" @click="checkSubmit">
                </form>
            </section>
            <div class="modal">
                <div class="window">
                    <h3>訂購完成</h3>
                    <p class="margin_top_2 h4">感謝您的訂購!</p>
                    <a href="account.html" class="margin_top_5 button_large">查看訂單明細</a>
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
    </div>
    <script src="./js/retract.js"></script>
    <!-- <script src="./js/input_format.js"></script> -->
    <script src="./js/checkInput.js"></script>
    <!-- <script src="./js/crdeitCheck.js"></script> -->
    <script>
        Vue.use(VueCleave);

        let vm = new Vue({
            el: "#app",
            data:{
                products: [],
                card: null,
                options: {
                    creditCard: true,
                    delimiter: "-",
                    onCreditCardTypeChanged: function(type){
                        if(type === "visa"){
                            document.querySelector(".fa-cc-visa").classList.add("use");
                        }else if(type === "jcb"){
                            document.querySelector(".fa-cc-jcb").classList.add("use");
                        }else if(type === "amex"){
                            document.querySelector(".fa-cc-amex").classList.add("use");
                        }else if(type === "diners"){
                            document.querySelector(".fa-cc-diners-club").classList.add("use");
                        }else if(type === "mastercard"){
                            document.querySelector(".fa-cc-mastercard").classList.add("use");
                        }else if(type === "discover"){
                            document.querySelector(".fa-cc-discover").classList.add("use");
                        }else{
                            document.querySelector(".fa-cc-visa").classList.remove("use");
                            document.querySelector(".fa-cc-jcb").classList.remove("use");
                            document.querySelector(".fa-cc-diners-club").classList.remove("use");
                            document.querySelector(".fa-cc-amex").classList.remove("use");
                            document.querySelector(".fa-cc-mastercard").classList.remove("use");
                            document.querySelector(".fa-cc-discover").classList.remove("use");
                        }
                    }
                },
                date: null,
                option:{
                        date: true,
                        datePattern: ['m', 'y']
                }
            },
            computed:{
                totalPrice(){
                    let total = 0;
                    this.products.forEach(prod => {
                        total += prod.prod_price * prod.qty;
                    })
                    return total;
                },
                totalPoints(){
                    let total = 0;
                    this.products.forEach(prod => {
                        total += parseInt(prod.prod_points);
                    })
                    return total;
                }
            },
            methods: {
                getValue(){
                    const same = document.querySelector("#same");
                    const v = document.querySelector("#fName");
                    const lName = document.querySelector("#lName");
                    const ph = document.querySelector("#mobile");
                    const email = document.querySelector("#email");

                    if(!same.checked){
                        //名字
                        const value = document.querySelector("#ofName");
                        let val = value.value;
                        v.value = val;
                        //姓氏
                        const olName = document.querySelector("#olName");
                        let lVal = olName.value;
                        lName.value = lVal;
        
                        //手機
                        const phone = document.querySelector("#omobile");
                        let mobile = phone.value;
                        ph.value = mobile;
    
                        //電子郵件
                        const oEmail = document.querySelector("#oEmail");
                        let em = oEmail.value;
                        email.value = em;
                    }else{
                        v.value = "";
                        lName.value = "";
                        ph.value = "";
                        email.value = "";
                    }
                },
                checkInput(e){
                    const ofName = document.querySelector("#ofName");
                    const fName = document.querySelector("#fName");

                    if(ofName.value == "" && fName.value == ""){
                        alert("名字未填寫");
                        e.preventDefault();
                        return;
                    }
                    //姓氏一定要填
                    const olName = document.querySelector("#olName");
                    const lName = document.querySelector("#lName");

                    if(olName.value == "" && lName.value == ""){
                        alert("姓氏未填寫");
                        e.preventDefault();
                        return;
                    }
                    //手機一定要填
                    const omobile = document.querySelector("#omobile");
                    const mobile = document.querySelector("#mobile");

                    if(omobile.value < 10 && mobile.value < 10){
                        alert("手機號碼未滿10碼");
                        e.preventDefault();
                        return;
                    }
                    //電子信箱一定要填
                    const oemail = document.querySelector("#oemail");
                    const email = document.querySelector("#email");

                    if(oemail.value == "" && email.value == ""){
                        alert("電子信箱未填寫");
                        e.preventDefault();
                        return;
                    }
                    //收件地址一定要填
                    const address = document.querySelector("#address");

                    if(address.value == ""){
                        alert("收件地址未填寫");
                        e.preventDefault();
                        return;
                    }

                    //信用卡檢查
                    const credit = document.querySelector(".credit");
                    console.log(credit);
                    let odd = 0;
                    let even = 0;
                    let total = 0;

                    if(credit.value){
                        let cNum = credit.value.split("-").join("").split("");
                        let checkNum = cNum.pop();
                        let reverseNum = cNum.reverse();

                        reverseNum.forEach((num,i) => {
                            let trueNum = reverseNum[i] * 2;
                            //16碼
                            if(reverseNum.length == 15){
                                if((i+1) % 2 == 1){
                                    trueNum >= 10 ? trueNum -= 9 : trueNum;
                                    odd += trueNum;
                                    // console.log(odd);
                                }else{
                                    even += parseInt(num);
                                }
                            //15碼
                            }else if(reverseNum.length == 14){
                                if(i % 2 == 1){
                                    odd += parseInt(num);
                                }else{
                                    trueNum >= 10 ? trueNum -= 9 : trueNum;
                                    even += trueNum;
                                }
                            }
                            total = odd + even ;
                        })
                        let final = total % 10;
                        if(10 - final != checkNum){
                            alert("信用卡卡號錯誤")
                            e.preventDefault();
                            return;
                        }
                    }else{
                        alert("請輸入信用卡卡號")
                        e.preventDefault();
                        return;
                    }

                    //showModal
                    const modal = document.querySelector(".modal");
                    modal.style.opacity= 1;
                    modal.style.visibility = "inherit";
                },
                insertData(){
                    const firstName = document.querySelector("#ofName").value
                    const lastName =  document.querySelector("#olName").value
                    const mobile = document.querySelector("#omobile").value
                    const email = document.querySelector("#oemail").value
                    const address = document.querySelector("#address").value
                    const credit = document.querySelector(".credit").value
                    const check = document.querySelector("#check").value
                    let cNum = credit.split("-").join("")

                    let url = "./php/shopOrder.php";
                    let data = {
                        mem_no: "1010006",
                        total_price: this.totalPrice,
                        order_status: '1',
                        orderer: lastName+firstName,
                        address: address,
                        tel: mobile,
                        car_no: cNum,
                        car_insp: check,
                        order_total: this.totalPoints,
                        order_date: new Date().toISOString().slice(0, 19).replace('T', ' '),
                        detail: this.products,
                    };
                    fetch(url,{
                        method: "post",
                        body: JSON.stringify(data),
                        headers: new Headers({
                                    'Content-Type': 'application/json'
                                })
                        }).then(res => res.text())
                        .catch(error => console.log(error))
                        .then(body => console.log(body))
                },
                checkSubmit(){
                    this.checkInput();
                    this.insertData();
                }
            }
        })

        fetch("./php/getProduct.php").then(res => res.json())
                                     .then(data => {
                                         let arr = [];
                                         let qty = [];
                                         for(let i=0 ; i<data.length ; i++){
                                            <?php
                                                if(isset($_SESSION["cart"])){
                                                    foreach($_SESSION["cart"] as $key => $v1) {?>
                                                            if(i == <?php echo $v1['product_id'] ?>){
                                                                data[i-1].qty = <?=$arr[$key]?>;
                                                                arr.push(data[i-1])
                                                            }
                                                            <?php
                                                        };
                                                    }?>
                                                }
                                            arr.forEach(prod => {
                                                prod.png = prod["prod_pic"].split("==")[0];
                                            })
                                            vm.products = arr;
                                            console.log(arr);
                                        });
    </script>
    <script src="./js/background.js"></script>
    <script src="./js/gotop.js"></script>

</body>
</html>