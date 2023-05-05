<?php
session_start();
ob_start();
include_once "../../connection/conexao.php";

// Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$email = addslashes($dados['email']);
$nome = addslashes($dados['nome']);

// Verificar se já existe um registro com o mesmo email ou nome no banco de dados
$query = "SELECT email, nome FROM usuarios WHERE email = :email OR nome = :nome";
$result = $conn->prepare($query);
$result->bindParam(':email', $dados['email']);
$result->bindParam(':nome', $dados['nome']);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

if ($row) {
    // Já existe um registro com o mesmo email ou nome, redirecionar para a página de cadastro com mensagem de erro
    $_SESSION['msg-erro'] = true;
    header("Location: ../cadastro/index.php");
    exit();
} else {
    // Não existe nenhum registro com o mesmo email ou nome, continuar com o cadastro

    // Criar a QUERY para cadastrar no banco de dados
    $query_usuario = "INSERT INTO usuarios (nome, email, celular, senha) VALUES (:nome, :email, :celular, :senha)";
    $cad_usuario = $conn->prepare($query_usuario);

    // Substituir o link pelo valor que vem do formulário
    $cad_usuario->bindParam(':nome', $dados['nome']);
    $cad_usuario->bindParam(':email', $dados['email']);
    $cad_usuario->bindParam(':celular', $dados['celular']);
    $cad_usuario->bindParam(':senha', $hash);

    // Executar a QUERY
    $cad_usuario->execute();

    // Verificar se o cadastro foi realizado com sucesso
    if ($cad_usuario->rowCount()) {
        // Criar a mensagem e atribuir para variável global
        $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";

        // Redirecionar o usuário para a página de login
        header("Location: ../login/index.php");
        exit();
    } else {
        echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
    }
}