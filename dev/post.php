<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body> -->
<?php
$order_no = $_REQUEST["upload"];
$errMsg='';
echo $order_no;
$errMsg = "";
$mem_noo=1010002;
try {
	require_once("./php/connectBooks_wei.php");

	//.......確定是否上傳成功
	if( $_FILES["upFile1"]["error"] == UPLOAD_ERR_OK){
		//---決定檔案名稱
		//1.主檔名
		$uniqid1 = uniqid(); //x12e4g576d
		$uniqid2 = uniqid();
		$uniqid3 = uniqid();
		//2.副檔名
		$pathinfoArr1 = pathinfo($_FILES["upFile1"]["name"]);
		$filename1 = "{$uniqid1}.{$pathinfoArr1["extension"]}";

		$pathinfoArr2 = pathinfo($_FILES["upFile2"]["name"]);
		$filename2 = "{$uniqid2}.{$pathinfoArr2["extension"]}";

		$pathinfoArr3 = pathinfo($_FILES["upFile3"]["name"]);
		$filename3 = "{$uniqid3}.{$pathinfoArr3["extension"]}";
		//---先檢查images資料夾存不存在
		if(file_exists("images") === false){
			mkdir("images");
		}

		//---將檔案copy到要放的路徑
		$from = $_FILES["upFile1"]["tmp_name"];
		$from = $_FILES["upFile2"]["tmp_name"];
		$from = $_FILES["upFile3"]["tmp_name"];
		$to = "images/$filename1";
		$to = "images/$filename2";
		$to = "images/$filename3";
		if(copy( $from, $to)===true){
			$sql = "INSERT INTO `post` (`post_teg`,`mem_no`,`post_content`, `post_pic1`, `post_pic2`, `post_pic3`) values( :post_teg,:mem_no, :post_content, :post_pic1,:post_pic2,:post_pic3 )";
			$post = $pdo->prepare( $sql );
			$post -> bindValue(":post_teg", $_POST["upload"]);
			$post -> bindValue(":mem_no", $mem_noo);
			$post -> bindValue(":post_content", $_POST["article"]);
			$post -> bindValue(":post_pic1", $from);
			$post -> bindValue(":post_pic2", $from);
			$post -> bindValue(":post_pic3", $from);
			$post -> execute();			
			echo "新增成功~";
		}else{
			echo "失敗~";
		}

	}else{
		echo "錯誤代碼 : {$_FILES["upFile"]["error"]} <br>";
		echo "新增失敗<br>";
	}
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
	echo $errMsg;
}


?>
-- </body>
-- </html>