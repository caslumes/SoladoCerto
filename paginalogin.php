

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icones/icon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./estilos/login.css">
    <link rel="stylesheet" href="./estilos/header.css">
    <title>SoladoCerto - Página de Cadastro</title>
</head>
<body>
    <header id="header-principal">
        <section class="secao-esquerda-header-principal">
            <a class="container-logo" href="paginaprincipal.php">
                <img class="logo" src="./imagens/header/logo.png" alt="" />
            </a>
        </section>
    </header>


    <div class="container-login" id="cadastrar" style="display: none;">
        <h1 class="titulo-form">Cadastrar-se</h1>
        <form method="post" action="registrar.php">
            <div class="grupo-entrada">
                <i class="fas fa-user"></i>
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
                <label for="nome">Nome</label>
            </div>
            <div class="grupo-entrada">
                <i class="fas fa-user"></i>
                <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required>
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="grupo-entrada">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Digite seu E-mail" required>
                <label for="email">Endereço de E-mail</label>
            </div>
            <div class="grupo-entrada">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <label for="senha">Senha</label>
            </div>
            <input type="submit" class="botao" value="Cadastrar-se" name="cadastrar">
        </form>
        <p class="ou">
            <div class="links">
                <p>Já tem uma conta?</p>
                <button id="botaoEntrar">Entrar</button>
            </div>
        </p>
    </div>
    
    <div class="container-login" id="entrar">
        <h1 class="titulo-form">Entrar</h1>
        <form method="post" action="registrar.php">
            <div class="grupo-entrada">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Digite seu E-mail" required>
                <label for="email">Endereço de E-mail</label>
            </div>
            <div class="grupo-entrada">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <label for="senha">Senha</label>
                <?php if(isset($_GET['erro'])){
                    $erro = (int) $_GET['erro'];
                    if($erro === 1){
                        ?>
                        <p class="erro">E-mail ou Senha Incorretos</p>
                        <?php
                    }else if($erro === 2){
                        ?>
                        <p class="erro">E-mail não cadastrado!</p>
                        <?php
                    }
                }
                ?>
            </div>
            <p class="recuperar">
                <a href="#">Esqueci minha senha</a>
            </p>
            <input type="submit" class="botao" value="Entrar" name="entrar">
        </form>
        <p class="ou">
            <div class="links">
                <p>Não tem uma conta?</p>
                <button id="botaoCadastrar">Cadastrar-se</button>
            </div>
        </p>
    </div>
    <script src="./scripts/login.js"></script>
</body>
</html>