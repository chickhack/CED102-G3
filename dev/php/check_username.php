<?php
    require_once('connectbooks_yi.php');


  $email = $_POST['email'];

  $query = "SELECT * FROM customer WHERE email = '$email'";

  $result = $dsn->query($query);

    //送出登入者的姓名資料
    // $res = ["email"=>$memRow["email"], "mem_psw"=>$memRow["mem_psw"], "mem_no" => $memRow['mem_no'] ];



?>