<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品新增</title>
</head>
<body>
    <?php
$errMsg = "";
$allfile="";
try {
	require_once("../../connect_ced102_g3_local.php");
	
	//.......確定是否上傳成功
	// if( $_FILES["prod_pic1"]["error"] == UPLOAD_ERR_OK){
		if(!empty($_FILES["prod_pic1"])){
			if(file_exists("../../images")==false){
				mkdir("../../images");
			}
			// $from="";
			$uniqid = uniqid();
			$pathinfoArr = pathinfo($_FILES["prod_pic1"]["name"]);
			$filename = "{$uniqid}.{$pathinfoArr["extension"]}";
			$form = $_FILES["prod_pic1"]["tmp_name"];
			$to ="../../images/$filename";
			if(copy($form,$to)===true){
				$allfile .= "==".$filename;

			}
			
		}
		if(!empty($_FILES["prod_pic2"])){
			if(file_exists("../../images")==false){
				mkdir("../../images");
			}
			// $from="";
			$uniqid = uniqid();
			$pathinfoArr = pathinfo($_FILES["prod_pic2"]["name"]);
			$filename = "{$uniqid}.{$pathinfoArr["extension"]}";
			$form = $_FILES["prod_pic2"]["tmp_name"];
			$to ="../../images/$filename";
			if(copy($form,$to)===true){
				$allfile .= "==".$filename;

			}
			
		}		
		if(!empty($_FILES["prod_pic3"])){
			if(file_exists("../../images")==false){
				mkdir("../../images");
			}
			// $from="";
			$uniqid = uniqid();
			$pathinfoArr = pathinfo($_FILES["prod_pic3"]["name"]);
			$filename = "{$uniqid}.{$pathinfoArr["extension"]}";
			$form = $_FILES["prod_pic3"]["tmp_name"];
			$to ="../../images/$filename";
			if(copy($form,$to)===true){
				$allfile .= "==".$filename;

			}
			
		}	
				
			
		
		//---決定檔案名稱
		//1.主檔名
		// 亂數產生主檔名
		// $uniqid = uniqid(); //x12e4g576d
		//2.副檔名
		// $pathinfoArr = pathinfo($_FILES["spot_pic"]["name"]);
		// $filename = "{$uniqid}.{$pathinfoArr["extension"]}";
		//---先檢查images資料夾存不存在
		// if(file_exists("../images") === false){
			// mkdir("../images");
		// }
		// $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，放在新曾送出後
		// $_SESSION["name"]=2;		//=============================去抓會員是誰
		// $fff=$_SESSION["name"];
		//---將檔案copy到要放的路徑
		// $from = $_FILES["spot_pic"]["tmp_name"];
		// $to = "../images/$allfile";
		// if(copy( $allfile, $to)===true){
			//insert `資料表名稱`(`選擇要存入的欄位`,`選擇要存入的欄位`,`選擇要存入的欄位`)
			$sql = "INSERT INTO `prod` (`prod_no`,`cat_no`, `prod_name`, `prod_price`, `prod_info`, `prod_intro`, `prod_ondate`,`prod_offdate`,`prod_pic`,`prod_status`,`prod_points`)
			values(null,:cat_no, :prod_name, :prod_price, :prod_info, :prod_intro, null,null,:prod_pic,:prod_status,:prod_points )";
			$products = $pdo->prepare( $sql );
			$products -> bindValue(":cat_no",$_POST["cat_no"]);//bindvalue("values設定的名稱",$_POST["前台送回來的name"]) $_POST["spot_name"]
			$products -> bindValue(":prod_name", $_POST["prod_name"]);
			$products -> bindValue(":prod_price", $_POST["prod_price"]);
			$products -> bindValue(":prod_info", $_POST["prod_info"]);
			$products -> bindValue(":prod_intro", $_POST["prod_intro"]);
			$products -> bindValue(":prod_status", $_POST["prod_status"]);
			$products -> bindValue(":prod_points", $_POST["prod_points"]);
			$products -> bindValue(":prod_pic", $allfile);
			$products -> execute();
		// $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，要放在新增送出之後
		echo "<script>window.location.href='../../../backstage_shop.php'</script>";
			// echo "新增成功~";
		// }else{
			// echo "失敗~";
		// }

	// }else{
		// echo "錯誤代碼 : {$_FILES["prod_pic"]["error"]} <br>";
		// echo "新增失敗<br>";
	// }
	
}
catch (PDOException $e) {
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