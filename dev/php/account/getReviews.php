<?php 
try {
	require_once("./connectbooks_kai.php");
	$sql = "select * from spot_trev";
	$tops = $pdo->query($sql);
	$comments = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($comments);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>