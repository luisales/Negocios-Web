<?php

require_once "models/inventariovisible.model.php";

function run()
{
    $viewData = array();
    $viewData["inventariovisible"] =  obtenerInventario();
    
    $viewData["nombre"] = "Inventarios";
    renderizar("inventariovisible", $viewData);
}

run();

 ?>
