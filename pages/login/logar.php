<?php
session_start();

include_once "../../connection/conexao.php";

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../login/index.php');
	exit();
}

$dados_login = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// QUERY para recuperar registro do banco de dados
$query = "SELECT email, senha FROM usuarios WHERE email = :email";

// Preparar a QUERY
$login_usuario = $conn->prepare($query);

// Substituir o link pelo valor que vem do formulário
$login_usuario->bindParam(':email', $dados_login['email']);	
// Executar a QUERY
$login_usuario->execute();

$usuario = $login_usuario->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($dados_login['senha'], $usuario['senha'])) {
	$_SESSION['email'] = $dados_login['email'];
	header('Location: ../dashboard/index.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login/index.php');
	exit();
}
?>