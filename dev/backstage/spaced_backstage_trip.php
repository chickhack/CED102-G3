<?php 
require_once("../php/connect_ced102_g3_local.php");

try {
	$sql = "select * from spot";
	$spot = $pdo->query($sql);  //執行指令
} catch (PDOException $e) {
	// echo "系統忙碌, 請通知系統維護人員~";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	echo "錯誤行號 : ", $e->getLine(), "<br>";	
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台景點管理</title>
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
                <a href="spaced_backstage_trip.php" class="div-list-btn-s now">景點管理</a>
                <a href="spaced_backstage_trip_reviews.php" class="div-list-btn-s">景點評價</a>
                <a href="spaced_backstage_order.php" class="div-list-btn-s ">行程訂單管理</a>
            </div>
            <button class="div-list-btn-a">商城</button>
            <div>
                <a href="backstage_shop.php" class="div-list-btn-s">商品管理</a>
                <a href="#" class="div-list-btn-s">商品評價</a>
                <a href="backstage_shop_order.php" class="div-list-btn-s">商品訂單管理</a>
            </div>
            <!-- <a href="#" class="div-list-btn-a">百科管理</a> -->
            <button class="div-list-btn-a">互動牆</button>
            <div>
                <a href="#" class="div-list-btn-s">互動牆管理</a>
                <!-- <a href="#" class="div-list-btn-s">互動牆檢舉管理</a> -->
            </div>
            <a href="#" class="div-list-btn-a">會員管理</a>
            <a href="#" class="div-list-btn-a">管理員管理</a>
        </div>

        <div class="div-right">

            <div class="title">
                <div class=" div-right-span padding_top_3 margin_left_2">
                    <button type="button" class="btn-updata" onclick="open11()">＋新增</button>
                    <div class="span-1 margin_left_3">
                        <label for="search1">

                            <img src="../img/icon/loupe.png" alt="" class="">
                        </label>
                        <input type="search" class="search1" id="search1" placeholder="輸入景點編號、名稱">
                    </div>
                </div>

                <div class="data_name h3 div-right-span padding_top_3 line_low">
                    <p class="wi-5 text-1">編號</p>
                    <p class="wi-10 text-1">名稱</p>
                    <p class="wi-5 text-1">等級</p>
                    <p class="wi-15 text-1">介紹</p>
                    <p class="wi-15 text-1">說明</p>
                    <p class="wi-15 text-1">注意事項</p>
                    <p class="wi-5 text-1">價格</p>
                    <p class="wi-5 text-1">積分</p>
                    <p class="wi-5 text-1">上架</p>
                    <p class="wi-5 text-1">精選</p>
                    <!-- <p class="wi-15 text-1">圖片</p> -->
                    <p class="wi-5 text-1"></p>
                    <p class="wi-5 text-1"></p>

                </div>
            </div>

            <main class="main">
                <?php		
while($spotRow = $spot->fetch(PDO::FETCH_ASSOC)){ 
?>
                <div class="div-right-span-for line_low margin_top_2">
                    <p class="wi-5 text-1"><?=$spotRow["spot_no"]?></p>
                    <p class="wi-10 text-1"><?=$spotRow["spot_name"]?></p>
                    <p class="wi-5 text-1"><?=$spotRow["spot_lv"]?></p>
                    <p class="wi-15 text-1 toomuch"><?=$spotRow["spot_info"]?></p>
                    <p class="wi-15 text-1  toomuch"><?=$spotRow["spot_intro"]?></p>
                    <p class="wi-15 text-1  toomuch"><?=$spotRow["spot_dnt"]?></p>
                    <p class="wi-5 text-1"><?=$spotRow["spot_price"]?></p>
                    <p class="wi-5 text-1"><?=$spotRow["miles"]?></p>
                    <p class="wi-5 text-1"><?=$spotRow["spot_status"]?></p>
                    <p class="wi-5 text-1"><?=$spotRow["spot_s_status"]?></p>
                    <!-- <p class="wi-15 text-1 toomuch"><?=$spotRow["spot_pic"]?><br><?=$spotRow["spot_pic1"]?><br><?=$spotRow["spot_pic2"]?><br><?=$spotRow["spot_pic3"]?><br><?=$spotRow["spot_pic2"]?><br><?=$spotRow["spot_pic3"]?><br><?=$spotRow["spot_pic2"]?><br><?=$spotRow["spot_pic4"]?><br><?=$spotRow["spot_pic2"]?><br><?=$spotRow["spot_pics"]?></p> -->
                    <a href="../php/backstage/trip/edit_backstage_trip.php?spot_no=<?=$spotRow["spot_no"]?>" class="wi-5 text-1"><button type="button" class="btn btn-info btn-sm">修改</button></a>
                    <a href="../php/backstage/trip/delete_backstage_trip.php?spot_no=<?=$spotRow["spot_no"]?>"class="wi-5 text-1"><button type="button" class="btn btn-danger btn-sm">刪除</button></a>
                </div>

                <?php 
}
?>

                <div id="linebox">
                    <div class="upbox">
                        <form action="../php/backstage/trip/create_backstage_trip.php" method="POST" enctype="multipart/form-data">

                            <input type="number" placeholder="景點編號" name="spot_no" disabled>
                            <input type="text" placeholder="景點名稱" name="spot_name">
                            <input type="file" name="spot_pic">
                            <input type="text" placeholder="等級(初階/高階)" name="spot_lv">
                            <input type="text" placeholder="景點內容" name="spot_info">
                            <input type="text" placeholder="景點說明" name="spot_intro">
                            <input type="text" placeholder="注意事項" name="spot_dnt">
                            <input type="number" placeholder="景點狀態" name="spot_status" min="0" max="1">
                            <input type="number" placeholder="精選景點狀態" name="spot_s_status" min="0" max="1">
                            <input type="number" placeholder="輸入價格" name="spot_price">
                            <input type="number" placeholder="輸入積分" name="miles">
                            <input type="submit">
                        </form>
                        <a href="#" class="clo" onclick="close11()">X</a>
                    </div>
                </div>



            </main>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script>
    var linebox = document.getElementById("linebox");

    function open11() {
        // alert(1);
        document.getElementById("linebox").style.display = 'block';

    }

    function close11() {
        // alert(1);
        document.getElementById("linebox").style.display = 'none';

    }
    </script>
</body>

</html>