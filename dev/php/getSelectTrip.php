<?php 
try {
	require_once("./connectbooks_kai.php");
<<<<<<< HEAD
	$sql = "select spot_no,spot_name,spot_lv,spot_price,miles,spot_pic,spot_pics from spot where spot_s_status=1";
=======
	$sql = "select *from spot where spot_s_status=1";

>>>>>>> 1800f022b6315c17de74e467b5ae936cc73e326b
	$tops = $pdo->query($sql);
	$planets = $tops->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($planets);
} catch (PDOException $e) {
	echo $e->getLine(), $e->getMessage();
}
?>