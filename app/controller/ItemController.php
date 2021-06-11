<?php

class ItemController
{
    public function abrirConsulta()
    {
        if (!isset($_GET["cod_venda"])) {
            $fallback = "index.php?classe=HomeController&metodo=abrirHome";
            $anterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $fallback;
            header("location: {$anterior}");
            exit();
        }

        include "../../app/model/Produto.php";
        $prod = new Produto();

        include "../../app/model/Item.php";
        $item = new Item();

        $item->cod_venda = $_GET["cod_venda"];
        $dadosItem = $item->consultarItensCodVenda();

        include_once "../../app/view/admin/ConsultarItens.php";
    }

    public function abrirItensDoPedido()
    {
        session_start();
        if (!isset($_GET["cod_venda"])) {
            $fallback = "index.php?classe=HomeController&metodo=abrirPrincipal";
            $anterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $fallback;
            header("location: {$anterior}");
            exit();
        }

        include "../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include "../app/model/Categoria.php";
        $categ = new Categoria();
        $dadosCateg = $categ->consultarCategorias();

        include "../app/model/Produto.php";
        $prod = new Produto();

        include "../app/model/Item.php";
        $item = new Item();

        $item->cod_venda = $_GET["cod_venda"];
        $dadosItem = $item->consultarItensCodVenda();

        include_once "../app/view/cliente/ItensDoPedido.php";
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

        include_once "../app/view/cliente/Carrinho.php";
    }

    function adicionarItem()
    {
        session_start();
        if (!isset($_GET["cod_produto"])) {
            $fallback = "index.php?classe=HomeController&metodo=abrirPrincipal";
            $anterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $fallback;
            header("location: {$anterior}");
            exit();
        }

        include "../app/model/Produto.php";
        $prod = new Produto();

        $prod->cod_produto = $_GET["cod_produto"];
        $dadosProd   = $prod->consultarProdutoCod(false);
        $codProduto  = $_GET["cod_produto"];
        $estoque     = $dadosProd->estoque;

        if (!isset($_SESSION["produtos"])) {
            $_SESSION["produtos"] = array();
            $_SESSION["quantidade"] = array();
            $_SESSION["estoque"] = array();
        }

        if (in_array($codProduto, $_SESSION["produtos"])) {
            if ($_SESSION["estoque"][$codProduto] > 0) {
                $_SESSION["quantidade"][$codProduto] += 1;
                $_SESSION["estoque"][$codProduto]--;
            } else {
                echo "<script>
                        alert('Valor maior que o disponível');
                        window.location='index.php?classe=ItemController&metodo=abrirCarrinho';
                    </script>";
                exit();
            }
        } else {
            if ($estoque > 0) {
                $_SESSION["produtos"][$codProduto] = $codProduto;
                $_SESSION["quantidade"][$codProduto] = 1;
                $_SESSION["estoque"][$codProduto] = $estoque - 1;
            } else {
                echo "<script>
                        alert('Valor maior que o disponível');
                        window.location='index.php?classe=ItemController&metodo=abrirCarrinho';
                    </script>";
                exit();
            }
        }

        header("Location:index.php?classe=ItemController&metodo=abrirCarrinho");
    }

    function excluirItem()
    {
        session_start();
        $codProduto = $_GET["cod_produto"];
        unset($_SESSION["produtos"][$codProduto]);
        unset($_SESSION["quantidade"][$codProduto]);
        unset($_SESSION["estoque"][$codProduto]);

        header("Location:index.php?classe=ItemController&metodo=abrirCarrinho");
    }
}
