<?php
// Incluir a conexao com o banco de dados
include_once "../../../connection/conexao.php";

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

//Lista de colunas

$colunas = [
    0 => 'id_agendamento',
    1 => 'nome',
    2 => 'data',
    3 => 'descricao',
    4 => 'local',
    5 => 'contato',
    6 => 'status'
];

// Obter a quantidade de registros no banco de dados
$query_qnt_agendamentos = "SELECT COUNT(id_agendamento) AS qnt_agendamentos FROM agendamentos";

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $query_qnt_agendamentos .= " WHERE id_agendamento LIKE :id_agendamento ";
    $query_qnt_agendamentos .= " OR nome LIKE :nome ";
    $query_qnt_agendamentos .= " OR data LIKE :data ";
    $query_qnt_agendamentos .= " OR descricao LIKE :descricao ";
    $query_qnt_agendamentos .= " OR local LIKE :local ";
    $query_qnt_agendamentos .= " OR contato LIKE :contato ";
    $query_qnt_agendamentos .= " OR status LIKE :status ";
}
// Preparar a QUERY
$result_qnt_agendamentos = $conn->prepare($query_qnt_agendamentos);

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_agendamentos->bindParam(':id_agendamento', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_agendamentos->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_agendamentos->bindParam(':data', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_agendamentos->bindParam(':descricao', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_agendamentos->bindParam(':local', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_agendamentos->bindParam(':contato', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_agendamentos->bindParam(':status', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY responsável em retornar a quantidade de registros no banco de dados
$result_qnt_agendamentos->execute();
$row_qnt_agendamentos = $result_qnt_agendamentos->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_agendamentos);

// Recuperar os registros do banco de dados
$query_agendamentos = "SELECT id_agendamento, nome, data, descricao, local, contato, IF(ag.status = '0', 'Ativo', 'Inativo') as status FROM agendamentos ag"; 

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $query_agendamentos .= " WHERE id_agendamento LIKE :id_agendamento ";
    $query_agendamentos .= " OR nome LIKE :nome ";
    $query_agendamentos .= " OR data LIKE :data ";
    $query_agendamentos .= " OR descricao LIKE :descricao ";
    $query_agendamentos .= " OR local LIKE :local ";
    $query_agendamentos .= " OR contato LIKE :contato ";
    $query_agendamentos .= " OR status LIKE :status ";
}

// Ordenar os registros
$query_agendamentos .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " .
$dados_requisicao['order'][0]['dir'] . " LIMIT :inicio, :quantidade";

// Preparar a QUERY
$result_agendamentos = $conn->prepare($query_agendamentos);
$result_agendamentos->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_agendamentos->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

// Acessa o IF quando ha paramentros de pesquisa   
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_agendamentos->bindParam(':id_agendamento', $valor_pesq, PDO::PARAM_STR);
    $result_agendamentos->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_agendamentos->bindParam(':data', $valor_pesq, PDO::PARAM_STR);
    $result_agendamentos->bindParam(':descricao', $valor_pesq, PDO::PARAM_STR);
    $result_agendamentos->bindParam(':local', $valor_pesq, PDO::PARAM_STR);
    $result_agendamentos->bindParam(':contato', $valor_pesq, PDO::PARAM_STR);
    $result_agendamentos->bindParam(':status', $valor_pesq, PDO::PARAM_STR);
}
// Executa Query
$result_agendamentos->execute();

// Ler os registros retornado do banco de dados e atribuir no array 
while($row_agendamento = $result_agendamentos->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_agendamento);
    extract($row_agendamento);
    $registro = [];
    $registro[] = $nome;
    $registro[] = $data;
    $registro[] = $descricao;
    $registro[] = $status == 'Ativo' ? "<button type='button' class='btn btn-success'>Ativo</button>" : "<button type='button' class='btn btn-danger'>Inativo</button>";
    $registro[] = "<button id='$id_agendamento' i class='bi bi-eye botao-acoes container' onclick='visUsuario($id_agendamento)'></i></button>";
    $registro[] = "<div class='btn-group container' role='group' aria-label='Basic example'>
    <button id='$id_agendamento' class='btn btn-primary' onclick='editarAgendamento($id_agendamento)'>Editar</button>
    <button id='$id_agendamento' class='btn btn-danger' onclick='deletarAgendamento($id_agendamento)'>Deletar</button></div>";
    $dados[] = $registro;
}
                     
                  

//var_dump($dados);

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_agendamentos['qnt_agendamentos']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_agendamentos['qnt_agendamentos']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela agendamentos
];

//var_dump($resultado);

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);