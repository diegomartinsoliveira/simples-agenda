<?php
session_start();

include_once "../../connection/conexao.php";


if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../login/index.php');
	exit();
}

$dados_login = filter_input_array(INPUT_POST, FILTER_DEFAULT);  
$hash  = password_hash($_POST['senha'], PASSWORD_DEFAULT);


// QUERY para recuperar registro do banco de dados
$query  = "SELECT email, senha FROM usuarios WHERE email = :email AND senha = :hash";

	// Preparar a QUERY
	$login_usuario = $conn->prepare($query);
	
	// Substituir o link pelo valor que vem do formulário
	$login_usuario->bindParam(':email', $dados_login['email']);
	$login_usuario->bindParam(':hash', $hash);
	// Executar a QUERY
	$login_usuario->execute();
	//print_r($login_usuario);exit();  
	
	// Acessa o IF quando cadastrar o registro no banco de dados
	if (password_verify($_POST['senha'], $hash )) {
		$_SESSION['email'] = $dados_login['email'];
		//print_r('caiu success');exit();
		header('Location: ../dashboard/index.php');
		exit();
	
} else {
	
	print_r('caiu no erro');exit();
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login/index.php');
	exit();
 }