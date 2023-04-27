<?php
include_once "../../connection/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Simples Agenda Online</title>
</head>

<body>
    <header class="cabecalho">
   
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <img class="logo" src="../../assets/img/logo.png">
                <div class="botao-agendar">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary botao-agendar" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">
                    Agendar
                    </button>
                </div>
            </div>
    </header>
 

                    <!-- Modal Agendar -->
                    <div class="modal fade" id="cadUsuarioModal">
                     <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="cadUsuarioModalLabel">Agendar Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                            <div class="modal-body">
                                                <form id="cad-usuario-form">
                                                    <span id="msgAlertaErroCad"></span>
                                                    <span id="msgAlertaUsuario"></span>
                                                    <label>Usuário: </label>
                                                    <select class="form-select" aria-label="Default select example" name="id_usuario" id="id_usuario">
                                                    <option selected>Selecionar Usuário</option>
                                                    </select>
                                                    <div class="mb-2">
                                                    <label for="nome" class="col-form-label">Nome:</label>
                                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome completo">
                                                    </div>
                                                <div class="mb-2">
                                                <label for="email" class="col-form-label">Data:</label>
                                                    <input type="date" name="data" class="form-control" id="data" placeholder="Digite a data do agendamento">
                                                </div>
                                                <label for="descricao" class="col-form-label">Descricao:</label>
                                                <textarea class="form-control" id="descricao" name="descricao" rows="2" placeholder="Digite a descrição"></textarea>
                                                <div class="mb-2">
                                                    <label for="local" class="col-form-label">Local:</label>
                                                    <input type="text" name="local" class="form-control" id="local" placeholder="Digite o local do agendamento">
                                                </div>   
                                                <div class="mb-2">
                                                    <label for="contato" class="col-form-label">Contato:</label>
                                                    <input type="text" name="contato" class="form-control" id="contato" placeholder="Digite o número para contato">
                                                </div>   
                                                <div class="form-group col-md-6">
                                                    <label>Status:</label><br>
                                                    <div class="btn-group tamanho-botao-ativo" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="status" id="ativo" autocomplete="off" checked value="0">
                                                    <label class="btn btn-outline-primary" for="ativo">Ativo</label>

                                                    <input type="radio" class="btn-check" name="status" id="inativo" autocomplete="off" value="1">
                                                    <label class="btn btn-outline-primary" for="inativo">Inativo</label>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <input type="submit" class="btn btn-outline-success" id="cad-usuario-btn" value="Cadastrar" />
                                            </div>
                                                </form>
                                                </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModallLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="visUsuarioModalLabel">Detalhes do Agendamento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                            <div class="modal-body">
                                            <span id="msgAlertaErroVis"></span>
                                                <dl class="row">
                                                    <dt class="col-sm-3">Código</dt>
                                                    <dd class="col-sm-9"><span id="idAgendamento"></span></dd>

                                                    <dt class="col-sm-3">Nome</dt>
                                                    <dd class="col-sm-9"><span id="nomeAgendamento"></span></dd>

                                                    <dt class="col-sm-3">Data</dt>
                                                    <dd class="col-sm-9"><span id="dataAgendamento"></span></dd>

                                                    <dt class="col-sm-3">Descrição</dt>
                                                    <dd class="col-sm-9"><span id="descricaoAgendamento"></span></dd>

                                                    <dt class="col-sm-3">Local</dt>
                                                    <dd class="col-sm-9"><span id="localAgendamento"></span></dd>

                                                    <dt class="col-sm-3">Contato</dt>
                                                    <dd class="col-sm-9"><span id="contatoAgendamento"></span></dd>

                                                    <dt class="col-sm-3">Status</dt>
                                                    <dd class="col-sm-9"><span id="statusAgendamento"></span></dd>
                                                </dl>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <br>
        <div class="row">
            <div class="col-lg-12">                      

            </div>
        </div>
    </div>
    <!-- Modal Editar -->
    <div class="modal fade" id="editUsuarioModal">
                     <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="editUsuarioModalLabel">Editar Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                            <div class="modal-body">
                                                <form id="edit-usuario-form">
                                                    <span id="msgAlertaErroEdit"></span>
                                                    <span id="msgAlertaUsuario"></span>
                                                    <input type="hidden" name="id_agendamento" id="editid">
                                                    <div class="mb-2">
                                                    <label for="nome" class="col-form-label">Nome:</label>
                                                    <input type="text" name="nome" class="form-control" id="editnome">
                                                    </div>
                                                <div class="mb-2">
                                                <label for="email" class="col-form-label">Data:</label>
                                                    <input type="date" name="data" class="form-control" id="editdata">
                                                </div>
                                                <label for="descricao" class="col-form-label">Descricao:</label>
                                                <textarea class="form-control" id="descricao" name="editdescricao" rows="2"></textarea>
                                                <div class="mb-2">
                                                    <label for="local" class="col-form-label">Local:</label>
                                                    <input type="text" name="local" class="form-control" id="editlocal">
                                                </div>   
                                                <div class="mb-2">
                                                    <label for="contato" class="col-form-label">Contato:</label>
                                                    <input type="text" name="contato" class="form-control" id="editcontato">
                                                </div>   
                                                <div class="form-group col-md-6">
                                                    <label>Status:</label><br>
                                                    <div class="btn-group tamanho-botao-ativo" role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="status" id="ativo" autocomplete="off" checked>
                                                    <label class="btn btn-outline-primary" for="ativo">Ativo</label>

                                                    <input type="radio" class="btn-check" name="status" id="inativo" autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="inativo">Inativo</label>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <input type="submit" class="btn btn-outline-success" id="edit-usuario-btn" value="Salvar" />
                                            </div>
                                                </form>
                                                </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="container-agendamentos">
<span id="msgAlerta"></span>
    <h4>Listas de Agendamentos</h4>
    <table id="listar-agendamento" class="display" style="width:100%">
        <thead>
            <tr style="background-color: #e7e7e7;">
                <th>Nome</th>
                <th>Data</th>
                <th>Descrição</th>
                <th>Status</th>
                <th class="text-center">Detalhes</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
    </table>
</div>
<br>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/custom.js"></script>

    <script>
        $(document).ready(function() {
            $('#listar-agendamento').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "view/listar_agendamentos.php",
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
                }
               
            });
        });
    </script>
</body>

</html>