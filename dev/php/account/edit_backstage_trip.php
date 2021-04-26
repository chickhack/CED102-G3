<?php
$mem_no = $_GET["mem_no"];
$errMsg = "";

try {
    require_once("../connect_ced102_g3_local.php");
    $sql = "select * from customer where mem_no = :mem_no";
    $customer = $pdo->prepare($sql);
    $customer->bindValue(":mem_no", $spot_no);
    $customer->execute();
} catch (PDOException $e) {
    $errMsg .= "錯誤原因 : " . $e->getMessage() . "<br>";
    $errMsg .= "錯誤行號 : " . $e->getLine() . "<br>";
}


?>

