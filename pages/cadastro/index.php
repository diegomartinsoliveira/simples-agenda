<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
                <form>
                    
                    <div class="input-box">
                        <span>Nome</span>
                        <input type="text" placeholder="Digite seu nome..">
                    </div>

                    <div class="input-box">
                        <span>E-mail</span>
                        <input type="email" placeholder="Digite seu e-mail..">
                    </div>

                    <div class="input-box">
                        <span>Celular</span>
                        <input type="text" placeholder="Digite seu número..">
                    </div>

                    <div class="input-box">
                        <span>Senha</span>
                        <input type="password" placeholder="Digite sua senha..">
                    </div>

                    <div class="remember-cadastro">
                        <p class="tem-conta">Já possui uma conta? <a href="#">Fazer login</a></p>
                    </div>
                <div class="posicao-botao">
                    <div class="botao-entrar">
                        <button type="button" class="btn btn-light btn-lg mb-2 botao-entrar">Criar minha conta</button>
                    </div>
                </div>

                    <div class="input-box termos">
                       <p class="first-text">Ao continuar, você concorda com</p>
                        <p>os <a class="second-text" href="#">Termos</a> e <a class="second-text" href="#">Política de Privacidade.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</body>

</html>