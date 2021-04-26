<?php 
$order_no = $_REQUEST["order_no"];
$errMsg='';
try {
	require_once("../../connect_ced102_g3_local.php");
	$sql = "select * from spot_order_datail where order_no=:order_no";
	$order = $pdo->prepare($sql);	//執行指令
	$order->bindValue(":order_no", $order_no);
  	$order->execute();
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
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/all.css">
	<link rel="stylesheet" href="../../../css/pages/spaced_backstage.css">

</head>
<body>
<div class="top w-100 header">
        <!-- <p class="h1 padding_left_4 "></p> -->
        <img src="../../../img/logo.png" class="imgs padding_left_4 padding_top_1" alt="">
        <p class="text-top padding_left_4 ">Backstage</p>
</div>
    <div class="div-menu">
        <div class="div-list">
            <button class="div-list-btn-a">景點</button>
            <div>
                <a href="../../../backstage/spaced_backstage_trip.php" class="div-list-btn-s ">景點管理</a>
                <a href="../../../backstage/spaced_backstage_trip_reviews.php" class="div-list-btn-s">景點評價</a>
                <a href="../../../backstage/spaced_backstage_order.php" class="div-list-btn-s now">行程訂單管理</a>
            </div>
            <button class="div-list-btn-a">商城</button>
            <div>
                <a href="../../../backstage/backstage_shop.php" class="div-list-btn-s">商品管理</a>
                <a href="../../..//backstage_shop_cmt.php" class="div-list-btn-s">商品評價</a>
                <a href="../../../backstage/backstage_shop_order.php" class="div-list-btn-s">商品訂單管理</a>
            </div>
            <!-- <a href="#" class="div-list-btn-a">百科管理</a> -->
            <button class="div-list-btn-a">互動牆</button>
            <div>
                <a href="../../../spaced_backstage_post.php" class="div-list-btn-s">互動牆管理</a>
                
            </div>
            <a href="../../../spaced_backstage_customer.php" class="div-list-btn-a">會員管理</a>
            <a href="../../../spaced_backstage_admin.php" class="div-list-btn-a">管理員管理</a>
        </div>

        <div class="div-right">

            <div class="title">
                <div class=" div-right-span padding_top_3 margin_left_2">
                    <button type="button" class="btn-updata" ><a href="../../../backstage/spaced_backstage_order.php" class="text-1">返回</a></button>
                    <div class="span-1 margin_left_3">
                        <label for="search1">

                            <img src="../../../img/icon/loupe.png" alt="" class="">
                        </label>
                        <input type="search" class="search1" id="search1" placeholder="輸入景點編號、名稱">
                    </div>
                </div>

                <div class="data_name h3 div-right-span padding_top_3 line_low">
                    <p class="wi-15 text-1">訂單編號</p>
                    <p class="wi-15 text-1">景點編號</p>
                    <p class="wi-20 text-1">景點名稱</p>
                    <p class="wi-20 text-1">景點圖片</p>
                    <p class="wi-10 text-1">單價</p>
                    <p class="wi-10 text-1">積分</p>
                    <p class="wi-10 text-1">人數</p>
                </div>
            </div>

            <main class="main">
                <?php	
                if( $errMsg != ""){ //例外
                echo "<div><center>$errMsg</center></div>";
                }elseif($order->rowCount()==0){
                echo "<div><center>查無此景點資料</center></div>";
                }else{
                // $orders = $order->fetchObject(); 
                while($orders = $order->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <div class="div-right-span-for line_low margin_top_2">
                        <p class="wi-15 text-1"><?=$orders ["order_no"]?></p>
                        <p class="wi-15 text-1 "><?=$orders ["spot_no"]?></p>
                        <p class="wi-20 text-1 "><?=$orders ["spot_name"]?></p>
                        <p class="wi-20 text-1 "><?=$orders ["spot_pic"]?></p>
                        <p class="wi-10 text-1"><?=$orders ["price"]?></p>
                        <p class="wi-10 text-1"><?=$orders ["integral"]?></p>
                        <p class="wi-10 text-1"><?=$orders ["people"]?></p>
                    </div>

                <?php 
                }
                }
                ?>
            </main>
        </div>
    </div>
  
</body>
</html>