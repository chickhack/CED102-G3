<?php
    require_once("./connect_ced102_g3_local.php");
    try{
        $receive_data = json_decode(trim(file_get_contents("php://input")));
        $mem_no = $receive_data->mem_no;
        $prod_no = $receive_data->prod_no;
        $keep = $receive_data->keep;
        $prod_keep = 0 ;
        if($keep == 1){
            $prod_keep = 0;
        }else{
            $prod_keep = 1;
        }

        $query = "INSERT INTO prod_keep (`mem_no`, `prod_no`, `prod_keep`)
                VALUES ('$mem_no','$prod_no', '$prod_keep') ON DUPLICATE KEY UPDATE `prod_keep` = '$prod_keep'";
        $keep = $pdo->prepare($query);
        $keep->execute();

        $output = array(
            "message" => "data inserted"
        );
        echo json_encode($output);
        
    }catch(PDOException $e){
        $e->getMessage();
    }
?>