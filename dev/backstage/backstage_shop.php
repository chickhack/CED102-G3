<?php
    try{
        require_once("../php/connect_ced102_g3_local.php");
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
    <title>商品管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/pages/spaced_backstage.css">
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
                <a href="./spaced_backstage_trip.php" class="div-list-btn-s ">景點管理</a>
                <a href="./spaced_backstage_trip_reviews.php" class="div-list-btn-s ">景點評價</a>
                <a href="./spaced_backstage_order.php" class="div-list-btn-s">行程訂單管理</a>
            </div>
            <button class="div-list-btn-a">商城</button>
            <div>
                <a href="./backstage_shop.php" class="div-list-btn-s now">商品管理</a>
                <a href="./backstage_shop_cmt.php" class="div-list-btn-s">商品評價</a>
                <a href="./backstage_shop_order.php" class="div-list-btn-s">商品訂單管理</a>
            </div>
            <!-- <a href="#" class="div-list-btn-a">百科管理</a> -->
            <button class="div-list-btn-a">互動牆</button>
            <div>
                <a href="./spaced_backstage_post.php" class="div-list-btn-s">互動牆管理</a>
                
            </div>
            <a href="#" class="div-list-btn-a">會員管理</a>
            <a href="#" class="div-list-btn-a">管理員管理</a>
        </div>

        <div class="div-right">

            <div class="title">
                <div class=" div-right-span padding_top_3 margin_left_3">
                    <button type="button" class="btn-updata" onclick="open11()">＋新增</button>
                    <div class="span-1 margin_left_1">
                        <label for="search1">

                            <img src="../img/icon/loupe.png" alt="" class="">
                        </label>
                        <input type="search" class="search1" id="search1" placeholder="輸入景點編號、評價編號、內容">
                    </div>
                </div>

                <div class="data_name h3 div-right-span padding_top_3 line_low">
                    <p class="wi-10 text-1">商品編號</p>
                    <p class="wi-5 text-1">裝備</p>
                    <p class="wi-10 text-1">商品名稱</p>
                    <p class="wi-10 text-1">價格</p>
                    <p class="wi-15 text-1">商品說明</p>
                    <p class="wi-15 text-1">商品介紹</p>
                    <p class="wi-10 text-1">上架日期</p>
                    <p class="wi-10 text-1">下架日期</p>
                    <p class="wi-10 text-1">積分</p>
                    <p class="wi-5 text-1">修改</p>
                    <p class="wi-5 text-1">狀態</p>



                </div>
            </div>

            <main class="main">
                    <?php while($prodRow = $product->fetch(PDO::FETCH_ASSOC)){?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="div-right-span-for line_low margin_top_3">
                                    <p class="wi-10 text-1"><?=$prodRow["prod_no"]?></p>
                                    
                                    <a href="./php/spot_order_datail.php?cat_no=<?=$prodRow["cat_no"]?>"
                                        class="wi-5 text-1"><?=$prodRow ["cat_no"]?></a> 
                                    <p class="wi-10 text-1"><?=$prodRow["prod_name"]?></p>
                                    <p class="wi-10 text-1"><?=$prodRow["prod_price"]?></p>
                                    <p class="wi-15 text-1 toomuch"><?=$prodRow["prod_info"]?></p>
                                    <p class="wi-15 text-1 toomuch"><?=$prodRow["prod_intro"]?></p>
                                    <p class="wi-10 text-1 toomuch"><?=$prodRow["prod_ondate"]?></p>
                                    <p class="wi-10 text-1 toomuch"><?=$prodRow["prod_offdate"]?></p>
                                    
                                    <!-- <p class="wi-10 text-1 toomuch"><?=$prodRow["prod_pic"]?></p> -->
                                    <p class="wi-10 text-1"><?=$prodRow["prod_points"]?></p>
                                    <a href="../php/backstage/shop/edit_backstage_shop.php?prod_no=<?=$prodRow["prod_no"]?>" class="wi-5 text-1"><button type="button" class="btn btn-info btn-sm">修改</button></a>
                                    <?php
                                            if($prodRow['prod_status'] == 0){
                                                echo "<p class='wi-5 text-1'><a href='../php/backstage/shop/edit_backstage_prod.php?prod_no=$prodRow[prod_no]&prod_status=$prodRow[prod_status]' name='update' type='button' class='btn btn-primary btn-sm'>上架</a></p>";
                                            }else{
                                                echo "<p class='wi-5 text-1'><a href='../php/backstage/shop/edit_backstage_prod.php?prod_no=$prodRow[prod_no]&prod_status=$prodRow[prod_status]' name='update' type='button' class='btn btn-danger btn-sm'>下架</a></p>";
                                            }
                                        ?>
                                

                                </div>
                        </form>
                    <?php }?>
                    <div id="linebox">
                    <div class="upbox">
                        <form action="../php/backstage/shop/shopupdate.php" method="POST" enctype="multipart/form-data">

                            <input type="number" placeholder="類型" name="cat_no">
                            <input type="text" placeholder="商品名稱" name="prod_name">
                            <input type="text" placeholder="商品價格" name="prod_price">
                            <input type="file" name="prod_pic1">
                            <input type="file" name="prod_pic2">
                            <input type="file" name="prod_pic3">
                            <input type="text" placeholder="商品說明" name="prod_info">
                            <input type="text" placeholder="商品內容" name="prod_intro">
                            <!-- <input type="text" placeholder="上架日期" name="prod_ondate"> -->
                            <!-- <input type="text" placeholder="注意事項" name="prod_offdate"> -->
                            <input type="number" placeholder="商品狀態" name="prod_status" min="0" max="1">
                            <input type="number" placeholder="商品積分" name="prod_points" min="0" max="1">
                            <input type="submit">
                        </form>
                        <a href="#" class="clo" onclick="close11()">X</a>
                    </div>
                </div>



            </main>
        </div>
    </div>
                
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
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








                            