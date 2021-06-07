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

        include "../app/model/Produto.php";
        $prod = new Produto();
        $dadosProd = $prod->consultarProdutosAtivos();

        include_once "../app/view/cliente/Home.php";
    }

    public function abrirProduto()
    {
        session_start();

        if (!isset($_GET["cod_produto"])) {
            $fallback = "index.php?classe=HomeController&metodo=abrirHome";
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
        $prod->cod_produto = $_GET["cod_produto"];
        $dadosProd = $prod->consultarProdutoCod();

        include "../app/model/Imagem.php";
        $img = new Imagem();
        $img->cod_produto = $_GET["cod_produto"];
        $dadosImg = $img->consultarImagensCodProd();

        include_once "../app/view/cliente/PaginaProduto.php";
    }

    function abrirPesquisa()
    {
        session_start();

        include "../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include "../app/model/Categoria.php";
        $categ = new Categoria();
        $dadosCateg = $categ->consultarCategorias();

        include "../app/model/Produto.php";
        $prod = new Produto();
        $dadosProd = $prod->consultarProdutos();

        if (isset($_GET["cod_categoria"])) {
            $prod->cod_categoria = $_GET["cod_categoria"];
            $dadosProd = $prod->consultarProdutoPorCategoria();
            $consulta = "categ";
        } else if (isset($_GET["cod_marca"])) {
            $prod->cod_marca = $_GET["cod_marca"];
            $dadosProd = $prod->consultarProdutoPorCodMarca();
            $consulta = "mar";
        } else {
            $prod->nome_produto = $_POST["nome_produto"];
            $termoPesquisado = $_POST["nome_produto"];
            $dadosProd = $prod->consultarProdutoPorNome();
            $consulta = "nome";
        }

        if (empty($dadosProd)) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...', 
                text: 'Nenhum registro encontrado!', 
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            exit();
        }

        include_once "../app/view/cliente/Pesquisa.php";
    }
}
