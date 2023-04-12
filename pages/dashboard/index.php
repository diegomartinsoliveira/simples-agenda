<?php
include_once "../../connection/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Simples Agenda Online</title>
</head>
<img class="logo" src="../../assets/img/logo.png">
<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
               
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" style="color:black;font-weight: 500;" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">
                    Agendar
                    </button>
                    <!-- Modal -->
                    <div class="titulo-lista">
                    <h4>Lista de Agendamentos</h4>
                    </div>
                    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModallLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content" style="height:50%;">
                            <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="cadUsuarioModalLabel">Agendar Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                            <div class="modal-body">
                                                <form id="cad-usuario-form">
                                                    <span id="msgAlertaErroCad"></span>
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
                                                <div class="mb-2">
                                                    <label for="status" class="col-form-label">Status:</label>
                                                    <div>
                                                    <input type="checkbox" id="check-ativo" name="status" value="1" />
                                                    <label for="status">Ativo</label>
                                                </div>
                                                <div>
                                                    <input type="checkbox" id="check-inativo" name="status" value="0" />
                                                    <label for="status">Inativo</label>
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
                                                    <dd class="col-sm-9"><span id="id_agendamento"></span></dd>

                                                    <dt class="col-sm-3">Nome</dt>
                                                    <dd class="col-sm-9"><span id="nome"></span></dd>

                                                    <dt class="col-sm-3">Data</dt>
                                                    <dd class="col-sm-9"><span id="data"></span></dd>

                                                    <dt class="col-sm-3">Descrição</dt>
                                                    <dd class="col-sm-9"><span id="descricao"></span></dd>

                                                    <dt class="col-sm-3">Local</dt>
                                                    <dd class="col-sm-9"><span id="local"></span></dd>

                                                    <dt class="col-sm-3">Contato</dt>
                                                    <dd class="col-sm-9"><span id="contato"></span></dd>

                                                    <dt class="col-sm-3">Status</dt>
                                                    <dd class="col-sm-9"><span id="status"></span></dd>
                                                </dl>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <hr>
        <span id="msgAlerta"></span>
        <div class="row">
            <div class="col-lg-12">
                
        <span class="listar-usuarios"></span>
                        

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../../assets/js/custom.js"></script>
</body>

</html>