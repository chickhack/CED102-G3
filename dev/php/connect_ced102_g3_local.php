<?php
<<<<<<< HEAD
 $dbname="tibamefe_ced102g3";
 $user="tibamefe_since2021";
$password="vwRBSb.j&K#E";
=======
<<<<<<< HEAD
<<<<<<< HEAD
    $dbname = "spaced";
    $user ="root";
    $password= "a00000000";
=======

    $dbname = "g3";
    $user ="root";
    $password= "rootpassword";
>>>>>>> chick
=======
    $dbname = "g3";
    $user ="root";
    $password= "dan700629";
>>>>>>> denis
>>>>>>> 3811586fda94502973a285bdccbf2c2ecf0415bd
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>