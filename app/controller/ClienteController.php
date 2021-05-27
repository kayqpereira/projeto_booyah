<?php

class ClienteController
{
    public function abrirCadastro()
    {
        include_once "../app/view/CadastroCliente.php";
    }

    public function abrirAtualizacao()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        $cli->cod_cliente = 10;
        $dadosCli = $cli->buscarDadosDoCliente();

        include_once "../app/view/AtualizarCliente.php";
    }

    public function cadastrarCliente()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        include "../app/model/Endereco.php";
        $end = new Endereco();

        $end->cep       = $_POST["cep"];
        $end->estado    = $_POST["estado"];
        $end->cidade    = $_POST["cidade"];
        $end->bairro    = $_POST["bairro"];
        $end->endereco  = $_POST["endereco"];

        // Verifica se o endereço já foi cadastrado 
        $dadosEnd = $end->verificarEnderecoCadastrado();

        if (!empty($dadosEnd)) {
            $cli->cod_endereco = $dadosEnd->cod_endereco;
        } else {
            $cli->cod_endereco = $end->cadastrarEndereco();
        }

        $cli->nome          = $_POST["nome"];
        $cli->sobrenome     = $_POST["sobrenome"];
        $cli->cpf           = $_POST["cpf"];
        $cli->telefone      = $_POST["telefone"];
        $cli->celular       = $_POST["celular"];
        $cli->data_nasc     = $this->formatarData($_POST["data_nasc"], "EUA");
        $cli->email         = $_POST["email"];
        $cli->senha         = hash("sha512", $_POST["senha"]);
        $cli->numero        = $_POST["numero"];
        $cli->complemento   = $_POST["complemento"];

        if ($cli->verificaCpf()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O CPF $cli->cpf já está cadastrado em nosso sistema!',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        if ($cli->verificaEmail()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O E-mail $cli->email já está cadastrado em nosso sistema!',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $cli->cadastrarDadosPessoais();

        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Cadastro concluído com sucesso!',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:2000,
            onClose: () => {
                window.location='index.php?classe=ClienteController&metodo=abrirCadastro';
            }
        });
        </script>";
    }

    public function atualizarCliente()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        include "../app/model/Endereco.php";
        $end = new Endereco();

        $end->cep       = $_POST["cep"];
        $end->estado    = $_POST["estado"];
        $end->cidade    = $_POST["cidade"];
        $end->bairro    = $_POST["bairro"];
        $end->endereco  = $_POST["endereco"];

        // Verifica se o endereço já foi cadastrado 
        $dadosEnd = $end->verificarEnderecoCadastrado();

        if (!empty($dadosEnd)) {
            $cli->cod_endereco = $dadosEnd->cod_endereco;
        } else {
            $cli->cod_endereco = $end->cadastrarEndereco();
        }

        $cli->cod_cliente   = $_POST["cod_cliente"];
        $cli->nome          = $_POST["nome"];
        $cli->sobrenome     = $_POST["sobrenome"];
        $cli->cpf           = $_POST["cpf"];
        $cli->telefone      = $_POST["telefone"];
        $cli->celular       = $_POST["celular"];
        $cli->data_nasc     = $this->formatarData($_POST["data_nasc"], "EUA");
        $cli->email         = $_POST["email"];
        $cli->numero        = $_POST["numero"];
        $cli->complemento   = $_POST["complemento"];
        // Nova Senha
        if (!empty($_POST["senha"])) {
            $cli->senha     = hash("sha512", $_POST["senha"]);
        }

        if ($cli->verificaCpf()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O CPF $cli->cpf já está cadastrado em nosso sistema!',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        if ($cli->verificaEmail()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'O E-mail $cli->email já está cadastrado em nosso sistema!',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $cli->atualizarDadosPessoais();

        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Dados alterados com sucesso!',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:2000,
            onClose: () => {
                window.location='index.php?classe=ClienteController&metodo=abrirAtualizacao';
            }
        });
        </script>";
    }

    // Formata a data no padrão BR(00/00/0000) ou EUA(0000-00-00)
    public function formatarData(string $data, string $padrao)
    {
        if ($padrao === "EUA") {
            $dataDividida = explode("/", $data);

            $dia = $dataDividida[0];
            $mes = $dataDividida[1];
            $ano = $dataDividida[2];

            return $ano . "-" . $mes . "-" . $dia;
        } else {
            $dataDividida = explode("-", $data);

            $ano = $dataDividida[0];
            $mes = $dataDividida[1];
            $dia = $dataDividida[2];

            return $dia . "/" . $mes . "/" . $ano;
        }
    }

    // Verifica se o CPF já foi cadastrado
    public function verificaCpf()
    {
        header("Content-Type: application/json");
        if (isset($_POST["cpf"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            if (isset($_POST["cod_cliente"])) {
                $cli->cod_cliente = $_POST["cod_cliente"];
                $cli->cpf         = $_POST["cpf"];
            } else {
                $cli->cpf         = $_POST["cpf"];
            }

            $existe = $cli->verificaCpf();

            if ($existe)
                echo json_encode(array("erro" => "Ops! Este CPF já está cadastrado em nosso sistema."));
            else
                echo json_encode(array("erro" => ""));
        }
    }

    // Verifica se o email já foi cadastrado
    public function verificaEmail()
    {
        if (isset($_POST["email"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            if (isset($_POST["cod_cliente"])) {
                $cli->cod_cliente = $_POST["cod_cliente"];
                $cli->email       = $_POST["email"];

                $existe = $cli->verificaEmail();
            } else {
                $cli->email       = $_POST["email"];

                $existe = $cli->verificaEmail();
            }

            if ($existe) {
                echo json_encode(array("email" => "Ops! Este email já está cadastrado em nosso sistema."));
                return false;
            } else {
                echo json_encode(array("email" => ""));
                return true;
            }
        }
    }
}
