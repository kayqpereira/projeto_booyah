<?php

class Cliente
{
    // Tabela Clientes
    private $cod_cliente;
    private $cod_endereco;
    private $nome;
    private $sobrenome;
    private $cpf;
    private $telefone;
    private $celular;
    private $data_nasc;
    private $complemento;
    private $numero;
    private $email;
    private $senha;

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
     * Método para cadastrar os dados pessoais
     */
    public function cadastrarDadosPessoais()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("INSERT INTO 
        tbclientes (cod_endereco, nome, sobrenome, cpf, telefone, data_nasc, celular, email, senha, complemento, numero)
        VALUES     (:cod_endereco, :nome, :sobrenome, :cpf, :telefone, :data_nasc, :celular, :email, :senha, :complemento, :numero)");

        $cmd->bindParam(":cod_endereco",    $this->cod_endereco);
        $cmd->bindParam(":nome",            $this->nome);
        $cmd->bindParam(":sobrenome",       $this->sobrenome);
        $cmd->bindParam(":cpf",             $this->cpf);
        $cmd->bindParam(":telefone",        $this->telefone);
        $cmd->bindParam(":celular",         $this->celular);
        $cmd->bindParam(":data_nasc",       $this->data_nasc);
        $cmd->bindParam(":complemento",     $this->complemento);
        $cmd->bindParam(":numero",          $this->numero);
        $cmd->bindParam(":email",           $this->email);
        $cmd->bindParam(":senha",           $this->senha);

        $cmd->execute();
    }

    /**
     * Consulta todos os clientes
     */
    public function consultarClientes()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbclientes");

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Excluí um cliente com base no cod
     */
    public function excluirCliente()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("DELETE FROM tbclientes WHERE cod_cliente = :cod_cliente");
        $cmd->bindParam(":cod_cliente", $this->cod_cliente);

        $cmd->execute();
    }

    /**
     * Consulta dados de um cliente incluindo seu endereço
     */
    public function consultarDadosCliente()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT tbclientes.*, tbenderecos.* FROM tbclientes INNER JOIN tbenderecos 
        ON (tbclientes.cod_endereco = tbenderecos.cod_endereco) WHERE cod_cliente = :cod_cliente");

        $cmd->bindParam(":cod_cliente", $this->cod_cliente);

        $cmd->execute();

        return $cmd->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Consulta todos os clientes com base no cod_endereco
     */
    public function consultarClientePorCodEnd()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbclientes WHERE cod_endereco = :cod_endereco ");
        $cmd->bindParam(":cod_endereco", $this->cod_endereco);

        $cmd->execute();

        return $cmd->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Atualiza os dados pessoais do cliente com base no cod
     */
    public function atualizarDadosPessoais()
    {
        $con = Conexao::conectar();

        # Caso a senha não esteja vazia cadastra uma nova
        if (!empty($this->senha)) {
            $cmd = $con->prepare("UPDATE tbclientes SET
            cod_endereco    = :cod_endereco,
            nome            = :nome,
            sobrenome       = :sobrenome,
            cpf             = :cpf,
            telefone        = :telefone,
            data_nasc       = :data_nasc,
            celular         = :celular, 
            email           = :email,
            senha           = :senha,
            complemento     = :complemento,
            numero          = :numero
            WHERE cod_cliente = :cod_cliente");

            $cmd->bindParam(":cod_cliente",     $this->cod_cliente);
            $cmd->bindParam(":cod_endereco",    $this->cod_endereco);
            $cmd->bindParam(":nome",            $this->nome);
            $cmd->bindParam(":sobrenome",       $this->sobrenome);
            $cmd->bindParam(":cpf",             $this->cpf);
            $cmd->bindParam(":telefone",        $this->telefone);
            $cmd->bindParam(":celular",         $this->celular);
            $cmd->bindParam(":data_nasc",       $this->data_nasc);
            $cmd->bindParam(":complemento",     $this->complemento);
            $cmd->bindParam(":numero",          $this->numero);
            $cmd->bindParam(":email",           $this->email);
            $cmd->bindParam(":senha",           $this->senha);
        } else {
            $cmd = $con->prepare("UPDATE tbclientes SET
            cod_endereco    = :cod_endereco,
            nome            = :nome,
            sobrenome       = :sobrenome,
            cpf             = :cpf,
            telefone        = :telefone,
            data_nasc       = :data_nasc,
            celular         = :celular, 
            email           = :email,
            complemento     = :complemento,
            numero          = :numero
            WHERE cod_cliente = :cod_cliente");

            $cmd->bindParam(":cod_cliente",     $this->cod_cliente);
            $cmd->bindParam(":cod_endereco",    $this->cod_endereco);
            $cmd->bindParam(":nome",            $this->nome);
            $cmd->bindParam(":sobrenome",       $this->sobrenome);
            $cmd->bindParam(":cpf",             $this->cpf);
            $cmd->bindParam(":telefone",        $this->telefone);
            $cmd->bindParam(":celular",         $this->celular);
            $cmd->bindParam(":data_nasc",       $this->data_nasc);
            $cmd->bindParam(":complemento",     $this->complemento);
            $cmd->bindParam(":numero",          $this->numero);
            $cmd->bindParam(":email",           $this->email);
        }

        $cmd->execute();
    }

    /**
     * Verifica se o email já foi cadastrado
     * @return boolean
     */
    public function verificarEmail()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbclientes WHERE email = :email");
        $cmd->bindParam(":email", $this->email);

        $cmd->execute();

        if (empty($this->cod_cliente)) {
            if ($cmd->rowCount() <= 0)
                return false;
            else
                return true;
        } else {
            if ($cmd->rowCount() <= 0)
                return false;

            $dados = $cmd->fetch(PDO::FETCH_OBJ);

            if ($this->cod_cliente == $dados->cod_cliente)
                return false;
            else
                return true;
        }
    }

    /**
     * Verifica se o CPF já foi cadastrado
     * @return boolean
     */
    public function verificarCpf()
    {
        $con = Conexao::conectar();

        $cmd = $con->prepare("SELECT * FROM tbclientes WHERE cpf = :cpf");
        $cmd->bindParam(":cpf", $this->cpf);

        $cmd->execute();

        if (empty($this->cod_cliente)) {
            if ($cmd->rowCount() <= 0)
                return false;
            else
                return true;
        } else {
            if ($cmd->rowCount() <= 0)
                return false;

            $dados = $cmd->fetch(PDO::FETCH_OBJ);

            if ($this->cod_cliente == $dados->cod_cliente)
                return false;
            else
                return true;
        }
    }
}
