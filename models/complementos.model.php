<?php
    require_once("libs/dao.php");

    function obtenerComplementos()
    {
    $sqlstr = "select * from combos where catCombo LIKE'COM';";
    $complementos = array();
    $complementos = obtenerRegistros($sqlstr);
    return $complementos;
  }





  ?>
