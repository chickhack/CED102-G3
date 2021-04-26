<?php 
$mem_no =$_GET['mem_no'];
$errMsg = "";
$status = 0;

if($_GET['mem_stats'] == 0){
    $status = 1;
}else{
    $status = 0;
}

try{
    require_once("../../connect_ced102_g3_local.php");
    $sql = "UPDATE customer SET mem_stats=$status WHERE mem_no=:mem_no";
    $customer = $pdo->prepare($sql);
    $customer->bindValue(":mem_no", $mem_no);
    $customer->execute();
    if($customer->execute()){
	    echo "<script>window.location.href='../../../backstage/spaced_backstage_customer.php'</script>";
    }
}
catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?>