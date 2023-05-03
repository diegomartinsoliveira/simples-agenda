<?php
session_start();

ob_start();

include_once "../../connection/conexao.php";

// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);  

// Acessa o IF quando o usuário clicar no botão cadastrar
if(empty($dados['SendCadUser'])){
	//var_dump($dados);
	
	// Criar a QUERY para cadastrar no banco de dados
	$query_usuario = "INSERT INTO usuarios (nome, email, celular, senha) VALUES (:nome, :email, :celular, :senha)";
	
	// Preparar a QUERY
	$cad_usuario = $conn->prepare($query_usuario);
	
	// Substituir o link pelo valor que vem do formulário
	$cad_usuario->bindParam(':nome', $dados['nome']);
	$cad_usuario->bindParam(':email', $dados['email']);
	$cad_usuario->bindParam(':celular', $dados['celular']);
	$cad_usuario->bindParam(':senha', $dados['senha']);
	
	// Executar a QUERY
	$cad_usuario->execute();
	//print_r($cad_usuario);exit;  

	// Acessa o IF quando cadastrar o registro no banco de dados
	if($cad_usuario->rowCount()){
		// Criar a mensagem e atribuir para variável global
		$_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";

		// Redirecionar o usuário para a página de login
		header("Location: ../login/index.php");
	}else{
		echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
	}
}