<?php

try{
  require_once('connect_ced102_g3_local.php');
  $sql = "SELECT * FROM customer"; 

  $member = $pdo->prepare($sql);
  $member->bindValue(":email", $_POST["email"]);
  $member->bindValue(":mem_psw", $_POST["mem_psw"]);
  $member->execute();
  // print_r ($_POST["email"]); die;
  
  if( $member->rowCount() > 0 ){ //已經有人註冊過了
    echo "<script>alert('帳號已經被註冊！')</script>";
    echo "<script>window.location.href('../register.php')</script>";


  }else{ //是可用的帳號
    //送出資料到資料庫
    $sql = "INSERT INTO customer (email, mem_psw) VALUES (?,?)";

    // echo json_encode($memRow); //輸出json
    echo "<script>alert('註冊成功')</script>";

    // echo ("<script>window.history.go(-2)</script>");
  } 
}catch(PDOException $e){
  echo $e->getMessage();
}

?>