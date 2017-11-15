<?php
/**
 * Created by Gustavo Baptista.
 * User: Gustavo
 * Date: 15/11/2017
 * Time: 13:53
 */

session_start();

require_once "../../libs/raelgc/view/Template.php";

use raelgc\view\Template;

$pagina = new Template("../html/base.html");

$pagina->addFile("CONTEUDO", "../html/pedido.html");

$pagina->show();