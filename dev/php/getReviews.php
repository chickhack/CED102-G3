<?php 
try {
	require_once("./connectbooks_kai.php");
	$sql = "select * from spot_trev";
	// $sql = "select tp.trev_score, tp.trev, date(tp.trev_date), tp.mem_no, c.last_name, c.first_name, c.mem_pic from spot_trev tp join customer c on c.mem_no = tp.mem_no";
	$tops = $pdo->query($sql);
	$comments = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($comments);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>