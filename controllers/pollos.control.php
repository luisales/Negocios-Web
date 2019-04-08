<?php

require_once "models/pollos.model.php";

function run()
{
    $viewData = array();
    $viewData["pollos"] =  obtenerPollos();
    $viewData["nombre"] = "pollos";
    renderizar("pollos", $viewData);
}

run();

 ?>
