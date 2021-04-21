<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>互動牆發文</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"><!-- bootstrap -->
  <link rel="stylesheet" href="./css/all.css"> <!-- 共用CSS -->
  <link rel="stylesheet" href="./css/pages/post.css">
</head>
<body>
  
  <header>
    @@include('./layout/header.html')
  </header>
  <div class="container-fluid">
  <div class="post row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
      <form method="post" action="post1.php" class="post" enctype="multipart/form-data">
        <a href="./photowall.html"><img src="./img/icon/turnoff.png" alt=""></a>
        <div class="select_trip">
          <select name="upload"> 
            <option>請選擇行程</option>
            <option value="moon">月球</option>
            <option value="mars">火星</option>
            <option value="jupiter">木星</option>
        </select>
        </div>
        <div class="upload_img">
          <p class="upload_photo">圖片</p>
          <input type="file" id="name2" hidden name="upFile1"><label for="name2" class="teaching"><img src="./img/icon/upload_button.png" alt=""></label>
          <input type="file" id="name3" hidden name="upFile2"><label for="name3" class="teaching"><img src="./img/icon/upload_button.png" alt=""></label>
          <input type="file" id="name4" hidden name="upFile3"><label for="name4" class="teaching"><img src="./img/icon/upload_button.png" alt=""></label>
          <!-- <input type="file" id="name2" hidden> -->
          <!-- <button type="button"><img src="./img/icon/upload_button.png" alt=""></button> -->
        </div>
        <div class="post_text">
          <label for="" class="post">發文</label>
          <textarea class="texts" placeholder="請發表文章...." name="article"></textarea>
        </div>
        <!-- <div class="button_post"><button type="button" class="button_min">發表文章</button></div> -->
        <div class="button_post"><input type="submit" value="發表文章" class="button_min"></div>
        
  
      </form>
    </div>
  </div>

  <footer>
    @@include('./layout/footer.html')
  </footer>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </div>
</body>

</html>