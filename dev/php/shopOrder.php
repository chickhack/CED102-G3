<?php
    require_once("../../connect_ced102_g3_local.php");
    try{
        $receive_data = json_decode(trim(file_get_contents("php://input")));
        // print_r($receive_data);
        $mem_no = $receive_data->mem_no;
        $total_price = $receive_data->total_price;
        $order_status= $receive_data->order_status;
        $orderer= $receive_data->orderer;
        $address= $receive_data->address;
        $tel= $receive_data->tel;
        $car_no= $receive_data->car_no;
        $car_insp= $receive_data->car_insp;
        $order_total= $receive_data->order_total;
        $order_date = $receive_data->order_date;
        $detail = $receive_data->detail;

        
        $query = "INSERT INTO prod_order (`order_no`, `mem_no`, `order_date`, `total_price`, `order_status`, `orderer`, `address`, `tel`, `car_no`, `car_insp`, `order_total`)
                VALUES (null, '$mem_no', '$order_date', '$total_price', '$order_status', '$orderer', '$address', '$tel', '$car_no', '$car_insp', '$order_total')";

        $statement = $pdo->prepare($query);
        $statement->execute();

        $lastId = $pdo->lastInsertId();
        //定單明細新增
        foreach($detail as $v1){
            $sql = "INSERT INTO prod_order_datail (`order_no`, `prod_no`, `prod_name`, `qty`, `price`, `prod_points`)
            VALUES ('$lastId', '$v1->prod_no', '$v1->prod_name', '$v1->qty', '$v1->prod_price', '$v1->prod_points')";

            $prod_detail = $pdo->prepare($sql);
            $prod_detail->execute();
        }


        $output = array(
            "message" => "data inserted"
        );
        echo json_encode($output);

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    session_destroy();
?>