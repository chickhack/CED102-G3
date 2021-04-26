<?php
$spot_no = $_GET["spot_no"];
$errMsg = "";

try {
    require_once("../../connect_ced102_g3_local.php");
    $sql = "select *from spot where spot_no = :spot_no";
    $spot = $pdo->prepare($sql);
    $spot->bindValue(":spot_no", $spot_no);
    $spot->execute();
} catch (PDOException $e) {
    $errMsg .= "錯誤原因 : " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號 : " . $e->getLine() . "<br>";
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                <a href="#" class="div-list-btn-s">商品評價</a>
                <a href="../../../backstage/backstage_shop_order.php" class="div-list-btn-s">商品訂單管理</a>
            </div>
            <!-- <a href="#" class="div-list-btn-a">百科管理</a> -->
            <button class="div-list-btn-a">互動牆</button>
            <div>
                <a href="#" class="div-list-btn-s">互動牆管理</a>
                <a href="#" class="div-list-btn-s">互動牆檢舉管理</a>
            </div>
            <a href="#" class="div-list-btn-a">會員管理</a>
            <a href="#" class="div-list-btn-a">管理員管理</a>
        </div>
        <?php
        if ($errMsg != "") { //例外
            echo "<div><center>$errMsg</center></div>";
        } elseif ($spot->rowCount() == 0) {
            echo "<div><center>查無此景點資料</center></div>";
        } else {
            $spotRow = $spot->fetchObject();
        ?>
            <div class="card mx-auto h-75 list-group-item list-group-item-light " style="width: 60%;">
                <div class="card-header">
                    編輯景點內容
                </div>
                <ul class="list-group list-group-flush align-middle">
                    <form action="edit_backstage_triptoDB.php" method="post" enctype="multipart/form-data">
                        <!-- <li class="list-group-item">景點編號 <input type="number" placeholder="景點編號" name="spot_no" value="<?php echo $spotRow->spot_no ?>" disabled></li> -->
                        <!-- <li class="list-group-item">景點名稱 <input type="text" placeholder="景點名稱" name="spot_no" value="<?= $spotRow->spot_no ?>"></li> -->
                        <li class="list-group-item">景點名稱 <input type="text" placeholder="景點名稱" name="spot_no" value="<?= $spotRow->spot_no ?>"></li>

                        <li class="list-group-item">景點名稱 <input type="text" placeholder="景點名稱" name="spot_name" value="<?= $spotRow->spot_name ?>"></li>
                        <li class="list-group-item">圖片檔名 <input style="width:300px" type="text" name="spot_pic" value="<?= $spotRow->spot_pic ?>"><br>
                            <input style="width:300px" type="text" name="spot_pic1" value="<?= $spotRow->spot_pic1 ?>"><br>
                            <input style="width:300px" type="text" name="spot_pic2" value="<?= $spotRow->spot_pic2 ?>"><br>
                            <input style="width:300px" type="text" name="spot_pic3" value="<?= $spotRow->spot_pic3 ?>"><br>
                            <input style="width:300px" type="text" name="spot_pic4" value="<?= $spotRow->spot_pic4 ?>"><br>
                            <input style="width:300px" type="text" name="spot_pics" value="<?= $spotRow->spot_pics ?>">
                        </li>
                        <li class="list-group-item">等級(初階/高階) <input type="text" placeholder="等級(初階/高階)" name="spot_lv" value="<?= $spotRow->spot_lv ?>"></li>
                        <li class="list-group-item">景點內容 <textarea style="width:800px;height:100px;" placeholder="景點內容" name="spot_info"><?= $spotRow->spot_info ?></textarea></li>
                        <li class="list-group-item">景點說明 <textarea style="width:800px;height:100px;" type="text" placeholder="景點說明" name="spot_intro"><?= $spotRow->spot_intro ?></textarea></li>
                        <li class="list-group-item">注意事項 <textarea style="width:800px;height:50px;" type="text" placeholder="注意事項" name="spot_dnt"><?= $spotRow->spot_dnt ?></textarea></li>
                        <li class="list-group-item">景點狀態 <input type="number" placeholder="景點狀態" name="spot_status" min="0" max="1" value="<?= $spotRow->spot_status ?>"></li>
                        <li class="list-group-item">精選景點狀態 <input type="number" placeholder="精選景點狀態" name="spot_s_status" min="0" max="1" value="<?= $spotRow->spot_s_status ?>"></li>
                        <li class="list-group-item">價格 <input type="number" placeholder="輸入價格" name="spot_price" value="<?= $spotRow->spot_price ?>"></li>
                        <li class="list-group-item">積分 <input type="number" placeholder="輸入積分" name="miles" value="<?= $spotRow->miles ?>"></li>
                        <li class="list-group-item "><input type="submit" name="update" class="btn btn-info btn-sm" value="確認修改"> &emsp;<a href="../../../backstage/spaced_backstage_trip.php" type="button" class="btn btn-dark btn-sm">取消修改</a>
                        </li>
                    </form>
                </ul>
            </div>

        <?php
        }
        ?>
    </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

</body>

</html>