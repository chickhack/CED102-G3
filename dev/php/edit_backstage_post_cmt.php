<?php 
$cmt_no =$_GET['cmt_no'];
$errMsg = "";
$stats = 0;

if($_GET['cmt_stats'] == 0){
    $stats = 1;
}else{
    $stats = 0;
}

try{
    require_once("connect_ced102_g3_local.php");
    $sql = "UPDATE post_cmt SET cmt_stats=$stats WHERE cmt_no=:cmt_no";
    $product = $pdo->prepare($sql);
    $product->bindValue(":cmt_no", $cmt_no);
    $product->execute();
    if($product->execute()){
        
        // echo "<script>alert('已下架!')</script>";<!-- 狀態列 -->
	    echo "<script>window.location.href='../backstage/spaced_backstage_post_cmt.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>