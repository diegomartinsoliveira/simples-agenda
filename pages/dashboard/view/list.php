<?php
include_once "../../../connection/conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

$qnt_result_pg = 10;
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

$query_usuarios = "SELECT id_usuario, nome, data, descricao, local, status, contato FROM agendamentos ORDER BY id_usuario DESC LIMIT $inicio, $qnt_result_pg";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();

$dados = "<div class='table-responsive'>
                        <table class='table table-striped table-bordered'>
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th width='300'>Nome</th>
                                    <th width='130'>Data</th>
                                    <th width='400'>Descrição</th>
                                    <th width='300'>Local</th>
                                    <th width='100'>Contato</th>
                                    <th width='50' style='text-align: center;'>Status</th>
                                    <th width='50' style='text-align: center;'>Visualizar</th>
                                    <th width='50' style='text-align: center;'>Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody>";

while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    extract($row_usuario);
    $dados .= "<tr>
                    <td>$id_usuario</td>
                    <td>$nome</td>
                    <td>$data</td>
                    <td>$descricao</td>
                    <td>$local</td>
                    <td>$contato</td>
                    <td>$status</td>
                    <td>
                    <div class='container'> 
                    <button id='$id_usuario' i class='bi bi-eye botao-visualizar' onclick='visUsuario($id_usuario)'></button>
                    </div> 
                    </i>
                    </td>
                    <td>
                    <div class='container'> 
                    <button id='$id_usuario' i class='bi bi-text-center botao-acoes' onclick='visUsuario($id_usuario)'></button>
                    </div> 
                    </td>
               </tr>";
    
}

$dados .= "</tbody>
        </table>
        </div>";

//somar a quantidade de usuarios
$query_pg = "SELECT COUNT(id_usuario) AS num_result FROM agendamentos";
$result_pg = $conn->prepare($query_pg);
$result_pg->execute();
$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);
//quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

$max_links = 2;

$dados .= '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios(1)'>Primeira</a></li>";
for($pag_ant = $pagina -$max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >= 1) {
    $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_ant)'>$pag_ant</a></li>";
    }
}
$dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";
for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
    }
}
$dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Última</a></li>";
$dados .= '</ul></nav>';

echo $dados; 

} else {

    echo "<div class='alert alert-danger' role='alert'> Erro, nenhum usuário encontrado! </div>";
}

?>

