<?php
    require_once("libs/dao.php");

    function obtenerPaises()
    {
    $sqlstr = "select * from pais;";
    $paises = array();
    $paises = obtenerRegistros($sqlstr);
    return $paises;
  }
  function agregarNuevoPais($data)
  {
      $insSql = "INSERT INTO `pais`
  ( `paiscod`, `paisdsc`, `paisgeo`, `paisfecha`, `paisusuario`)
  VALUES ( '%s','%s', '%s', '%s', %d);";

      $result = ejecutarNonQuery(
          sprintf(
              $insSql,
              $data["paiscod"],
              $data["paisdsc"],
              $data["paisgeo"],
              $data["paisfecha"],
              $data["paisusuario"],

          )
      );
      if ($result) {
          return getLastInserId();
      }

      return false;
  }
  function obtienePaisPorId($paiscod)
  {
      $sqlstr = "Select * from pais where paiscod='%s';";
      return obtenerUnRegistro(sprintf($sqlstr, $paiscod));
  }
  function actualizarPais($data)
  {
      $updSql = "UPDATE `pais` set
   `paiscod` = '%s', `paisdsc` = '%s', `paisgeo` = '%s', `paisfecha` = '%s',
    `paisusuario` = %d where paiscod ='%s';";

      $result = ejecutarNonQuery(
          sprintf(
              $updSql,
              $data["paiscod"],
              $data["paisdsc"],
              $data["paisgeo"],
              $data["paisfecha"],
              $data["paisusuario"],
              $data["paiscod"],

          )
      );
      return $result;
  }

  /**
   * Eliminando un Producto de l Base de Datos
   *
   * @param integer $prdcod Código del Producto a Eliminar
   *
   * @return boolean Resultado de la eliminación
   */
  function eliminarPais($paiscod)
  {
      $delSql = "delete from `pais` where paiscod = '%s';";
      return ejecutarNonQuery(
          sprintf(
              $delSql,
              $paiscod
          )
      );
  }
?>
