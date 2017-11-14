function subimitForm() {
    f = document.forms["formLogin"]; // seta o objeto
    f.method = "POST"; // método de envio
    f.action = "pagina.php"; // página que receberá os dados do formulário
    f.submit(); // esse comando envia o formulário
}