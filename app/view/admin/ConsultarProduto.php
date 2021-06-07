<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consulta dos Produtos</title>
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
            <h2>Produtos</h2>
        </div>
        <div class="row">
            <div class="col px-4 py-3">
                <div class="tabela-container container">
                    <table class="tabela display compact nowrap w-100">
                        <thead>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Nome</th>
                            <th>Destaque</th>
                            <th>Ativo</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosProd as $produto) {
                                if ($produto->destaque == 1)
                                    $produto->destaque = "Sim";
                                else
                                    $produto->destaque = "Não";

                                if ($produto->ativo == 1)
                                    $produto->ativo = "Sim";
                                else
                                    $produto->ativo = "Não";
                                echo "
                                <tr>
                                    <td>$produto->cod_produto</td>
                                    <td>$produto->nome_categoria</td>
                                    <td>$produto->nome_marca</td>
                                    <td>$produto->nome_produto</td>
                                    <td>$produto->destaque</td>
                                    <td>$produto->ativo</td>
                                    <td>$produto->estoque</td>
                                <td>R$ " . number_format("$produto->preco", "2", ",", ".") . "</td>
                                    <td class='acao'>
                                        <button  title='Excluír' onclick=\"excluirProduto($produto->cod_produto);\" class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>
                                        <a title='Editar' href='index.php?classe=ProdutoController&metodo=abrirAtualizacao&cod_produto=$produto->cod_produto'class='btn btn-sm btn-secondary'><i class='fas fa-edit'></i></a>
                                        <a title='Imagens' href='index.php?classe=ImagemController&metodo=abrirCadastro&cod_produto=$produto->cod_produto'class='btn btn-sm btn-primary'><i class='fas fa-image'></i></a>
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
    <script>
        function excluirProduto(cod_produto) {
            Swal.fire({
                title: "Tem certeza de que deseja excluír este cadastro?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                iconColor: "#dc3545",
                showCancelButton: true,
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "index.php?classe=ProdutoController&metodo=abrirAtualizacao&metodo=excluirProduto&cod_produto=" + cod_produto;
                }
            });
        }
    </script>
</body>

</html>