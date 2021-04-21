<?php
try {
	require_once("./connectBooks_Yun.php");
	$sql = "select * from prod";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}
?>