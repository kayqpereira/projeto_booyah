<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "navbar.php"; ?>

    <main class="container-fluid pb-3">
        <section class="container content">
            <div class="row">
                <div class="col-10 col-sm-4 mt-3 mt-sm-4 mx-auto">
                    <div class="card info-box purple">
                        <div class="card-body container align-items-center d-flex flex-column">
                            <div class="row">
                                <div class="col">
                                    <i class="fas fa-box fa-4x"></i>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <h3 class="card-title d-inline">Produtos: </h3>
                                    <h2 class="card-title d-inline text-dark"><?php echo count($dadosProd) ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-4 mt-3 mt-sm-4 mx-auto">
                    <div class="card info-box orange">
                        <div class="card-body container align-items-center d-flex flex-column">
                            <div class="row">
                                <div class="col">
                                    <i class="fas fa-user fa-4x"></i>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <h3 class="card-title d-inline">Clientes: </h3>
                                    <h2 class="card-title d-inline text-dark"><?php echo count($dadosCli) ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-4 mt-3 mt-sm-4 mx-auto">
                    <div class="card info-box blue">
                        <div class="card-body container align-items-center d-flex flex-column">
                            <div class="row">
                                <div class="col">
                                    <i class="fas fa-clipboard-list fa-4x"></i>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <h3 class="card-title d-inline">Pedidos: </h3>
                                    <h2 class="card-title d-inline text-dark"><?php echo count($dadosVend) ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/87aa5c0f8d.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>