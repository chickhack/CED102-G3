<?php 
session_start();
$mem_no=$_SESSION["mem_no"];
try {
	require_once("./connect_ced102_g3_local.php");
	$sql ="select * from customer where mem_no=$mem_no";
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