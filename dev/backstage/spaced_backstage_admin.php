<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理員管理</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/pages/backstage_customer.css">
    <link rel="shortcut icon" href="../img/icon/shortcut.png" type="image/x-icon">


</head>

<body>
    <div class="top w-100 header">
        <!-- <p class="h1 padding_left_4 "></p> -->
        <img src="../img/logo.png" class="imgs padding_left_4 padding_top_1" alt="">
        <p class="text-top padding_left_4 ">Backstage</p>
    </div>

    <div id="app1" class="div-menu">
        <div class="div-list">
            <button class="div-list-btn-a">景點</button>
            <div>
                <a href="./spaced_backstage_trip.php" class="div-list-btn-s now">景點管理</a>
                <a href="./spaced_backstage_trip_review.php" class="div-list-btn-s">景點評價</a>
                <a href="./spaced_backstage_order.php" class="div-list-btn-s">行程訂單管理</a>
            </div>
            <button class="div-list-btn-a">商城</button>
            <div>
                <a href="./backstage_shop.php" class="div-list-btn-s">商品管理</a>
                <a href="./backstage_shop_cmt.php" class="div-list-btn-s">商品評價</a>
                <a href="./backstage_shop_order.php" class="div-list-btn-s">商品訂單管理</a>
            </div>
            <!-- <a href="#" class="div-list-btn-a">百科管理</a> -->
            <button class="div-list-btn-a">互動牆</button>
            <div>
                <a href="./spaced_backstage_post_cmt.php" class="div-list-btn-s">互動牆管理</a>
                <a href="#" class="div-list-btn-s">互動牆檢舉管理</a>
            </div>
            <a href="./spaced_backstage_customer.php" class="div-list-btn-a">會員管理</a>
            <a href="./spaced_backstage_admin.php" class="div-list-btn-a now">管理員管理</a>
        </div>

        <div class="div-right">

            <div class="title">
                <div class=" div-right-span padding_top_3 margin_left_3">
                    <!-- <button type="button" class="btn-updata" onclick="open11()">＋新增</button> -->
                    <div class="span-1 margin_left_3">
                        <label for="search1">

                            <img src="../img/icon/loupe.png" alt="" class="">
                        </label>
                        <input type="search" class="search1" id="search1" placeholder="輸入管理員編號、名稱">
                    </div>
                </div>

                <div class="data_name h3 div-right-span padding_top_3 line_low">
                    <p class="wi-15 text-1">管理員編號</p>
                    <p class="wi-15 text-1">名稱</p>
                    <p class="wi-15 text-1">帳號</p>
                    <p class="wi-15 text-1">密碼</p>
                    <p class="wi-10 text-1">狀態</p>


                </div>
            </div>

            <main class="main">

                <div class="div-right-span-for line_low" v-for="(item,index) in admin">
                    <p class="wi-15 text-1">{{item.admin_no}}</p>
                    <p class="wi-15 text-1">{{item.admin_name}}</p>
                    <p class="wi-15 text-1">{{item.admin_account}}</p>
                    <p class="wi-15 text-1">{{item.admin_psw}}</p>
                    <p class='wi-10 text-1' v-if="item.admin_mem_stats == 1"><a name='update' type='button' class='btn btn-primary btn-sm'>正常</a></p>
                    <p class='wi-10 text-1' v-else><a name='update' type='button' class='btn btn-danger btn-sm'>停權</a></p>
                </div>

            </main>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
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


        var app1 = new Vue({
            el: "#app1",
            data: {
                admin: [{
                    admin_no: 200001,
                    admin_name: 'chickhack',
                    admin_account: 'chickhack',
                    admin_psw: 'chickhack1234',
                    admin_mem_stats: 1,
                }, {
                    admin_no: 200002,
                    admin_name: 'kkaic',
                    admin_account: 'SPACkkaicED',
                    admin_psw: 'kkaic1234',
                    admin_mem_stats: 1,
                }, {
                    admin_no: 200003,
                    admin_name: 'Min',
                    admin_account: 'Min',
                    admin_psw: 'Min1234',
                    admin_mem_stats: 1,
                }, {
                    admin_no: 200004,
                    admin_name: 'PoYun',
                    admin_account: 'PoYun',
                    admin_psw: 'PoYun1234',
                    admin_mem_stats: 1,
                }, {
                    admin_no: 200005,
                    admin_name: 'denis',
                    admin_account: 'denis',
                    admin_psw: 'denis1234',
                    admin_mem_stats: 0,
                }, {
                    admin_no: 200006,
                    admin_name: 'luisa',
                    admin_account: 'luisa',
                    admin_psw: 'luisa1234',
                    admin_mem_stats: 0,
                }],
            },
            methods: {
                statusOn() {
                    this.status = !this.status;
                },
                statusOff() {

                }
            },
        });
    </script>

</body>

</html>