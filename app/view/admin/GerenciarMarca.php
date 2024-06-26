<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gerenciar Marcas</title>
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
            <h1>Gerenciar Marcas</h1>
        </div>
        <form action="index.php?classe=MarcaController&metodo=gerenciarMarca" method="post" onsubmit="return validarFormMar()" novalidate id="frmMar" class="frmMar container mb-4">
            <div class="row justify-content-center">
                <div class="col form__fields-container-edit">
                    <fieldset class="form__fields">
                        <input type="hidden" id="cod_marca" name="cod_marca" value="<?php if (isset($dadosMarCod)) echo $dadosMarCod->cod_marca; ?>" />

                        <div class="form__input-group">
                            <label class="form__label" for="nome_marca">Nome da marca:</label>
                            <div class="form__input-container input-group">
                                <input class="form__input form-control" value="<?php if (isset($dadosMarCod)) echo $dadosMarCod->nome_marca; ?>" maxlength="30" type="text" id="nome_marca" name="nome_marca">
                                <div class="input-group-append">
                                    <input type="submit" id="salvar" class="btn btn-principal-3d rounded-right" value="Salvar">
                                </div>
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
                            <span class="error-nome_marca"></span>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col form__fields-container-edit">
                    <table class="tabela display compact nowrap w-100">
                        <thead>
                            <th>ID</th>
                            <th>Nome da marca</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosMar as $marca) {
                                echo "<tr>
                                    <td>$marca->cod_marca</td>
                                    <td>$marca->nome_marca</td>
                                    <td class='acao'>
                                        <button type='button'  title='Excluír' onclick=\"excluirMarca($marca->cod_marca);\" class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>
                                        <a title='Editar' href='index.php?classe=MarcaController&metodo=abrirAtualizacao&cod_marca=$marca->cod_marca'class='btn btn-sm btn-secondary'><i class='fas fa-edit'></i></a>
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
        function excluirMarca(cod_marca) {
            Swal.fire({
                title: "Tem certeza",
                text: "Todos os produtos vinculados a está marca serão exluídos!",
                icon: "warning",
                iconColor: "#dc3545",
                showCancelButton: true,
                cancelButtonColor: "#dc3545",
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar",
                focusConfirm: "false"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "index.php?classe=MarcaController&metodo=excluirMarca&cod_marca=" + cod_marca;
                }
            });
        }
    </script>
</body>

</html>