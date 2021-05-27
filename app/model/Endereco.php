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

    // Verifica se o endereço está cadastrado
    public function verificarEnderecoCadastrado()
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

    // Cadastra o endereço
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
}
