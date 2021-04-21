<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <!--Bootstrap5 JavaScript Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <!--Bootstrap5 CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <!-- Vue.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.js"></script>
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
    integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
    integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
    crossorigin="anonymous" />
  <!-- 動態背景 -->
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

  <link rel="stylesheet" href="./css/all.css">
  <link rel="stylesheet" href="./css/pages/photowall.css">
  <link rel="stylesheet" href="./css/pages/shop.css">
  <link rel="stylesheet" href="./css/pages/alltrip.css">
  <link rel="stylesheet" href="./css/pages/account.css">

  <title>會員</title>

</head>

<style>

</style>

<body>
  <header>
    @@include('./layout/header.html')
  </header>
  <!-- 動態背景 -->
  <div id="particles-js">
    <script src="./js/background.js"></script>
  </div>
  <div class="planet_banner"></div>

  <div id="accountapp">

    <div class="">

      <div class="welcome">
        <div class="spacedinfo">
          <p class="account_hi">嗨，</p>
          <p class="account_logo">{{customer.mem_id}}!</p><br>
          <p class="account_numlogo">SPACED</p>
          <p class="account_acnum">會員編號：</p>
          <p class="account_num">{{customer.mem_no}}</p>
        </div>
        <img class="account_levimg" :src="customer.lv_img" alt="lev">
      </div>

      <div class="account_card">
        <div class="account_now">
          <div class="your_lev">
            <div class="container_card your_nowlev">
              <div class="row align-items-center">
                <div class="col col-md-auto lev_name">{{customer.mem_lv}}</div>
                <div class="col-md-auto"><img class="littleline" src="./img/icon/littleline.png" alt=""></div>
                <div class="col account_total">累積旅行
                  <span class="accnum">{{customer.mem_arr}} </span>顆星球、
                  <span class="accnum">{{customer.mem_sp}} </span>個景點
                </div>
                <div class="col col-md-auto account_money">目前持有
                  <span class="accmoney">{{customer.coin}}</span>宇宙幣
                </div>
              </div>
            </div>
          </div>

          <div class="lev_acc">
            <little><span>12個月內累積</span></little>
          </div>
          <div class="container_">
            <div class="your_acc">
              <div class="now_lev align-items-center">
                <img class="nowlev" :src="customer.lv_img" alt="lev"><br>
                <p class="nowacc">{{customer.miles}} 積分</p>
              </div>
              <div class="next_rocket"><img class="account_rocket" src="./img/icon/rocket4.png" alt="rocket"></div>
              <div class="next_lev align-items-center">
                <img class="nextlev" :src="customer.mem_next_img" alt="lev"><br>
                <p class="nextacc">目前尚需 {{ minus_lev() }} 積分</p>
                <p class="nextacc">才能升級至{{customer.em_next_lv}}</p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="account_tabs">

      <ul class="nav nav-tabs nav-justified account_nav">
        <li class="nav-item"><a class="nav-link" href="#" :class="{'active': link=='a'}"
            @click.prevent=" link='a'">會員資料</a></li>
        <li class="nav-item"><a class="nav-link" href="#" :class="{'active': link=='b'}"
            @click.prevent=" link='b'">行程管理</a></li>
        <li class="nav-item"><a class="nav-link" href="#" :class="{'active': link=='c'}"
            @click.prevent=" link='c'">互動牆管理</a></li>
        <li class="nav-item"><a class="nav-link" href="#" :class="{'active': link=='d'}"
            @click.prevent=" link='d'">商城訂單</a></li>
        <li class="nav-item"><a class="nav-link" href="#" :class="{'active': link=='e'}"
            @click.prevent=" link='e'">收藏管理</a></li>
        <li class="nav-item"><a class="nav-link" href="#" :class="{'active': link=='f'}"
            @click.prevent=" link='f'">轉換積分</a></li>
      </ul>

      <hr class="account_line">

      <div class="content">

        <!-- 會員資料 -->
        <div v-if="link ==='a'">

          <div id="" v-for="" class="row info_form">

            <div class="col-md-auto align-self-start info_img">
              <div class="circle-image">
                <img class="infoimg " ref="mem_pic" :src="customer.mem_pic">
              </div>
              <label @click="isChange = !isChange" v-if="!isChange">
                <input @click="isChange = !isChange" v-if="!isChange" type="file" @change="fileChange"
                  class="hideinput">
                <i class="btn img_input">上傳圖片</i>
              </label>
              <button @click="saveImage" v-else-if="isChange" type="file"
                class="btn btn-primary img_input">儲存編輯</button></br>
              <button v-if="isChange" @click="isChange = false" type="file"
                class="btn btn-primary img_input">取消編輯</button>
            </div>

            <div class="col-md-auto align-self-center info_left center">
              <div class="form-group">
                <label for="exampleInputEmail1">暱稱</label>
                  <input type="text" class="form focus" ref="mem_id" :value="customer.mem_id" :disabled="!isEditing"
                    :class="{view: !isEditing}">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">姓名</label>
                <input type="text" class="unform" id="" :value="customer.first_Name" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">性別</label>
                <input type="text" class="unform" id="" :value="customer.gender" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">手機</label>
                <div class="edit_text"><input type="text" class="form focus" ref="phone" :value="customer.phone"
                    :disabled="!isEditing" :class="{view: !isEditing}"></div>
              </div>
            </div>
            <div class="col-md-auto align-self-end info_right center">
              <div class="form-group">
                <label for="exampleInputPassword1">姓氏</label>
                <input type="text" class="unform" id="" :value="customer.last_Name" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">生日</label>
                <input type="text" class="unform" id="" :value="customer.bday" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">地址</label>
                <div class="edit_text"><input type="text" class="form focus" ref="address" :value="customer.address"
                    :disabled="!isEditing" :class="{view: !isEditing}"></div>
              </div>
            </div>

            <div class="col-md-auto align-self-start info_edit">
              <button @click="edit" v-if="!isEditing" type="button" class="btn btn-primary info_editbtn">編輯個人資料</button>
              <button @click="save" v-else-if="isEditing" type="button" class="btn btn-primary info_editbtn">儲存編輯</button></br>
              <button v-if="isEditing" @click="edit" type="button" class="btn btn-primary info_editbtn">取消編輯</button>
            </div>

          </div>
        </div>

        <!-- 行程管理 -->
        <div v-else-if="link ==='b'">

          <div class="heart_btns margin_top_3">
            <button @click="visibility=3" :class="{'active': visibility == 3}" class="btn heartbtns p"
              type="button">全部</button>
            <button @click="visibility=0" :class="{'active': visibility == 0}" class="btn heartbtns p"
              type="button">待出發</button>
            <button @click="visibility=1" :class="{'active': visibility == 1}" class="btn heartbtns p"
              type="button">已結束</button>
            <!-- <button @click="clickMe" class="btn heartbtns p" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  全部
                </button>
                <div class="dropdown_menu p">
                  <a class="dropdown_item p" href="#">全部</a>
                  <a class="dropdown_item p" href="#">待出發</a>
                  <a class="dropdown_item p" href="#">已結束</a>
                </div> -->
          </div>

          <div class="tripcontent margin_top_3">

            <div v-for="(item,index) in travelstatus" class="table margin_top_5">

              <caption>
                <span class="">訂單編號： {{item.order_no}} </span>
              </caption>
              <table class="margin_top_1">
                <thead class="table_title">
                  <tr>
                    <th scope="col">出發日期</th>
                    <th scope="col">總金額</th>
                    <th scope="col">總積分</th>
                    <th scope="col">下單日期</th>
                    <th scope="col">訂單狀態</th>
                    <th scope="col">嚮導</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{item.dep_date}}</td>
                    <td>NT.{{item.total_price}}</td>
                    <td>{{item.miles}}</td>
                    <td>{{item.order_date}}</td>
                    <td v-if="item.order_status==0">待出發</td>
                    <td v-else="item.order_status==1">已出發</td>
                    <!-- <td>{{item.order_status}}</td> -->
                    <td>{{item.guide}}</td>
                  </tr>
                </tbody>
              </table>

              <div @click="toggleContent(index)" class="orderdetail margin_top_1">
                <img class="order_icon" src="./img/icon/drop-down-arrow.png">
                <span class="">訂單明細</span>
              </div>

              <div class="toBeToggled detail-open margin_top_1">
                <table>
                  <thead>
                    <tr>
                      <th scope="col">景點編號</th>
                      <th scope="col">景點名稱</th>
                      <th scope="col">單價</th>
                      <th scope="col">積分</th>
                      <th scope="col">人數</th>
                    </tr>
                  </thead>
                  <tbody v-for="item1 in spot_order_detail" v-if="item.order_no==item1.order_no">
                    <div v-for=>
                    <tr>
                      <td>{{item1.spot_no}}</td>
                      <td>{{item1.spot_name}}</td>
                      <td>{{item1.price}}</td>
                      <td>{{item1.integral}}</td>
                      <td>{{item1.people}}</td>
                    </tr>
                    </div>
                  </tbody>
                </table>
                <div class="margin_top_1">
                  <span class="num">收件人姓名：{{item.order_name}}</span></br>
                  <span class="num">收件人電話：{{item.order_ph}}</span></br>
                  <span class="num">收件人信箱：{{item.order_email}}</span>
                </div>
              </div>

            </div>

          </div>

        </div>

        <!-- 互動牆管理 -->
        <div v-else-if="link ==='c'">
          <div class="post_tab row justify-content-start container_heart heartnav">
            <div class="post_btns">
              <button class="col btn postbtns margin_top_3"><a href="./post.html">發文</a></button>
            </div>

            <div class="postcontent">
              <div class="grid">
                <div data-aos="fade-up" data-aos-duration="1000" class=" col-md-3 grid-item">
                  <div class="img1" @mouseover="mouseMe"><img src="./img/photowall/samll/moon/moon_b1_ps.jpg" alt=""
                      class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                      <div class="name">吳美女</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1200" class="col-md-3 grid-item">
                  <div class="img1"><img src="./img/photowall/samll/moon/moon_c1.jpg" alt="" class="lazy"></div>
                  <div class="action-box img2">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                      <div class="name">劉德華</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1400" class="col-md-3 grid-item" id="destination_3">
                  <div class="img1"><img src="./img/photowall/samll/mars/mars_a2.jpg" alt="" class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                      <div class="name">王美美</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1600" class="col-md-3 grid-item">
                  <div class="img1"><img src="./img/photowall/samll/jupiter/jupiter_a1.jpg" alt="" class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                      <div class="name">王美美</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class=" col-md-3 grid-item">
                  <div class="img1" @mouseover="mouseMe"><img src="./img/photowall/samll/moon/moon_b1_ps.jpg" alt=""
                      class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                      <div class="name">吳美女</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1200" class="col-md-3 grid-item">
                  <div class="img1"><img src="./img/photowall/samll/moon/moon_c1.jpg" alt="" class="lazy"></div>
                  <div class="action-box img2">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                      <div class="name">劉德華</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1400" class="col-md-3 grid-item" id="destination_3">
                  <div class="img1"><img src="./img/photowall/samll/mars/mars_a2.jpg" alt="" class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                      <div class="name">王美美</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1600" class="col-md-3 grid-item">
                  <div class="img1"><img src="./img/photowall/samll/jupiter/jupiter_a1.jpg" alt="" class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                      <div class="name">王美美</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1600" class="col-md-3 grid-item">
                  <div class="img1"><img src="./img/photowall/samll/jupiter/jupiter_a1.jpg" alt="" class="lazy"></div>
                  <div class="action-box">
                    <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                    <div class="share"><img src="./img/icon/share.png" alt=""></div>
                    <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                    <button class="button"><img src="./img/icon/more.png" alt=""></button>
                  </div>
                  <div class="article_all">
                    <div class="article">
                      <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                      <div class="name">王美美</div>
                      <div class="post_time">2021.02.20</div>
                    </div>
                    <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- 商品訂單管理 -->
        <div v-else-if="link ==='d'">

          <div class="heart_btns">
            <input value="<?php echo date("Y-m-d");?>"  type="date" id="date-1" class="btn orderbtns margin_top_3 btn-date data-down">
          </div>

          <div class="ordercontent margin_top_3">

            <div v-for="(item,index) in prod_order" class="table margin_top_5">

              <caption>
                <span class="">訂單編號： {{item.ord_no}} </span>
              </caption>
              <table class="margin_top_1">
                <thead class="table_title">
                  <tr>
                    <th scope="col">總金額</th>
                    <th scope="col">總積分</th>
                    <th scope="col">下單日期</th>
                    <th scope="col">訂單狀態</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>NT.{{item.total_price}}</td>
                    <td>{{item.order_total}}</td>
                    <td>{{item.order_date}}</td>
                    <td>{{item.order_status}}</td>
                  </tr>
                </tbody>
              </table>

              <div @click="toggleContent(index)" class="orderdetail margin_top_1">
                <img class="order_icon" src="./img/icon/drop-down-arrow.png">
                <span class="">訂單明細</span>
              </div>

              <div class="toBeToggled detail-open margin_top_1">
                <table>
                  <thead>
                    <tr>
                      <th scope="col">商品編號</th>
                      <th scope="col">商品名稱</th>
                      <th scope="col">單價</th>
                      <th scope="col">積分</th>
                      <th scope="col">數量</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in prod_order_detail">
                    <tr>
                      <td>{{item.prod_no}}</td>
                      <td>{{item.prod_name}}</td>
                      <td>{{item.price}}</td>
                      <td>{{item.prod_point}}</td>
                      <td>{{item.qty}}</td>
                    </tr>
                  </tbody>
                </table>
                <div class="margin_top_1">
                  <span class="num">收件人姓名：{{item.orderer}}</span></br>
                  <span class="num">收件人電話：{{item.tel}}</span></br>
                  <span class="num">收件人信箱：{{item.address}}</span>
                </div>
              </div>

            </div>

          </div>


        </div>

        <!-- 收藏管理 -->
        <div v-else-if="link ==='e'">
          <div class="heart_tab row justify-content-start container_heart heartnav margin_top_3" id="accountapp">

            <div class="heart_btns">

              <button class="col btn heartbtns" @click="acitve(1)" :class="{active: step===1}">行程</button>
              <button class="col btn heartbtns" @click="acitve(2)" :class="{active: step===2}">商品</button>
              <button class="col btn heartbtns" @click="acitve(3)" :class="{active: step===3}">貼文</button>

            </div>

            <div v-if="step === 1 || active.includes(1)" v-show="step===1">

              <div class=" heart_tripcard second margin_top_4 ">
                <div class=" heart_trip tripcard_all  ">
                  <div v-for="item in spot1" class="tripcard">
                    <a href="trip.html">
                      <img :src="item.spot" class="spot_pic" alt="spot_pic">
                      <div class="content line_low">
                        <h4 class="hot2 margin_top_1">{{item.title}}</h4>
                        <small class="tag">{{item.grade}}</small>
                        <small class="tag">{{item.scores}}積分</small>
                        <h3 class="price2 margin_top_2">${{item.price}}</h3>
                        <div class="addin2 small margin_top_2"><img class="plus" src="./img/icon/plus.png" alt="">加入我的行程
                        </div>
                        <div class="trip_bookmark"></div>
                        <!-- <img class="trip_bookmark" src="./img/icon/bookmark-outline.png" alt=""> -->
                      </div>
                    </a>
                  </div>
                </div>
              </div>

            </div>

            <div v-if="step === 2 || active.includes(2)" v-show="step===2">
              <div class="main">
                <div class="product_card productAll ">
                  <ul>
                    <li v-for="item in products" class="margin_top_4">
                      <a class="product_heart" href="product.html">
                        <img :src="item.img" alt="" class="margin_top_2">
                        <div class="item">
                          <div class="info">
                            <p>{{item.name}}</p>
                            <p class="margin_top_1 price"> ${{item.price}}</p>
                          </div>
                          <img :src="item.cart" class="icon">
                        </div>
                        <div class="action-box">
                          <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div v-if="step === 3 || active.includes(3)" v-show="step===3">
              <div class="post_card">
                <div class="grid">
                  <div data-aos="fade-up" data-aos-duration="1000" class=" col-md-3 grid-item">
                    <div class="img1" @mouseover="mouseMe"><img src="./img/photowall/samll/moon/moon_b1_ps.jpg" alt=""
                        class="lazy"></div>
                    <div class="action-box">
                      <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                      <div class="share"><img src="./img/icon/share.png" alt=""></div>
                      <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                      <button class="button"><img src="./img/icon/more.png" alt=""></button>
                    </div>
                    <div class="article_all">
                      <div class="article">
                        <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                        <div class="name">吳美女</div>
                        <div class="post_time">2021.02.20</div>
                      </div>
                      <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                    </div>
                  </div>
                  <div data-aos="fade-up" data-aos-duration="1200" class="col-md-3 grid-item">
                    <div class="img1"><img src="./img/photowall/samll/moon/moon_c1.jpg" alt="" class="lazy"></div>
                    <div class="action-box img2">
                      <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                      <div class="share"><img src="./img/icon/share.png" alt=""></div>
                      <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                      <button class="button"><img src="./img/icon/more.png" alt=""></button>
                    </div>
                    <div class="article_all">
                      <div class="article">
                        <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                        <div class="name">劉德華</div>
                        <div class="post_time">2021.02.20</div>
                      </div>
                      <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                    </div>
                  </div>
                  <div data-aos="fade-up" data-aos-duration="1400" class="col-md-3 grid-item" id="destination_3">
                    <div class="img1"><img src="./img/photowall/samll/mars/mars_a2.jpg" alt="" class="lazy"></div>
                    <div class="action-box">
                      <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                      <div class="share"><img src="./img/icon/share.png" alt=""></div>
                      <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                      <button class="button"><img src="./img/icon/more.png" alt=""></button>
                    </div>
                    <div class="article_all">
                      <div class="article">
                        <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                        <div class="name">王美美</div>
                        <div class="post_time">2021.02.20</div>
                      </div>
                      <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                    </div>
                  </div>
                  <div data-aos="fade-up" data-aos-duration="1600" class="col-md-3 grid-item">
                    <div class="img1"><img src="./img/photowall/samll/jupiter/jupiter_a1.jpg" alt="" class="lazy"></div>
                    <div class="action-box">
                      <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                      <div class="share"><img src="./img/icon/share.png" alt=""></div>
                      <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                      <button class="button"><img src="./img/icon/more.png" alt=""></button>
                    </div>
                    <div class="article_all">
                      <div class="article">
                        <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                        <div class="name">王美美</div>
                        <div class="post_time">2021.02.20</div>
                      </div>
                      <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                    </div>
                  </div>
                  <div data-aos="fade-up" data-aos-duration="1000" class=" col-md-3 grid-item">
                    <div class="img1" @mouseover="mouseMe"><img src="./img/photowall/samll/moon/moon_b1_ps.jpg" alt=""
                        class="lazy"></div>
                    <div class="action-box">
                      <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                      <div class="share"><img src="./img/icon/share.png" alt=""></div>
                      <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                      <button class="button"><img src="./img/icon/more.png" alt=""></button>
                    </div>
                    <div class="article_all">
                      <div class="article">
                        <div class="member_photo"><img src="./img/icon/ann.png" alt=""></div>
                        <div class="name">吳美女</div>
                        <div class="post_time">2021.02.20</div>
                      </div>
                      <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                    </div>
                  </div>
                  <div data-aos="fade-up" data-aos-duration="1200" class="col-md-3 grid-item">
                    <div class="img1"><img src="./img/photowall/samll/moon/moon_c1.jpg" alt="" class="lazy"></div>
                    <div class="action-box img2">
                      <div class="heart"><img src="./img/icon/bookmark-outline.png" alt=""></div>
                      <div class="share"><img src="./img/icon/share.png" alt=""></div>
                      <div class="message"><img src="./img/icon/comment.png" alt=""></div>
                      <button class="button"><img src="./img/icon/more.png" alt=""></button>
                    </div>
                    <div class="article_all">
                      <div class="article">
                        <div class="member_photo"><img src="./img/icon/donn-round.png" alt=""></div>
                        <div class="name">劉德華</div>
                        <div class="post_time">2021.02.20</div>
                      </div>
                      <div class="text">雪花堡是繼卡帕多奇亞的另一個土耳其必遊的熱門景點。雪白的棉花堡有三個入口，雪花堡上方還有....more</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- 轉換積分 -->
        <div v-else-if="link ==='f'">
          <div class="pointcontent margin_top_3">
            <div class="nowstate">
              <p class="point_p">可用的積分</p>
              <p class="point">{{customer.miles}}</p>
              <p>，</p><br>
              <p class="point_p">目前會員等級</p>
              <p class="level">{{customer.mem_lv}}</p>
              <p class="point_p">，每1里程可以轉換為</p>
              <p class="level">2</p>
              <p class="point_p">宇宙幣。</p><br>
            </div>

            <div class="exchange margin_top_5">
              <p class="point_p">將</p>
              <input type="text" class="form-control point_input" id="" placeholder=輸入欲轉換的積分>
              <p class="point_p">積分，轉換為</p>
              <input type="text" readonly class="form-control-plaintext point_input" id="" value="">
              <p class="point_p">宇宙幣。</p>
            </div>
            <div class="point_btn">
              <button type="submit" class="btn heartbtns">確認轉換</button>
            </div>

          </div>
        </div>

      </div>

    </div>

  </div>

  <footer>
    @@include('./layout/footer.html')
  </footer>



  <script>

    var account_tab = new Vue({
      el: "#accountapp",
      data: {
        mydata:[],
        link: "a",
        // dynamicComponent: 'bye',
        step: 1,
        isChange: false,
        isEditing: false,
        toggle: false,
<<<<<<< HEAD
        timefilter: new Date(),
        // visibility: '全部',
        visibility: '0',
=======
        visibility: '全部',
>>>>>>> Min
        customer: { //會員資料
          mem_no: '1010006',
          mem_lv: '初星者',
          lv_img: './img/icon/初星者.png',
          miles: 7800,
          coin: '58689',
          mem_arr: '3',
          mem_sp: '2',
          mem_pic: './img/userprofile/user1.png',
          mem_id: 'SPACED',
          first_Name: 'John',
          last_Name: 'Smith',
          gender: '男',
          bday: '1991/12/21',
          phone: '0988123456',
          address: '台北市大同區中正路一段32巷5弄7號',
          mem_next_lv: '天星者',
          mem_next_img: './img/icon/天星者.png',
          mem_next_miles: 100000,
        },

        // prod_order: [],
        // spot_order_detail: [],

        prod_order: [{ // 商品訂單+收件人
          ord_no: '#TW1637493',
          total_price: '1,290',
          order_total: '10,000',
          order_date: '2021/02/04',
          order_status: '已結束',
          orderer: '陳大大',
          tel: '0988123456',
          address: '台北市中正區大西路48號'
        }, {
          ord_no: '#TW1637493',
          total_price: '1,290',
          order_total: '10,000',
          order_date: '2021/02/04',
          order_status: '已結束',
          orderer: '陳中中',
          tel: '0988123456',
          address: '台北市中正區大西路48號'
        }, {
          ord_no: '#TW1637493',
          total_price: '1,290',
          order_total: '10,000',
          order_date: '2021/02/02',
          order_status: '已結束',
          orderer: '陳小小',
          tel: '0988123456',
          address: '台北市中正區大西路48號'
        }],
        prod_order_detail: [{ // 商品訂單明細
          prod_no: '#24',
          prod_name: '攀登太陽系第一高山-奧林帕斯山三日遊',
          price: '1,290',
          prod_point: '100',
          qty: '1',
        }, {
          prod_no: '#24',
          prod_name: '攀登太陽系第一高山-奧林帕斯山三日遊',
          price: '1,290',
          prod_point: '100',
          qty: '1',
        }, {
          prod_no: '#24',
          prod_name: '攀登太陽系第一高山-奧林帕斯山三日遊',
          price: '1,290',
          prod_point: '100',
          qty: '1',
        }],
        spot_order: [
          // { // 行程訂單+收件人
        //   ord_no: '#TW1637493',
        //   dep_date: '2021/02/04',
        //   total_price: '1,290',
        //   scores: '10,000',
        //   order_date: '2021/02/04',
        //   state: '已結束',
        //   guide: '加購',
        //   order_name: '陳大大',
        //   order_ph: '0988123456',
        //   order_email: '台北市中正區大西路48號',
        // }, {
        //   ord_no: '#TW1637493',
        //   dep_date: '2021/02/04',
        //   total_price: '1,290',
        //   scores: '10,000',
        //   order_date: '2021/02/04',
        //   state: '待出發',
        //   guide: '加購',
        //   order_name: '陳中中',
        //   order_ph: '0988123456',
        //   order_email: '台北市中正區大西路48號',
        // }, {
        //   ord_no: '#TW1637493',
        //   dep_date: '2021/02/04',
        //   total_price: '1,290',
        //   scores: '10,000',
        //   order_date: '2021/02/04',
        //   state: '待出發',
        //   guide: '加購',
        //   order_name: '陳小小',
        //   order_ph: '0988123456',
        //   order_email: '台北市中正區大西路48號',
        // }
        ],
        
        spot_order_detail: [
        //   { // 行程訂單明細
        //   spot_no: '#24',
        //   spot_name: '攀登太陽系第一高山-奧林帕斯山三日遊',
        //   price: '1,290',
        //   integral: '10,000',
        //   people: '1',
        // }, {
        //   spot_no: '#24',
        //   spot_name: '攀登太陽系第一高山-奧林帕斯山三日遊',
        //   price: '1,290',
        //   integral: '10,000',
        //   people: '1',
        // }, {
        //   spot_no: '#24',
        //   spot_name: '攀登太陽系第一高山-奧林帕斯山三日遊',
        //   price: '1,290',
        //   integral: '10,000',
        //   people: '1',
        // }
        ],
        active: [],
        spot1: [{ // 行程內容
          spot: "./img/trip/trip_moon/moon1.jpg",
          title: "月球 | 太空體驗一日遊",
          grade: "初階",
          scores: "5000",
          price: 1000,
        }, {
          spot: "./img/trip/trip_moon/moon2.jpg",
          title: "月球 | 熱氣球一日遊",
          grade: "初階",
          scores: "5000",
          price: 2000,
        }, {
          spot: "./img/trip/trip_moon/moon3.jpg",
          title: "月球 | 熱氣球一日遊",
          grade: "初階",
          scores: "5000",
          price: 3000,
        }],
        products: [{ // 商品內容
          img: "./img/shop/shoes.png",
          name: "宇宙平衡鞋",
          price: 5000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/cloth.png",
          name: "太空衣",
          price: 10000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/helmet.png",
          name: "宇宙帽",
          price: 8000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/helmet.png",
          name: "宇宙帽",
          price: 8000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/helmet.png",
          name: "宇宙帽",
          price: 8000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/shoes.png",
          name: "宇宙平衡鞋",
          price: 5000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/shoes.png",
          name: "宇宙平衡鞋",
          price: 5000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/cloth.png",
          name: "太空衣",
          price: 10000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/cloth.png",
          name: "太空衣",
          price: 10000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/shoes.png",
          name: "宇宙平衡鞋",
          price: 5000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/shoes.png",
          name: "宇宙平衡鞋",
          price: 5000,
          cart: "./img/shop/cart.png",
        }, {
          img: "./img/shop/cloth.png",
          name: "太空衣",
          price: 10000,
          cart: "./img/shop/cart.png",
        }],
      },
      methods: {
        minus_lev: function () {  //計算與下一階段會員差距
          return this.customer.mem_next_miles - this.customer.miles;
        },
        save() { // 修改儲存會員資料
          this.customer.mem_id = this.$refs['mem_id'].value;
          this.customer.phone = this.$refs['phone'].value;
          this.customer.address = this.$refs['address'].value;
          this.isEditing = !this.isEditing;
          $(".focus").removeAttr('style')
        },
        edit() {  // 修改會員資料
          if (this.isEditing) {

            // console.log('etest2')
            // console.log(this.isEditing)

            this.isEditing = !this.isEditing;
            $(".focus").removeAttr('style')
          } else if (!this.isEditing) {

            // console.log('etest3')
            // console.log(this.isEditing)

            this.isEditing = !this.isEditing;
            $(".focus").css('border-color', 'white');
          }
        },
        fileChange(e) {  // 換照片
          let file = e.target.files[0];
          let readFile = new FileReader();
          readFile.readAsDataURL(file);
          readFile.addEventListener('load', this.loadImage);
        },
        loadImage(e) {  // 上傳照片
          this.user.image = e.target.result;
        },
        saveImage(e) {  // 儲存照片
          this.user.image = this.$refs['image'].value;
          this.isChange = !this.isChange;
        },
        acitve(index) {  // 切換收藏分類
          this.step = index
          !this.active.includes(index) && this.active.push(index);
        },
        toggleContent(e) {  // 展開滑出訂單明細
          this.toggle = !this.toggle;
          $('.toBeToggled').eq(e).toggle("show");
          if (this.toggle == true) {
            // $(".toBeToggled").eq(e).slideDown()
            $(".order_icon").eq(e).attr("src", "./img/icon/drop-up-arrow.png");
          } else {
            // $(".toBeToggled").eq(e).slideUp()
            $(".order_icon").eq(e).attr("src", "./img/icon/drop-down-arrow.png");
          };
        },
        mouseMe() {  // hover貼文功能
          $('.img1').mouseover(function () {
            $(this).parent().find(".action-box").css('display', 'flex');
          });
          $('.img1').mouseout(function () {
            $(this).parent().find(".action-box").css('display', 'none');
          });
        },
      },
      mounted() {
          fetch('./php/getspot_order.php').then(res => res.json()).then(res => this.spot_order = res);
          fetch('./php/getspot_order_datail.php').then(res => res.json()).then(res => this.spot_order_detail = res);
          
      },
      computed: {
        travelstatus() {
          if (this.visibility == 3) {
              return this.spot_order;
          } else {
            return this.spot_order.filter(item => {
              // return item.state == this.visibility
              return item.order_status== this.visibility;
            })
          }
        },

      },
    });


    window.onload = function () {        //  點擊menu變色
      for (var i = 0; i < document.links.length; i++) {
        var thisLink = document.links[i];
        thisLink.onclick = function () {
          for (var i = 0; i < document.links.length; i++) {
            document.links[i].style = "";
          }
          this.style = "color:#AD6E4A; border-bottom: 3px solid #AD6E4A";
        }
      }
    };

  </script>

</body>

</html>