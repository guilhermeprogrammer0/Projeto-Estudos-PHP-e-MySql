<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Início</title>
</head>

<body class="corpo">

    <header class="cabecalho">
        <h1>Projeto de Estudos em PHP + MySql</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu de Navegação</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ver mais
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="inicio.html">Início</a></li>
                            <li><a class="dropdown-item" href="cadastro.php">Cadastre - se</a></li>
                            <li><a class="dropdown-item" href="logar.php">Entrar</a></li>
                            <li><a class="dropdown-item" href="https://github.com/guilhermeprogrammer0">Conhecer mais</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="secao-03">

        <form class="row g-3 needs-validation" novalidate action="cadastro.php" method="POST">
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="validationCustom01" required>

            </div>
            <div class="col-md-5">
                <label for="validationCustomUsername" class="form-label">E-mail</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

                </div>
            </div>
            <div class="col-md-5">
                <label for="validationCustom03" class="form-label">Senha</label>
                <input type="password" class="form-control senha" name="senha" id="validationCustom03" required>
                <button type="button" class="botao_s" id="botao_senha"> Mostrar Senha</button>

            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Aceito os termos e condições
                    </label>

                </div>
            </div>
            <div class="col-12">
                <input value="Enviar" name="enviar" class="btn btn-primary" type="submit">
                <input value=" Cancelar" class="btn btn-danger" type="reset">
            </div>
        </form>
    </section>

    <?php
    require_once "conexao.php";
    require_once "functions.php";
    error_reporting(0);
    if ($_POST['enviar']) {
        if ($_POST) {

            Cadastrar($conexao, $_POST['nome'], $_POST['email'], $_POST['senha']);
        }
    }

    ?>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>