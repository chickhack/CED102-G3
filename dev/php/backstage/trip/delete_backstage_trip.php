<?php 
$spot_no =$_GET['spot_no'];
$errMsg = "";

require_once("../../connectbooks_kai.php");

try{
    $sql = 'DELETE FROM spot WHERE spot_no=:spot_no';
    $spot = $pdo->prepare($sql);
    $spot->bindValue(":spot_no", $spot_no);
    $spot->execute();
	echo "已刪除!". "<br>";
	echo "<a href='../spaced_backstage_trip.php'>返回景點管理</a>";
    
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}



?>