<?php
// Incluir a conexao com o banco de dados
include_once "../../../connection/conexao.php";

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

// Obter a quantidade de registros no banco de dados
$query_qnt_agendamentos = "SELECT COUNT(id_agendamento) AS qnt_agendamentos FROM agendamentos";
$result_qnt_agendamentos = $conn->prepare($query_qnt_agendamentos);
$result_qnt_agendamentos->execute();
$row_qnt_agendamentos = $result_qnt_agendamentos->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_agendamentos);

// Recuperar os registros do banco de dados
$query_agendamentos = "SELECT * FROM agendamentos ORDER BY id_agendamento DESC";
$result_agendamentos = $conn->prepare($query_agendamentos);
// $result_agendamentos->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
// $result_agendamentos->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);
$result_agendamentos->execute();

while($row_agendamento = $result_agendamentos->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_agendamento);
    extract($row_agendamento);
    $registro = [];
    $registro[] = $id_agendamento;
    $registro[] = $nome;
    $registro[] = $data;
    $registro[] = $descricao;
    $registro[] = $local;
    $registro[] = $status;
    $registro[] = $contato;
    $dados[] = $registro;
}

//var_dump($dados);

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    // "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_agendamentos['qnt_agendamentos']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_agendamentos['qnt_agendamentos']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela agendamentos
];

//var_dump($resultado);

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);