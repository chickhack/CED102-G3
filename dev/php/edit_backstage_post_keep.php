<?php 
$post_no =$_GET['post_no'];
$errMsg = "";
$stats = 0;

if($_GET['post_keep'] == 0){
    $stats = 1;
}else{
    $stats = 0;
}

try{
    require_once("connectbooks_wei.php");
    $sql = "UPDATE post SET post_keep=$stats WHERE post_no=:post_no";
    $product = $pdo->prepare($sql);
    $product->bindValue(":post_no", $post_no);
    $product->execute();
    if($product->execute()){
        
        // echo "<script>alert('已下架!')</script>";
	    echo "<script>window.location.href='../spaced_backstage_post_keep.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>