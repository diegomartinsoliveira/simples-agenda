<?php
session_start();

include_once "../../connection/conexao.php";


if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../login/index.php');
	exit();
}

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

// QUERY para recuperar registro do banco de dados
$query_sits  = "SELECT email, md5('senha') FROM usuarios ";
$query_sits .= "WHERE email = :email ";
$query_sits .= "AND senha = :senha";

$result_user = $conn->prepare($query_sits);
$result_user->bindParam(':email', $email, PDO::PARAM_STR);
$result_user->bindParam(':senha', $senha, PDO::PARAM_STR);

$result_user->execute();
$tem_usuario = $result_user->fetch(PDO::FETCH_ASSOC);

if($tem_usuario) {
	$_SESSION['email'] = $email;
	header('Location: ../dashboard/index.php');
	exit();


} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login/index.php');
	exit();
}