<?php

class ItemController
{
    public function abrirConsulta()
    {
        if (isset($_GET["cod_venda"])) {
            include "../app/model/Item.php";
            $item = new Item();

            $item->cod_venda = $_GET["cod_venda"];
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
                text: 'Não foi possível consultar os itens dessa venda.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }
        $dadosItem = $item->consultarItensPorCodVenda();

        include_once "../app/view/ConsultarItens.php";
    }
}
