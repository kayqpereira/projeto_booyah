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


    // Get and Set
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
        //incluindo classe de conexão
        include_once "Conexao.php";
    }

    // Verifica se o CEP está cadastrado no Banco
    function buscarCep()
    {
        // Conexao com o Banco
        $con = Conexao::conectar();

        // Comando SQL
        $cmd = $con->prepare("SELECT * FROM tbenderecos WHERE cep = :cep");

        // Passando a váriavel para o parâmetro 
        $cmd->bindParam(":cep", $this->cep);

        $cmd->execute();

        // Retorna os dados em forma de objetos
        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    // Método cadastrar dados pessoais
    function cadastrarEndereco()
    {
        // Conexão com o Banco
        $con = Conexao::conectar();

        // Comando SQL
        $cmd = $con->prepare("INSERT INTO 
        tbenderecos (cep, estado, bairro, cidade, endereco)
        VALUES      (:cep, :estado, :bairro, :cidade, :endereco)");

        // Passando as váriaveis para os parâmetros 
        $cmd->bindParam(":cep",         $this->cep);
        $cmd->bindParam(":estado",      $this->estado);
        $cmd->bindParam(":cidade",      $this->cidade);
        $cmd->bindParam(":bairro",      $this->bairro);
        $cmd->bindParam(":endereco",    $this->endereco);

        // Execução do comando
        $cmd->execute();

        // Retorna o último código cadastrado
        return $con->lastInsertId();
    }



    // Método para cadastrar os dados pessoais
    function cadastrarCliente()
    {
        // Conexão com o Banco
        $con = Conexao::conectar();

        // Comando SQL
        $cmd = $con->prepare("INSERT INTO 
        tbclientes (cod_endereco, nome, sobrenome, cpf, telefone, data_nasc, celular, email, senha, complemento, numero)
        VALUES     (:cod_endereco, :nome, :sobrenome, :cpf, :telefone, :data_nasc, :celular, :email, :senha, :complemento, :numero)");

        // Passando as váriaveis para os parâmetros 
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

        // Execução do comando
        $cmd->execute();
    }

    // Método para atualizar os dados do cliente
    function buscarCliente()
    {
        // Conexão com o Banco
        $con = Conexao::conectar();

        // Comando SQL
        $cmd = $con->prepare("SELECT tbclientes.*, tbenderecos.* FROM tbclientes INNER JOIN tbenderecos 
        ON (tbclientes.cod_endereco = tbenderecos.cod_endereco) WHERE cod_cliente = :cod_cliente");

        // Passando a váriavel para o parâmetro 
        $cmd->bindParam(":cod_cliente", $this->cod_cliente);

        // Execução do comando
        $cmd->execute();

        // Retorna os dados em forma de objeto
        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    // Método para atualizar os dados pessoais do cliente
    function atualizarCliente()
    {
        // Conexão como o banco
        $con = Conexao::conectar();

        // Comando SQL
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
        WHERE  cod_cliente = :cod_cliente");

        // Passando as váriaveis para os parâmetros 
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

        // Execução do comando
        $cmd->execute();
    }
}
