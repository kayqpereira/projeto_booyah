<?php
if (isset($_REQUEST["classe"]) && isset($_REQUEST["metodo"])) {
    $classe = $_REQUEST["classe"];
    $metodo = $_REQUEST["metodo"];

    include_once "../app/controller/$classe.php";
    $obj = new $classe();

    if (method_exists($obj, $metodo))
        $obj->$metodo();
    else
        include_once "../app/view/cliente/PaginaErro.php";
} else {
    header("location:index.php?classe=HomeController&metodo=abrirPrincipal");
}
