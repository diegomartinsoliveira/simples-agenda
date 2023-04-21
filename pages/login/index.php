<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
            <div class="form-box">
                <h4 class="titulo-entrar">Entre na sua conta</h4>
                <br>
                <form>
                    
                    <div class="input-box">
                        <span>E-mail</span>
                        <input type="email" placeholder="Digite seu e-mail..">
                    </div>

                    <div class="input-box">
                        <span>Senha</span>
                        <input type="password" placeholder="Digite sua senha..">
                    </div>

                    <div class="remember">
                        <a href="#">Esqueceu a Senha?</a>
                    </div>
                    <div class="posicao-botao">
                    <div class="botao-entrar">
                        <button type="button" class="btn btn-light btn-lg mb-2 botao-entrar">Entrar</button>
                    </div>
                </div>

                    <div class="input-box sem-conta">
                       <p>Ainda não possui uma conta? <a href="#">Criar conta</a></p>
                    </div>
                    <img style="display:none;" class="img-agenda-desativada" src="../../assets/img/agenda.png">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>

</body>

</html>