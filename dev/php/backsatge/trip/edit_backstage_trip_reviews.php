<?php 
$trev_no =$_GET['trev_no'];
$errMsg = "";
$status = 0;

if($_GET['trev_stats'] == 0){
    $status = 1;
}else{
    $status = 0;
}


try{
    require_once("connectbooks_kai.php");
    $sql = "UPDATE spot_trev SET trev_stats=$status WHERE trev_no=:trev_no";
    $spot = $pdo->prepare($sql);
    $spot->bindValue(":trev_no", $trev_no);
    $spot->execute();
    if($spot->execute()){
        
        echo "已下架!". "<br>";
	    echo "<script>window.location.href='../backstage_shop.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>