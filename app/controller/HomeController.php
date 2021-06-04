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
}
