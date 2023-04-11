<?php

$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'dbagenda';

try{

    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

} catch(PDOException $err){
    echo "erro: conexão falhou" . $err->getMessage();
}?>