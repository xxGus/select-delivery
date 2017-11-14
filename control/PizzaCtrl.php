<?php

namespace control;

require_once "dao/PizzaDAO.php";
require_once __DIR__ . "/../modelo/Pizza.php";

use modelo\Pizza;
use control\dao\PizzaDao;
use Exception;


class PizzaCtrl
{

    public function cadastrar($nome, $sabor, $valor)
    {
        $pizza = new Pizza();
        $objPizzaDao = new PizzaDAO();

        $pizza->setNome($nome);
        $pizza->setSabor($sabor);
        $pizza->setValor($valor);


        $mensagem = "";

        if ($objPizzaDao->cadastrar($pizza)) {
            $mensagem = "<p class='alert-success' style='text-align: center'>Pizza Cadastrada com sucesso!</p>";
        } else {
            $mensagem = "<p class='alert-danger' style='text-align: center'>Não foi possível cadastrar a pizza, tente novamente.</p>";
        }

        return $mensagem;
    }

    public function buscar($id)
    {
        try {
            $pizza = new Pizza();
            $objPizzaDao = new PizzaDAO();
            $pizza->setId($id);

            return ($objPizzaDao->buscar($pizza));
        } catch (Exception $exception) {
            echo "Erro: " . $exception->getMessage();
        }

    }

    public function alterar($id, $nome, $sabor, $valor)
    {
        try {
            $pizza = new Pizza();
            $pizzaDao = new PizzaDao();

            $pizza->setId($id);
            $pizza->setNome($nome);
            $pizza->setSabor($sabor);
            $pizza->setValor($valor);

            $pizzaDao->alterar($pizza);

        } catch (Exception $exception) {
            echo "Erro: " . $exception->getMessage();
        }
    }

    public function remover($id)
    {
        try {
            $pizza = new Pizza();
            $pizzaDao = new PizzaDao();
            $pizza->setId($id);
            $pizzaDao->remover($pizza);
        }catch (Exception $exception){
            echo "Erro: " . $exception->getMessage();
        }
    }

    public function listar()
    {
        try {
            $pizzaDao = new PizzaDao();
            return $pizzaDao->listar();
        } catch (Exception $exception) {
            echo "Erro: " . $exception->getMessage();
        }
    }
}