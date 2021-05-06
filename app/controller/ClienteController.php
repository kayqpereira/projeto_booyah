<?php
class ClienteController
{
    function abrir_cadastro()
    {
        include_once "../app/view/CadastroCliente.php";
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

        function formatarData($data)
        {
            $data_dividida = explode("/", $data);

            $dia = $data_dividida[0];
            $mes = $data_dividida[1];
            $ano = $data_dividida[2];

            return $dataFormatada = $ano.'-'.$mes.'-'.$dia;
        }

        $cli->nome          = $_POST["nome"];
        $cli->sobrenome     = $_POST["sobrenome"];
        $cli->cpf           = $_POST["cpf"];
        $cli->telefone      = $_POST["telefone"];
        $cli->celular       = $_POST["celular"];
        $cli->data_nasc     = formatarData($_POST["data_nasc"]);
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
