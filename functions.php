<?php
error_reporting(0);
session_start();

function Cadastrar($conexao, $nome, $email, $senha)
{

    $sql = "INSERT INTO clientes values (default,'$nome','$email','$senha')";
    $cadastrado = mysqli_query($conexao, $sql);

    if ($cadastrado) {
?>
        <script>
            alert('Cadastro Realizado com Sucesso!');
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Cadastro NÃO Realizado!');
        </script>
    <?php
    }
}

function Logar($conexao, $email, $senha)
{
    $sql_teste = "SELECT  * from  clientes WHERE email = '$email' AND senha = '$senha'";
    $logado = mysqli_query($conexao, $sql_teste);

    $qtd_linhas = mysqli_num_rows($logado);
    if ($qtd_linhas > 0) {
    ?>
        <script>
            var alerta = document.querySelector('#alerta');
            alerta.style.display = 'block'
            alerta.textContent = "Você será encaminhado ao seu perfil...";

            function encaminhar() {
                window.location.href = "perfil.php";
            }

            setTimeout(encaminhar, 3000)
        </script>
        <?php
        while ($consulta_verificacao = mysqli_fetch_array($logado)) {
            session_start();
            $_SESSION['id'] = $consulta_verificacao['id'];
            $_SESSION['email'] = $consulta_verificacao['email'];
            $_SESSION['senha'] = $consulta_verificacao['senha'];
        }
    } else {
        ?>

        <script>
            var alerta = document.querySelector('#alerta');
            alerta.style.display = 'block'
            alerta.textContent = "Você Não tem cadastro aqui! Clique no botão abaixo para se cadastrar";
            alerta.classList.add('alert-danger');
            var botao_cadastro = document.querySelector('#botao_cadastro');
            botao_cadastro.style.display = 'block';
            botao_cadastro.addEventListener('click', () => {
                window.location.href = "cadastro.php";
            })
        </script>

    <?php
    }
}

function Alterar($conexao, $id, $nome, $email, $senha)
{
    $alteracao = "UPDATE clientes SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
    $alteracao_feita = mysqli_query($conexao, $alteracao);

    if ($alteracao_feita) {
    ?>
        <script>
            alert('Alteração Realizada com Sucesso! Atualize a Página!');

        </script>
    <?php
        header("location: alteracao.php");
        $sql_modificacao = "SELECT * FROM clientes WHERE id = '$id'";
        $modificado = mysqli_query($conexao,$sql_modificacao);

        while($valor = mysqli_fetch_array($modificado))
        {
            $_SESSION['email'] = $valor['email'];
            $_SESSION['senha'] = $valor['senha'];
        }

       
    } else {
    ?>
        <script>
            alert('Erro!!');
        </script>
<?php
        header("location: alteracao.php");
    }
}

function Excluir($conexao,$email,$senha,$id,$campo1,$campo2)
{
   
    if($campo1 != $email || $campo2 != $senha)
    {
        ?>
        <script>alert('Email e/ou Senha não conferem com seu login');</script>
        <?php
    }
    else
    {
        $sql_exlcuir = "DELETE FROM clientes WHERE id = '$id'";
        $exclusao = mysqli_query($conexao,$sql_exlcuir);

        if($exclusao)
        {
            ?>
            <script>alert('Seu Perfil foi Excluido');</script>
            <?php
            session_destroy();
        }
        else{
            ?>
            <script>alert('Erro!');</script>
            <?php
        }
    }
        
    

}



?>