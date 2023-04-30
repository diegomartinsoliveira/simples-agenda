<?php
include_once "../../../connection/conexao.php";

$id_agendamento = filter_input(INPUT_GET, "id_agendamento", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id_agendamento)){

    $query_agendamento = "SELECT id_agendamento, nome, data, descricao, local, status, contato FROM agendamentos WHERE id_agendamento =:id_agendamento LIMIT 1";
    $result_agendamento = $conn->prepare($query_agendamento);
    $result_agendamento->bindParam(':id_agendamento', $id_agendamento);
    $result_agendamento->execute();

    $row_agendamento = $result_agendamento->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_agendamento];

} else {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro, nenhum agendamento encontrado!</div>"];
}

echo json_encode($retorna);

?>

