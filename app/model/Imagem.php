<?php
class Imagem
{
    private $cod_imagem;
    private $nome_imagem;
    private $cod_produto;

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
     * Cadastrar nova imagem
     */
    function cadastrarImagem()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO tbimagens 
        (nome_imagem, cod_produto) VALUES (:nome_imagem, :cod_produto)");

        $cmd->bindParam(":cod_produto",    $this->cod_produto);
        $cmd->bindParam(":nome_imagem",    $this->nome_imagem);

        $cmd->execute();
    }

    /**
     * Consultar imagens com base no cod_produto
     */
    function consultarImagensCodProd()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbimagens WHERE cod_produto = :cod_produto");
        $cmd->bindParam(":cod_produto",    $this->cod_produto);

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Excluír uma imagem com base no cod
     */
    function excluirImagem()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("DELETE FROM tbimagens WHERE cod_imagem = :cod_imagem ");
        $cmd->bindParam(":cod_imagem", $this->cod_imagem);

        $cmd->execute();
    }

    /**
     * Consultar imagens com base no cod
     */
    function consultarImagensCod()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbimagens WHERE cod_imagem = :cod_imagem");
        $cmd->bindParam(":cod_imagem",    $this->cod_imagem);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }
}
