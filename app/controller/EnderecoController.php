<?php

class EnderecoController
{
    public function abrirAtualizacao()
    {
        include "../../app/model/Endereco.php";
        $end = new Endereco();

        if (isset($_GET["cod_endereco"])) {
            $end->cod_endereco = $_GET["cod_endereco"];
            $dadosEnd = $end->consultarEnderecoCod();

            include_once "../../app/view/admin/AtualizarEndereco.php";
        }
    }

    public function atualizarEndereco()
    {
        include "../../app/model/Endereco.php";
        $end = new Endereco();

        $end->cep          = $_POST["cep"];
        $end->estado       = $_POST["estado"];
        $end->cidade       = $_POST["cidade"];
        $end->bairro       = $_POST["bairro"];
        $end->endereco     = $_POST["endereco"];
        $end->cod_endereco = $_POST["cod_endereco"];

        $end->atualizarEndereco();

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
                window.location='index.php?classe=ClienteController&metodo=abrirConsulta';
            }
        });
        </script>";
    }
}
