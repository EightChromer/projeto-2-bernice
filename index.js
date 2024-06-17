function enviar() {
    var nome = document.getElementById('nome_usuario').value;
    var email = document.getElementById('email_usuario').value;
    var feedback = document.getElementById('feedback').value;
    var avaliacao = document.querySelector('input[name="pesquisa"]:checked');

    if (nome.length < 3) {
        alert("Nome Incompleto!");
        document.getElementById('nome_usuario').select();
        document.getElementById('nome_usuario').focus();
        return false;
    }

    if (email.indexOf("@") < 0) {
        alert("Email Inválido!");
        document.getElementById('email_usuario').select();
        document.getElementById('email_usuario').focus();
        return false;
    }

    if (feedback.length < 3) {
        alert("Nos dê sua avaliação!");
        document.getElementById('feedback').select();
        document.getElementById('feedback').focus();
        return false;
    }

    if (!avaliacao) {
        alert("Você não respondeu à pesquisa!");
        return false;
    }

    if (avaliacao.value === 'Não') {
        alert("Obrigado! Nos dê outra chance na próxima!");
    } else {
        alert("Muito obrigado pela sua avaliação!");
    }
    var form = document.forms["form1"];
    form.action = "http://localhost/dashboard/Projeto2/conn.php?" +
        "nome=" + encodeURIComponent(nome) +
        "&email=" + encodeURIComponent(email) +
        "&feedback=" + encodeURIComponent(feedback) +
        "&avaliacao=" + encodeURIComponent(avaliacao.value);
    return true;
}