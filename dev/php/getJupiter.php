<?php 
try {
	require_once("./connectbooks_kai.php");
	$sql = "select spot_no,spot_name,spot_lv,spot_price,miles,spot_pic1 from spot";
	$tops = $pdo->query($sql);
	$spot3 = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($spot3);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>