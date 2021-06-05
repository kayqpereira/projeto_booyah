<?php

class ItemController
{
    public function abrirConsulta()
    {
        if (isset($_GET["cod_venda"])) {
            include "../../app/../app/model/Item.php";
            $item = new Item();

            $item->cod_venda = $_GET["cod_venda"];
        }

        $dadosItem = $item->consultarItensPorCodVenda();

        include_once "../../app/view/admin/ConsultarItens.php";
    }

    function abrirCarrinho()
    {
        session_start();

        include_once "../app/model/Categoria.php";
        $categ = new Categoria();
        $dadosCateg = $categ->consultarCategorias();

        include "../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include_once "../app/model/Produto.php";
        $prod = new Produto();

        $itensCarrinho = 0;
        if (isset($_SESSION["produtos"])) {
            $itensCarrinho = count($_SESSION["produtos"]);
        }

        include_once "../app/view/cliente/Carrinho.php"; //incluir o arquivo home (CLIENTE)
    }

    function finalizar()
    {
        session_start();

        $itensCarrinho = 0;
        if (isset($_SESSION["produtos"])) {
            $itensCarrinho = count($_SESSION["produtos"]);
        }

        include_once "view_cliente/Finalizar.php"; //incluir o arquivo home (ADM)
    }

    function adicionar()
    {
        session_start();
        if (!isset($_SESSION["produtos"])) //criar apenas uma vez o vetor em sessão
        {
            $_SESSION["produtos"] = array(); //armazenar o código do produto
            $_SESSION["quantidade"] = array(); //armazenar a quantidade
        }

        //adicionar ao vetor
        $codproduto = $_GET["codproduto"];
        if (in_array($codproduto, $_SESSION["produtos"])) //existe o código no vetor?
        {
            $_SESSION["quantidade"][$codproduto] += 1;
        } else {
            $_SESSION["produtos"][$codproduto] = $codproduto;
            $_SESSION["quantidade"][$codproduto] = 1;
        }

        header("Location:index.php?classe=ItemController&metodo=abrirCarrinho");
    }

    function excluir()
    {
        session_start();
        $codproduto = $_GET["codproduto"];
        unset($_SESSION["produtos"][$codproduto]);
        unset($_SESSION["quantidade"][$codproduto]);

        //direcionar para o carrinho
        header("Location:index.php?classe=ItemController&metodo=abrirCarrinho");
    }

    function cadastrarItens()
    {
        session_start();
        //código para cadastrar a venda e receber o código gerado para esta venda
        foreach ($_SESSION["produtos"] as $key => $value) {
            //código para gravar os ítens desta venda
            echo "Produto: $value<br>";
            echo "Quantidade: " . $_SESSION["quantidade"][$value];
            echo "<hr>";
        }
    }
}
