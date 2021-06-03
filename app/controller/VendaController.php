<?php

class VendaController
{
    public function abrirConsulta()
    {
        include "../app/model/Venda.php";
        $vend = new Venda();
        $dadosVend = $vend->consultarVendas();

        include "../app/controller/ClienteController.php";
        $cli = new ClienteController();

        include_once "../app/view/ConsultarVendas.php";
    }

    public function cadastrarVenda()
    {
        include "../app/model/Venda.php";
        $vend = new Venda();

        $vend->data_venda = date("Y-m-d");
        $vend->hora = date("Y-m-d");
    }
}
