<?php 
$order_no =$_GET['order_no'];
$errMsg = "";
$status = 0;

if($_GET['order_status'] == 0){
    $status = 1;
}else{
    $status = 0;
}

try{
    require_once("../../connect_ced102_g3_local.php");
    $sql = "UPDATE spot_order SET order_status=$status WHERE order_no=:order_no";
    $product = $pdo->prepare($sql);
    $product->bindValue(":order_no", $order_no);
    $product->execute();
    if($product->execute()){        
        // echo "<script>alert('已下架!')</script>";
	    echo "<script>window.location.href='../../../backstage/spaced_backstage_order.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>