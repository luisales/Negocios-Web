<?php
/**
 * PHP Version 5
 * Application Router
 *
 * @category Router
 * @package  Router
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @author   Luis Fernando Gomez Figueroa <lgomezf16@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */
session_start();

require_once "libs/utilities.php";

$pageRequest = "home";

if (isset($_GET["page"])) {
    $pageRequest = $_GET["page"];
}

//Incorporando los midlewares son codigos que se deben ejecutar
//Siempre
require_once "controllers/mw/verificar.mw.php";
require_once "controllers/mw/site.mw.php";

// aqui no se toca jajaja la funcion de este index es
// llamar al controlador adecuado para manejar el
// index.php?page=modulo

    //Este switch se encarga de todo el enrutamiento público
switch ($pageRequest) {
    //Accesos Publicos
case "home":
    //llamar al controlador
    include_once "controllers/home.control.php";
    die();
case "login":
    include_once "controllers/security/login.control.php";
    die();
case "logout":
    include_once "controllers/security/logout.control.php";
    die();
}

//Este switch se encarga de todo el enrutamiento que ocupa login
$logged = mw_estaLogueado();
if ($logged) {
    addToContext("layoutFile", "verified_layout");
    include_once 'controllers/mw/autorizar.mw.php';
    if (!isAuthorized($pageRequest, $_SESSION["userCode"])) {

        echo '<script>window.location="Cart.php"</script>';
        die();
    }
    generarMenu($_SESSION["userCode"]);
}

require_once "controllers/mw/support.mw.php";
switch ($pageRequest) {
case "dashboard":
    ($logged)?
      include_once "controllers/dashboard.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "users":
    ($logged)?
      include_once "controllers/security/users.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "user":

      include_once "controllers/security/user.control.php";

    die();
case "roles":
    ($logged)?
      include_once "controllers/security/roles.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "rol":
    ($logged)?
      include_once "controllers/security/rol.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programas":
    ($logged)?
      include_once "controllers/security/programas.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "programa":
    ($logged)?
      include_once "controllers/security/programa.control.php":
      mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "productos":
    ($logged)?
    include_once "controllers/productos.control.php":
    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "producto":
    ($logged)?
    include_once "controllers/producto.control.php":
    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "paises":
    ($logged)?
    include_once "controllers/paises.control.php":
    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
    die();
case "pais":
        ($logged)?
        include_once "controllers/pais.control.php":
        mw_redirectToLogin($_SERVER["QUERY_STRING"]);
        die();
        case "combos":
            ($logged)?
            include_once "controllers/combos.control.php":
            mw_redirectToLogin($_SERVER["QUERY_STRING"]);
            die();
        case "combo":
            ($logged)?
            include_once "controllers/combo.control.php":
            mw_redirectToLogin($_SERVER["QUERY_STRING"]);
            die();
            case "inventarios":
                ($logged)?
                include_once "controllers/inventarios.control.php":
                mw_redirectToLogin($_SERVER["QUERY_STRING"]);
                die();
                case "inventario":
                    ($logged)?
                    include_once "controllers/inventario.control.php":
                    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
                    die();
                case "intermedios":
                    ($logged)?
                    include_once "controllers/intermedios.control.php":
                    mw_redirectToLogin($_SERVER["QUERY_STRING"]);
                    die();
                    case "intermedio":
                        ($logged)?
                        include_once "controllers/intermedio.control.php":
                        mw_redirectToLogin($_SERVER["QUERY_STRING"]);
                        die();
                        case "facturas":
                            ($logged)?
                            include_once "controllers/facturas.control.php":
                            mw_redirectToLogin($_SERVER["QUERY_STRING"]);
                            die();
                            case "factura":
                                ($logged)?
                                include_once "controllers/factura.control.php":
                                mw_redirectToLogin($_SERVER["QUERY_STRING"]);
                                die();


}

addToContext("pageRequest", $pageRequest);
require_once "controllers/error.control.php";
