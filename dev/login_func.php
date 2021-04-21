<?php
session_start();
try{
  require_once('./php/connectbooks_yi.php');
  $sql = "select * from customer where email=:email and mem_psw=:mem_psw"; 

  $member = $pdo->prepare($sql);
  $member->bindValue(":email", $_POST["email"]);
  $member->bindValue(":mem_psw", $_POST["mem_psw"]);
  $member->execute();

  if( $member->rowCount()==0 ){ //查無此人
   echo "{}";
  }else{ //登入成功
    //自資料庫中取回資料
   $memRow = $member->fetch(PDO::FETCH_ASSOC);
    $_SESSION["email"] = $memRow["email"];
    $_SESSION["mem_psw"] = $memRow["mem_psw"];

    //送出登入者的姓名資料
    $res = ["email"=>$memRow["email"], "mem_psw"=>$memRow["mem_psw"]];

    echo json_encode($memRow); //輸出json

    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='home.php';
    window.alert('登入成功！')
      </SCRIPT>");
  } 
}catch(PDOException $e){
  echo $e->getMessage();
}

?>