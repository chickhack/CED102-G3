<?php
<<<<<<< HEAD
 $dbname="tibamefe_ced102g3";
 $user="tibamefe_since2021";
$password="vwRBSb.j&K#E";
=======
    $dbname = "g3";
    $user ="root";
    $password= "dan700629";
>>>>>>> 9fbd0bceb43ef44bfedbc5060565134aa4409ee0
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>