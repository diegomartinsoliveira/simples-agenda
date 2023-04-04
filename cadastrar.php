<?php
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['nome'])) {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo nome!</div>"];

} elseif (empty($dados['data'])) {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo e-mail!</div>"];
} else {

$query_usuario = "INSERT INTO agendamentos (nome, data, agendamento) VALUES (:nome, :data, :agendamento)";
$cad_agendamento = $conn->prepare($query_usuario);
$cad_agendamento->bindParam(':nome', $dados['nome']);
$cad_agendamento->bindParam(':data', $dados['data']);
$cad_agendamento->bindParam(':agendamento', $dados['agendamento']);
$cad_agendamento->execute();

if($cad_agendamento->rowCount()){

    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
}
    }

echo json_encode($retorna);