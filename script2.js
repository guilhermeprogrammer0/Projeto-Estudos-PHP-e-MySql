var form_exclusao = document.getElementById("form_exclusao");
form_exclusao.style.display = 'none';

var botao_excluir = document.querySelector("#botao_excluir");
var conteudo_botoes = document.querySelector(".botoes");

botao_excluir.addEventListener('click', () => {
    form_exclusao.style.display = 'block';
    botao_excluir.style.display = 'none';
    var excluir_banco = document.createElement('input');
    excluir_banco.classList.add("btn");
    $(excluir_banco).css({ "color": "white", "background-color": "#D41E1D" })
    excluir_banco.value = 'Confirmar';
    excluir_banco.type = 'submit';
    excluir_banco.setAttribute('name', 'excluir_base');
    conteudo_botoes.appendChild(excluir_banco);
})

var close_modal = document.getElementById('close-modal');
close_modal.addEventListener('click', () => {
    form_exclusao.style.display = 'none';
}
)



