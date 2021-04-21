<?php
    require_once('connectbooks_yi.php');

  //   if (isset($_POST['email'])){
  //     $email = $_POST['email'];
  
  //     $query = "SELECT * FROM customer WHERE email = '$email'";
    
  //     $result = $dsn->query($query);
    
  //     if ($result->num_rows > 0) {
  //         echo 1;
  //     }else{
  //       $query = "INSERT INTO customer ('email, mem_psw') 
  //                 VALUES(''$email',?)";
  //       $result = $dsn->query($query);
  //       echo 0;
  //     }
  // }

  if(isset($_POST['email']))
  {	 
      $email = $_POST['email'];
      $mem_psw = $_POST['mem_psw'];
      $sql = "INSERT INTO customer (email,mem_psw)
      VALUES (?,?)";
      if (mysqli_query($dsn, $sql)) {
          echo "註冊成功!";
      } else {
          echo "Error: " . $sql . "
  " . mysqli_error($dsn);
      }
      mysqli_close($dsn);
  }

?>