var selectPizza = document.getElementById('select-pizza');
var selectProduto = document.getElementById('select-produto');

var resumoPizza = document.getElementById('resumo-pizza');
var resumoProduto = document.getElementById('resumo-produto');

var qtdPizza = document.getElementById('qtd-pizza');
var qtdProduto = document.getElementById('qtd-produto');

var comentario = document.getElementById('comentario');

var totalPagar = document.getElementById('total-pagar');
var valor = 0;
var subValor = 0;

function adicionar(slct, table, qtd) {
    if (slct.value != 0) {

        var newId = Math.floor((Math.random() * 99999) + 1);
        var newRow = document.createElement('tr');
        newRow.id = 'linha' + newId;

        var button = document.createElement('button');
        button.name = 'btn-remover';
        button.textContent = 'remover';

        newRow.insertCell(0).innerHTML = slct.options[slct.selectedIndex].text;
        newRow.insertCell(1).innerHTML = slct.value;
        newRow.insertCell(2).innerHTML = qtd.value;
        newRow.insertCell(3).appendChild(button);

        table.appendChild(newRow);

        // console.log(totalPagar.textContent);

        if (totalPagar.textContent == '') valor = 0;
        valor = valor + (slct.value * qtd.value);

        button.onclick = function (ev) {
            btn = document.getElementById('linha' + newId);
            if (valor > 0){
                valor = valor - (btn.childNodes[1].textContent * btn.childNodes[2].textContent);
                totalPagar.innerHTML = valor;
                document.getElementById('linha'+newId).remove();
            }
        };

        totalPagar.innerHTML = valor;
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

