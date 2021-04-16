<?php 
try {
	require_once("./connectbooks_kai.php");
	$sql = "select *from spot where spot_s_status=1";

	$tops = $pdo->query($sql);
	$planets = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($planets);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>