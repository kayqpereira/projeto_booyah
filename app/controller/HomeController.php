<?php

class HomeController
{
    function abrirHome()
    {
        include "../../app/model/Produto.php";
        $prod = new Produto();
        $dadosProd = $prod->consultarProdutos();

        include "../../app/model/Cliente.php";
        $cli = new Cliente();
        $dadosCli = $cli->consultarClientes();

        include "../../app/model/Venda.php";
        $vend = new Venda();
        $dadosVend = $vend->consultarVendas();

        include_once "../../app/view/admin/Home.php";
    }

    function abrirPrincipal()
    {
        session_start();

        include "../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include "../app/model/Categoria.php";
        $categ = new Categoria();
        $dadosCateg = $categ->consultarCategorias();

        include_once "../app/view/cliente/Home.php";
    }
}
