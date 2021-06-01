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

        if (isset($_GET["cod_cliente"])) {
            $cli->cod_cliente = $_GET["cod_cliente"];
            $dadosCli = $cli->consultarDadosCliente();

            include_once "../app/view/AtualizarCliente.php";
        }
    }

    public function abrirConsulta()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();
        $dadosCli = $cli->consultarClientes();

        include "../app/model/Endereco.php";
        $end = new Endereco();
        $dadosEnd = $end->consultarEnderecos();

        include_once "../app/view/ConsultarCliente.php";
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

        # Verifica se o endereço já foi cadastrado 
        $dadosEnd = $end->verificarEndereco();

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

        if ($cli->verificarCpf()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                text: 'O CPF $cli->cpf já está cadastrado em nosso sistema!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        if ($cli->verificarEmail()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                text: 'O E-mail $cli->email já está cadastrado em nosso sistema!',
                confirmButtonColor: '#7166f0',
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
            timer:1500,
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
        # Se houver uma nova senha
        if (!empty($_POST["senha"])) {
            $cli->senha = hash("sha512", $_POST["senha"]);
        }

        if ($cli->verificarCpf()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                text: 'O CPF $cli->cpf já está cadastrado em nosso sistema!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        if ($cli->verificarEmail()) {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Oops...',
                text: 'O E-mail $cli->email já está cadastrado em nosso sistema!',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
            return false;
        }

        $dadosEnd = $end->verificarEndereco();

        if (!empty($dadosEnd)) {
            if ($_POST["cod_endereco"] != $dadosEnd->cod_endereco) {
                $cli->cod_endereco = $dadosEnd->cod_endereco;
            } else {
                $cli->cod_endereco = $_POST["cod_endereco"];
            }
        } else {
            $cli->cod_endereco = $end->cadastrarEndereco();
        }

        $cli->atualizarDadosPessoais();


        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Salvou!',
            text:'Dados alterados com sucesso.',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:1500,
            onClose: () => {
                window.location='index.php?classe=ClienteController&metodo=abrirConsulta';
            }
        });
        </script>";
    }

    public function excluirCliente()
    {
        if (isset($_GET["cod_cliente"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            $cli->cod_cliente  = $_GET["cod_cliente"];
            $cli->excluirCliente();

            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
                Swal.fire({
                    title:'Cadastro excluído com sucesso!',
                    type:'success',
                    icon:'success',
                    showConfirmButton:false,
                    timer:1500,
                    onClose: () => {
                        window.location='index.php?classe=ClienteController&metodo=abrirConsulta';
                    }
                });
            </script>";
        } else {
            echo "<body></body>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
            Swal.fire({
                icon: 'error',
                iconColor: '#dc3545',
                title: 'Erro!',
                text: 'Não foi possível excluír o cliente.',
                confirmButtonColor: '#7166f0',
                onClose: () => {
                    window.history.back();
                }
            });
            </script>";
        }
    }

    /**
     * Formata a data no padrão BR(00/00/0000) ou EUA(0000-00-00)
     *
     * @param string $data
     * @param string $padrao
     * @return date
     */
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

    # Verifica se o CPF já foi cadastrado
    public function verificarCpf()
    {
        header("Content-Type: application/json");
        if (isset($_POST["cpf"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            if (isset($_POST["cod_cliente"])) {
                $cli->cod_cliente = $_POST["cod_cliente"];
            }
            $cli->cpf = $_POST["cpf"];

            $existe = $cli->verificarCpf();

            if ($existe)
                echo json_encode(array("erro" => "Ops! Este CPF já está cadastrado em nosso sistema."));
            else
                echo json_encode(array("erro" => ""));
        }
    }

    # Verifica se o email já foi cadastrado
    public function verificarEmail()
    {
        header("Content-Type: application/json");
        if (isset($_POST["email"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            if (isset($_POST["cod_cliente"])) {
                $cli->cod_cliente = $_POST["cod_cliente"];
            }
            $cli->email = $_POST["email"];

            $existe = $cli->verificarEmail();

            if ($existe) {
                echo json_encode(array("erro" => "Ops! Este email já está cadastrado em nosso sistema."));
            } else {
                echo json_encode(array("erro" => ""));
            }
        }
    }
}
