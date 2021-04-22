<?php
    $dbname = "g3";
    $user ="root";
<<<<<<< HEAD
    $password= "root";
=======
    $password= "dan700629";
>>>>>>> denis
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>