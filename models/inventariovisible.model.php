<?php
    require_once("libs/dao.php");

    function obtenerInventario()
    {
    $sqlstr = "select * from inventario;";
    $inventario = array();
    $inventario = obtenerRegistros($sqlstr);
    return $inventario;
  }
  function obtenerContenidoCombo()
  {

  $sqlstr = "SELECT b.codInventario, b.nomInventario, b.canInventario, a.codCombo from Intermedia AS a inner join Inventario AS b on a.codInventario =b.codInventario where a.codCombo = ". $_GET["codCombo"] . ";";
  $intermedios = array();
  $intermedios = obtenerRegistros($sqlstr, $codCombo);

  return $intermedios;
}


  }
  ?>
