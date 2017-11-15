<?php

session_start();

require_once "../../libs/raelgc/view/Template.php";
require_once "../../control/ProdutoCtrl.php";

use control\ProdutoCtrl;
use raelgc\view\Template;

$pagina = new Template("../html/base.html");

$pagina->addFile("LISTA", "../html/Produto/ListarProdutoView.html");

!isset($_GET['id'])
    ? $pagina->addFile("CONTEUDO", "../html/Produto/CadastrarProdutoView.html")
    : $pagina->addFile("CONTEUDO", "../html/Produto/AlterarProdutoView.html");

$objProdutoCtrl = new ProdutoCtrl();

if (isset($_POST['bto-cadastrar'])) {

    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    $mensagem = $objProdutoCtrl->cadastrar($nome, $valor);

    if (!is_null($mensagem)) {
        $pagina->AVISO = $mensagem;
    }
}

if (isset($_GET['id'])) {
    $produto = $objProdutoCtrl->buscar($_GET['id']);

    $pagina->ID = $produto->getId();
    $pagina->VALUE_NOME = $produto->getNome();
    $pagina->VALUE_VALOR = $produto->getValor();
}

if(isset($_POST['bto-alterar'])){

    $id = $_POST['id-produto'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    $mensagem = $objProdutoCtrl->alterar($id, $nome, $valor);

    if (!is_null($mensagem)) {
        $pagina->AVISO = $mensagem;
    }
}

isset($_POST['id-remover']) ? $objProdutoCtrl->remover($_POST['id-remover']) : "Erro ao remover";

$produtos = $objProdutoCtrl->listar();

foreach ($produtos as $produto) {
    $pagina->ID_PRODUTO = $produto->getId();
    $pagina->PRODUTO = $produto->getNome();
    $pagina->VALOR = $produto->getValor();
    $pagina->block("BLOCK_DADOS");
}

$pagina->show();
