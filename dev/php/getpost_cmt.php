<?php
try {
	require_once("./connectBooks_wei.php");
	$sql = "select * from post_cmt";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}