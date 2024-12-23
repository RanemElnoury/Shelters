<?php
$dsn = "mysql:host=localhost;dbname=g_project";
$user = 'root';
$pass = '';
try{
    $conn = new PDO($dsn,$user,$pass);
}catch(PDOException $ex){
    echo $ex->getMessage();
}


?>
