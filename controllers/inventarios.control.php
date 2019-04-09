<?php

require_once "models/inventario.model.php";

function run()
{
    $viewData = array();
    $viewData["inventarios"] =  obtenerInventario();
    $viewData["nombre"] = "Inventarios";
    renderizar("inventarios", $viewData);
}

run();

 ?>
