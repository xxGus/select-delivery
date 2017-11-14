<?php

namespace modelo;

class Cliente{
    private $telefone;
    private $nome;
    private $local;
    private $numero;
    private $complemento;
    
    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getNome(){
       return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getLocal(){
      return $this->local;
    }

    public function setLocal($local){
        $this->local = $local;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getComplemento(){
        return $this->complemento;
    } 

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }
}