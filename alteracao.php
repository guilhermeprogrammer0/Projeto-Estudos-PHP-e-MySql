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

<body class="corpo-perfil">

    <header class="cabecalho">
        <h1>Projeto de Estudos em PHP + MySql</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu de Navegação</a>
            <a class="navbar-brand" href="perfil.php">Voltar ao Perfil</a>
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
    <?php
    session_start();

    require_once "conexao.php";
    require_once "verificacao.php";


    $sql_consulta_2 = "SELECT * FROM clientes WHERE id = '$_SESSION[id]'";
    $consulta_2 = mysqli_query($conexao, $sql_consulta_2);

    $qtd_rows = mysqli_num_rows($consulta_2);

    if ($qtd_rows > 0) {
        while ($campos = mysqli_fetch_array($consulta_2)) {

    ?>
            <section class="secao-06">
                <form action="alteracao.php" method="POST">
                    <div class="mb-3  area-campos">
                        <label for="exampleFormControlInput1" class="form-label">Id</label>
                        <input type="text" class="form-control control-input" id="exampleFormControlInput1" name="id" readonly value="<?php echo $campos['id']; ?>">
                    </div>
                    <div class="mb-3 area-campos">
                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                        <input type="text" class="form-control control-input" id="exampleFormControlInput1" name="nome" value="<?php echo $campos['nome']; ?>">
                    </div>
                    <div class="mb-3 area-campos">
                        <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                        <input type="text" class="form-control control-input" id="exampleFormControlInput1" name="email" value="<?php echo $campos['email']; ?>">
                    </div>
                    <div class="mb-3 area-campos">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input type="text" class="form-control control-input" id="exampleFormControlInput1" name="senha" value="<?php echo $campos['senha']; ?>">
                    </div>
                    <div class="mb-3 area-especial">
                        <input type="reset" class="btn btn-danger" value="Cancelar">
                        <input type="submit" class="btn btn-primary" value="Salvar Alterações">
                    </div>
                </form>

            </section>
        <?php
        }
    } else { ?>
        <script>
            alert("erro");
        </script>
    <?php
    }
    ?>




    <section class="logout">
        <a href="logout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#212529" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
        </a>
    </section>
    <?php

    require_once "conexao.php";
    require_once "functions.php";

    if ($_POST) {
        Alterar($conexao, $_POST['id'], $_POST['nome'], $_POST['email'], $senha = $_POST['senha']);
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>