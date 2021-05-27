<?php

class Conexao
{
    static function conectar()
    {
        try {
            $con = new PDO("mysql:host=localhost;dbname=bdboyaah", "root", "");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $con;
        } catch (PDOException $e) {
            echo "Erro:" . $e->getMessage();
        }
    }
}
