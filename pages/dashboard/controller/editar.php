<?php
include_once "../../../connection/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id_agendamento'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
} elseif (empty($dados['nome'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['data'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data!</div>"];
} elseif (empty($dados['descricao'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo descrição!</div>"];
} elseif (empty($dados['local'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo local!</div>"];
} elseif (empty($dados['contato'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo contato!</div>"];
} else {
    $query_agendamento= "UPDATE agendamentos SET nome=:nome, data=:data, descricao=:descricao, local=:local, contato=:contato, status=:status WHERE id_agendamento=:id_agendamento";
    
    $edit_agendamento = $conn->prepare($query_agendamento);
    $edit_agendamento->bindParam(':nome', $dados['nome']);
    $edit_agendamento->bindParam(':data', $dados['data']);
    $edit_agendamento->bindParam(':descricao', $dados['descricao']);
    $edit_agendamento->bindParam(':local', $dados['local']);
    $edit_agendamento->bindParam(':contato', $dados['contato']);
    $edit_agendamento->bindParam(':status', $dados['status']);
    $edit_agendamento->bindParam(':id_agendamento', $dados['id_agendamento']);


    if ($edit_agendamento->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Agendamento editado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Edição do agendamento falhou!</div>"];
    }
}

echo json_encode($retorna);