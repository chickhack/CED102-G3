<?php 
try {
	require_once("./connectbooks_kai.php");
<<<<<<< HEAD
	$sql = "select * from spot";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
=======
	$sql = "select spot_name,spot_lv,spot_price,miles,spot_pic1 from spot";
	$tops = $pdo->query($sql);
	$top = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($top);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
>>>>>>> dev
}
?>