<?php

require_once "models/productos.model.php";

function run()
{
    $viewData = array();
    $viewData["productos"] =  obtenerProductos();
    $viewData["nombre"] = "Productos ABC";
    renderizar("productos", $viewData);
}

run();

 ?>
