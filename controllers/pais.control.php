<?php


require_once 'models/paises.model.php';
require_once 'libs/validadores.php';
function run()
{
    $viewData = Array();
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

    $viewData["paiscod"] = "";
    $viewData["paisdsc"] = "";
    $viewData["paisgeo"] = "";
    $viewData["paisfecha"] = "";
    $viewData["paisusuario"] = "";



    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (isset($_GET["mode"])) {
            $viewData["mode"] = $_GET["mode"];
            $viewData["paiscod"] = $_GET["paiscod"];
            switch($viewData["mode"])
            {
            case 'INS':
                $viewData["modeDsc"] = "Nuevo Pais";
                $viewData["isinsert"] = true;
                break;
            case 'UPD':
                if (isset($_GET["paiscod"])) {
                    $viewData["paiscod"] =  $_GET["paiscod"];
                } else {
                    redirectWithMessage(
                        "Código de  Pais no Válido",
                        "index.php?page=paises"
                    );
                    die();
                }
                break;
            case 'DEL':
                $viewData["readonly"] = "readonly";
                if (isset($_GET["paiscod"])) {
                    $viewData["paiscod"] =  $_GET["paiscod"];
                } else {
                    redirectWithMessage(
                        "Código de Pais no Válido",
                        "index.php?page=paises"
                    );
                    die();
                }
                break;
            case 'DSP':
                $viewData["readonly"] = "readonly";
                if (isset($_GET["paiscod"])) {
                    $viewData["paiscod"] =  $_GET["paiscod"];
                } else {
                    redirectWithMessage(
                        "Código de pais no Válido",
                        "index.php?page=paises"
                    );
                    die();
                }
                break;
            }
            $viewData["tocken"] = md5(time().'paises');
            $_SESSION["pais_tocken"] = $viewData["tocken"];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["tocken"])
            && $_POST["tocken"] === $_SESSION["pais_tocken"]
        ) {
             mergeFullArrayTo($_POST, $viewData);
            $viewData["mode"] = $_POST["mode"];
            $viewData["paiscod"] = $_POST["paiscod"];
            $viewData["tocken"] = md5(time().'paises');
            $_SESSION["pais_tocken"] = $viewData["tocken"];

            switch($viewData["mode"])
            {
            case 'INS':
                $viewData["modeDsc"] = "Nuevo Pais";
                $viewData["isinsert"] = true;
                /// validar la data

                //$viewData["errores"] = Array();
                //$viewData["haserrores"] = false;
                if (!$viewData["haserrores"]) {
                    /// llamamos al modelo de datos para insertar el producto
                    $lastID = agregarNuevoPais($_POST);

                        redirectWithMessage("Pais Agregado Satisfactorimente", "index.php?page=paises");

                    }

                break;
            case 'UPD':
                $result = actualizarPais($_POST);
                if ($result) {
                    redirectWithMessage("Pais Actualizado Satisfactorimente", "index.php?page=paises");
                    die();
                } else {
                     $viewData["errores"][] = "No se pudo Actualizar el pais";
                     $viewData["haserrores"] = true;
                }
                break;
            case 'DEL':
                $result = eliminarPais($_POST["paiscod"]);
                if ($result) {
                    redirectWithMessage("Pais Eliminado Satisfactorimente", "index.php?page=paises");
                    die();
                } else {
                     $viewData["errores"][] = "No se pudo Eliminar el Pais";
                     $viewData["haserrores"] = true;
                }
                break;
            }
        } else {
            $viewData["tocken"] = md5(time().'paises');
            $_SESSION["producto_tocken"] = $viewData["tocken"];
            $viewData["errores"][] = "No se pudo validar la información";
            $viewData["haserrores"] = true;
        }
    }

    //Si viene el codigo del producto buscamos el producto en el modelo de datos
    if ($viewData["paiscod"]!=='') {
        $dbPais = obtienePaisPorId($viewData["paiscod"]);

        mergeFullArrayTo($dbPais, $viewData);

        $viewData["modeDsc"] = $modeDescriptions[$viewData["mode"]] .
            $viewData["paiscod"];
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
    renderizar("pais", $viewData);
}

run();

 ?>
