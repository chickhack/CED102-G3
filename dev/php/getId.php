<?php
try {
	require_once("../../connect_ced102_g3_local.php");
	$sql = "select p.prod_no, p.prod_name, p.prod_price, p.prod_info, p.prod_intro, p.prod_ondate ,p.prod_pic, pt.score, pt.prev, date(pt.prev_date), pt.mem_no, c.last_name, c.first_name, c.mem_pic from prod p join prod_trev pt on p.prod_no = pt.prod_no join customer c on c.mem_no = pt.mem_no where p.prod_no = :id";

    $number = $pdo->prepare($sql);
    $number->bindValue(":id", $_GET["id"]);

    $number->execute();

    $numberId = $number->fetchAll(PDO::FETCH_ASSOC);

	// $products = $pdo->query($sql);
	// $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($numberId);

} catch (PDOException $e) {
	echo $e->getMessage();
}
?> 