<?php
 $dbname="g3";
     $user="root";
    $password="rootpassword";
    $dsn="mysql:host=localhost;post=3306;dbname=$dbname;charset=utf8";
    $options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_CASE=>PDO::CASE_NATURAL);
     $pdo= new PDO($dsn,$user,$password,$options);
?>