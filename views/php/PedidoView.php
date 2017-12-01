<?php
/**
 * Created by Gustavo Baptista.
 * User: Gustavo
 * Date: 15/11/2017
 * Time: 13:53
 */

session_start();

require_once "../../libs/raelgc/view/Template.php";
require_once __DIR__ . "/../../control/PizzaCtrl.php";
require_once __DIR__ . "/../../control/ProdutoCtrl.php";

use raelgc\view\Template;
use control\PizzaCtrl;
use control\ProdutoCtrl;

$pagina = new Template("../html/base.html");
$pizza = new PizzaCtrl();
$produto = new ProdutoCtrl();

$pagina->addFile("CONTEUDO", "../html/PedidoView.html");

$pizzas = $pizza->listar();

foreach ($pizzas as $pz){
    $pagina->VALOR_PIZZA = $pz->getValor();
    $pagina->PIZZA = $pz->getNome();
    $pagina->block("BLOCK_PIZZA");
}

$produtos = $produto->listar();

foreach ($produtos as $pt){
    $pagina->VALOR_PRODUTO = $pt->getValor();
    $pagina->PRODUTO = $pt->getNome();
    $pagina->block("BLOCK_PRODUTO");
}

$pagina->show();