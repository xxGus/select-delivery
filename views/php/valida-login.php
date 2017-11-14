<?php

    $nomeEsperado = "admin";
    $senhaEsperada = "admin";

    $nome = $_POST["txtNick"];
    $senha = $_POST["txtSenha"];
    
    if($nomeEsperado == $nome and $senhaEsperada==$senha){
        header('Location: area-usuario.php');
    }else{
        header('Location: login.php');
    }
/*
    echo "Nickname: $nome";
    echo "Senha: $senha"; */
