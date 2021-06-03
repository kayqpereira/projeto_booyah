<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar cadastro do produto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "navbar.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h1>Editar produto</h1>
        </div>
        <form action="index.php?classe=ProdutoController&metodo=atualizarProduto" method="POST" onsubmit="return validarFormProd()" novalidate id="frmEditarProd" class="frmProd container">
            <div class="row justify-content-center">
                <div class="col form__fields-container-edit">
                    <fieldset class="form__fields">
                        <input type="hidden" id="cod_produto" name="cod_produto" value="<?php echo $dadosProd->cod_produto; ?>" />

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="form__input-group">
                                    <label class="form__label" for="nome_produto">Nome do produto:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" maxlength="30" type="text" id="nome_produto" name="nome_produto" value="<?php echo $dadosProd->nome_produto; ?>">
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
                                    <span class="error-nome_produto"></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-2">
                                <div class="form__input-group">
                                    <label class="form__label" for="destaque">Destaque:</label>
                                    <div class="form__input-container">
                                        <select class="form__input form-control" id="destaque" name="destaque">
                                            <option value="1">Sim</option>
                                            <option value="0" selected="selected">Não</option>
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
                                    <span class="error-destaque"></span>
                                </div>
                            </div>

                            <div class="col-6 col-md-2">
                                <div class="form__input-group">
                                    <label class="form__label" for="ativo">Ativo:</label>
                                    <div class="form__input-container">
                                        <select class="form__input form-control" id="ativo" name="ativo">
                                            <option value="1" selected="selected">Sim</option>
                                            <option value="0">Não</option>
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
                                    <span class="error-ativo"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form__input-group">
                                    <label class="form__label" for="estoque">Estoque:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" data-mask="estoque" type="number" id="estoque" name="estoque" value="<?php echo $dadosProd->estoque; ?>">
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
                                    <span class="error-estoque"></span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form__input-group">
                                    <label class="form__label" for="preco">Preço:</label>
                                    <div class="form__input-container input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input class="form__input form-control rounded-right" step="any" type="number" id="preco" name="preco" value="<?php echo $dadosProd->preco; ?>">
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
                                    <span class="error-preco"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form__input-group">
                                    <label class="form__label" for="cod_categoria">Categoria:</label>
                                    <div class="form__input-containe input-group">
                                        <div class="input-group-append" data-toggle="tooltip" title="Gerenciar categorias">
                                            <a href="index.php?classe=CategoriaController&metodo=abrirCadastro" class="btn btn-principal rounded-left">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                        </div>

                                        <select class="form__input form-control rounded-right" id="cod_categoria" name="cod_categoria">
                                            <option value="" selected>-Selecione-</option>
                                            <?php
                                            foreach ($dadosCateg as $categoria) {
                                                echo "<option value='$categoria->cod_categoria'>$categoria->nome_categoria</option>";
                                            }
                                            ?>
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
                                    <span class="error-cod_categoria"></span>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form__input-group">
                                    <label class="form__label" for="cod_marca">Marca:</label>
                                    <div class="form__input-containe input-group">
                                        <div class="input-group-append" data-toggle="tooltip" title="Gerenciar marcas">
                                            <a href="index.php?classe=MarcaController&metodo=abrirCadastro" class="btn btn-principal rounded-left">
                                                <i class="fas fa-cogs"></i>
                                            </a>
                                        </div>

                                        <select class="form__input form-control rounded-right" id="cod_marca" name="cod_marca">
                                            <option value="" selected>-Selecione-</option>
                                            <?php
                                            foreach ($dadosMar as $marca) {
                                                echo "<option value='$marca->cod_marca'>$marca->nome_marca</option>";
                                            }
                                            ?>
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
                                    <span class="error-cod_marca"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form__label" for="descricao">Descrição completa:</label>
                            <textarea class="form__input form-control" name="descricao" id="descricao"><?php echo $dadosProd->descricao; ?></textarea>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-principal-3d">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" height="17" width="17" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path>
                        </svg>
                        Salvar Alterações
                    </button>
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
    <!--CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <!-- Scripts -->
    <script>
        document.getElementById("destaque").value = "<?php echo $dadosProd->destaque; ?>";
        document.getElementById("ativo").value = "<?php echo $dadosProd->ativo; ?>";
        document.getElementById("cod_categoria").value = "<?php echo $dadosProd->cod_categoria; ?>";
        document.getElementById("cod_marca").value = "<?php echo $dadosProd->cod_marca; ?>";

        $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip({
                boundary: "window"
            });
        });

        CKEDITOR.replace("descricao");
    </script>
    <script src="assets/js/main.js"></script>
</body>

</html>