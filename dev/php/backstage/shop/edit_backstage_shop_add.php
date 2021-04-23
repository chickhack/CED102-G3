<?php
// echo $_POST["spot_no"];
try {
        require_once("../../connect_ced102_g3_local.php");
        $spot_no=$_POST["spot_no"];
        $spot_name=$_POST["spot_name"];
        $spot_pic=$_POST["spot_pic"];
        $spot_pic1=$_POST["spot_pic1"];
        $spot_pic2=$_POST["spot_pic2"];
        $spot_pic3=$_POST["spot_pic3"];
        $spot_pic4=$_POST["spot_pic4"];
        $spot_pics=$_POST["spot_pics"];
        $spot_lv=$_POST["spot_lv"];
        $spot_info=$_POST["spot_info"];
        $spot_intro=$_POST["spot_intro"];
        $spot_dnt=$_POST["spot_dnt"];
        $spot_status=$_POST["spot_status"];
        $spot_s_status=$_POST["spot_s_status"];
        $spot_price=$_POST["spot_price"];
        $miles=$_POST["miles"];
        echo $spot_no;    
        $sql= "UPDATE `spot` SET 
        spot_name='$spot_name', 
        spot_pic='$spot_pic', 
        spot_pic1='$spot_pic1', 
        spot_pic2='$spot_pic2', 
        spot_pic3='$spot_pic3', 
        spot_pic4='$spot_pic4', 
        spot_pics='$spot_pics',
        spot_lv='$spot_lv', 
        spot_info='$spot_info', 
        spot_intro='$spot_intro', 
        spot_dnt='$spot_dnt', 
        spot_status='$spot_status',
        spot_s_status='$spot_s_status',
        spot_price='$spot_price',
        miles='$miles'
    
        WHERE spot_no=$spot_no";

        $spot = $pdo->prepare($sql);
        $spot -> execute();
        echo "<script>window.location.href='../../../backstage/spaced_backstage_trip.php'</script>";

    } catch (PDOException $e) {
        	echo "系統忙碌, 請通知系統維護人員~";
        	echo "錯誤原因 : ", $e->getMessage(), "<br>";
        	echo "錯誤行號 : ", $e->getLine(), "<br>";		
        }


?>