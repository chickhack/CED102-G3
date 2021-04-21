<?php
    $dbname = "spaced";
<<<<<<< HEAD
    $user ="root";
    $password= "root1009";
=======
    $user = "root";
    $password = "dan700629";
>>>>>>> 297431834968603e149982f10b2e88b593556356
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>