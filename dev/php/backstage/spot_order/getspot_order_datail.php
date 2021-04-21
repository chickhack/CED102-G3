<?php
try {
	require_once("../../../../connect_ced102_g3_local.php");
	// $sql ="SELECT * FROM `spot_order`";
	$sql = "SELECT * FROM spot_order a INNER join spot_order_datail b on a.order_no=b.order_no WHERE mem_no=1010006";
	
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	// $sql1 ="SELECT * FROM `customer` ORDER BY miles DESC";
	// $products1 = $pdo->query($sql1);
	// $prodRows1 = $products1->fetchAll(PDO::FETCH_ASSOC);
	// $all[0]=$prodRows;
	// $all[1]=$prodRows1;
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}
?>