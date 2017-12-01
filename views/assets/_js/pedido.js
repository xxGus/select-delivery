var selectPizza = document.getElementById('select-pizza');
var selectProduto = document.getElementById('select-produto');

var addPizza = document.getElementById('add-pizza');
var addProduto = document.getElementById('add-produto');

var resumoPizza = document.getElementById('resumo-pizza');
var resumoProduto = document.getElementById('resumo-produto');

addPizza.onclick = function (ev) {
    if(selectPizza.value != 0){
        var newRow = document.createElement('tr');
        var btnRemover = document.createElement('button');

        btnRemover.value = newRow.rowIndex;
        btnRemover.textContent = 'remover';

        btnRemover.onclick = function (ev2) {
            resumoPizza.deleteRow(btnRemover.value);
        };

        newRow.insertCell(0).innerHTML = selectPizza.options[selectPizza.selectedIndex].text;
        newRow.insertCell(1).innerHTML = selectPizza.value;
        newRow.insertCell(2).appendChild(btnRemover);
        resumoPizza.appendChild(newRow);
    }
};

addProduto.onclick = function (ev) {
    if (selectProduto.value != ""){
        var newRow = document.createElement('tr');
        var btnRemover = document.createElement('button');

        btnRemover.value = newRow.rowIndex;
        btnRemover.textContent = 'remover';

        btnRemover.onclick = function (ev2) {
            resumoProduto.deleteRow(btnRemover.value);
        };

        newRow.insertCell(0).innerHTML = selectProduto.options[selectProduto.selectedIndex].text;
        newRow.insertCell(1).innerHTML = selectProduto.value;
        newRow.insertCell(2).appendChild(btnRemover);
        resumoProduto.appendChild(newRow);
    }
}