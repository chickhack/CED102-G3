<?php
    $dbname = "spaced";
    $user ="root";
    $password= "root1009";
<<<<<<< HEAD:connect_ced102_g3_local.php
=======
    $user = "root";
    $password = "a00000000";
>>>>>>> 24048ab3ca93da3399a74a0e051f303885825473:dev/php/connect_ced102_g3_local.php
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>