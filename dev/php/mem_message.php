<?php
try {
	require_once("./connectBooks_wei.php");

	$sql = "SELECT * 
          	FROM post_cmt
            WHERE post_no = :post_no";

	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>