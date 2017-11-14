<?php

namespace modelo;

class Pizza{
  private $id;
  private $nome;
  private $sabor;
  private $valor;
  
  public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getSabor(){
		return $this->sabor;
	}

	public function setSabor($sabor){
		$this->sabor = $sabor;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}
}