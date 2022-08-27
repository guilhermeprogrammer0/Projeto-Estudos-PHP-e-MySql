(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()
var senha = document.querySelector(".senha");
var botao_senha = document.getElementById("botao_senha");
var img = document.getElementById("img");
botao_senha.addEventListener('click', () => {

    if (senha.getAttribute("type") == "password") {

        botao_senha.textContent = "Esconder Senha";
        senha.setAttribute("type", "text");


    }
    else {
        botao_senha.textContent = "Mostrar Senha";
        senha.setAttribute("type", "password")
    }
}
)




