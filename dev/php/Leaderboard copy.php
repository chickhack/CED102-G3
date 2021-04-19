<?php
try {
	require_once("./log.php");
	$sql ="SELECT * FROM `spot`";
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