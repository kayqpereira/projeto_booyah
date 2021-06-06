<?php
class ImagemController
{
    function abrirCadastro()
    {
        if (!isset($_GET["cod_produto"])) {
            $fallback = "index.php?class=HomeController&metodo=abrirHome";
            $anterior = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : $fallback;
            header("location: {$anterior}");
            exit();
        }

        include_once "../../app/model/Produto.php";
        $prod = new Produto();

        $prod->cod_produto = $_GET["cod_produto"];
        $dadosProd = $prod->consultarProdutoCod();

        include_once "../../app/model/Imagem.php";
        $img = new Imagem();

        $img->cod_produto = $_GET["cod_produto"];
        $dadosImg = $img->consultarImagensCodProd();

        include_once "../../app/view/admin/GerenciarImagem.php";
    }

    function cadastrarImagem()
    {
        include "../../app/model/Imagem.php";
        $img = new Imagem();

        $img->cod_produto = $_POST["cod_produto"];
        $enviado = false;

        if ($_FILES["nome_imagem"]["error"] == 0) {
            $permitidas = array("png", "gif", "jpeg", "jpg", "jfif");
            $info = new SplFileInfo($_FILES["nome_imagem"]["name"]);
            $extensao = $info->getExtension();

            if (in_array($extensao, $permitidas)) {
                # fazer upload da imagem
                $nomeArquivo = md5(microtime()) . ".$extensao";
                $destino = "../assets/images/produtos/$nomeArquivo";
                $nome_temp = $_FILES["nome_imagem"]["tmp_name"];
                move_uploaded_file($nome_temp, $destino);

                # enviar dados para o BD
                $img->nome_imagem = $nomeArquivo;
                $img->cadastrarImagem();
                $enviado = true;

                header("location:index.php?classe=ImagemController&metodo=abrirCadastro&cod_produto=$img->cod_produto");
            }
        }

        if ($enviado == false) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Erro!',
                text: 'Não foi possível realizar o upload da imagem!.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.location='index.php?classe=ImagemController&metodo=abrirCadastro&cod_produto=$img->cod_produto';
                }
            });
            </script>";
        }
    }

    function excluirImagem()
    {
        include_once "../../app/model/Imagem.php";
        $img = new Imagem();
        $img->cod_imagem = $_GET["cod_imagem"];

        # buscar os dados da imagem
        $dadosImg = $img->consultarImagensCod();

        # excluir um arquivo
        if (is_file("../assets/images/produtos/$dadosImg->nome_imagem"))
            unlink("../assets/images/produtos/$dadosImg->nome_imagem");

        # excluir do BD
        $img->excluirImagem();

        header("Location:index.php?classe=ImagemController&metodo=abrirCadastro&cod_produto=$dadosImg->cod_produto");
    }
}
