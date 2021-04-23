<?php 
try {
	// $a = 10;
	// exit("-----".$a);
	require_once("../../connect_ced102_g3_local.php");
	$sql = "UPDATE spot SET 
    spot_name=:spot_name, 
    spot_pic=:spot_pic, 
    spot_pic1=:spot_pic1, 
    spot_pic2=:spot_pic2, 
    spot_pic3=:spot_pic3, 
    spot_pic4=:spot_pic4, 
    spot_pics=:spot_pics,
    spot_lv=:spot_lv, 
    spot_info=:spot_info, 
	spot_intro=:spot_intro, 
    spot_dnt=:spot_dnt, 
	spot_status=:spot_status,
    spot_s_status=:spot_s_status,
    spot_price=:spot_price,
    miles=:miles

	WHERE spot_no=:spot_no";
	
	$spot = $pdo->prepare($sql);
    // $spot->bindValue( ":spot_no", $spot_no, PDO::PARAM_INT );
    $spot -> bindValue(":spot_name",@$_GET["spot_name"]);//bindvalue("values設定的名稱",$_POST["前台送回來的name"]) $_POST["spot_name"]
    $spot -> bindValue(":spot_pic",@$_GET["spot_pic"]);
    $spot -> bindValue(":spot_pic1",@$_GET["spot_pic1"]);
    $spot -> bindValue(":spot_pic2",@$_GET["spot_pic2"]);
    $spot -> bindValue(":spot_pic3",@$_GET["spot_pic3"]);
    $spot -> bindValue(":spot_pic4",@$_GET["spot_pic4"]);
    $spot -> bindValue(":spot_pics",@$_GET["spot_pics"]);
    $spot -> bindValue(":spot_lv", @$_GET["spot_lv"]);
    $spot -> bindValue(":spot_info", @$_GET["spot_info"]);
    $spot -> bindValue(":spot_intro", @$_GET["spot_intro"]);
    $spot -> bindValue(":spot_dnt", @$_GET["spot_dnt"]);
    $spot -> bindValue(":spot_status", @$_GET["spot_status"]);
    $spot -> bindValue(":spot_s_status", @$_GET["spot_s_status"]);
    $spot -> bindValue(":spot_price", @$_GET["spot_price"]);
    $spot -> bindValue(":miles", @$_GET["miles"]);
    $spot -> execute();

} catch (PDOException $e) {
	// echo "系統忙碌, 請通知系統維護人員~";
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	echo "錯誤行號 : ", $e->getLine(), "<br>";		
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="./img/icon/shortcut.png" type="image/x-icon">

    <title></title>

</head>

<body>
    <?php 
if($spot->rowCount()>0){
	echo "異動成功~";
    echo "<script>window.location.href='../../../backstage/spaced_backstage_trip.php'</script>";

}
?>
</body>

</html>