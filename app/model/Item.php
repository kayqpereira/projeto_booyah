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
    public function consultarItems()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbitens");
        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Excluír um item com base no cod
     */
    public function excluirItem()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("DELETE FROM tbitens WHERE cod_item = :cod_item");
        $cmd->bindParam(":cod_item", $this->cod_item);

        $cmd->execute();
    }

    /**
     * Atualizar item com base no cod
     */
    public function atualizarItem()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("UPDATE tbitens SET
        cod_produto = :cod_produto
        cod_venda   = :cod_venda,
        quantidade  = :quantidade,
        preco       = :preco,
        WHERE cod_item  = :cod_item,");

        $cmd->bindParam(":cod_item",    $this->cod_item);
        $cmd->bindParam(":cod_produto", $this->cod_produto);
        $cmd->bindParam(":cod_venda",   $this->cod_venda);
        $cmd->bindParam(":quantidade",  $this->quantidade);
        $cmd->bindParam(":preco",       $this->preco);

        $cmd->execute();
    }

    /**
     * Consultar um item com base no cod
     */
    public function consultarItemCod()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbitens 
        WHERE cod_item = :cod_item");
        $cmd->bindParam(":cod_item", $this->cod_item);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }
}
