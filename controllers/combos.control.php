<?php

require_once "models/combos.model.php";

function run()
{
    $viewData = array();
    $viewData["combos"] =  obtenerCombo();
    $viewData["nombre"] = "Combos";
    renderizar("combos", $viewData);
}

run();

 ?>
