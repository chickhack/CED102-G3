


<nav id="nav">
  <div class="logo">
    <h1><a href="home.php">SPACED</a></h1>
  </div>
  <ul class="nav-links">
    <li class="margin_left_5"><a href="alltrip.php">星球景點</a></li>
    <li class="margin_left_5"><a href="planet.php">星星世界</a></li>
    <li class="margin_left_5"><a href="shop.php">星球商城</a></li>
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
