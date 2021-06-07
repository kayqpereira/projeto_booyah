<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gerenciar Imagens</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "header.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h1>Imagens do Produto</h1>
        </div>
        <form action="index.php?classe=ImagemController&metodo=cadastrarImagem" method="post" novalidate id="frmMar" enctype="multipart/form-data" class="frmMar container mb-4">
            <div class="row justify-content-center">
                <div class="col form__fields-container-edit">
                    <fieldset class="form__fields">
                        <input type="hidden" id="cod_produto" name="cod_produto" value="<?php echo $_GET["cod_produto"]; ?>" />

                        <div class="form__input-group">
                            <label class="form__label" for="nome_produto">Nome do produto:</label>
                            <div class="form__input-container input-group">
                                <input class="form__input form-control disabled" type="text" value="<?php echo $dadosProd->nome_produto; ?>" type="text" id="nome_produto" name="nome_produto" readonly>
                            </div>
                        </div>

                        <div class="form__input-group">
                            <label class="form__label" for="nome_imagem">Imagem do produto:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" type="file" accept="image/*" id="nome_imagem" name="nome_imagem">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="btn btn-secondary btn-sm" href="index.php?classe=ProdutoController&metodo=abrirConsulta">Voltar</a>
                            <input type="submit" id="cadastrar" class="btn btn-principal-3d float-center" value="Cadastrar">
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col form__fields-container-edit">
                    <table class="tabela display nowrap w-100">
                        <thead>
                            <th>Imagem</th>
                            <th>Nome da imagem</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosImg as $img) {
                                echo "
                                <tr>
                                    <td><div class='image'><img src='../assets/images/produtos/$img->nome_imagem'></div></td>
                                    <td>$img->nome_imagem</td>
                                    <td class='acao'>
                                        <button type='button'  title='Excluír' onclick=\"excluirImagem($img->cod_imagem);\" class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

    </main>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/87aa5c0f8d.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Data Tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    <script src="../assets/js/main.js"></script>
    <script>
        function excluirImagem(cod_imagem) {
            Swal.fire({
                title: "Tem certeza!",
                text: "Deseja mesmo excluír essa imagem?",
                icon: "question",
                showCancelButton: true,
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar",
                focusConfirm: "false"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "index.php?classe=ImagemController&metodo=excluirImagem&cod_imagem=" + cod_imagem;
                }
            });
        }
    </script>
</body>

</html>