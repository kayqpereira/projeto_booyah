<?php

class VendaController
{
    public function abrirConsulta()
    {
        include "../../app/model/Venda.php";
        $vend = new Venda();
        $dadosVend = $vend->consultarVendas();

        include "../../app/controller/ClienteController.php";
        $cli = new ClienteController();

        include_once "../../app/view/admin/ConsultarVendas.php";
    }

    public function abrirMeusPedidos()
    {
        session_start();
        if (!isset($_SESSION["codCliente"]))
            exit();

        include "../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include "../app/model/Categoria.php";
        $categ = new Categoria();
        $dadosCateg = $categ->consultarCategorias();

        include "../app/model/Venda.php";
        $vend = new Venda();

        $vend->cod_cliente = $_SESSION["codCliente"];
        $dadosVend = $vend->consultarVendaCodCli();

        include "../app/controller/ClienteController.php";
        $cli = new ClienteController();

        include_once "../app/view/cliente/MeusPedidos.php";
    }

    public function cadastrarVenda()
    {
        include "../../app/model/Venda.php";
        $vend = new Venda();

        $vend->data_venda = date("Y-m-d");
        $vend->hora = date("Y-m-d");
    }
}
