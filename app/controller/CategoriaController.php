<?php

class CategoriaController
{

    public function abrirCadastro()
    {
        include "../../app/model/Categoria.php";
        $categ = new Categoria();

        $dadosCateg = $categ->consultarCategorias();
        include_once "../../app/view/admin/GerenciarCategoria.php";
    }

    public function gerenciarCategoria()
    {
        include "../../app/model/Categoria.php";
        $categ = new Categoria();

        if (isset($_POST["nome_categoria"]))
            $categ->nome_categoria = $_POST["nome_categoria"];
        else {
            echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    icon: 'error',
                    iconColor: '#dc3545',
                    title: 'Erro!',
                    text: 'É necessário informar um nome para a categoria.',
                    confirmButtonColor: '#7166f0',
                    onClose: () => {
                        window.history.back();
                    }
                });
                </script>";
            exit();
        }

        if (empty($_POST["cod_categoria"])) {
            if ($categ->verificarCategoria()) {
                echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    icon: 'error',
                    iconColor: '#dc3545',
                    title: 'Oops...',
                    text: 'Esta categoria já está cadastrada em nosso sistema!',
                    confirmButtonColor: '#7166f0',
                    onClose: () => {
                        window.history.back();
                    }
                });
                </script>";
            } else {
                $categ->cadastrarCategoria();

                echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    title:'Salvou!',
                    text:'Dados cadastrados com sucesso.',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=CategoriaController&metodo=abrirCadastro';
                    }
                });
                </script>";
            }
        } else {
            $categ->cod_categoria  = $_POST["cod_categoria"];
            if ($categ->verificarCategoria()) {
                echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    icon: 'error',
                    iconColor: '#dc3545',
                    title: 'Oops...',
                    text: 'Esta categoria já está cadastrada em nosso sistema!',
                    confirmButtonColor: '#7166f0',
                    onClose: () => {
                        window.history.back();
                    }
                });
                </script>";
            } else {
                $categ->atualizarCategoria();

                echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    title:'Salvou!',
                    text:'Dados alterados com sucesso.',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=CategoriaController&metodo=abrirCadastro';
                    }
                });
                </script>";
            }
        }
    }

    public function abrirAtualizacao()
    {
        include "../../app/model/Categoria.php";
        $categ = new Categoria();

        $dadosCateg = $categ->consultarCategorias();

        if (isset($_GET["cod_categoria"])) {
            $categ->cod_categoria = $_GET["cod_categoria"];
            $dadosCategCod = $categ->consultarCategoriaCod();
        }

        include_once "../../app/view/admin/GerenciarCategoria.php";
    }

    public function excluirCategoria()
    {
        if (isset($_GET["cod_categoria"])) {
            include "../../app/model/Categoria.php";
            $categ = new Categoria();

            include "../../app/model/Produto.php";
            $prod = new Produto();

            $prod->cod_categoria = $_GET["cod_categoria"];
            $categ->cod_categoria = $_GET["cod_categoria"];

            $dadosProd = $prod->consultarProdutoPorCategoria();

            if (!empty($dadosProd)) {
                include_once "../../app/model/Imagem.php";
                $img = new Imagem();

                foreach ($dadosProd as $produto) {
                    $img->cod_produto = $produto->cod_produto;
                    $dadosImg = $img->consultarImagensCodProd();

                    if (!empty($dadosImg)) {
                        foreach ($dadosImg as $imagem) {
                            if (is_file("../assets/images/produtos/$imagem->nome_imagem"))
                                unlink("../assets//images/produtos/$imagem->nome_imagem");

                            $img->cod_imagem = $imagem->cod_imagem;
                            $img->excluirImagem();
                        }
                    }
                    $prod->cod_produto = $produto->cod_produto;
                    $prod->excluirProduto();
                }
            }

            $categ->excluirCategoria();

            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
                Swal.fire({
                    title:'Categoria excluída com sucesso!',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=CategoriaController&metodo=abrirCadastro';
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
                text: 'Não foi possível exluír a categoria.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
        }
    }
}