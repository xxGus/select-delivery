<?php

session_start();

require_once "../../libs/raelgc/view/Template.php";

use raelgc\view\Template;

$pagina = new Template("../html/base.html");

$pagina->addFile("CONTEUDO", "../html/login.html");

$pagina->show();