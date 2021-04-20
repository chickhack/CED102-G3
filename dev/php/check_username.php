<?php
    require_once('connectbooks_yi.php');


  $email = $_POST['email'];

  $query = "SELECT * FROM customer WHERE email = '$email'";

  $result = $dsn->query($query);

  if ($result->num_rows > 0) {
      echo 1;
  }else{
    $query = "INSERT INTO customer ('email, mem_psw') 
              VALUES(''$email',?)";
    $result = $dsn->query($query);
    echo 0;
  }



?>