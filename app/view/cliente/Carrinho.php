<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booyah Games</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body class="cli">

    <?php include_once "header.php"; ?>

    <main class="container-fluid">
        <div class="container">
            <?php if (isset($_SESSION["produtos"]) && !empty($_SESSION["produtos"])) { ?>
                <div class="row">
                    <div class="col-sm-9 mt-3">
                        <table class="table">
                            <thead>
                                <th></th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Unitário</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($_SESSION["produtos"] as $key => $value) {
                                    //buscar os demais dados do produto para exibição
                                    $prod->codproduto = $value;
                                    $dadosProd = $prod->consultarProdutosCod();

                                    //somando ao total
                                    $total += $dadosProd->preco * $_SESSION["quantidade"][$value];

                                ?>
                                    <tr>
                                        <td><img src="design/images/produtos/<?php echo $dadosProd->nomeimagem; ?>" class="img-fluid" alt="Produto" width="130px"></td>
                                        <td><?php echo $dadosProd->nomeproduto; ?></td>
                                        <td><?php echo $_SESSION["quantidade"][$value]; ?></td>
                                        <td>R$ <?php echo number_format($dadosProd->preco, 2, ",", "."); ?></td>
                                        <td><a href="index.php?classe=CarrinhoController&metodo=excluir&codproduto=<?php echo $value; ?>" class="btn btn-danger btn-sm"><i class='fas fa-trash-alt'></i></a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 mt-3">
                    </div>

                    <div class="col-sm-9 mt-3">
                        <h3 class="float-right">Sutotal R$ <?php echo number_format($total, 2, ",", "."); ?></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 mt-3">
                    </div>

                    <div class="col-sm-9 mt-3">
                        <a href="index.php?classe=ItemController&metodo=finalizar" class="btn btn-comercial float-right">FINALIZAR</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col">
                        <h1>Carrinho vazio!</h1>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php include_once "modal.php"; ?>

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