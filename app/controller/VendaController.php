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
        if (!isset($_SESSION["codCliente"])) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Ops...',
                text: 'É necessário está logado para acessar essa área!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            exit();
        }
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

    public function finalizarPedido()
    {
        session_start();
        if (!isset($_SESSION["codCliente"])) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Ops...',
                text: 'É necessário está logado para efetuar o pedido!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            exit();
        } elseif (!isset($_SESSION["produtos"])) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Ops...',
                text: 'Adicione itens ao seu carrinho primeiro!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            exit();
        }

        include "../app/model/Venda.php";
        $vend = new Venda();

        $vend->cod_cliente   = $_SESSION["codCliente"];
        $vend->frete         = 0;
        $vend->data_venda    = date("Y-m-d");
        $vend->hora          = date("Y-m-d");
        $vend->forma_pag     = $_POST["forma_pag"];
        $vend->meio_entrega  = $_POST["meio_entrega"];

        $codVenda = $vend->cadastrarVenda();

        include "../app/model/Item.php";
        $item = new Item();

        include "../app/model/Produto.php";
        $prod = new Produto();

        foreach ($_SESSION["produtos"] as $produto) {
            $prod->cod_produto  = $produto;
            $dadosProd          = $prod->consultarProdutoCod();

            $item->cod_venda    = $codVenda;
            $item->cod_produto  = $produto;
            $item->preco        = $dadosProd->preco;
            $item->quantidade   = $_SESSION["quantidade"][$produto];
            $item->cadastrarItem();

            $prod->cod_produto     = $dadosProd->cod_produto;
            $prod->cod_categoria   = $dadosProd->cod_categoria;
            $prod->cod_marca       = $dadosProd->cod_marca;
            $prod->nome_produto    = $dadosProd->nome_produto;
            $prod->estoque         = $dadosProd->estoque - $_SESSION["quantidade"][$produto];
            $prod->preco           = $dadosProd->preco;
            $prod->destaque        = $dadosProd->destaque;
            $prod->ativo           = $dadosProd->ativo;
            $prod->descricao       = $dadosProd->descricao;
            $prod->atualizarProduto();

            unset($_SESSION["produtos"][$produto]);
            unset($_SESSION["quantidade"][$produto]);
            unset($_SESSION["estoque"][$produto]);
        }

        echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
                Swal.fire({
                    title:':)',
                    text:'Pedido realizado com sucesso',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=HomeController&metodo=abrirPrincipal';
                    }
                });
            </script>";
    }
}
