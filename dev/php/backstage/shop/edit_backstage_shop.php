<?php 
$prod_no = $_GET["prod_no"];
$errMsg = "";

try{
    require_once("../../connect_ced102_g3_local.php");
    $sql = "select *from prod where prod_no = :prod_no";
    $prod = $pdo->prepare($sql);
    $prod->bindValue(":prod_no", $prod_no);
    $prod->execute();
    
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                <a href="../../../backstage/spaced_backstage_trip.php" class="div-list-btn-s now">景點管理</a>
                <a href="../../../backstage/spaced_backstage_trip_reviews.php" class="div-list-btn-s">景點評價</a>
                <a href="../../../backstage/spaced_backstage_order.php" class="div-list-btn-s">行程訂單管理</a>
            </div>
            <button class="div-list-btn-a">商城</button>
            <div>
                <a href="../../../backstage/backstage_shop.php" class="div-list-btn-s">商品管理</a>
                <a href="../../../backstage/backstage_shop_cmt.php" class="div-list-btn-s">商品評價</a>
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
        <?php 
if( $errMsg != ""){ //例外
  echo "<div><center>$errMsg</center></div>";
}elseif($prod->rowCount()==0){
      echo "<div><center>查無此景點資料</center></div>";
}else{
      $prodROW = $prod->fetchObject();
?>
        <div class="card mx-auto h-75 list-group-item list-group-item-light " style="width: 60%;">
            <div class="card-header">
                編輯商品內容
            </div>
            <ul class="list-group list-group-flush align-middle">
                <form action="edit_backstage_shopDB.php" method="post" enctype="multipart/form-data">
                    <li class="list-group-item">商品編號 <input type="text" placeholder="商品編號" name="prod_no" value="<?=$prodROW -> prod_no ?>"></li>
                    <li class="list-group-item">商品分類 <input type="number" placeholder="商品分類" name="cat_no" value="<?=$prodROW -> cat_no ?>"></li>
                    
                    <li class="list-group-item">商品名稱 <input type="text" placeholder="商品名稱" name="prod_name" value="<?=$prodROW -> prod_name ?>"></li>
                    <li class="list-group-item">圖片檔名 <input style="width:300px"type="text" name="prod_pic" value="<?=$prodROW -> prod_pic ?>"></li>
                    <li class="list-group-item">商品內容 <textarea style="width:800px;height:100px;" type="text" placeholder="商品內容" name="prod_info" ><?=$prodROW -> prod_info ?></textarea></li>
                    <li class="list-group-item">商品說明 <textarea style="width:800px;height:100px;" type="text" placeholder="商品說明" name="prod_intro" ><?=$prodROW -> prod_intro ?></textarea></li>
                    <li class="list-group-item">上架日期 <textarea  type="text" placeholder="注意事項" name="prod_ondate"><?=$prodROW -> prod_ondate ?></textarea></li>
                    <li class="list-group-item">下架日期 <textarea  type="text" placeholder="注意事項" name="prod_offdate"><?=$prodROW -> prod_offdate ?></textarea></li>
                    
                    <li class="list-group-item">商品狀態 <input type="number" placeholder="景點狀態" name="prod_status" min="0"
                            max="1" value="<?=$prodROW -> prod_status ?>"></li>
                    <li class="list-group-item">價格 <input type="number" placeholder="輸入價格" name="prod_price" value="<?=$prodROW -> prod_price ?>"></li>
                    <li class="list-group-item">積分 <input type="number" placeholder="輸入積分" name="prod_points" value="<?=$prodROW -> prod_points ?>"></li>
                    <li class="list-group-item "><input type="submit" name="update" class="btn btn-info btn-sm" value="確認修改"> &emsp;<a href="../../../backstage/backstage_shop.php" type="button" class="btn btn-dark btn-sm">取消修改</a>
</li>
                </form>
            </ul>
        </div>

        <?php 
}
?>
    </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</body>

</html>