<?php 
$trev_no =$_GET['trev_no'];
$errMsg = "";

require_once("connectbooks_kai.php");

try{
    $sql = "UPDATE spot_trev SET trev_stats='0' WHERE trev_no=:trev_no";
    $spot = $pdo->prepare($sql);
    $spot->bindValue(":trev_no", $trev_no);
    $spot->execute();
    if($spot->execute()){
        
        echo "已下架!". "<br>";
	    echo "<a href='../spaced_backstage_trip_reviews.php'>返回景點評價管理</a>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>