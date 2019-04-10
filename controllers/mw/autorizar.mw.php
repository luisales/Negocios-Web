<?php
require 'models/security/security.model.php';
require 'models/security/programas.model.php';

function generarMenu($usercod)
{
    $menu = array();
    if(isAuthorized('dashboard',$usercod))$menu[] = array("mdlprg"=>"dashboard","mdldsc"=>"Administración");
    addToContext('appmenu', $menu);
    if(isAuthorized('dashboard',$usercod))$menu[] = array("mdlprg"=>"inventarios","mdldsc"=>"Inventario");
    addToContext('appmenu', $menu);
    if(isAuthorized('dashboard',$usercod))$menu[] = array("mdlprg"=>"combos","mdldsc"=>"Carta de Menu");
    addToContext('appmenu', $menu);

}

function isAuthorized($assetCode, $usercod)
{
    $programa = obtenerFuncionPorCodigo($assetCode);
    if (count($programa) == 0) {
        insertFuncion($assetCode, $assetCode, 'ACT', 'PRG');
    }
    if ($_SESSION["userType"] == 'ADM') {
        return true;
    }
    if ($_SESSION["userType"] == 'USR') {
        return false;
    }
    return estaAutorizado($usercod, $assetCode);
}

function hasAccess($functionCode, $usercod)
{
    $programa = obtenerFuncionPorCodigo($assetCode);
    if (count($programa) == 0) {
        insertPrograma($assetCode, $assetCode, 'ACT', 'FNC');
    }
    if ($_SESSION["userType"] == 'USR') {
        return true;
    }
    return estaAutorizado($usercod, $assetCode);
}
?>
