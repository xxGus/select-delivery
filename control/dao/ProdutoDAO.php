<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 30/09/2017
 * Time: 03:45
 */

namespace control\dao;

require_once("ConnectionFactory.php");

use dao\ConnectionFactory;
use modelo\Produto;
use PDO;


class ProdutoDAO
{
    public function cadastrar(Produto $produto)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();


        $query = "insert into produtos(nome, valor) values(?, ?)";
        $resultado = $pdo->prepare($query);

        return ($resultado->execute(array(
            $produto->getNome(),
            $produto->getValor()))
        );
    }

    public function buscar(Produto $produto)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "select * from produtos where id = ?";
        $resultado = $pdo->prepare($query);
        $resultado->execute(array(
            $produto->getId()
        ));


        $produtoDB = $resultado->fetch(PDO::FETCH_OBJ);

        $produto->setNome($produtoDB->nome);
        $produto->setValor($produtoDB->valor);

        return $produto;
    }

    public function alterar(Produto $produto)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "update produtos set nome = ?, valor = ? where id = ?";
        $resultado = $pdo->prepare($query);
        return $resultado->execute(array(
            $produto->getNome(),
            $produto->getValor(),
            $produto->getId()
        ));
    }

    public function remover(Produto $produto)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "delete from produtos where id='{$produto->getId()}'";
        $resultado = $pdo->prepare($query);
        return $resultado->execute();
    }

    public function listar()
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "select * from produtos";
        $produtos = [];
        $resultado = $pdo->prepare($query);
        $resultado->execute();
        while ($produto = $resultado->fetch(PDO::FETCH_OBJ)) {

            $objProduto = new Produto();
            $objProduto->setId($produto->id);
            $objProduto->setNome($produto->nome);
            $objProduto->setValor($produto->valor);

            array_push($produtos, $objProduto);
        }
        return $produtos;
    }

}