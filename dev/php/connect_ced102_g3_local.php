<?php
    $dbname = "spaced";
    $user ="root";
<<<<<<< HEAD
    $password= "root1009";
=======
    $password = "a00000000";
>>>>>>> 4ac592c9c7147349477b61321ddc551065e9e32b
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>