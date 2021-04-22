<?php
try {
	require_once("./connect_ced102_g3_local.php");
	$sql = "select * from customer";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}
?>