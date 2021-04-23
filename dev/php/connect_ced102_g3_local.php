<?php
<<<<<<< HEAD
    $dbname = "g3";
    $user ="root";
    $password= "dan700629";
=======
 $dbname = "spaced";
 $user ="root";
 $password= "root1009";
>>>>>>> a08664c73a429d97437735d23f749a7d388ac617
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
	             PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $options);
    
    ?>