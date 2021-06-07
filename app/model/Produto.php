<?php

class Produto
{
    private $cod_produto;
    private $cod_categoria;
    private $cod_marca;
    private $nome_produto;
    private $estoque;
    private $preco;
    private $destaque;
    private $ativo;
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
        tbprodutos (cod_categoria, cod_marca, nome_produto, estoque, preco, destaque, ativo, descricao)
        VALUES     (:cod_categoria, :cod_marca, :nome_produto, :estoque, :preco, :destaque, :ativo, :descricao)");

        $cmd->bindParam(":cod_categoria",   $this->cod_categoria);
        $cmd->bindParam(":cod_marca",       $this->cod_marca);
        $cmd->bindParam(":nome_produto",    $this->nome_produto);
        $cmd->bindParam(":estoque",         $this->estoque);
        $cmd->bindParam(":preco",           $this->preco);
        $cmd->bindParam(":destaque",        $this->destaque);
        $cmd->bindParam(":ativo",           $this->ativo);
        $cmd->bindParam(":descricao",       $this->descricao);

        $cmd->execute();
    }

    /**
     * Consultar todos os produtos
     */
    public function consultarProdutos()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbprodutos.*, tbmarcas.nome_marca, tbcategorias.nome_categoria, tbimagens.*  FROM tbprodutos 
        INNER JOIN tbmarcas ON (tbprodutos.cod_marca = tbmarcas.cod_marca)
        INNER JOIN tbcategorias ON (tbprodutos.cod_categoria = tbcategorias.cod_categoria)
        INNER JOIN tbimagens ON (tbprodutos.cod_produto = tbimagens.cod_produto)
        GROUP BY tbprodutos.cod_produto");

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Consultar todos os produtos ativos
     */
    public function consultarProdutosAtivos()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbprodutos.*, tbmarcas.nome_marca, tbcategorias.nome_categoria, tbimagens.*  FROM tbprodutos 
        INNER JOIN tbmarcas ON (tbprodutos.cod_marca = tbmarcas.cod_marca)
        INNER JOIN tbcategorias ON (tbprodutos.cod_categoria = tbcategorias.cod_categoria)
        INNER JOIN tbimagens ON (tbprodutos.cod_produto = tbimagens.cod_produto)
        WHERE tbprodutos.ativo = 1 AND tbprodutos.estoque > 0
        GROUP BY tbprodutos.cod_produto ORDER BY tbprodutos.destaque DESC");

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
        destaque        = :destaque,
        ativo           = :ativo,
        descricao       = :descricao
        WHERE cod_produto = :cod_produto");

        $cmd->bindParam(":cod_produto",     $this->cod_produto);
        $cmd->bindParam(":cod_categoria",   $this->cod_categoria);
        $cmd->bindParam(":cod_marca",       $this->cod_marca);
        $cmd->bindParam(":nome_produto",    $this->nome_produto);
        $cmd->bindParam(":estoque",         $this->estoque);
        $cmd->bindParam(":preco",           $this->preco);
        $cmd->bindParam(":destaque",        $this->destaque);
        $cmd->bindParam(":ativo",           $this->ativo);
        $cmd->bindParam(":descricao",       $this->descricao);

        $cmd->execute();
    }

    /**
     * Consultar um produto com base no cod
     */
    public function consultarProdutoCod()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbprodutos.*, tbmarcas.nome_marca, tbcategorias.nome_categoria, tbimagens.*  FROM tbprodutos 
        INNER JOIN tbmarcas ON (tbprodutos.cod_marca = tbmarcas.cod_marca)
        INNER JOIN tbcategorias ON (tbprodutos.cod_categoria = tbcategorias.cod_categoria)
        INNER JOIN tbimagens ON (tbprodutos.cod_produto = tbimagens.cod_produto)
        WHERE tbprodutos.cod_produto = :cod_produto GROUP BY tbprodutos.cod_produto ORDER BY tbprodutos.destaque DESC");

        $cmd->bindParam(":cod_produto", $this->cod_produto);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Consultar todos os produtos com base no cod_marca
     */
    public function consultarProdutoPorCodMarca()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbprodutos.*, tbmarcas.nome_marca, tbcategorias.nome_categoria, tbimagens.*  FROM tbprodutos 
        INNER JOIN tbmarcas ON (tbprodutos.cod_marca = tbmarcas.cod_marca)
        INNER JOIN tbcategorias ON (tbprodutos.cod_categoria = tbcategorias.cod_categoria)
        INNER JOIN tbimagens ON (tbprodutos.cod_produto = tbimagens.cod_produto)
        WHERE tbprodutos.cod_marca = :cod_marca GROUP BY tbprodutos.cod_produto ORDER BY tbprodutos.destaque DESC");

        $cmd->bindParam(":cod_marca", $this->cod_marca);

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Consultar todos os produtos com base no cod_categoria
     */
    public function consultarProdutoPorCategoria()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbprodutos.*, tbmarcas.nome_marca, tbcategorias.nome_categoria, tbimagens.*  FROM tbprodutos 
        INNER JOIN tbmarcas ON (tbprodutos.cod_marca = tbmarcas.cod_marca)
        INNER JOIN tbcategorias ON (tbprodutos.cod_categoria = tbcategorias.cod_categoria)
        INNER JOIN tbimagens ON (tbprodutos.cod_produto = tbimagens.cod_produto)
        WHERE tbprodutos.cod_categoria = :cod_categoria GROUP BY tbprodutos.cod_produto");

        $cmd->bindParam(":cod_categoria", $this->cod_categoria);

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Consultar todos os produtos pelo nome
     */
    public function consultarProdutoPorNome()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbprodutos.*, tbmarcas.nome_marca, tbcategorias.nome_categoria, tbimagens.*  FROM tbprodutos 
        INNER JOIN tbmarcas ON (tbprodutos.cod_marca = tbmarcas.cod_marca)
        INNER JOIN tbcategorias ON (tbprodutos.cod_categoria = tbcategorias.cod_categoria)
        INNER JOIN tbimagens ON (tbprodutos.cod_produto = tbimagens.cod_produto)
        WHERE tbprodutos.nome_produto LIKE :nome_produto GROUP BY tbprodutos.cod_produto");

        $cmd->bindValue(":nome_produto", "%" . $this->nome_produto . "%");

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Verificar se o produto já foi cadastrado
     * @return boolean
     */
    public function verificarProduto()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbprodutos WHERE nome_produto = :nome_produto");
        $cmd->bindParam(":nome_produto", $this->nome_produto);

        $cmd->execute();

        if (empty($this->cod_produto)) {
            if ($cmd->rowCount() <= 0)
                return false;
            else
                return true;
        } else {
            if ($cmd->rowCount() <= 0)
                return false;

            $dados = $cmd->fetch(PDO::FETCH_OBJ);

            if ($this->cod_produto == $dados->cod_produto)
                return false;
            else
                return true;
        }
    }
}
