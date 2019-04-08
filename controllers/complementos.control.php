<?php

require_once "models/complementos.model.php";

function run()
{
    $viewData = array();
    $viewData["complementos"] =  obtenerComplementos();
    $viewData["nombre"] = "complementos";
    renderizar("complementos", $viewData);
}

run();

 ?>
