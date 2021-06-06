<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Itens do pedido</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body class="cli">

    <?php include_once "header.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h2>Itens do pedido</h2>
        </div>

        <div class="row">
            <div class="col px-4 py-3">
                <div class="container tabela-container table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($dadosItem as $item) {
                                $subTotal = $item->preco * $item->quantidade;
                                $total += $subTotal;
                                echo "
                                <tr>
                                    <td>$item->nome_produto</td>
                                    <td>$item->quantidade</td>
                                    <td>R$ " . number_format("$item->preco", 2, ".", ",") . "</td>
                                    <td>R$ " . number_format("$subTotal", 2, ".", ",") . "</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div>
                        <h4>Total: R$ <?php echo number_format("$total", 2, ".", ","); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/87aa5c0f8d.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="./assets/js/main.js"></script>
</body>

</html>