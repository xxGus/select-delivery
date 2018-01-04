var selectPizza = document.getElementById('select-pizza');
var selectProduto = document.getElementById('select-produto');

var resumoPizza = document.getElementById('resumo-pizza');
var resumoProduto = document.getElementById('resumo-produto');

var qtdPizza = document.getElementById('qtd-pizza');
var qtdProduto = document.getElementById('qtd-produto');

var comentario = document.getElementById('comentario');

var remover = document.getElementById('remover');

var totalPagar = document.getElementById('total-pagar');
var valor = 0;
var subValor = 0;

function adicionar(slct, table, qtd) {
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
        newRow.insertCell(2).innerHTML = qtd.value;
        newRow.insertCell(3).appendChild(chk);

        table.appendChild(newRow);

        // console.log(totalPagar.textContent);

        if (totalPagar.textContent == '') valor = 0;

        valor = valor + (slct.value * qtd.value);

        totalPagar.innerHTML = valor;
    }
}

remover.onclick = function () {
    try {
        // obtendo os checkboxes:
        var checkboxes = document.getElementsByName('chk-remover');
        var linhasMarcadas = false;

        // console.log(checkboxes.length);

        console.log(resumoPizza.rows.length);
        console.log(resumoPizza.rows[0].id);
        for (i = checkboxes.length - 1; i >= 0; i--)
            if (checkboxes[i].checked) {

                for (j= resumoPizza.rows.length -1  ; j>=0; j--){
                    if (resumoPizza.rows[j].id == checkboxes[i].value){
                        subValor = subValor + (resumoPizza.rows[j].children[1].innerHTML * resumoPizza.rows[j].children[2].innerHTML);
                        console.log(subValor);
                    }

                    if (resumoProduto.rows[j].id == checkboxes[i].value){
                        subValor = subValor + (resumoProduto.rows[j].children[1].innerHTML * resumoProduto.rows[j].children[2].innerHTML);
                    }
                }

                document.getElementById(checkboxes[i].value).remove();
                linhasMarcadas = true;
            }


        // se o usuario nao marcou nenhuma linha
        if (!linhasMarcadas)
            alert('Marque as linhas que deseja remover!');

    } catch (erro) {
        // tratando o erro se nao tiver mais linhas
        //se quiser o alerta do erro: alert(erro);
    }
}

var tipoPagamento = document.getElementById('tipo-pagamento');
var pagSelected = document.getElementById('tipo-pag-selected');

tipoPagamento.onclick = function (ev) {
    pagSelected.innerHTML = "";
    if (tipoPagamento.value != '') {
        pagSelected.innerHTML = tipoPagamento.options[tipoPagamento.selectedIndex].text;
    }
};

