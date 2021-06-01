<?php
class Marca
{
    private $cod_marca;
    private $nome_marca;

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
     * Cadastrar uma nova marca
     */
    function cadastrarMarca()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO tbmarcas 
        (nome_marca) VALUES (:nome_marca)");
        $cmd->bindParam(":nome_marca", $this->nome_marca);

        $cmd->execute();
    }

    /**
     * Consultar todas as marcas
     */
    function consultarMarcas()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbmarcas");
        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Atualizar uma marca com base no cod
     */
    function atualizarMarca()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("UPDATE tbmarcas SET
        nome_marca = :nome_marca
        WHERE cod_marca = :cod_marca");

        $cmd->bindParam(":cod_marca",  $this->cod_marca);
        $cmd->bindParam(":nome_marca", $this->nome_marca);

        $cmd->execute();
    }

    /**
     * Excluír uma marca com base no cod
     */
    function excluirMarca()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("DELETE FROM tbmarcas WHERE cod_marca = :cod_marca ");
        $cmd->bindParam(":cod_marca", $this->cod_marca);

        $cmd->execute();
    }

    /**
     * Consultar uma marca com base no cod
     */
    function consultarMarcaCod()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbmarcas 
        WHERE cod_marca = :cod_marca");
        $cmd->bindParam(":cod_marca", $this->cod_marca);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Verificar se a marca já foi cadastrada
     * @return boolean
     */
    public function verificarMarca()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbmarcas WHERE nome_marca = :nome_marca");
        $cmd->bindParam(":nome_marca", $this->nome_marca);

        $cmd->execute();

        if (empty($this->cod_marca)) {
            if ($cmd->rowCount() <= 0)
                return false;
            else
                return true;
        } else {
            if ($cmd->rowCount() <= 0)
                return false;

            $dados = $cmd->fetch(PDO::FETCH_OBJ);

            if ($this->cod_marca == $dados->cod_marca)
                return false;
            else
                return true;
        }
    }
}
