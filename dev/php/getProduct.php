<?php
try {
	require_once("./connect_ced102_g3_local.php");
	$sql = "select * from prod where prod_status = 1";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	$e->getMessage();
}
?>