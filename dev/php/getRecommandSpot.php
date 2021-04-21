<?php 
try {
	require_once("./connectbooks_kai.php");
	$sql = "select spot_name,spot_lv,spot_price,miles,spot_pic1 from spot";
	$tops = $pdo->query($sql);
	$second = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($second);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>