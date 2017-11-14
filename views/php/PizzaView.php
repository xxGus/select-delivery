<?php

session_start();

require_once "../../libs/raelgc/view/Template.php";
require_once "../../control/PizzaCtrl.php";

use control\PizzaCtrl;
use raelgc\view\Template;

$pagina = new Template("../html/base.html");

$pagina->addFile("CONTEUDO", "../html/PizzaView.html");

$objPizzaCtrl = new PizzaCtrl();

if (isset($_POST['bto-cadastrar'])) {

    $nome = $_POST['nome'];
    $sabor = $_POST['sabor'];
    $valor = $_POST['valor'];

    $mensagem = $objPizzaCtrl->cadastrar($nome, $sabor, $valor);

    if (!is_null($mensagem)) {
        $pagina->AVISO = $mensagem;
    }
}

if (isset($_GET['id'])){
    $pizza = $objPizzaCtrl->buscar($_GET['id']);

    $pagina->ID = $pizza->getId();
    $pagina->VALUE_NOME = $pizza->getNome();
    $pagina->VALUE_SABOR = $pizza->getSabor();
    $pagina->VALUE_VALOR = $pizza->getValor();
}


$pizzas = $objPizzaCtrl->listar();

foreach ($pizzas as $pizza){
    $pagina->ID_PIZZA = $pizza->getId();
    $pagina->PIZZA = $pizza->getNome();
    $pagina->SABOR = $pizza->getSabor();
    $pagina->VALOR = $pizza->getValor();
    $pagina->block("BLOCK_DADOS");
}

$pagina->show();

