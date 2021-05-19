<?php

class Cliente
{
    // Tabela Clientes
    private $cod_cliente;
    private $nome;
    private $sobrenome;
    private $cpf;
    private $telefone;
    private $celular;
    private $data_nasc;
    private $complemento;
    private $numero;
    private $email;
    private $senha;

    // Tabela Endereços
    private $cod_endereco;
    private $cep;
    private $estado;
    private $cidade;
    private $bairro;
    private $endereco;

    function __get($atributo)
    {
        return $this->$atributo;
    }
    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    function __construct()
    {
        include_once "Conexao.php";
    }

    // Verifica se o CEP está cadastrado no Banco
    function verificaCepCadastrado()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbenderecos WHERE cep = :cep");
        $cmd->bindParam(":cep", $this->cep);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    // Método cadastrar dados pessoais
    function cadastrarEnderecoDoCliente()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO 
        tbenderecos (cep, estado, bairro, cidade, endereco)
        VALUES      (:cep, :estado, :bairro, :cidade, :endereco)");

        $cmd->bindParam(":cep",         $this->cep);
        $cmd->bindParam(":estado",      $this->estado);
        $cmd->bindParam(":cidade",      $this->cidade);
        $cmd->bindParam(":bairro",      $this->bairro);
        $cmd->bindParam(":endereco",    $this->endereco);

        $cmd->execute();

        return $con->lastInsertId();
    }

    // Método para cadastrar os dados pessoais
    function cadastrarDadosPessoaisCliente()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO 
        tbclientes (cod_endereco, nome, sobrenome, cpf, telefone, data_nasc, celular, email, senha, complemento, numero)
        VALUES     (:cod_endereco, :nome, :sobrenome, :cpf, :telefone, :data_nasc, :celular, :email, :senha, :complemento, :numero)");

        $cmd->bindParam(":cod_endereco",    $this->cod_endereco);
        $cmd->bindParam(":nome",            $this->nome);
        $cmd->bindParam(":sobrenome",       $this->sobrenome);
        $cmd->bindParam(":cpf",             $this->cpf);
        $cmd->bindParam(":telefone",        $this->telefone);
        $cmd->bindParam(":celular",         $this->celular);
        $cmd->bindParam(":data_nasc",       $this->data_nasc);
        $cmd->bindParam(":complemento",     $this->complemento);
        $cmd->bindParam(":numero",          $this->numero);
        $cmd->bindParam(":email",           $this->email);
        $cmd->bindParam(":senha",           $this->senha);

        $cmd->execute();
    }

    // Busca os dados do cliente
    function buscarDadosDoCliente()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbclientes.*, tbenderecos.* FROM tbclientes INNER JOIN tbenderecos 
        ON (tbclientes.cod_endereco = tbenderecos.cod_endereco) WHERE cod_cliente = :cod_cliente");

        $cmd->bindParam(":cod_cliente", $this->cod_cliente);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    // Atualizar os dados pessoais do cliente
    function atualizarDadosPessoaisDoCliente()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("UPDATE tbclientes SET
        cod_endereco    = :cod_endereco,
        nome            = :nome,
        sobrenome       = :sobrenome,
        cpf             = :cpf,
        telefone        = :telefone,
        data_nasc       = :data_nasc,
        celular         = :celular, 
        email           = :email,
        complemento     = :complemento,
        numero          = :numero
        WHERE cod_cliente = :cod_cliente");

        $cmd->bindParam(":cod_cliente",     $this->cod_cliente);
        $cmd->bindParam(":cod_endereco",    $this->cod_endereco);
        $cmd->bindParam(":nome",            $this->nome);
        $cmd->bindParam(":sobrenome",       $this->sobrenome);
        $cmd->bindParam(":cpf",             $this->cpf);
        $cmd->bindParam(":telefone",        $this->telefone);
        $cmd->bindParam(":celular",         $this->celular);
        $cmd->bindParam(":data_nasc",       $this->data_nasc);
        $cmd->bindParam(":complemento",     $this->complemento);
        $cmd->bindParam(":numero",          $this->numero);
        $cmd->bindParam(":email",           $this->email);

        $cmd->execute();
    }

    // Verifica se o email já foi cadastrado
    function verificaEmailCadastrado()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbclientes WHERE email = :email");
        $cmd->bindParam(":email", $this->email);

        $cmd->execute();

        if ($cmd->rowCount() <= 0) {
            return false;
        }
        return true;
    }

    // Verifica se o CPF já foi cadastrado
    function verificaCpfCadastrado()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbclientes WHERE cpf = :cpf");
        $cmd->bindParam(":cpf", $this->cpf);

        $cmd->execute();

        if ($cmd->rowCount() <= 0) {
            return false;
        }
        return true;
    }
}
