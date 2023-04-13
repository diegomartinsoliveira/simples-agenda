<?php
include_once "../../../connection/conexao.php";

// QUERY para recuperar registro do banco de dados
$query_sits = "SELECT id_usuario, nome FROM usuarios ORDER BY nome ASC";
$result_sits = $conn->prepare($query_sits);
$result_sits->execute();

if(($result_sits) and ($result_sits->rowCount() != 0)){
    while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
        extract($row_sit);
        $dados[] = [
            'id_usuario' => $id_usuario,
            'nome' => $nome
        ];
    }
    $retorna = ['id_usuario' => true, 'dados' => $dados];
}else{
    $retorna = ['id_usuario' => false, 'msg' => "<p style='color: #f00'>Erro: Nenhuma situação encontrada, entre em contato com o ...!</p>"];
}

echo json_encode($retorna);

