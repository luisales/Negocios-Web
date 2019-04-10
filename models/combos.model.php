<?php
    require_once("libs/dao.php");

    function obtenerCombo()
    {
    $sqlstr = "select * from combos;";
    $combos = array();
    $combos = obtenerRegistros($sqlstr);
    return $combos;
  }


  function agregarNuevoCombo($data)
  {
      $insSql = "INSERT INTO `combos`
  (`desCombo`, `preCombo`, `catCombo`,
  `urlCombo`,`comCombo`)
  VALUES ( '%s', %f,'%s','%s','%s');";

      $result = ejecutarNonQuery(
          sprintf(
              $insSql,
              $data["desCombo"],
              $data["preCombo"],
              $data["catCombo"],
              $data["urlCombo"],
              $data["comCombo"]
          )
      );
      if ($result) {
          return getLastInserId();
      }

      return false;
  }


  function obtieneComboPorId($codCombo)
  {
      $sqlstr = "Select * from combos where codCombo=%d;";
      return obtenerUnRegistro(sprintf($sqlstr, $codCombo));
  }

  function obtieneItemComboPorId($codCombo)
  {
      $sqlstr = "Select * from combos where codCombo=%d;";
      return obtenerUnRegistro(sprintf($sqlstr, $codCombo));
  }


  function obtenerCategoria()
  {
      return Array(
          Array("cod" => "IND", "dsc" => "Individual"),
          Array("cod" => "CMB", "dsc" => "Combo"),


      );
  }


function eliminarIntCombo($codCombo)
{
  $delSql = "delete from `intermedia` where codCombo = %d;";
  return ejecutarNonQuery(
      sprintf(
          $delSql,
          $codCombo
      )
  );
}

  function eliminarCombo($codCombo)
  {

      $delSql = "delete from `combos` where codCombo = %d;";
      return ejecutarNonQuery(
          sprintf(
              $delSql,
              $codCombo
          )
      );
  }
  ?>
