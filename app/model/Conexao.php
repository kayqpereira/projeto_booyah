<?php

class Conexao
{
    static function conectar()
    {
        //iniciando a conexão com mysql e o BD
        $con = new PDO("mysql:host=localhost;dbname=bdboyaah", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $con;
    }
}
