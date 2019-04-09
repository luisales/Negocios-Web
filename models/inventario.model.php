<?php
    require_once("libs/dao.php");

    function obtenerInventario()
    {
    $sqlstr = "select * from inventario;";
    $inventario = array();
    $inventario = obtenerRegistros($sqlstr);
    return $inventario;
  }


  function agregarNuevoInventario($data)
  {
      $insSql = "INSERT INTO `inventario`
  (`nomInventario`, `canInventario`)
  VALUES ( '%s', %f);";

      $result = ejecutarNonQuery(
          sprintf(
              $insSql,
              $data["nomInventario"],
              $data["canInventario"],

          )
      );
      if ($result) {
          return getLastInserId();
      }

      return false;
  }


  function obtieneInventarioPorId($codInventario)
  {
      $sqlstr = "Select * from Inventario where codInventario=%d;";
      return obtenerUnRegistro(sprintf($sqlstr, $codInventario));
  }



  function actualizarInventario($data)
  {
      $updSql = "UPDATE `combos` set
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


  function eliminaInventario($codInventario)
  {
      $delSql = "delete from `combos` where codInventario = %d;";
      return ejecutarNonQuery(
          sprintf(
              $delSql,
              $codInventario
          )
      );
  }
  ?>
