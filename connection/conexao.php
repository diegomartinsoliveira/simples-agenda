<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'dbagenda';

try{

    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

} catch(PDOException $err){
    echo "Erro: Conexão Falhou! " . $err->getMessage();
}?>