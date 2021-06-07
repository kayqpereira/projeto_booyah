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
            <div class="row my-4">
                <div class="col-md-6 col-lg-7">
                    <div id="images-produto" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            foreach ($dadosImg as $key => $value) {
                                $active = "";
                                if ($key == 0) $active = "active";
                            ?>
                                <div class="carousel-item images <?php echo $active; ?>">
                                    <img src="./assets/images/produtos/<?php echo $value->nome_imagem; ?>" alt="<?php echo $dadosProd->nome_produto ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#images-produto" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#images-produto" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div>

                <div class="descricao col-md-6 col-lg-5">
                    <h4><?php echo $dadosProd->nome_produto; ?></h4>
                    <p><?php echo $dadosProd->descricao; ?></p>
                    <p>por <span>R$ <?php echo number_format($dadosProd->preco, 2, ",", "."); ?></span></p>
                    <a href="index.php?classe=ItemController&metodo=adicionarItem&cod_produto=<?php echo $dadosProd->cod_produto; ?>" class="btn btn-comercial btn-block"><strong>Comprar</strong></a>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "footer.php"; ?>

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