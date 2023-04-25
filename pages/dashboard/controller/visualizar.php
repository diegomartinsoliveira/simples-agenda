<?php
include_once "../../../connection/conexao.php";

$id_agendamento = filter_input(INPUT_GET, "id_agendamento", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id_agendamento)){

    $query_usuario = "SELECT id_agendamento, nome, data, descricao, local, IF(ag.status = '0', 'Ativo', 'Inativo') as status, contato FROM agendamentos ag WHERE id_agendamento =:id_agendamento LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id_agendamento', $id_agendamento);
    $result_usuario->execute();

    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_usuario];

} else {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro, nenhum agendamento encontrado!</div>"];
}

echo json_encode($retorna);

?>

