<?php

namespace control\dao;

require_once("ConnectionFactory.php");

use dao\ConnectionFactory;
use modelo\Pizza;
use PDO;

class PizzaDao
{

    public function cadastrar(Pizza $pizza)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();


        $query = "insert into pizza(nome, sabor, valor) values(?, ?, ?)";
        $resultado = $pdo->prepare($query);

        return ($resultado->execute(array(
            $pizza->getNome(),
            $pizza->getSabor(),
            $pizza->getValor()))
        );

    }

    public function buscar(Pizza $pizza)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();

        $query = "select * from pizza where id = ?";

        $resultado = $pdo->prepare($query);
        $resultado->execute(array(
            $pizza->getId())
        );

        $pizzaDB = $resultado->fetch(PDO::FETCH_OBJ);

        $pizza->setNome($pizzaDB->nome);
        $pizza->setValor($pizzaDB->valor);
        $pizza->setSabor($pizzaDB->sabor);

        return $pizza;
    }

    public function alterar(Pizza $pizza)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "update pizza set nome='{$pizza->getNome()}', sabor='{$pizza->getSabor()}', valor='{$pizza->getValor()}' where id='{$pizza->getId()}'";
        $resultado = $pdo->prepare($query);
        return $resultado->execute();
    }

    public function remover(Pizza $pizza)
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "delete from pizza where id='{$pizza->getId()}'";
        $resultado = $pdo->prepare($query);
        return $resultado->execute();
    }

    public function listar()
    {
        $connectionFactory = new ConnectionFactory();
        $pdo = $connectionFactory->getConnection();
        $query = "select * from pizza";
        $pizzas = [];
        $resultado = $pdo->prepare($query);
        $resultado->execute();

        while ($pizza = $resultado->fetch(PDO::FETCH_OBJ)) {

            $objPizza = new Pizza();
            $objPizza->setId($pizza->id);
            $objPizza->setNome($pizza->nome);
            $objPizza->setValor($pizza->valor);
            $objPizza->setSabor($pizza->sabor);

            array_push($pizzas, $objPizza);
        }
        return $pizzas;
    }

}


