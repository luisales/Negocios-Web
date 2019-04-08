<?php
    require_once("libs/dao.php");

    function obtenerCombomenu()
    {
    $sqlstr = "select * from combos where catCombo LIKE'CMB';";
    $combomenu = array();
    $combomenu = obtenerRegistros($sqlstr);
    return $combomenu;
  }





  ?>
