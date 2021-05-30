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
     * Cadastra uma nova categoria
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
     * Consulta todas as categorias
     */
    function consultarCategorias()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbcategorias");
        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Atualiza uma categoria com base no cod
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
     * Consulta uma categoria com base no cod
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
}
