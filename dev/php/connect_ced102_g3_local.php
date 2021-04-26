<?php
<<<<<<< HEAD
<<<<<<< HEAD

    $dbname = "g3";
    $user ="root";
    $password= "root";
=======
<<<<<<< HEAD
 $dbname="g3";
 $user="root";
$password="dan700629";

=======
<<<<<<< HEAD
<<<<<<< HEAD
 $dbname="tibamefe_ced102g3";
 $user="tibamefe_since2021";
$password="vwRBSb.j&K#E";
=======
    $dbname = "spaced";
    $user ="root";
    $password= "a00000000";
>>>>>>> 2fa3903cf89d92483954484aae408c66cf035a48
=======
    $dbname = "g3";
    $user ="root";
    $password= "rootpassword";
>>>>>>> chick
>>>>>>> 67875c7edd4e7212a6c0629e4386e1e0f20df115
>>>>>>> a089b0731981856df5fe681cd5a68b6412588ea8
=======
    $dbname = "g3";
    $user ="root";
    $password= "rootpassword";

>>>>>>> chick
    $dsn = "mysql:host=localhost;port=3306;dbname=$dbname;charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn,$user,$password,$options);
?>