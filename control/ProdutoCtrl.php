<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 30/09/2017
 * Time: 03:43
 */

namespace control;

require_once "dao/ProdutoDAO.php";
require_once "../../modelo/Produto.php";

use modelo\Produto;
use control\dao\ProdutoDAO;

class ProdutoCtrl
{
    public function cadastrar($nome, $valor)
    {
        $produto = new Produto();
        $objProdutoDao = new ProdutoDAO();

        $produto->setNome($nome);
        $produto->setValor($valor);


        $mensagem = "";

        if ($objProdutoDao->cadastrar($produto)) {
            $mensagem = "<p class='alert-success' style='text-align: center'>Produto Cadastrada com sucesso!</p>";
        } else {
            $mensagem = "<p class='alert-danger' style='text-align: center'>Não foi possível cadastrar o produto, tente novamente.</p>";
        }

        return $mensagem;
    }

    public function buscar($id)
    {
        try {
            $produto = new Produto();
            $objProdutoDao = new ProdutoDAO();
            $produto->setId($id);

            return ($objProdutoDao->buscar($produto));
        } catch (Exception $exception) {
            echo "Erro: " . $exception->getMessage();
        }

    }

    public function alterar($id, $nome, $valor)
    {
        $produto = new Produto();
        $objProdutoDao = new ProdutoDAO();

        $produto->setId($id);
        $produto->setNome($nome);
        $produto->setValor($valor);

        $mensagem = "";

        $objProdutoDao->alterar($produto)
            ? $mensagem = "<p class='alert-success' style='text-align: center'>Produto Alterado com sucesso!</p>"
            : $mensagem = "<p class='alert-danger' style='text-align: center'>Não foi possível alterar a produto, tente novamente.</p>";

        return $mensagem;
    }

    public function remover($id)
    {
        try {
            $produto = new Produto();
            $produtoDao = new ProdutoDao();
            $produto->setId($id);
            $produtoDao->remover($produto);
        }catch (Exception $exception){
            echo "Erro: " . $exception->getMessage();
        }
    }

    public function listar()
    {
        try {
            $produtoDao = new ProdutoDao();
            return $produtoDao->listar();
        } catch (Exception $exception) {
            echo "Erro: " . $exception->getMessage();
        }
    }
}