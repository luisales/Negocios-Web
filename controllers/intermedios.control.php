<?php

require_once "models/intermedios.model.php";
require_once 'libs/validadores.php';
function run()
{




        if (isset($_GET["mode"])) {
            $viewData["mode"] = $_GET["mode"];
            $viewData["codInventario"] = $_GET["codInventario"];
            switch($viewData["mode"])
            {
            case 'INS':
              insertarItemCombo($_GET["codInventario"],$_GET["codCombo"],5);
                $viewData["modeDsc"] = "Nuevo Producto al Combo";
                $viewData["isinsert"] = true;
                break;

            case 'DEL':
            $result = eliminarItemCombo($_GET["codInventario"], $_GET["codCombo"]);
            if ($result) {
                redirectWithMessage("Producto Eliminado Satisfactorimente", "index.php?page=combos");

            }

            break;
          }


    $viewData = array();
    $viewData["intermedios"] =  obtenerContenidoCombo();
    $viewData["nombre"] = "Combos";
      renderizar("intermedios", $viewData);
      $Data = array();
      $Data["inventariovisible"] =  obtenerInventario();
      $Data["nombre"] = "Inventarios";
      renderizar("inventariovisible", $Data);
}

}

run();

 ?>
