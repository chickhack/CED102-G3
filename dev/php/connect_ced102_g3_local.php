<?php
<<<<<<< HEAD
$dbname = "spaced";
$user ="root";
$password= "root1009";
=======
 $dbname = "g3";
 $user ="root";
 $password= "root";
    $dbname = "spaced";
    $user ="root";
    $password= "a00000000";
>>>>>>> b67c5ba8b800e59be67a4085f062e9bfd503756d
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>