<?php

$user = "root";
$pass = "root";

try{
    $pdo = new PDO('mysql:host=localhost;dbname=dbz', $user, $pass);
    // echo "you successed DB";
}catch(PDOException $error){
echo $erro->getMessage();
}
