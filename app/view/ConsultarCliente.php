<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consulta de Clientes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="adm">

    <?php include_once "navbar.php"; ?>

    <main class="container-fluid">
        <div class="page-title container">
            <h2>Clientes</h2>
        </div>
        <div class="row">
            <div class="col px-4 py-3">
                <div class="tabela-container container">
                    <table class="tabela display compact nowrap w-100">
                        <thead>
                            <th>ID</th>
                            <th>Endereço ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                            <th>E-mail</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosCli as $cliente) {
                                echo "
                                <tr>
                                    <td>$cliente->cod_cliente</td>
                                    <td>$cliente->cod_endereco</td>
                                    <td>$cliente->nome</td>
                                    <td>$cliente->sobrenome</td>
                                    <td>$cliente->cpf</td>
                                    <td>$cliente->telefone</td>
                                    <td>$cliente->celular</td>
                                    <td>$cliente->email</td>
                                    <td class='acao'>
                                        <button data-toggle='tooltip' title='Excluír' onclick=\"excluirCliente($cliente->cod_cliente, $cliente->cod_endereco);\" class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>
                                        <a data-toggle='tooltip' title='Editar' href='index.php?classe=ClienteController&metodo=abrirAtualizacao&cod_cliente=$cliente->cod_cliente'class='btn btn-sm btn-secondary'><i class='fas fa-edit'></i></a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="page-title container">
                <h2>Endereços</h2>
            </div>
            <div class="col px-4 py-3">
                <div class="tabela-container container">
                    <table class="tabela display compact nowrap w-100">
                        <thead>
                            <th>ID</th>
                            <th>CEP</th>
                            <th>Bairro</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dadosEnd as $endereco) {
                                echo "
                                <tr>
                                    <td>$endereco->cod_endereco</td>
                                    <td>$endereco->cep</td>
                                    <td>$endereco->bairro</td>
                                    <td>$endereco->endereco</td>
                                    <td>$endereco->cidade</td>
                                    <td>$endereco->estado</td>
                                    <td class='acao'>
                                        <a data-toggle='tooltip' title='Editar' href='index.php?classe=EnderecoController&metodo=abrirAtualizacao&cod_endereco=$endereco->cod_endereco'class='btn btn-sm btn-secondary'><i class='fas fa-edit'></i></a>
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
    <script src="assets/js/main.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                boundary: 'window',
                trigger: 'hover'
            });
        });

        function excluirCliente(cod_cliente, cod_endereco) {
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
                    window.location = "index.php?classe=ClienteController&metodo=excluirCliente&cod_cliente=" + cod_cliente + "&cod_endereco=" + cod_endereco;
                }
            });
        }
    </script>
</body>

</html>