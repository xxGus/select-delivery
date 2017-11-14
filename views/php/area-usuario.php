<?php

session_start();

require_once "../../libs/raelgc/view/Template.php";

use raelgc\view\Template;

$pagina = new Template("../html/base.html");

$pagina->addFile("CONTEUDO", "../html/area-usuario.html");

$pagina->show();
