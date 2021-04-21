<?php
try {
	require_once("./connectBooks_wei.php");
	$sql = "SELECT CONCAT(last_name,first_name) as person_name, post_no, DATE(post_date) as post_date, post_content, post_sub, post_pic1, post_pic2, post_pic3,mem_pic
	FROM customer c JOIN post p ON c.mem_no = p.mem_no;";
	$products = $pdo->query($sql);
	$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($prodRows);
} catch (PDOException $e) {
	
}
?>