<?php
try {
	require_once("./log.php");
	$sql ="SELECT * FROM `customer` ORDER BY miles DESC";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}
?>