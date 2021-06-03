<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consulta de Itens</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "navbar.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h2>Itens da Compra</h2>
        </div>
        <div class="row">
            <div class="col px-4 py-3">
                <div class="tabela-container container">
                    <table class="tabela display compact nowrap w-100">
                        <thead>
                            <th>Nome produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Sub-Total</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosItem as $item) {
                                $subTotal = $item->preco * $item->quantidade;

                                echo "
                                <tr>
                                    <td>$item->nome_produto</td>
                                    <td>$item->quantidade</td>
                                    <td>R$ " . number_format("$item->preco", 2, ",", ".") . "</td>
                                    <td>R$ " . number_format("$subTotal", 2, ",", ".") . "</td>
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
    <script src="assets/js/main.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                boundary: 'window',
                trigger: 'hover'
            })
        })
    </script>
</body>

</html>