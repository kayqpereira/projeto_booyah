<?php

class Item
{
    private $cod_item;
    private $cod_produto;
    private $cod_venda;
    private $quantidade;
    private $preco;

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
     * Cadastrar um novo item
     */
    public function cadastrarItem()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO 
        tbitens (cod_produto, cod_venda, quantidade, preco)
        VALUES     (:cod_produto, :cod_venda, :quantidade, :preco)");

        $cmd->bindParam(":cod_produto",   $this->cod_produto);
        $cmd->bindParam(":cod_venda",     $this->cod_venda);
        $cmd->bindParam(":quantidade",    $this->quantidade);
        $cmd->bindParam(":preco",         $this->preco);

        $cmd->execute();
    }

    /**
     * Consultar todos os itens
     */
    public function consultarItens()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbitens");
        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Consultar um item com base no cod
     */
    public function consultarItensPorCodVenda()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbitens WHERE cod_venda = :cod_venda");
        $cmd->bindParam(":cod_venda", $this->cod_venda);

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }
}
