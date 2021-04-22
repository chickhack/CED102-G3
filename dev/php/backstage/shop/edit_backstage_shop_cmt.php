<?php 
$prev_no =$_GET['prev_no'];
$errMsg = "";
$status = 0;

if($_GET['prev_stats'] == 0){
    $status = 1;
}else{
    $status = 0;
}

try{
    require_once("../../connect_ced102_g3_local.php");
    $sql = "UPDATE prod_trev SET prev_stats=$status WHERE prev_no=:prev_no";
    $product = $pdo->prepare($sql);
    $product->bindValue(":prev_no", $prev_no);
    $product->execute();
    if($product->execute()){
	    echo "<script>window.location.href='../../../backstage/backstage_shop_cmt.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>