<?php

class MarcaController
{

    public function abrirCadastro()
    {
        include "../../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        include_once "../../app/view/admin/GerenciarMarca.php";
    }

    public function gerenciarMarca()
    {
        include "../../app/model/Marca.php";
        $mar = new Marca();

        if (isset($_POST["nome_marca"]))
            $mar->nome_marca = $_POST["nome_marca"];
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
                    text: 'É necessário informar um nome para a marca.',
                    confirmButtonColor: '#7166f0',
                    onClose: () => {
                        window.history.back();
                    }
                });
                </script>";
            return false;
        }

        if (empty($_POST["cod_marca"])) {
            if ($mar->verificarMarca()) {
                echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    icon: 'error',
                    iconColor: '#dc3545',
                    title: 'Oops...',
                    text: 'Esta marca já está cadastrada em nosso sistema!',
                    confirmButtonColor: '#7166f0',
                    onClose: () => {
                        window.history.back();
                    }
                });
                </script>";
            } else {
                $mar->cadastrarMarca();

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
                        window.location='index.php?classe=MarcaController&metodo=abrirCadastro';
                    }
                });
                </script>";
            }
        } else {
            $mar->cod_marca  = $_POST["cod_marca"];
            if ($mar->verificarMarca()) {
                echo "<body></body>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
                <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                <script>
                Swal.fire({
                    icon: 'error',
                    iconColor: '#dc3545',
                    title: 'Oops...',
                    text: 'Esta marca já está cadastrada em nosso sistema!',
                    confirmButtonColor: '#7166f0',
                    onClose: () => {
                        window.history.back();
                    }
                });
                </script>";
            } else {
                $mar->atualizarMarca();

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
                        window.location='index.php?classe=MarcaController&metodo=abrirCadastro';
                    }
                });
                </script>";
            }
        }
    }

    public function abrirAtualizacao()
    {
        include "../../app/model/Marca.php";
        $mar = new Marca();
        $dadosMar = $mar->consultarMarcas();

        if (isset($_GET["cod_marca"])) {
            $mar->cod_marca = $_GET["cod_marca"];
            $dadosMarCod = $mar->consultarMarcaCod();
        }

        include_once "../../app/view/admin/GerenciarMarca.php";
    }

    public function excluirMarca()
    {
        if (isset($_GET["cod_marca"])) {
            include "../../app/model/Marca.php";
            $mar = new Marca();

            include "../../app/model/Produto.php";
            $prod = new Produto();

            $prod->cod_marca = $_GET["cod_marca"];
            $mar->cod_marca = $_GET["cod_marca"];

            $dadosProd = $prod->consultarProdutoPorCodMarca();

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

            $mar->excluirMarca();

            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
                Swal.fire({
                    title:'Marca excluída com sucesso!',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=MarcaController&metodo=abrirCadastro';
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
                text: 'Não foi possível exluír a marca.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
        }
    }
}
