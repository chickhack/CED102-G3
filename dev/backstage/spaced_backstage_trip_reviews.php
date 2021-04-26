<?php 
require_once("../php/connect_ced102_g3_local.php");
$sql = "select * from spot_trev";
$spottrev = $pdo->query($sql);  //執行指令
$spottrev ->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台景點評價管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/pages/spaced_backstage.css">
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">

</head>

<body>
    <div class="top w-100 header">
        <!-- <p class="h1 padding_left_4 "></p> -->
        <img src="../img/logo.png" class="imgs padding_left_4 padding_top_1" alt="">
        <p class="text-top padding_left_4 ">Backstage</p>
    </div>
    <div class="div-menu">
    <div class="div-list">
            <button class="div-list-btn-a">景點</button>
            <div>
                <a href="spaced_backstage_trip.php" class="div-list-btn-s">景點管理</a>
                <a href="spaced_backstage_trip_reviews.php" class="div-list-btn-s now">景點評價</a>
                <a href="spaced_backstage_order.php" class="div-list-btn-s">行程訂單管理</a>
            </div>
            <button class="div-list-btn-a">商城</button>
            <div>
                <a href="backstage_shop.php" class="div-list-btn-s">商品管理</a>
                <a href="./backstage_shop_cmt.php" class="div-list-btn-s">商品評價</a>
                <a href="backstage_shop_order.php" class="div-list-btn-s">商品訂單管理</a>
            </div>
            <!-- <a href="#" class="div-list-btn-a">百科管理</a> -->
            <button class="div-list-btn-a">互動牆</button>
            <div>
                <a href="./spaced_backstage_post.php" class="div-list-btn-s">互動牆管理</a>
                <!-- <a href="#" class="div-list-btn-s">互動牆檢舉管理</a> -->
            </div>
            <a href="./spaced_backstage_customer.php" class="div-list-btn-a">會員管理</a>
            <a href="./spaced_backstage_admin.php" class="div-list-btn-a">管理員管理</a>
        </div>

        <div class="div-right">

            <div class="title">
                <div class=" div-right-span padding_top_3 margin_left_3">
                    <!-- <button type="button" class="btn-updata" onclick="open11()">＋新增</button> -->
                    <div class="span-1 margin_left_1">
                        <label for="search1">

                            <img src="../img/icon/loupe.png" alt="" class="">
                        </label>
                        <input type="search" class="search1" id="search1" placeholder="輸入景點編號、評價編號、內容">
                    </div>
                </div>

                <div class="data_name h3 div-right-span padding_top_3 line_low">
                    <p class="wi-10 text-1">評價編號</p>
                    <p class="wi-10 text-1">會員編號</p>
                    <p class="wi-10 text-1">景點編號</p>
                    <p class="wi-15 text-1">評價日期</p>
                    <p class="wi-15 text-1">評分</p>
                    <p class="wi-20 text-1">評價內容</p>
                    <p class="wi-15 text-1">狀態</p>

                </div>
            </div>

            <main class="main">
                <?php		
while($spottrevRow = $spottrev->fetch(PDO::FETCH_ASSOC)){ 
?>
                <form action="../php/backstage/trip/edit_backstage_trip_reviews.php" method="POST" enctype="multipart/form-data">
                    <div class="div-right-span-for line_low margin_top_3">
                        <p class="wi-10 text-1"><?=$spottrevRow["trev_no"]?></p>
                        <p class="wi-10 text-1"><?=$spottrevRow["mem_no"]?></p>
                        <p class="wi-10 text-1"><?=$spottrevRow["spot_no"]?></p>
                        <p class="wi-15 text-1"><?=$spottrevRow["trev_date"]?></p>
                        <p class="wi-15 text-1"><?=$spottrevRow["trev_score"]?></p>
                        <p class="wi-20 text-1"><?=$spottrevRow["trev"]?></p>
                        <p class="wi-5 text-1"> <?php
                        if($spottrevRow['trev_stats'] == 0){
                            echo "<p class='wi-5 text-1'><a href='../php/backstage/trip/edit_backstage_trip_reviews.php?trev_no=$spottrevRow[trev_no]&trev_stats=$spottrevRow[trev_stats]' name='update' type='button' class='btn btn-primary btn-sm'>顯示</a></p>";
                        }else{
                            echo "<p class='wi-5 text-1'><a href='../php/backstage/trip/edit_backstage_trip_reviews.php?trev_no=$spottrevRow[trev_no]&trev_stats=$spottrevRow[trev_stats]' name='update' type='button' class='btn btn-danger btn-sm'>隱藏</a></p>";
                            }
                    ?></p>
                       
                    </div>
             </form>
                    <?php 
}
?>
            </main>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>