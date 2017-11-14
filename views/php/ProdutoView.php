<?php

session_start();

require_once "../../libs/raelgc/view/Template.php";
require_once "../../control/ProdutoCtrl.php";

use control\ProdutoCtrl;
use raelgc\view\Template;

$pagina = new Template("../html/base.html");

$pagina->addFile("CONTEUDO", "../html/Produto/CadastrarProdutoView.html");


$objProdutoCtrl = new ProdutoCtrl();

if (isset($_POST['cadastrar'])) {


    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    $mensagem = $objProdutoCtrl->cadastrar($nome, $valor);

    if (!is_null($mensagem)) {
        $pagina->AVISO = $mensagem;
    }
}

$pagina->show();
