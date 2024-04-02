<?php

$user = "root";
$pass = "root";

try{
    $pdo = new PDO('mysql:host=localhost;dbname=dbz', $user, $pass);
    // echo "DBとの接続に成功しました";
}catch(PDOException $error){
echo $error->getMessage();
}
