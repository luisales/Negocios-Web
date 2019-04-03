<?php

require_once "models/paises.model.php";

function run()
{
    $viewData = array();
    $viewData["paises"] =  obtenerPaises();
    $viewData["nombre"] = "Paises";
    renderizar("paises", $viewData);
}

run();

 ?>
