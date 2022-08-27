<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
</head>

<body class="corpo-perfil">

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
    <?php
    session_start();
    require_once "conexao.php";
    require_once "functions.php";
    require_once "verificacao.php";
    $sql_consulta = "SELECT * FROM clientes WHERE id = '$_SESSION[id]'";

    $consulta = mysqli_query($conexao, $sql_consulta);

    ?>

    <section class="secao-05">
        <?php while ($con = mysqli_fetch_array($consulta)) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png" class="card-img-top" alt="LOGO">
                <div class="card-body">


                    <h3 class="card-title"><?php echo  $con['nome'] ?> </h3>
                    <h6 class="card-text">E-mail</h6>
                    <p class="card-text"><?php echo $con['email']  ?></p>

                    <a href="alteracao.php" class="btn btn-primary">Quer alterar algum dado?</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Excluir Perfil
                    </button>
                </div>
            </div>

    </section>


<?php
        }
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja mesmo Excluir?
            </div>
            <div class="modal-footer">
                <form action="perfil.php" method="POST">
                    <div class="botoes">
                        <button type="button" class="btn btn-dark" id="close-modal" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" id="botao_excluir" class="btn btn-danger"> Sim </button>
                    </div>

                    <div class="mb-3 form_confirmacao" id="form_exclusao">
                        <label for="recipient-name" class="col-form-label">E-mail</label>
                        <input type="text" class="form-control" name="email">
                        <label for="recipient-name" class="col-form-label">Senha</label>
                        <input type="password" class="form-control" name="senha">
                    </div>
                    <?php
                    if ($_POST['excluir_base'])
                    {
                        Excluir($conexao, $_SESSION['email'], $_SESSION['senha'], $_SESSION['id'],$_POST['email'],$_POST['senha']);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<section class="logout">
    <a href="logout.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#212529" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
    </a>
</section>


<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="script.js"></script>
<script src="script2.js"></script>
</body>

</html>