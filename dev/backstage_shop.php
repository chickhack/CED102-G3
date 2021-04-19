<?php
    try{
        require_once("./php/connectBooks_Yun.php");
        $sql = "select * from prod";
        $product = $pdo->query($sql);  
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/pages/spaced_backstage.css">
    <link rel="stylesheet" href="./css/pages/backstage_shop.css">
</head>
<body>
    <div class="top w-100">
        <!-- <p class="h1 padding_left_4 "></p> -->
        <img src="./img/logo.png" class="imgs padding_left_4 padding_top_1" alt="">
        <p class="text-top padding_left_4 ">Backstage</p>
    </div>
    <div class="div-menu">
        <div class="div-list">
            <button class="div-list-btn">景點</button>
                <div>
                    <a href="#" class="div-list-btn-s">景點管理</a>
                    <a href="#" class="div-list-btn-s">景點評價</a>
                    <a href="#" class="div-list-btn-s">行程訂單管理</a> 
                </div>
            <button class="div-list-btn">商城</button>
                <div>
                    <a href="#" class="div-list-btn-s">商品管理</a>
                    <a href="#" class="div-list-btn-s">商品評價</a>
                    <a href="#" class="div-list-btn-s">商品訂單管理</a>
                </div>
            <a href="#" class="div-list-btn-a">百科管理</a>
            <button class="div-list-btn">互動牆</button>
                <div>
                    <a href="#" class="div-list-btn-s">互動牆管理</a>
                    <a href="#" class="div-list-btn-s">互動牆檢舉管理</a>
                </div>
            <a href="#" class="div-list-btn-a">會員管理</a>
            <a href="#" class="div-list-btn-a">管理員管理</a>
        </div>
        <div class="div-right">
                    <div class="div-right-span padding_top_3 margin_left_3">
                        <button class="btn-updata">＋新增</button>
                        <div class="span-1 margin_left_3">
                            <label for="search1">

                                <img src="./img/icon/loupe.png" alt="" class="">
                            </label>
                            <input type="search"  class="search1" id="search1" placeholder="輸入景點編號、名稱">
                        </div>
                    </div>  
                    <div class="div-right-span padding_top_3 margin_left_3">
                        <p class="wi-5 text-1">商品編號</p>
                        <p class="wi-10 text-1">商品類別</p>
                        <p class="wi-10 text-1">圖片</p>
                        <p class="wi-15 text-1">商品名稱</p>
                        <p class="wi-10 text-1">價格</p>
                        <p class="wi-20 text-1">商品描述</p>
                        <p class="wi-10 text-1">上架日期</p>
                        <p class="wi-10 text-1">下架日期</p>
                        <p class="wi-5 text-1">狀態</p>
                    </div>
                    <div id="next"></div>
                    <?php while($prodRow = $product->fetch(PDO::FETCH_ASSOC)){?>
                        <div class="div-right-span-for margin_top_3 margin_left_3 ">
                            <p class="wi-5 text-1"><?=$prodRow['prod_no']?></p>
                            <p class="wi-10 text-1">裝備</p>
                            <p class="wi-10 text-1"><label for="upimgs" class="upimgsr">上傳 <img src="./img/icon/upload.png" alt=""></label><input type="file" id="upimgs"></p>
                            <p class="wi-15 text-1"><?=$prodRow['prod_name']?></p>
                            <p class="wi-10 text-1"><input type="text" value=<?=$prodRow['prod_price']?> class="inputext"></p>
                            <p class="wi-20 text-1"><?=$prodRow['prod_info']?></p>
                            <p class="wi-10 text-1"><?=$prodRow['prod_ondate']?></p>
                            <p class="wi-10 text-1"><?=$prodRow['prod_offdate']?></p>
                            <?php
                                if($prodRow['prod_status'] == 0){
                                    echo "<p class='wi-5 text-1'><a href='./php/edit_backstage_prod.php?prod_no=$prodRow[prod_no]&prod_status=$prodRow[prod_status]' name='update' type='button' class='btn btn-primary btn-sm'>上架</a></p>";
                                }else{
                                    echo "<p class='wi-5 text-1'><a href='./php/edit_backstage_prod.php?prod_no=$prodRow[prod_no]&prod_status=$prodRow[prod_status]' name='update' type='button' class='btn btn-danger btn-sm'>下架</a></p>";
                                }
                            ?>
                        </div> 
                    <?php } ;?>       
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>