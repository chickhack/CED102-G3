<?php
<<<<<<< HEAD
    $dbname = "g3";
    $user ="root";
    $password= "rootpassword";
<<<<<<< HEAD
=======
    $password= "root";
>>>>>>> Min
>>>>>>> 140c34ead856e4e788e07c2333e1a7bda72e6325
>>>>>>> 24a10dda290cd33b3978fc664573f65e22a1961c
>>>>>>> 288ee3e85b49761bc058fbe1c38b8151d385fea1
=======
    $password= "rootpassword";
>>>>>>> chick
=======
 $dbname = "g3";
 $user ="root";
 $password= "root";
>>>>>>> Yi
=======
>>>>>>> chick
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>