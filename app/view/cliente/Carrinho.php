<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booyah Games</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body class="cli">

    <?php include_once "header.php"; ?>

    <main class="container-fluid mt-4">
        <?php if (isset($_SESSION["produtos"]) && !empty($_SESSION["produtos"])) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mb-3">
                        <div class="container tabela-container">
                            <table id="tabelaCli2" class="tabela row-border order-column hover compact nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>&#8287</th>
                                        <th>Nome do produto</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Sub-total</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION["produtos"] as $produto) {
                                        $prod->cod_produto = $produto;
                                        $dadosProd = $prod->consultarProdutoCod();
                                        $subTotal = $dadosProd->preco * $_SESSION["quantidade"][$produto];
                                        $total += $subTotal;

                                        echo "<tr>
                                        <td><div class='image'><img src='./assets/images/produtos/$dadosProd->nome_imagem' alt='$dadosProd->nome_produto'></td>
                                        <td>$dadosProd->nome_produto</td>
                                        <td>" . $_SESSION["quantidade"][$produto] . "</td>
                                        <td>R$ " . number_format($dadosProd->preco, 2, ',', '.') . "</td>
                                        <td>R$ " . number_format($subTotal, 2, ',', '.') . "</td>
                                        <td><a href='index.php?classe=ItemController&metodo=excluirItem&cod_produto=$produto' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></a></td>
                                    </tr>";
                                    } ?>

                                </tbody>
                            </table>

                            <div class="mt-3" style="text-align: end;">
                                <a href="index.php?classe=HomeController&metodo=abrirPrincipal" class="btn btn-sm btn-primary float-left">Continuar comprando</a>
                                <h4>Total: R$ <?php echo number_format("$total", 2, ",", "."); ?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mx-auto col-lg-4 mb-3">
                        <div class="container tabela-container">
                            <form action="index.php?classe=VendaController&metodo=finalizarPedido" method="post" onsubmit="return validarFormP()">
                                <div class="form__input-group">
                                    <label class="form__label" for="meio_entrega">Meio de entrega:</label>
                                    <div class="form__input-containe input-group">
                                        <select class="form__input form-control rounded-right" id="meio_entrega" name="meio_entrega">
                                            <option value="" selected>-Selecione-</option>
                                            <option value="SEDEX M">SEDEX M</option>
                                            <option value="Econômico">Econômico</option>
                                            <option value="Rápido">Rápido</option>
                                            <option value="Total Express EXP">Total Express EXP</option>
                                            <option value="SEDEX">SEDEX</option>
                                            <option value="PAC">PAC</option>
                                        </select>

                                        <i class="form__icon form__icon-invalid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </i>

                                        <i class="form__icon form__icon-valid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                            </svg>
                                        </i>
                                    </div>
                                    <span class="error-meio_entrega"></span>
                                </div>

                                <div class="form__input-group">
                                    <label class="form__label" for="forma_pag">Forma de Pagamento:</label>
                                    <div class="form__input-containe input-group">
                                        <select class="form__input form-control rounded-right" id="forma_pag" name="forma_pag">
                                            <option value="" selected>-Selecione-</option>
                                            <option value="Boleto">Boleto</option>
                                            <option value="Cartão">Cartão</option>
                                        </select>

                                        <i class="form__icon form__icon-invalid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </i>

                                        <i class="form__icon form__icon-valid">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                            </svg>
                                        </i>
                                    </div>
                                    <span class="error-forma_pag"></span>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-comercial">Finalizar pedido</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center py-5">
                    <div class="col-auto">
                        <h2 class="carrinho-vazio">Seu carrinho está vazio!</h2>
                    </div>

                    <div class="col-auto">
                        <a href="index.php?classe=HomeController&metodo=abrirPrincipal" class="btn btn-comercial">Adicionar itens</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>

    <?php include_once "modal.php"; ?>
    <?php include_once "footer.php"; ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/87aa5c0f8d.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Data Tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <!-- Scripts -->
    <script src="./assets/js/main.js"></script>
</body>

</html>