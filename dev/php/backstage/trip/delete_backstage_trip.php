<?php 
$spot_no =$_GET['spot_no'];
$errMsg = "";

require_once("../../connect_ced102_g3_local.php");

try{
    $sql = 'DELETE FROM spot WHERE spot_no=:spot_no';
    $spot = $pdo->prepare($sql);
    $spot->bindValue(":spot_no", $spot_no);
    $spot->execute();
	// echo "已刪除!". "<br>";
    echo "<script>window.location.href='../../../backstage/spaced_backstage_trip.php'</script>";
    
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}



?>