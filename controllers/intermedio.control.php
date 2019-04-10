<?php


require_once 'models/combos.model.php';
require_once 'libs/validadores.php';
function run()
{
    $viewData = Array();
    /*
    prdcod bigint(18) UN AI PK
    prddsc varchar(128)
    prdcodbrr varchar(45)
    prdSKU varchar(45)
    prdStock int(8)
    prdPrcVVnt decimal(13,4)
    prdPrcCpm decimal(13,4)
    prdImgUri varchar(255)
    prdEst char(3)
    prdBio mediumtext
     */
    $modeDescriptions = array(
      "UPD" => "Actualizando ",
      "DEL" => "Eliminando ",
      "DSP" => "Detalle de "
    );

    $viewData["mode"] = "";
    $viewData["modeDsc"] = "";
    $viewData["tocken"] = "";
    $viewData["errores"] = Array();
    $viewData["haserrores"] = false;
    $viewData["readonly"] = false;
    $viewData["isupdate"] = false;
    $viewData["isinsert"] = false;

    $viewData["categoria"] = obtenerCategoria();

    $viewData["codCombo"] = "";
    $viewData["desCombo"] = "";
    $viewData["preCombo"] = "";
    $viewData["catCombo"] = "";
    $viewData["urlCombo"] = "";


    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET["mode"])) {
            $viewData["mode"] = $_GET["mode"];
            $viewData["codInventario"] = $_GET["codInventario"];
            switch($viewData["mode"])
            {
            case 'INS':
                $viewData["modeDsc"] = "Nuevo Producto al Combo";
                $viewData["isinsert"] = true;
                break;

            case 'DEL':
                $viewData["readonly"] = "readonly";
                if (isset($_GET["codInventario"])) {
                    $viewData["codInventario"] =  $_GET["codInventario"];
                } else {
                    redirectWithMessage(
                        "Código de Producto no Válido",
                        "index.php?page=intermedios"
                    );
                    die();
                }
                break;

            }
            $viewData["tocken"] = md5(time().'intermedia');
            $_SESSION["intermedia_tocken"] = $viewData["tocken"];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["tocken"])
            && $_POST["tocken"] === $_SESSION["intermedia_tocken"]
        ) {
             mergeFullArrayTo($_POST, $viewData);
            $viewData["mode"] = $_POST["mode"];
            $viewData["codInventario"] = $_POST["codInventario"];
            $viewData["tocken"] = md5(time().'intermedia');
            $_SESSION["intermedia_tocken"] = $viewData["tocken"];

            switch($viewData["mode"])
            {
            case 'INS':
                $viewData["modeDsc"] = "Nuevo Producto al Menú";
                $viewData["isinsert"] = true;


                if (!$viewData["haserrores"]) {

                    $lastID = agregarNuevoItemCombo($_POST);
                    if ($lastID) {
                        redirectWithMessage("Producto Agregado Satisfactorimente", "index.php?page=intermedios");
                        die();
                    } else {
                        $viewData["errores"][] = "No se pudo agregar el producto";
                        $viewData["haserrores"] = true;
                    }
                }
                break;

            case 'DEL':
                $result = eliminarItemCombo($_POST["codInventario"]);
                if ($result) {
                    redirectWithMessage("Producto Eliminado Satisfactorimente", "index.php?page=inventarios");
                    die();
                } else {
                     $viewData["errores"][] = "No se pudo Eliminar el producto";
                     $viewData["haserrores"] = true;
                }
                break;
            }
        } else {
            $viewData["tocken"] = md5(time().'combos');
            $_SESSION["combos_tocken"] = $viewData["tocken"];
            $viewData["errores"][] = "No se pudo validar la información";
            $viewData["haserrores"] = true;
        }
    }

    //Si viene el codigo del producto buscamos el producto en el modelo de datos
    if ($viewData["codCombo"]!=='') {
        $dbCombos = obtieneItemComboPorId($viewData["codCombo"]);

        mergeFullArrayTo($dbCombos, $viewData);

        $viewData["categoria"] = addSelectedCmbArray(
            $viewData["categoria"],
            "cod",
            $viewData["catCombo"],
            "selected"
        );
        $viewData["modeDsc"] = $modeDescriptions[$viewData["mode"]] .
            $viewData["desCombo"];

    }
    renderizar("intermedia", $viewData);
}

run();

 ?>
