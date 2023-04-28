<?php
include_once "../../../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['nome'])) {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo nome!</div>"];

} elseif (empty($dados['data'])) {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo data!</div>"];
} else {

$query_usuario = "INSERT INTO agendamentos (id_usuario, nome, data, descricao, local, contato, status) VALUES (:id_usuario, :nome, :data, :descricao, :local, :contato, :status)";
$cad_agendamento = $conn->prepare($query_usuario);
$cad_agendamento->bindParam(':id_usuario', $dados['id_usuario']);
$cad_agendamento->bindParam(':nome', $dados['nome']);
$cad_agendamento->bindParam(':data', $dados['data']);
$cad_agendamento->bindParam(':descricao', $dados['descricao']);
$cad_agendamento->bindParam(':local', $dados['local']);
$cad_agendamento->bindParam(':contato', $dados['contato']);
$cad_agendamento->bindParam(':status',  $dados['status']);
$cad_agendamento->execute();

if($cad_agendamento->rowCount()){

    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Agendamento cadastrado com sucesso!</div>"];
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Agendamento não cadastrado!</div>"];
}
    }

echo json_encode($retorna);