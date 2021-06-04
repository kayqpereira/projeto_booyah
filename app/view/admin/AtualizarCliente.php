<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="blue">
    <title>Editar Cliente</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "header.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h1>Editar dados do cliente</h1>
        </div>
        <form action="index.php?classe=ClienteController&metodo=atualizarCliente" method="post" onsubmit="return validarForm()" novalidate id="frmEditarCli" class="frmCli container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 form__fields-container form__fields-container-personal">
                    <fieldset class="form__fields">
                        <legend class="form__title">Dados Pessoais</legend>

                        <input type="hidden" id="cod_cliente" name="cod_cliente" value="<?php echo $dadosCli->cod_cliente; ?>" />

                        <div id="personal-nome" class="form__input-group">
                            <label class="form__label" for="nome">Nome:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->nome; ?>" data-mask="string" maxlength="40" type="text" id="nome" name="nome">
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
                            <span class="error-nome"></span>
                        </div>

                        <div id="personal-sobrenome" class="form__input-group">
                            <label class="form__label" for="sobrenome">Sobrenome:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->sobrenome; ?>" data-mask="string" maxlength="40" type="text" id="sobrenome" name="sobrenome">
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
                            <span class="error-sobrenome"></span>
                        </div>

                        <div id="personal-cpf" class="form__input-group">
                            <label class="form__label" for="cpf">CPF:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->cpf; ?>" autocomplete="off" data-mask="cpf" maxlength="14" type="text" id="cpf" name="cpf">
                                <div class="load"></div>
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
                            <span class="error-cpf"></span>
                        </div>

                        <div id="personal-telefone" class="form__input-group">
                            <label class="form__label" for="telefone">Telefone fixo:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->telefone; ?>" data-mask="telefone" maxlength="14" type="tel" id="telefone" name="telefone">
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
                            <span class="error-telefone"></span>
                        </div>

                        <div id="personal-celular" class="form__input-group">
                            <label class="form__label" for="celular">Celular:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->celular; ?>" data-mask="celular" maxlength="15" type="tel" id="celular" name="celular">
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
                            <span class="error-celular"></span>
                        </div>

                        <div id="personal-data_nasc" class="form__input-group">
                            <label class="form__label" for="data_nasc">Data de nascimento:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $this->formatarData($dadosCli->data_nasc, "BR"); ?>" data-mask="data" maxlength="10" type="text" id="data_nasc" name="data_nasc">
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
                            <span class="error-data_nasc"></span>
                        </div>
                    </fieldset>
                </div>

                <div class="col-12 col-md-6 form__fields-container form__fields-container-address">
                    <fieldset class="form__fields">
                        <legend class="form__title">Dados de Endereço</legend>

                        <input type="hidden" id="cod_endereco" name="cod_endereco" value="<?php echo $dadosCli->cod_endereco; ?>" />

                        <div id="address-cep" class="form__input-group">
                            <label class="form__label" for="cep">CEP:</label>
                            <div class="form__link">
                                <a class="form__link-style" title="Buscar CEP no Correios" href="https://buscacepinter.correios.com.br/app/endereco/index.php?t" target="_blank">Não sei meu CEP</a>
                            </div>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->cep; ?>" data-mask="cep" maxlength="9" type="text" id="cep" name="cep">
                                <div class="load"></div>
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
                            <span class="error-cep"></span>
                        </div>

                        <div id="address-bairro" class="form__input-group">
                            <label class="form__label" for="bairro">Bairro:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->bairro; ?>" maxlength="35" type="text" id="bairro" name="bairro">
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
                            <span class="error-bairro"></span>
                        </div>

                        <div id="address-endereco" class="form__input-group">
                            <label class="form__label" for="endereco">Endereço:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->endereco; ?>" maxlength="80" type="text" id="endereco" name="endereco">
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
                            <span class="error-endereco"></span>
                        </div>

                        <div id="address-numero" class="form__input-group">
                            <label class="form__label" for="numero">Número:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->numero; ?>" maxlength="6" type="text" id="numero" name="numero">
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
                            <span class="error-numero"></span>
                        </div>

                        <div id="address-complemento" class="form__input-group">
                            <label class="form__label" for="complemento">Complemento:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" value="<?php echo $dadosCli->complemento; ?>" maxlength="30" type="text" id="complemento" name="complemento">
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
                            <span class="error-complemento"></span>
                        </div>

                        <div class="row">
                            <div class="col-sm-7">
                                <div id="address-cidade" class="form__input-group">
                                    <label class="form__label" for="cidade">Cidade:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" value="<?php echo $dadosCli->cidade; ?>" maxlength="35" type="text" id="cidade" name="cidade">
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
                                    <span class="error-cidade"></span>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div id="address-estado" class="form__input-group">
                                    <label class="form__label" for="estado">Estado:</label>
                                    <div class="form__input-container">
                                        <select class="form__input form-control" id="estado" name="estado">
                                            <option value="" selected>---</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MS">MS</option>
                                            <option value="MT">MT</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
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
                                    <span class="error-estado"></span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row justify-content-center mt-sm-4">
                <div class="col-12 form__fields-container form__fields-container-access">
                    <fieldset class="form__fields">
                        <legend class="form__title">Dados de Acesso</legend>

                        <div class="row">
                            <div class="col-md-6">
                                <div id="access-email" class="form__input-group">
                                    <label class="form__label" for="email">Novo e-mail:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" value="<?php echo $dadosCli->email ?>" autocomplete="email" maxlength="80" type="email" id="email" name="email">
                                        <div class="load"></div>
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
                                    <span class="error-email"></span>
                                </div>

                                <div id="access-email-confirm" class="form__input-group">
                                    <label class="form__label" for="confirmar_email">Confirmar e-mail:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" value="<?php echo $dadosCli->email ?>" autocomplete="email" maxlength="80" type="email" id="confirmar_email" name="email">
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
                                    <span class="error-confirmar_email"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="access-senha" class="form__input-group">
                                    <label class="form__label" for="senha">Nova senha:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" autocomplete="new-password" maxlength="100" type="password" id="nova_senha" name="senha">
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
                                    <span class="error-nova_senha"></span>
                                </div>

                                <div id="access-senha-confirm" class="form__input-group">
                                    <label class="form__label" for="confirmar_senha">Confirmar senha:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" autocomplete="new-password" maxlength="100" type="password" id="confirmar_nova_senha">
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
                                    <span class="error-confirmar_nova_senha"></span>
                                </div>
                            </div>
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
    <!-- Scripts -->
    <script>
        document.getElementById("estado").value = "<?php echo $dadosCli->estado ?>";
    </script>
    <script src="../assets/js/main.js"></script>
</body>

</html>