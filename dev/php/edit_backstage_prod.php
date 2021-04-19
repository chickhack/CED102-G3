<?php 
$prod_no =$_GET['prod_no'];
$errMsg = "";
$status = 0;

if($_GET['prod_status'] == 0){
    $status = 1;
}else{
    $status = 0;
}

try{
    require_once("connectbooks_Yun.php");
    $sql = "UPDATE prod SET prod_status=$status WHERE prod_no=:prod_no";
    $product = $pdo->prepare($sql);
    $product->bindValue(":prod_no", $prod_no);
    $product->execute();
    if($product->execute()){
        
        // echo "<script>alert('已下架!')</script>";
	    echo "<script>window.location.href='../backstage_shop.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>