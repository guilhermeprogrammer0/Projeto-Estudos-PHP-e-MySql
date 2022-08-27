<?php
error_reporting(0);


if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['id'])) {
?>
  <script>
    document.body.style.backgroundColor = "#212529";
   var h5 = document.createElement('h5');
   var secao = document.createElement('section');
   secao.classList.add("teste");
   h5.innerHTML = "Você NÃO tem acesso aqui, pois não fez login!";
   document.body.appendChild(secao);
   var botao_sair = document.createElement('button');
   secao.appendChild(botao_sair);
   botao_sair.textContent = "Fazer Login";
   secao.appendChild(h5);
   botao_sair.classList.add("btn-sair")
   botao_sair.addEventListener('click',()=>window.location.href = "logar.php");
 
   
  
  </script>
<?php
} else {
}



?>