<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$errMsg = "";
try {
	require_once("../../connectBooks_wei.php");

	//.......確定是否上傳成功
	if( $_FILES["upFile1"]["error"] == UPLOAD_ERR_OK){
		//---決定檔案名稱 []接收post.php的name  每一個if判斷圖片有沒有近來加上else
		//1.主檔名
		// 亂數產生主檔名
		$uniqid1 = uniqid(); //x12e4g576d
		//2.副檔名
		$pathinfoArr1 = pathinfo($_FILES["upFile1"]["name"]); //第一個[]接收post.php的name
		$filename1 = "{$uniqid1}.{$pathinfoArr1["extension"]}";
		//---先檢查images資料夾存不存在
		if(file_exists("../../../img/photowall/post") == false){
			mkdir("../../../img/photowall/post");
		}
		// $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，放在新曾送出後
		// $_SESSION["name"]=2;		//=============================去抓會員是誰
		// $fff=$_SESSION["name"];
		//---將檔案copy到要放的路徑
		$from1 = $_FILES["upFile1"]["tmp_name"];//圖檔從我點選的名字
		$to1 = "../../../img/photowall/post/$filename1";//把$filename放到images資料夾
    copy( $from1, $to1);}
    else{$filename1 = null;}
    if( $_FILES["upFile2"]["error"] == UPLOAD_ERR_OK){
      //---決定檔案名稱 []接收post.php的name
      //1.主檔名
      // 亂數產生主檔名
      $uniqid2 = uniqid(); //x12e4g576d
      //2.副檔名
      $pathinfoArr2 = pathinfo($_FILES["upFile2"]["name"]); //第一個[]接收post.php的name
      $filename2 = "{$uniqid2}.{$pathinfoArr2["extension"]}";
      //---先檢查images資料夾存不存在
      if(file_exists("../../../img/photowall/post") === false){
        mkdir("../../../img/photowall/post");
      }
      // $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，放在新曾送出後
      // $_SESSION["name"]=2;		//=============================去抓會員是誰
      // $fff=$_SESSION["name"];
      //---將檔案copy到要放的路徑
      $from2 = $_FILES["upFile2"]["tmp_name"];//圖檔從我點選的名字
      $to2 = "../../../img/photowall/post/$filename2";//把$filename放到images資料夾
      copy( $from2, $to2);}
      else{$filename2 = null;}
      if( $_FILES["upFile3"]["error"] == UPLOAD_ERR_OK){
        //---決定檔案名稱 []接收post.php的name
        //1.主檔名
        // 亂數產生主檔名
        $uniqid3 = uniqid(); //x12e4g576d
        //2.副檔名
        $pathinfoArr3 = pathinfo($_FILES["upFile3"]["name"]); //第一個[]接收post.php的name
        $filename3 = "{$uniqid3}.{$pathinfoArr3["extension"]}";
        //---先檢查images資料夾存不存在
        if(file_exists("../../../img/photowall/post") === false){
          mkdir("../../../img/photowall/post");
        }
        // $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，放在新曾送出後
        // $_SESSION["name"]=2;		//=============================去抓會員是誰
        // $fff=$_SESSION["name"];
        //---將檔案copy到要放的路徑
        $from3 = $_FILES["upFile3"]["tmp_name"];//圖檔從我點選的名字
        $to3 = "../../../img/photowall/post/$filename3";//把$filename放到images資料夾
        copy( $from3, $to3);}
        else{$filename3 = null;}
		// if(copy( $from, $to)===true){
			//insert `資料表名稱`(`選擇要存入的欄位`,`選擇要存入的欄位`,`選擇要存入的欄位`)
			$sql = "INSERT INTO `post` (`post_no`,`mem_no`, `post_teg`, `post_content`,`post_pic1`,`post_pic2`,`post_pic3`)
			values(null,:mem_no, :post_teg,:post_content,:post_pic1,:post_pic2,:post_pic3)";//代碼跟欄位用依樣名稱
			$products = $pdo->prepare( $sql );	//固定寫法
			$products -> bindValue(":post_content",$_POST["article"]);//bindvalue("values設定的名稱",$_POST["前台送回來的name"]) $_POST["spot_name"]
      $products -> bindValue(":mem_no",$_POST["member_no"]);
			$products -> bindValue(":post_pic1", $filename1);//第一個是代碼，$filename是前面傳回來的東西
      $products -> bindValue(":post_pic2", $filename2);
      $products -> bindValue(":post_pic3", $filename3);
			$products -> bindValue(":post_teg", $_POST["upload"]);
			// $products -> bindValue(":mem_no", $_POST["mem_no"]);
			$products -> execute();
		// $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，要放在新增送出之後  資料表除了有空直的不允許空直，基本上都要輸入，是否有些可以允許空直，就直接新增。

      echo "<script>window.location.href = '../../../photowall.php'</script>";
// 			echo "新增成功~";
// 		}else{
// 			echo "失敗~";
// 		}

// 	}else{
// 		echo "錯誤代碼 : {$_FILES["spot_pic"]["error"]} <br>";
// 		echo "新增失敗<br>";
// 	}
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
	echo $errMsg;
	
}
// 使用foreach迴圈來新增訂單明細
// $sql = "INSERT INTO `spot` (`spot_no`) values(:spot)";
// $products = $pdo->prepare( $sql );
// foreach($products as $i=>$dss){
  ?>
</body>
</html>