<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de Usuários</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Styles CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body>

    <main class="container-fluid">
        <form action="index.php?classe=ClienteController&metodo=cadastrarCliente" method="post" onsubmit="return validaForm()" novalidate id="register-form " class="register-form container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 form__fields-container form__fields-container-personal">
                    <fieldset class="form__fields">
                        <legend class="form__title">Dados Pessoais</legend>

                        <div id="personal-nome" class="form__input-group">
                            <label class="form__label" for="nome">Nome:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" data-mask="string" maxlength="40" type="text" id="nome" name="nome">
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
                                <input class="form__input form-control" data-mask="string" maxlength="40" type="text" id="sobrenome" name="sobrenome">
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
                                <input class="form__input form-control" autocomplete="off" data-mask="cpf" maxlength="14" type="text" id="cpf" name="cpf">
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
                                <input class="form__input form-control" data-mask="telefone" maxlength="14" type="tel" id="telefone" name="telefone">
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
                                <input class="form__input form-control" data-mask="celular" maxlength="15" type="tel" id="celular" name="celular">
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
                                <input class="form__input form-control" data-mask="data" maxlength="10" type="text" id="data_nasc" name="data_nasc">
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

                        <div id="address-cep" class="form__input-group">
                            <label class="form__label" for="cep">CEP:</label>
                            <div class="form__link">
                                <a class="form__link-style"  title="Buscar CEP no Correios" href="https://buscacepinter.correios.com.br/app/endereco/index.php?t" target="_blank">Não sei meu CEP</a>
                            </div>
                            <div class="form__input-container">
                                <input class="form__input form-control" data-mask="cep" maxlength="9" type="text" id="cep" name="cep">
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
                                <input class="form__input form-control" maxlength="35" type="text" id="bairro" name="bairro">
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
                                <input class="form__input form-control" maxlength="80" type="text" id="endereco" name="endereco">
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
                                <input class="form__input form-control" maxlength="6" type="text" id="numero" name="numero">
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
                                <input class="form__input form-control" maxlength="30" type="text" id="complemento" name="complemento">
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
                                        <input class="form__input form-control" maxlength="35" type="text" id="cidade" name="cidade">
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
                                            <option selected disabled value="">---</option>
                                            <option value="Acre">AC</option>
                                            <option value="Alagoas">AL</option>
                                            <option value="Amapá">AP</option>
                                            <option value="Amazonas">AM</option>
                                            <option value="Bahia">BA</option>
                                            <option value="Ceará">CE</option>
                                            <option value="Distrito Federal">DF</option>
                                            <option value="Espírito Santo">ES</option>
                                            <option value="Goiás">GO</option>
                                            <option value="Maranhão">MA</option>
                                            <option value="Mato Grosso">MT</option>
                                            <option value="Mato Grosso do Sul">MS</option>
                                            <option value="Minas Gerais">MG</option>
                                            <option value="Pará">PA</option>
                                            <option value="Paraíba">PB</option>
                                            <option value="Paraná">PR</option>
                                            <option value="Pernambuco">PE</option>
                                            <option value="Piauí">PI</option>
                                            <option value="Rio de Janeiro">RJ</option>
                                            <option value="Rio Grande do Norte">RN</option>
                                            <option value="Rio Grande do Sul">RS</option>
                                            <option value="Rondônia">RO</option>
                                            <option value="Roraima">RR</option>
                                            <option value="Santa Catarina">SC</option>
                                            <option value="São Paulo">SP</option>
                                            <option value="Sergipe">SE</option>
                                            <option value="Tocantins">TO</option>
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
                                    <label class="form__label" for="email">E-mail:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" autocomplete="email" maxlength="80" type="email" id="email" name="email">
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
                                    <label class="form__label" for="email_confirm">Confirmar e-mail:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" autocomplete="email" maxlength="80" type="email" id="email_confirm" name="email">
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
                                    <span class="error-email_confirm"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="access-senha" class="form__input-group">
                                    <label class="form__label" for="senha">Senha:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" autocomplete="new-password" maxlength="100" type="password" id="senha" name="senha">
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
                                    <span class="error-senha"></span>
                                </div>

                                <div id="access-senha-confirm" class="form__input-group">
                                    <label class="form__label" for="senha_confirm">Confirmar senha:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control" autocomplete="new-password" maxlength="100" type="password" id="senha_confirm" name="senha">
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
                                    <span class="error-senha_confirm"></span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Criar Conta">
                </div>
            </div>
        </form>
    </main>

    <!-- Scripts -->
    <script src="assets/js/validate-form.js"></script>
    <script src="assets/js/masks.js"></script>
</body>

</html>