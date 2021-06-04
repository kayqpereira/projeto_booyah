<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consulta de Vendas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "header.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h2>Vendas</h2>
        </div>
        <div class="row">
            <div class="col px-4 py-3">
                <div class="tabela-container container">
                    <table class="tabela display compact nowrap w-100">
                        <thead>
                            <th>ID</th>
                            <th>Nome Completo</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Forma de Pagamento</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosVend as $venda) {
                                echo "
                                <tr>
                                    <td>$venda->cod_venda</td>
                                    <td>$venda->nome</td>
                                    <td>" . $cli->formatarData($venda->data_venda, "BR") . "</td>
                                    <td>$venda->hora</td>
                                    <td>$venda->forma_pag</td>
                                    <td class='acao'>
                                        <a title='Detalhes' href='index.php?classe=ItemController&metodo=abrirConsulta&cod_venda=$venda->cod_venda'class='btn btn-sm btn-primary'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-list' viewBox='0 0 16 16'>
                                            <path fill-rule='evenodd' d='M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
                                        </svg> Detalhes</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/87aa5c0f8d.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> <!-- Data Tables -->
    <!-- Data Tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    <script src="../assets/js/main.js"></script>
</body>

</html>