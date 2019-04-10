<?php


require_once 'models/facturas.model.php';
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

    $viewData["codFactura"] = "";
    $viewData["fecFactura"] = "";
    $viewData["horFactura"] = "";
    $viewData["estFactura"] = "";



    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET["mode"])) {
            $viewData["mode"] = $_GET["mode"];
            $viewData["codFactura"] = $_GET["codFactura"];
            switch($viewData["mode"])
            {

            case 'UPD':
                if (isset($_GET["codFactura"])) {
                    $viewData["codFactura"] =  $_GET["codFactura"];
                } else {
                    redirectWithMessage(
                        "Código de Factura no Válido",
                        "index.php?page=facturas"
                    );
                    die();
                }
                break;

            case 'DSP':
                $viewData["readonly"] = "readonly";
                if (isset($_GET["codFactura"])) {
                    $viewData["codFactura"] =  $_GET["codFactura"];
                } else {
                    redirectWithMessage(
                        "Código de Factura no Válido",
                        "index.php?page=facturas"
                    );
                    die();
                }
                break;
            }
            $viewData["tocken"] = md5(time().'combos');
            $_SESSION["facturas_tocken"] = $viewData["tocken"];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["tocken"])
            && $_POST["tocken"] === $_SESSION["facturas_tocken"]
        ) {
             mergeFullArrayTo($_POST, $viewData);
            $viewData["mode"] = $_POST["mode"];
            $viewData["codFactura"] = $_POST["codFactura"];
            $viewData["tocken"] = md5(time().'combos');
            $_SESSION["facturas_tocken"] = $viewData["tocken"];

            switch($viewData["mode"])
            {

            case 'UPD':
                $result = actualizarFactura($_POST);
                if ($result) {
                    redirectWithMessage("Factura Actualizada Satisfactorimente", "index.php?page=facturas");
                    die();
                } else {
                     $viewData["errores"][] = "No se pudo Actualizar la factura";
                     $viewData["haserrores"] = true;
                }
                break;

            }
        } else {
            $viewData["tocken"] = md5(time().'facturas');
            $_SESSION["facturas_tocken"] = $viewData["tocken"];
            $viewData["errores"][] = "No se pudo validar la información";
            $viewData["haserrores"] = true;
        }
    }

    //Si viene el codigo del producto buscamos el producto en el modelo de datos
    if ($viewData["codFactura"]!=='') {
        $dbFacturas = obtieneComboPorId($viewData["codFactura"]);

        mergeFullArrayTo($dbFacturas, $viewData);

        $viewData["categoria"] = addSelectedCmbArray(
            $viewData["categoria"],
            "cod",
            $viewData["estFactura"],
            "selected"
        );
        $viewData["modeDsc"] = $modeDescriptions[$viewData["mode"]] .
            $viewData["fecFactura"];
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
    renderizar("factura", $viewData);
    $Data = array();
    $Data["detalle"] =  obtenerDetalles();
    $Data["nombre"] = "Facturas";
    renderizar("detalle", $Data);
}

run();

 ?>
