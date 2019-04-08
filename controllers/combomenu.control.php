<?php

require_once "models/combomenu.model.php";

function run()
{
    $viewData = array();
    $viewData["combomenu"] = obtenerCombomenu();
    $viewData["nombre"] = "combomenu";
    renderizar("combomenu", $viewData);
}

run();

 ?>
