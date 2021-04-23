<?php
    $dbname = "g3";
    $user ="root";
<<<<<<< HEAD
    $password= "dan700629";
<<<<<<< HEAD

=======
=======
    $password= "root";
<<<<<<< HEAD
=======
=======
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
>>>>>>> 7ecc499740156129142ed4c15206f91eebb5fb61
>>>>>>> 4b796edc5c465c93376a906dd66858d342098218
>>>>>>> 7f15494c97895f4034ce17c3e937e20b29fbae34
>>>>>>> 69a4370c878bbff31807ab78596b5e981a6ef17a
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>