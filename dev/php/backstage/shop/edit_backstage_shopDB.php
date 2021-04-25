<?php
// echo $_POST["prod_no"];
try {
        require_once("../../connect_ced102_g3_local.php");
        $prod_no=$_POST["prod_no"];
        $cat_no=$_POST["cat_no"];
        $prod_name=$_POST["prod_name"];
        $prod_pic=$_POST["prod_pic"];
        $prod_info=$_POST["prod_info"];
        $prod_intro=$_POST["prod_intro"];
        $prod_ondate=$_POST["prod_ondate"];
        $prod_offdate=$_POST["prod_offdate"];
        $prod_status=$_POST["prod_status"];
        $prod_price=$_POST["prod_price"];
        $prod_points=$_POST["prod_points"];
       
        $sql= "UPDATE `prod` SET 
        prod_name='$prod_name', 
        cat_no='$cat_no', 
        prod_pic='$prod_pic', 
        prod_info='$prod_info', 
        prod_intro='$prod_intro', 
        prod_ondate='$prod_ondate', 
        prod_offdate='$prod_offdate',
        prod_status='$prod_status',
        prod_price='$prod_price',
        prod_points='$prod_points'
    
        WHERE prod_no=$prod_no";

        $prod = $pdo->prepare($sql);
        $prod -> execute();
        echo "<script>window.location.href='../../../backstage/backstage_shop.php'</script>";

    } catch (PDOException $e) {
        	echo "系統忙碌, 請通知系統維護人員~";
        	echo "錯誤原因 : ", $e->getMessage(), "<br>";
        	echo "錯誤行號 : ", $e->getLine(), "<br>";		
        }


?>