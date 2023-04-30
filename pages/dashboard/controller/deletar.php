<?php
include_once "../../../connection/conexao.php";

$id_agendamento = filter_input(INPUT_GET, "id_agendamento", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id_agendamento)) {

    $query_agendamento = "DELETE FROM agendamentos WHERE id_agendamento=:id_agendamento";
    $result_agendamento = $conn->prepare($query_agendamento);
    $result_agendamento->bindParam(':id_agendamento', $id_agendamento);

    if($result_agendamento->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Agendamento apagado com sucesso!</div>"];
    }else{
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Agendamento não apagado com sucesso!</div>"];
    }    
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum agendamento encontrado!</div>"];
}

echo json_encode($retorna);
