<?php

    $dbname = "g3";
    $user ="root";
    $password= "root";
    $dsn = "mysql:host=localhost;
            port=8889;
            dbname=$dbname;
            charset=utf8";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
	             PDO::ATTR_CASE=>PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $options);

    // 檢查是否有連線錯誤
    echo $pdo->errorCode();
    print_r($pdo->errorInfo());

?>