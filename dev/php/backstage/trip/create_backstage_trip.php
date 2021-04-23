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
	require_once("../../connect_ced102_g3_local.php");

	//.......確定是否上傳成功
	if( $_FILES["spot_pic"]["error"] == UPLOAD_ERR_OK){
		//---決定檔案名稱
		//1.主檔名
		// 亂數產生主檔名
		$uniqid = uniqid(); //x12e4g576d
		//2.副檔名
		$pathinfoArr = pathinfo($_FILES["spot_pic"]["name"]);
		$filename = "{$uniqid}.{$pathinfoArr["extension"]}";
		//---先檢查images資料夾存不存在
		if(file_exists("../images") === false){
			mkdir("../images");
		}
		// $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，放在新曾送出後
		// $_SESSION["name"]=2;		//=============================去抓會員是誰
		// $fff=$_SESSION["name"];
		//---將檔案copy到要放的路徑
		$from = $_FILES["spot_pic"]["tmp_name"];
		$to = "../images/$filename";
		if(copy( $from, $to)===true){
			//insert `資料表名稱`(`選擇要存入的欄位`,`選擇要存入的欄位`,`選擇要存入的欄位`)
			$sql = "INSERT INTO `spot` (`spot_no`,`spot_name`, `spot_pic`, `spot_lv`, `spot_info`, `spot_intro`, `spot_dnt`,`spot_status`,`spot_s_status`,`spot_price`,`miles`)
			values(null,:spot_name, :spot_pic, :spot_lv, :spot_info, :spot_intro, :spot_dnt,:spot_status,:spot_s_status,:spot_price,:miles )";
			$products = $pdo->prepare( $sql );
			$products -> bindValue(":spot_name",$_POST["spot_name"]);//bindvalue("values設定的名稱",$_POST["前台送回來的name"]) $_POST["spot_name"]
			$products -> bindValue(":spot_pic", $filename);
			$products -> bindValue(":spot_lv", $_POST["spot_lv"]);
			$products -> bindValue(":spot_info", $_POST["spot_info"]);
			$products -> bindValue(":spot_intro", $_POST["spot_intro"]);
			$products -> bindValue(":spot_dnt", $_POST["spot_dnt"]);
			$products -> bindValue(":spot_status", $_POST["spot_status"]);
			$products -> bindValue(":spot_s_status", $_POST["spot_s_status"]);
			$products -> bindValue(":spot_price", $_POST["spot_price"]);
			$products -> bindValue(":miles", $_POST["miles"]);
			$products -> execute();
		// $ff=$pdo->lastInsertId();//這會去抓取最後新增的ID，要放在新增送出之後

			// echo "新增成功~". "<br>";
			echo '<script language="javascript">';
			echo 'alert(新增成功)';  //not showing an alert box.
			echo '</script>';
			echo "<script>window.location.href='../../../backstage/spaced_backstage_trip.php'</script>";

		}else{
			echo "失敗~";
		}

	}else{
		echo "錯誤代碼 : {$_FILES["spot_pic"]["error"]} <br>";
		echo "新增失敗<br>";
	}
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