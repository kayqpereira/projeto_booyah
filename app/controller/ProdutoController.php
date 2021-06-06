<?php

class ProdutoController
{
    public function abrirCadastro()
    {
        include "../../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include "../../app/model/Categoria.php";
        $categ = new Categoria();
        $dadosCateg = $categ->consultarCategorias();

        include_once "../../app/view/admin/CadastroProduto.php";
    }

    public function abrirAtualizacao()
    {
        if (isset($_GET["cod_produto"])) {
            include "../../app/model/Produto.php";
            $prod = new Produto();

            include "../../app/model/Marca.php";
            $mar = new Marca();
            $dadosMar = $mar->consultarMarcas();

            include "../../app/model/Categoria.php";
            $categ = new Categoria();
            $dadosCateg = $categ->consultarCategorias();

            $prod->cod_produto = $_GET["cod_produto"];
            $dadosProd = $prod->consultarProdutoCod();

            include_once "../../app/view/admin/AtualizarProduto.php";
        }
    }

    public function abrirConsulta()
    {
        include "../../app/model/Produto.php";
        $prod = new Produto();
        $dadosProd = $prod->consultarProdutos();

        include_once "../../app/view/admin/ConsultarProduto.php";
    }

    public function cadastrarProduto()
    {
        include "../../app/model/Produto.php";
        $prod = new Produto();

        if (empty($_POST["descricao"])) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                text: 'Informe uma descrição para o produto.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $prod->cod_categoria   = $_POST["cod_categoria"];
        $prod->cod_marca       = $_POST["cod_marca"];
        $prod->nome_produto    = $_POST["nome_produto"];
        $prod->estoque         = $_POST["estoque"];
        $prod->preco           = $_POST["preco"];
        $prod->destaque        = $_POST["destaque"];
        $prod->ativo           = $_POST["ativo"];
        $prod->descricao       = $_POST["descricao"];

        if ($prod->verificarProduto()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                html: '<strong>$prod->nome_produto</strong> já cadastrado em nosso sistema!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $prod->cadastrarProduto();

        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Salvou!',
            text:'Cadastro concluído com sucesso.',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:1500,
            onClose: () => {
                window.location='index.php?classe=ProdutoController&metodo=abrirCadastro';
            }
        });
        </script>";
    }

    public function excluirProduto()
    {
        if (isset($_GET["cod_produto"])) {
            include "../../app/model/Produto.php";
            $prod = new Produto();

            $prod->cod_produto = $_GET["cod_produto"];
            $prod->excluirProduto();

            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
                Swal.fire({
                    title:'Produto excluído com sucesso!',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=ProdutoController&metodo=abrirConsulta';
                    }
                });
            </script>";
        } else {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Erro!',
                text: 'Não foi possível exluír este produto.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
        }
    }

    public function atualizarProduto()
    {
        include "../../app/model/Produto.php";
        $prod = new Produto();

        if (empty($_POST["descricao"])) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                text: 'Informe uma descrição para o produto.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $prod->cod_produto     = $_POST["cod_produto"];
        $prod->cod_categoria   = $_POST["cod_categoria"];
        $prod->cod_marca       = $_POST["cod_marca"];
        $prod->nome_produto    = $_POST["nome_produto"];
        $prod->estoque         = $_POST["estoque"];
        $prod->preco           = $_POST["preco"];
        $prod->destaque        = $_POST["destaque"];
        $prod->ativo           = $_POST["ativo"];
        $prod->descricao       = $_POST["descricao"];

        if ($prod->verificarProduto()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                html: '<strong>$prod->nome_produto</strong> já cadastrado em nosso sistema!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $prod->atualizarProduto();

        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Salvou!',
            text:'Cadastro concluído com sucesso.',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:1500,
            onClose: () => {
                window.location='index.php?classe=ProdutoController&metodo=abrirConsulta';
            }
        });
        </script>";
    }
}
