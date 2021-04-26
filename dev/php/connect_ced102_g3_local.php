<?php
<<<<<<< HEAD
 $dbname="tibamefe_ced102g3";
 $user="tibamefe_since2021";
$password="vwRBSb.j&K#E";
=======
    $dbname = "spaced";
    $user ="root";
    $password= "a00000000";
>>>>>>> 2fa3903cf89d92483954484aae408c66cf035a48
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>