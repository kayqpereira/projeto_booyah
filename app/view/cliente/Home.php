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

    <main class="container-fluid mt-3">
        <section class="container banners">
            <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./assets/images/resident-evil-village.png" class="d-block img-fluid" alt="Resident Evil Village">
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/images/biomutant.jpg" class="d-block img-fluid" alt="Biomutant">
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/images/assassins-creed-valhalla.jpg" class="d-block img-fluid" alt="Assassin" s Creed Valhalla">
                            </div>

                            <div class="carousel-item">
                                <img src="./assets/images/cyberpunk-2077.jpg" class="d-block img-fluid" alt="Cyberpunk 2077">
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="page-title container">
                <h1>Produtos para você</h1>
            </div>
            <div class="row my-3">
                <div class="col products">
                    <?php foreach ($dadosProd as $produto) { ?>
                        <div class="product">
                            <div class="product-image">
                                <img src="./assets/images/produtos/<?php echo $produto->nome_imagem ?>" alt="<?php echo $produto->nome_produto ?>" />
                            </div>

                            <div class="info-product">
                                <div class="product-name">
                                    <?php echo $produto->nome_produto ?>
                                </div>

                                <div class="product-stock">
                                    <?php
                                    $estoque = $produto->estoque;
                                    if (isset($_SESSION["produtos"][$produto->cod_produto])) {
                                        $estoque = $_SESSION["estoque"][$produto->cod_produto];
                                        if ($estoque > 0)
                                            echo "Estoque: <span class='positive'>Disponível!</span>";
                                        else
                                            echo "Estoque: <span class='negative'>Esgotado!</span>";
                                    } else {
                                        if ($estoque > 0)
                                            echo "Estoque: <span class='positive'>Disponível!</span>";
                                        else
                                            echo "Estoque: <span class='negative'>Esgotado!</span>";
                                    }
                                    ?>
                                </div>

                                <div class="product-price">
                                    <?php echo "R$ " . number_format($produto->preco, 2, ",", ".") ?>
                                </div>
                            </div>

                            <a class="btn d-block btn-comercial" href="index.php?classe=HomeController&metodo=abrirProduto&cod_produto=<?php echo $produto->cod_produto ?>">
                                Comprar
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <?php include_once "footer.php"; ?>
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