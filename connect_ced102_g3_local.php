<?php
    $dbname = "g3";
    $user = "root";
<<<<<<< HEAD
    $password = "rootpassword";
=======
    $password = "root";
>>>>>>> 1ae28f91038a4c3c157553d18c3f0413d55d75a6
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>