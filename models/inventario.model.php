<?php
    require_once("libs/dao.php");

    function obtenerInventario()
    {
    $sqlstr = "select * from inventario;";
    $inventario = array();
    $inventario = obtenerRegistros($sqlstr);
    return $inventario;
  }


  function agregarNuevoInv($data)
  {
      $insSql = "INSERT INTO `inventario`
  (`nomInventario`, `canInventario`)
  VALUES ( '%s', %f);";

      $result = ejecutarNonQuery(
          sprintf(
              $insSql,
              $data["nomInventario"],
              $data["canInventario"]

          )
      );
      if ($result) {
          return getLastInserId();
      }

      return false;
  }


  function obtieneInvPorId($codInventario)
  {
      $sqlstr = "Select * from Inventario where codInventario=%d;";
      return obtenerUnRegistro(sprintf($sqlstr, $codInventario));
  }



  function actualizarInv($data)
  {
      $updSql = "UPDATE `inventario` set
   `nomInventario` = '%s', `canInventario` = %f
     where `Inventario`.`codInventario` = %d;";

      $result = ejecutarNonQuery(
          sprintf(
              $updSql,
              $data["nomInventario"],
              $data["canInventario"],
              $data["codInventario"]
          )
      );
      return $result;
  }


  function eliminarInv($codInventario)
  {
      $delSql = "delete from `inventario` where codInventario = %d";
      return ejecutarNonQuery(
          sprintf(
              $delSql,
              $codInventario
          )
      );
  }
  ?>
