var selectPizza = document.getElementById('select-pizza');
var selectProduto = document.getElementById('select-produto');

var addPizza = document.getElementById('add-pizza');
var addProduto = document.getElementById('add-produto');

var resumoPizza = document.getElementById('resumo-pizza');
var resumoProduto = document.getElementById('resumo-produto');

var comentario = document.getElementById('comentario');

var remover = document.getElementById('remover');

function adicionar(slct, table) {
    if (slct.value != 0) {

        var newId = Math.floor((Math.random() * 99999) + 1);
        var newRow = document.createElement('tr');
        newRow.id = 'linha' + newId;

        var chk = document.createElement('input');
        chk.type = 'checkbox';
        chk.name = 'chk-remover';
        chk.value = 'linha' + newId;

        newRow.insertCell(0).innerHTML = slct.options[slct.selectedIndex].text;
        newRow.insertCell(1).innerHTML = slct.value;
        newRow.insertCell(2).appendChild(chk);
        table.appendChild(newRow);
    }
}


remover.onclick = function () {
    try {
        var qntLinhas = resumoPizza.rows.length;

        // obtendo os checkboxes:
        var checkboxes = document.getElementsByName('chk-remover');
        var linhasMarcadas = false;

        console.log(checkboxes.length);

        for (i = checkboxes.length - 1; i >= 0; i--)
            if (checkboxes[i].checked) {

                document.getElementById(checkboxes[i].value).remove();

                linhasMarcadas = true;
            }

        // obtendo a quantidade de linhas restantes
        qntLinhas = resumoPizza.rows.length;

        // se o usuario nao marcou nenhuma linha
        if (!linhasMarcadas && qntLinhas)
            alert('Marque as linhas que deseja remover!');

    } catch (erro) {
        // tratando o erro se nao tiver mais linhas
        //se quiser o alerta do erro: alert(erro);
    }
}

//addProduto.onclick = adicionar(resumoProduto, selectProduto);

// function adicionar() {
//
//     // var qntLinhas = tabela.rows.length;
//
//     // var novaLinha = tabela.insertRow(qntLinhas);
//
//     var novaLinha = document.createElement('tr');
//
//     var novoId = Math.floor((Math.random()*99999)+1);
//
//     novaLinha.id = 'linha'+novoId;
//
//     console.log(novaLinha);
//
//     // var coluna1 = novaLinha.insertCell(0);
//     // var coluna2 = novaLinha.insertCell(1);
//     // var coluna3 = novaLinha.insertCell(2);
//
//     coluna1.innerHTML = selectPizza.options[selectPizza.selectedIndex].text;
//     coluna2.innerHTML = selectPizza.value;
//
//     var chk = document.createElement('input');
//     chk.type  = 'checkbox';
//     chk.id  = 'chk-remover';
//     chk.value = 'linha'+novoId;
//
//     // coluna3.appendChild(chk);
// };


var tipoPagamento = document.getElementById('tipo-pagamento');
var pagSelected = document.getElementById('tipo-pag-selected');

tipoPagamento.onclick = function (ev) {
    if (tipoPagamento.value != '') {
        pagSelected.innerHTML = tipoPagamento.options[tipoPagamento.selectedIndex].text;
    }
};