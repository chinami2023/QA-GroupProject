<?php

// $user = "root";
// $pass = "root";

$servername = "localhost";
$username = "china406_dbzuser";
$password = "qa-admin";
$db_name = "china406_dbz";

// $conn = new mysqli($servername,$username,$password,$db_name);

$conn = new mysqli($servername,$username, $password, $db_name);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=china406_dbz', $username, $password);
    // echo "you successed DB";
}catch(PDOException $error){
echo $erro->getMessage();
}




// 

// define('_HOSTNAME', 'localhost');
// define('_DAYEBASE_NAME', 'china406_dbz');
// define('_DAYEBASE_USER_NAME', 'china406_dbzuser');
// define('_DATABASE_PASSWORD', 'ContactDatabase');

// $MySQLicon = new MySQLi(_HOSTNAME, _DAYEBASE_NAME,_DAYEBASE_USER_NAME,_DATABASE_PASSWORD);

// if($MyAQLiconn->connect_errno){
//     dei('ERROR:' .$mySQLiconn->connect_error);
// }



