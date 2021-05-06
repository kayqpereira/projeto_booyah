<?php
if(isset($_REQUEST["classe"]) && isset($_REQUEST["metodo"]))
{
    $classe = $_REQUEST["classe"]; 
    $metodo = $_REQUEST["metodo"];

    include_once "../app/controller/$classe.php";
    $obj = new $classe();
    $obj->$metodo();
}
else
{
    //incluir página home
    include_once "../app/view/Home.php";
}
