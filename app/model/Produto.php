<?php

class Produto
{
    private $cod_produto;
    private $cod_categoria;
    private $cod_marca;
    private $nome_produto;
    private $estoque;
    private $preco;
    private $descricao;

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
     * Cadastrar um novo produto
     */
    public function cadastrarProduto()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO 
        tbprodutos (cod_categoria, cod_marca, nome_produto, estoque, preco, descricao)
        VALUES     (:cod_categoria, :cod_marca, :nome_produto, :estoque, :preco, :descricao)");

        $cmd->bindParam(":cod_categoria",   $this->cod_categoria);
        $cmd->bindParam(":cod_marca",       $this->cod_marca);
        $cmd->bindParam(":nome_produto",    $this->nome_produto);
        $cmd->bindParam(":estoque",         $this->estoque);
        $cmd->bindParam(":preco",           $this->preco);
        $cmd->bindParam(":descricao",       $this->descricao);

        $cmd->execute();
    }

    /**
     * Consultar todos os produtos
     */
    public function consultarProdutos()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbprodutos");

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Excluír um produto com base no cod
     */
    public function excluirProduto()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("DELETE FROM tbprodutos WHERE cod_produto = :cod_produto");
        $cmd->bindParam(":cod_produto", $this->cod_produto);

        $cmd->execute();
    }
  
    /**
     * Atualizar produto com base no cod
     */
    public function atualizarProduto()
    {
        $con = Conexao::conectar();
        
        $cmd = $con->prepare("UPDATE tbprodutos SET
            cod_categoria   = :cod_categoria,
            cod_marca       = :cod_marca,
            nome_produto    = :nome_produto,
            estoque         = :estoque,
            preco           = :preco,
            descricao       = :descricao,
            WHERE cod_produto = :cod_produto");

        $cmd->bindParam(":cod_produto",     $this->cod_produto);
        $cmd->bindParam(":cod_categoria",   $this->cod_categoria);
        $cmd->bindParam(":cod_marca",       $this->cod_marca);
        $cmd->bindParam(":nome_produto",    $this->nome_produto);
        $cmd->bindParam(":estoque",         $this->estoque);
        $cmd->bindParam(":preco",           $this->preco);
        $cmd->bindParam(":descricao",       $this->descricao);
        
        $cmd->execute();
    }
    
    /**
     * Consultar um produto com base no cod
     */
    public function consultarProdutoCod()
    {
        $con = Conexao::conectar();
    
        $cmd = $con->prepare("SELECT * FROM tbprodutos 
        WHERE cod_produto = :cod_produto");
        $cmd->bindParam(":cod_produto", $this->cod_produto);
    
        $cmd->execute();
    
        return $cmd->fetch(PDO::FETCH_OBJ);
    }
}
