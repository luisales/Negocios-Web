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
            $viewData["codCombo"] = $_GET["codCombo"];
            switch($viewData["mode"])
            {
            case 'INS':
                $viewData["modeDsc"] = "Nuevo Producto";
                $viewData["isinsert"] = true;
                break;
            case 'UPD':
                if (isset($_GET["codCombo"])) {
                    $viewData["codCombo"] =  $_GET["codCombo"];
                } else {
                    redirectWithMessage(
                        "Código de Producto no Válido",
                        "index.php?page=combos"
                    );
                    die();
                }
                break;
            case 'DEL':
                $viewData["readonly"] = "readonly";
                if (isset($_GET["codCombo"])) {
                    $viewData["codCombo"] =  $_GET["codCombo"];
                } else {
                    redirectWithMessage(
                        "Código de Producto no Válido",
                        "index.php?page=combos"
                    );
                    die();
                }
                break;
            case 'DSP':
                $viewData["readonly"] = "readonly";
                if (isset($_GET["codCombo"])) {
                    $viewData["codCombo"] =  $_GET["codCombo"];
                } else {
                    redirectWithMessage(
                        "Código de Producto no Válido",
                        "index.php?page=combos"
                    );
                    die();
                }
                break;
            }
            $viewData["tocken"] = md5(time().'combos');
            $_SESSION["combos_tocken"] = $viewData["tocken"];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["tocken"])
            && $_POST["tocken"] === $_SESSION["combos_tocken"]
        ) {
             mergeFullArrayTo($_POST, $viewData);
            $viewData["mode"] = $_POST["mode"];
            $viewData["codCombo"] = $_POST["codCombo"];
            $viewData["tocken"] = md5(time().'combos');
            $_SESSION["combos_tocken"] = $viewData["tocken"];

            switch($viewData["mode"])
            {
            case 'INS':
                $viewData["modeDsc"] = "Nuevo Producto";
                $viewData["isinsert"] = true;

                //$viewData["errores"] = Array();
                //$viewData["haserrores"] = false;
                if (!$viewData["haserrores"]) {
                    /// llamamos al modelo de datos para insertar el producto
                    $lastID = agregarNuevoCombo($_POST);
                    if ($lastID) {
                        redirectWithMessage("Producto Agregado Satisfactorimente", "index.php?page=combos");
                        die();
                    } else {
                        $viewData["errores"][] = "No se pudo agregar el producto";
                        $viewData["haserrores"] = true;
                    }
                }
                break;
            case 'UPD':
                $result = actualizarCombo($_POST);
                if ($result) {
                    redirectWithMessage("Producto Actualizado Satisfactorimente", "index.php?page=combos");
                    die();
                } else {
                     $viewData["errores"][] = "No se pudo Actualizar el producto";
                     $viewData["haserrores"] = true;
                }
                break;
            case 'DEL':
                $result = eliminarCombo($_POST["codCombo"]);
                if ($result) {
                    redirectWithMessage("Producto Eliminado Satisfactorimente", "index.php?page=combos");
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
        $dbCombos = obtieneComboPorId($viewData["codCombo"]);

        mergeFullArrayTo($dbCombos, $viewData);

        $viewData["categoria"] = addSelectedCmbArray(
            $viewData["categoria"],
            "cod",
            $viewData["catCombo"],
            "selected"
        );
        $viewData["modeDsc"] = $modeDescriptions[$viewData["mode"]] .
            $viewData["desCombo"];
/*
        $viewData["prddsc"] = $dbProducto[""];
        $viewData["prdcodbrr"] = $dbProducto[""];
        $viewData["prdSKU"] = $dbProducto[""];
        $viewData["prdStock"] = "";
        $viewData["prdPrcVVnt"] = "";
        $viewData["prdPrcCpm"] = "";
        $viewData["prdImgUri"] = "";
        $viewData["prdEst"] = "";
        $viewData["prdBio"] = "";
        */
    }
    renderizar("combo", $viewData);
}

run();

 ?>
