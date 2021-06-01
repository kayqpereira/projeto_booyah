<?php
class Categoria
{
    private $cod_categoria;
    private $nome_categoria;

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

    /**
     * Cadastrar uma nova categoria
     */
    function cadastrarCategoria()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO tbcategorias 
        (nome_categoria) VALUES (:nome_categoria)");
        $cmd->bindParam(":nome_categoria", $this->nome_categoria);

        $cmd->execute();
    }

    /**
     * Consultar todas as categorias
     */
    function consultarCategorias()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbcategorias");
        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Atualizar uma categoria com base no cod
     */
    function atualizarCategoria()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("UPDATE tbcategorias SET
        nome_categoria = :nome_categoria
        WHERE cod_categoria = :cod_categoria");

        $cmd->bindParam(":cod_categoria",  $this->cod_categoria);
        $cmd->bindParam(":nome_categoria", $this->nome_categoria);

        $cmd->execute();
    }

    /**
     * Excluír uma categoria com base no cod
     */
    function excluirCategoria()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("DELETE FROM tbcategorias WHERE cod_categoria = :cod_categoria ");
        $cmd->bindParam(":cod_categoria", $this->cod_categoria);

        $cmd->execute();
    }

    /**
     * Consultar uma categoria com base no cod
     */
    function consultarCategoriaCod()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbcategorias 
        WHERE cod_categoria = :cod_categoria");
        $cmd->bindParam(":cod_categoria", $this->cod_categoria);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Verificar se a categoria já foi cadastrada
     * @return boolean
     */
    public function verificarCategoria()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbcategorias WHERE nome_categoria = :nome_categoria");
        $cmd->bindParam(":nome_categoria", $this->nome_categoria);

        $cmd->execute();

        if (empty($this->cod_categoria)) {
            if ($cmd->rowCount() <= 0)
                return false;
            else
                return true;
        } else {
            if ($cmd->rowCount() <= 0)
                return false;

            $dados = $cmd->fetch(PDO::FETCH_OBJ);

            if ($this->cod_categoria == $dados->cod_categoria)
                return false;
            else
                return true;
        }
    }
}
