<?php

class ClienteController
{
    function abrirCadastro()
    {
        include_once "../app/view/CadastroCliente.php";
    }

    function abrirAtualizacao()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        $cli->cod_cliente = 4;
        $dados = $cli->buscarDadosDoCliente();

        include_once "../app/view/AtualizarCliente.php";
    }

    function cadastrarCliente()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        // Verifica se o CEP já foi cadastrado 
        $cli->cep = $_POST["cep"];
        $dados = $cli->verificaCepCadastrado();

        if (!empty($dados)) {
            // Se foi, então pega o código do endereço para vincular ao cliente
            $cli->cod_endereco = $dados->cod_endereco;
        } else {
            $cli->cep       = $_POST["cep"];
            $cli->estado    = $_POST["estado"];
            $cli->cidade    = $_POST["cidade"];
            $cli->bairro    = $_POST["bairro"];
            $cli->endereco  = $_POST["endereco"];

            $cli->cod_endereco = $cli->cadastrarEnderecoDoCliente();
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

        $cli->cadastrarDadosPessoaisCliente();

        echo "<script>
                alert(\"Dados gravados com sucesso!\");
                window.location=\"index.php?classe=ClienteController&metodo=abrirCadastro\";
            </script>";
    }

    function atualizarCliente()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        $cli->cep = $_POST["cep"];
        $dados = $cli->verificaCepCadastrado();

        if (!empty($dados)) {
            $cli->cod_endereco = $dados->cod_endereco;
        } else {
            $cli->cep       = $_POST["cep"];
            $cli->estado    = $_POST["estado"];
            $cli->cidade    = $_POST["cidade"];
            $cli->bairro    = $_POST["bairro"];
            $cli->endereco  = $_POST["endereco"];

            $cli->cod_endereco = $cli->cadastrarEnderecoDoCliente();
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

        $cli->atualizarDadosPessoaisDoCliente();

        echo "<script>
                alert('Dados atualizados com sucesso!');
                window.location='index.php?classe=ClienteController&metodo=abrirAtualizacao';
            </script>";
    }

    // Formata a data no padrão BR(00/00/0000) ou EUA(0000-00-00)
    function formatarData(string $data, string $padrao)
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

    // Verifica se o CPF já foi cadastrado no Banco
    function verificaCpfCadastrado()
    {
        if (isset($_POST["cpf"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            $cli->cpf = $_POST["cpf"];
            $existe = $cli->verificaCpfCadastrado();

            if ($existe)
                echo json_encode(array("cpf" => "Ops! Este CPF já está cadastrado em nosso sistema."));
            else
                echo json_encode(array("cpf" => ""));
        }
    }

    // Verifica se o email já foi cadastrado no Banco
    function verificaEmailCadastrado()
    {
        if (isset($_POST["email"])) {
            include "../app/model/Cliente.php";
            $cli = new Cliente();

            $cli->email = $_POST["email"];
            $existe = $cli->verificaEmailCadastrado();

            if ($existe)
                echo json_encode(array("email" => "Ops! Este email já está cadastrado em nosso sistema."));
            else
                echo json_encode(array("email" => ""));
        }
    }
}
