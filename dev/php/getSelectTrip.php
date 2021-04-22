<?php 
try {
	require_once("connect_ced102_g3_local.php");
	$sql = "select *from spot where spot_s_status=1";
	$tops = $pdo->query($sql);
	$planets = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($planets);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>