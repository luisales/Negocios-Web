<?php

require_once "models/facturas.model.php";

function run()
{
    $viewData = array();
    $viewData["facturas"] =  obtenerFacturas();
    $viewData["nombre"] = "Facturas";
    renderizar("facturas", $viewData);
}

run();

 ?>
