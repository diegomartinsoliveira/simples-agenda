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
    <title>Cadastrar</title>
</head>

<body>
    <div class="container-cadastro">
        <div class="img-box">
            <center>
                <div class="icone-logo">
            <img class="img-logo-cadastro" src="../../assets/img/logo.png">
                </div>
                <div class="bem-vindo">
            <p class="bem-vindo">Seja bem-vindo!</p>
            </div>
                <div class="texto-entrar-cadastro">
            <p class="texto-entrar-cadastro">Aqui você encontra</p>
                <p class="texto-entrar-cadastro">o melhor sistema em gestão de agendas!</p>
            </div>
                <div class="icone-agenda">
            <img class="img-agenda-cadastro" src="../../assets/img/agenda.png">
                </div>
            </center>
        </div>
        <div class="content-box bg-entrar">
            <img style="display: none;" class="img-logo-desativada-cadastro" src="../../assets/img/logo.png">
            <img style="display:none;" class="img-agenda-desativada-cadastro" src="../../assets/img/agenda.png">
            <div class="form-box">
                <h4 class="titulo-entrar">Seus dados de acesso</h4>
                <br>
                <form action="cadastrar_usuario.php" method="POST">
                    
                    <div class="input-box">
                        <span>Usuário</span>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu usuário.." required>
                    </div>

                    <div class="input-box">
                        <span>E-mail</span>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail.." required>
                    </div>

                    <div class="input-box">
                        <span>Celular</span>
                        <input type="text" id="celular" name="celular" placeholder="Digite seu número.." maxlength="16" pattern="\(\d{2}\)\s*\d{5}-\d{4}" required>
                    </div>

                    <div class="input-box">
                        <span>Senha</span>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha.." required>
                    </div>

                    <div class="remember-cadastro">
                        <p class="tem-conta">Já possui uma conta? <a href="../login/index.php">Fazer login</a></p>
                    </div>
                    <?php
                    if(isset($_SESSION['msg-erro'])):
                    ?>
                    <div class="btn btn-danger invalid-login container">
                      <p>Este usuário já existe!.</p>
                    </div>
                    <br>
                    <br>
                    <?php
                    endif;
                    unset($_SESSION['msg-erro']);
                    ?>
                <div class="posicao-botao">
                    <div class="botao-entrar">
                        <button type="submit" name="SendCadUser" class="btn btn-light btn-lg mb-2 botao-entrar">Criar minha conta</button>
                    </div>
                </div>
                
                    <div class="input-box termos">
                       <p class="first-text">Ao continuar, você concorda com</p>
                        <p>os <a class="second-text" href="https://www.simplesagenda.com.br/site/termo-servico.php">Termos</a> e <a class="second-text" href="https://www.simplesagenda.com.br/site/politica-privacidade.php">Política de Privacidade.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const celular = document.getElementById('celular') // Seletor do campo de telefone

    celular.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
    celular.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

    const mascaraTelefone = (valor) => {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    celular.value = valor // Insere o(s) valor(es) no campo
}
  </script>

</body>

</html>