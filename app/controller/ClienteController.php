<?php

class ClienteController
{
    function abrir_cadastro()
    {
        include_once "../app/view/CadastroCliente.php";
    }

    function abrir_atualizacao()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        $cli->cod_cliente = 4;
        $dados = $cli->buscarCliente();

        // Formata a data no padrão BR(00/00/0000) ou EUA(0000-00-00)
        function formatarData($data, $padrao)
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

        include_once "../app/view/AtualizarCliente.php";
    }

    function cadastrarCliente()
    {
        include "../app/model/Cliente.php";
        $cli = new Cliente();

        $cli->cep = $_POST["cep"];
        $dados = $cli->buscarCep();

        if (!empty($dados)) {
            $cli->cod_endereco = $dados->cod_endereco;
        } else {
            $cli->cep       = $_POST["cep"];
            $cli->estado    = $_POST["estado"];
            $cli->cidade    = $_POST["cidade"];
            $cli->bairro    = $_POST["bairro"];
            $cli->endereco  = $_POST["endereco"];

            $cli->cod_endereco = $cli->cadastrarEndereco();
        }

        $cli->nome          = $_POST["nome"];
        $cli->sobrenome     = $_POST["sobrenome"];
        $cli->cpf           = $_POST["cpf"];
        $cli->telefone      = $_POST["telefone"];
        $cli->celular       = $_POST["celular"];
        $cli->data_nasc     = formatarData($_POST["data_nasc"], "EUA");
        $cli->email         = $_POST["email"];
        $cli->senha         = hash("sha512", $_POST["senha"]);
        $cli->numero        = $_POST["numero"];
        $cli->complemento   = $_POST["complemento"];

        $cli->cadastrarCliente();

        echo "<script>
                alert('Dados gravados com sucesso!');
                window.location='index.php?classe=ClienteController&metodo=abrir_cadastro';
            </script>";
    }
}
