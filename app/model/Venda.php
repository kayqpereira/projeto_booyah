<?php

class Venda
{
    private $cod_venda;
    private $cod_cliente;
    private $forma_pag;
    private $meio_entrega;
    private $data_venda;
    private $hora;
    private $frete;

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
     * Cadastrar uma nova venda
     */
    public function cadastrarVenda()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO 
        tbvendas (cod_cliente, forma_pag, meio_entrega, data_venda, hora, frete)
        VALUES     (:cod_cliente, :forma_pag, :meio_entrega, :data_venda, :hora, :frete)");

        $cmd->bindParam(":cod_cliente",     $this->cod_cliente);
        $cmd->bindParam(":forma_pag",       $this->forma_pag);
        $cmd->bindParam(":meio_entrega",    $this->meio_entrega);
        $cmd->bindParam(":data_venda",      $this->data_venda);
        $cmd->bindParam(":hora",            $this->hora);
        $cmd->bindParam(":frete",           $this->frete);

        $cmd->execute();
    }

    /**
     * Consultar todas as vendas
     */
    public function consultarVendas()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbvendas.*, CONCAT(tbclientes.nome,' ', tbclientes.sobrenome) AS nome
        FROM tbvendas INNER JOIN tbclientes ON tbvendas.cod_cliente = tbclientes.cod_cliente");
        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Consulta as vendas pelo cod cliente
     */
    public function consultarVendaCodCli()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbvendas WHERE cod_cliente = :cod_cliente");
        $cmd->bindParam(":cod_cliente",     $this->cod_cliente);

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }
}
