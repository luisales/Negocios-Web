<?php
    require_once("libs/dao.php");

    function obtenerContenidoCombo()
    {

    $sqlstr = "SELECT b.codInventario, b.nomInventario, b.canInventario, a.codCombo from Intermedia AS a inner join Inventario AS b on a.codInventario =b.codInventario where a.codCombo = ". $_GET["codCombo"] . ";";
    $intermedios = array();
    $intermedios = obtenerRegistros($sqlstr, $codCombo);

    return $intermedios;
  }
  function obtenerInventario()
  {
  $sqlstr = "select * from inventario;";
  $inventario = array();
  $inventario = obtenerRegistros($sqlstr);
  return $inventario;
}
  function phpAlert($msg) {
      echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  function agregarNuevoCombo($var1, $var2, $var3)
  {
      $insSql = "INSERT INTO `intermedia`
  (`codInventario`, `codCombo`, `canIntermedia`,
  )
  VALUES ( '%s', '%s', %f);";

      $result = ejecutarNonQuery(
          sprintf(
              $insSql,
            $var1,
            $var2,
            $var3
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

  /**
   * Devuelve los Estados Posibles de un Producto
   *
   * @return array
   */
  function obtenerCategoria()
  {
      return Array(
          Array("cod" => "IND", "dsc" => "Individual"),
          Array("cod" => "CMB", "dsc" => "Combo"),

      );
  }



  function eliminarItemCombo( $codInventario, $codCombo)
  {
      $delSql = "delete from `intermedia` where codInventario = %d and codCombo = %d;";
      return ejecutarNonQuery(
          sprintf(
              $delSql,
              $codInventario,
              $codCombo
          )
      );
  }
  ?>
