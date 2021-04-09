<?php 
try {
	require_once("./connectbooks_kai.php");
	$sql = "select * from spot";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}
?>