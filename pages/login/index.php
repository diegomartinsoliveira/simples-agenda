<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/img/favicon2.ico">
    <title>Login</title>
</head>

<body>
    <div class="container-login">
        <div class="img-box">
            <center>
                <div class="icone-logo">
            <img class="img-logo" src="../../assets/img/logo.png">
                </div>
                <div class="texto-entrar">
            <p class="texto-entrar">Tudo que você precisa para</p>
                <p class="texto-entrar">fazer seu negócio decolar..</p>
            </div>
                <div class="icone-agenda">
            <img class="img-agenda" src="../../assets/img/agenda.png">
                </div>
            </center>
        </div>
        <div class="content-box bg-entrar">
            <img style="display: none;" class="img-logo-desativada" src="../../assets/img/logo.png">
            <img style="display:none;" class="img-agenda-desativada" src="../../assets/img/agenda.png">
            <div class="form-box">
                <h4 class="titulo-entrar">Entre na sua conta</h4>
                <br>
                <form action="logar.php" method="POST">
                    
                    <div class="input-box">
                        <span>E-mail</span>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail.." required>
                    </div>

                    <div class="input-box">
                        <span>Senha</span>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha.." required>
                    </div>

                    <div class="remember">
                        <a href="https://wa.link/d7rgiv/">Esqueceu a Senha?</a>
                    </div>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="btn btn-danger invalid-login container">
                      <p>Usuário ou senha inválidos.</p>
                    </div>
                    <br>
                    <br>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <?php
                    if(isset($_SESSION['msg'])):
                    ?>
                    <div class="btn btn-success success-login container">
                      <p>Usuário cadastrado com sucesso!.</p>
                    </div>
                    <br>
                    <br>
                    <?php
                    endif;
                    unset($_SESSION['msg']);
                    ?>
                    <div class="posicao-botao">
                    <div class="botao-entrar">
                        <button type="submit" class="btn btn-light btn-lg mb-2 botao-entrar">Entrar</button>
                    </div>
                </div>

                    <div class="input-box sem-conta">
                       <p>Ainda não possui uma conta? <a href="../../pages/cadastro/index.php">Criar conta</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</body>

</html>