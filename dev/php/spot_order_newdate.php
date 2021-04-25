<?php
session_start();
$mem_no=$_SESSION["mem_no"];
foreach($_SESSION['trip-cart'] as $va){
    $spot[]=$va["spot_id"];
}
if(isset($_POST["guide"])){
    $guide=$_POST["guide"];
    if($guide==3000){
        $guide=1;
    }
}else{
    $guide=0;
}
$order_name = $_POST["first-name"];
$order_name1 = $_POST["last-name"];
$order_name1 .=$order_name;
$upMiles=$_POST["miles"];
// echo $order_name1;
// print_r($_POST["spot_price"]);
// print_r($_POST["spot_miles"]);
// print_r($_POST["spot_price"]);
// foreach($_POST["spot_miles"] as $key=> $v){
//     echo $v,"<br>";
//     echo $_POST["spot_price"][$key],"<br>";
// }
$errMsg='';
try{
    require_once("./connect_ced102_g3_local.php");
    $sql = "INSERT INTO `spot_order` (`order_no`,`mem_no`, `dep_date`, `total_price`, `miles`, `order_name`, `order_ph`,`order_email`,`guide`,`rocket`)
			values(null,:mem_no, :dep_date, :total_price, :miles, :order_name, :order_ph,:order_email,:guide,:rocket )";
			$products = $pdo->prepare( $sql );
			$products -> bindValue(":mem_no",$mem_no);//bindvalue("values設定的名稱",$_POST["前台送回來的name"]) $_POST["spot_name"]
			$products -> bindValue(":dep_date",$_POST["spot_date"]);
			$products -> bindValue(":total_price", $_POST["total_price"]);
			$products -> bindValue(":miles", $_POST["allintegral"]);
			$products -> bindValue(":order_name", $order_name1);
			$products -> bindValue(":order_ph", $_POST["phone"]);
			$products -> bindValue(":order_email", $_POST["email"]);
			$products -> bindValue(":guide", $guide);
			$products -> bindValue(":rocket", $_POST["traffic"]);
			$products -> execute();
            $newId=$pdo->lastInsertId();
            foreach($_POST["spot_miles"] as $key=> $v){
                $sql2 = "INSERT INTO `spot_order_datail`(`oreder_no`,`spot_no`,`spot_name`,`spot_pic`,`price`,`integral`,`people`)
                values($newId,:spot_no,:spot_name,:spot_pic,:price,:integral,:people)"    
			    $products1 = $pdo->prepare( $sql2 );
                $products1 -> bindValue(":spot_no", $spot[$key]);
			    $products1 -> bindValue(":spot_name",$_POST["spot_name"][$key]);
			    $products1 -> bindValue(":spot_pic", $_POST["spot_pic1"][$key]);
			    $products1 -> bindValue(":price", $_POST["spot_price"][$key]);
			    $products1 -> bindValue(":integral", $_POST["spot_miles"][$key]);
			    $products1 -> bindValue(":people", $_POST["people"][$key]);
			    $products1 -> execute();   
            }
            $sql3="UPDATE `customer` SET miles='$upMiles' where mem_no=$mem_no";
            $upcustomer = $pdo->prepare($sql3);
            $upcustomer -> execute();
}catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
	echo $errMsg;
	
}

?>