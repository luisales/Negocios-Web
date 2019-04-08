<?php
    require_once("libs/dao.php");

    function obtenerPollos()
    {
    $sqlstr = "select * from combos where catCombo LIKE'IND';";
    $pollos = array();
    $pollos = obtenerRegistros($sqlstr);
    return $pollos;
  }





  ?>
