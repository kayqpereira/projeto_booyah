<?php

class Endereco
{
    private $cod_endereco;
    private $cep;
    private $estado;
    private $cidade;
    private $bairro;
    private $endereco;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __construct()
    {
        include_once "Conexao.php";
    }

    /**
     * Cadastrar um novo endereço
     */
    public function cadastrarEndereco()
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

    /**
     * Consultar todos os endereços
     */
    public function consultarEnderecos()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbenderecos");

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Atualizar o endereço com base no cod
     */
    public function atualizarEndereco()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("UPDATE tbenderecos SET
        cep       = :cep,
        bairro    = :bairro,
        endereco  = :endereco,
        cidade    = :cidade,
        estado    = :estado
        WHERE cod_endereco = :cod_endereco");

        $cmd->bindParam(":cod_endereco",  $this->cod_endereco);
        $cmd->bindParam(":cep",           $this->cep);
        $cmd->bindParam(":bairro",        $this->bairro);
        $cmd->bindParam(":endereco",      $this->endereco);
        $cmd->bindParam(":estado",        $this->estado);
        $cmd->bindParam(":cidade",        $this->cidade);

        $cmd->execute();
    }

    /**
     * Consultar um endereço com base no cod 
     */
    public function consultarEnderecoCod()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbenderecos WHERE cod_endereco = :cod_endereco");
        $cmd->bindParam(":cod_endereco", $this->cod_endereco);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }


    /**
     * Verificar se o endereço está cadastrado
     */
    public function verificarEndereco()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbenderecos 
        WHERE cep    = :cep 
        AND estado   = :estado 
        AND bairro   = :bairro 
        AND cidade   = :cidade 
        AND endereco = :endereco");

        $cmd->bindParam(":cep",         $this->cep);
        $cmd->bindParam(":estado",      $this->estado);
        $cmd->bindParam(":cidade",      $this->cidade);
        $cmd->bindParam(":bairro",      $this->bairro);
        $cmd->bindParam(":endereco",    $this->endereco);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }
}
