

function validarTamanhoCPF(){
    var campo = document.getElementById("cpf");
    var valor = campo.value;

    if (valor.length < 14) {
        alert("Digite o numero correto de caracteres.");
        return false; // Impede o envio do formulário
}

    return true; // Permite o envio do formulário

}