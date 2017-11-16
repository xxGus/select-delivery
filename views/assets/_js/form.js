/*var fmr_principal = document.getElementById("fmr-principal");

fmr_principal.onsubmit = function () {
    fmr = new FormData(fmr_principal)

    event.preventDefault();
    var xhr = new XMLHttpRequest();

    xhr.onloadstart = function () {
        //fazer painel de carregamento
        document.getElementById('nome').value = "";
        document.getElementById('sabor').value = "";
        document.getElementById('valor').value = "";
        document.getElementById('id-pizza').value = "";
    };

    xhr.onloadend = function () {
        alert(xhr.responseText);
    };

    xhr.open("post", "PizzaView.php");
    xhr.send(fmr);
};*/

function remover() {
    confirmou = confirm("Você realmente deseja remover este usuário?");
    if(!confirmou) event.preventDefault();
}
