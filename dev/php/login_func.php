<?php
session_start();

try{
  require_once('./php/connect_ced102_g3_local.php');
  $sql = "select * from customer where email=:email and mem_psw=:mem_psw"; 

  $member = $pdo->prepare($sql);
  $member->bindValue(":email", $_POST["email"]);
  $member->bindValue(":mem_psw", $_POST["mem_psw"]);
  $member->execute();

  if( $member->rowCount()==0 ){ //查無此人
   echo "<script>alert('請輸入正確的帳號密碼')</script>";
   echo "<script>window.history.back()</script>";
  }else{ //登入成功
    //自資料庫中取回資料
    
   $memRow = $member->fetch(PDO::FETCH_ASSOC);
   $_SESSION['mem_name'] = $memRow['last_name'].$memRow['first_name'];
    $_SESSION['mem_no'] = $memRow['mem_no'];
    $_SESSION["mem_pic"] = $memRow['mem_pic'];

    // print_r($memRow);

    //送出登入者的姓名資料
    // $res = ["email"=>$memRow["email"], "mem_psw"=>$memRow["mem_psw"], "mem_no" => $memRow['mem_no'] ];

    echo json_encode($memRow); //輸出json

    echo ("<script>window.history.go(-2)</script>");
  }
}catch(PDOException $e){
  echo $e->getMessage();
}

?>