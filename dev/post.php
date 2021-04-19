<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
<?php
$errMsg = "";
try {
	require_once("./php/connectBooks_wei.php");

	//.......確定是否上傳成功
	if( $_FILES["upFile"]["error"] == UPLOAD_ERR_OK){
		//---決定檔案名稱
		//1.主檔名
		$uniqid = uniqid(); //x12e4g576d
		//2.副檔名
		$pathinfoArr = pathinfo($_FILES["upFile"]["name"]);
		$filename = "{$uniqid}.{$pathinfoArr["extension"]}";
		//---先檢查images資料夾存不存在
		if(file_exists("images") === false){
			mkdir("images");
		}

		//---將檔案copy到要放的路徑
		$from = $_FILES["upFile"]["tmp_name"];
		$to = "images/$filename";
		if(copy( $from, $to)===true){
			$sql = "INSERT INTO `post` (`post_teg`,`post_content`, `post_pic1`, `post_pic2`, `post_pic2`) values( :post_teg,,:post_content, :`post_pic1, :`post_pic2, :`post_pic3 )";
			$post = $pdo->prepare( $sql );
			$post -> bindValue(":post_teg", $_POST["post_teg"]);
			$post -> bindValue(":post_content", $_POST["post_content"]);
			$post -> bindValue(":post_pic1", $_POST["post_pic1"]);
			$post -> bindValue(":post_pic2", $_POST["post_pic2"]);
			$post -> bindValue(":post_pic3", $_POST["post_pic3"]);
			$posts -> execute();			
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
</body>
</html>