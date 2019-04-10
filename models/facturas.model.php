<?php
    require_once("libs/dao.php");

    function obtenerFacturas()
    {
    $sqlstr = "select * from factura order by estFactura, fecFactura, horFactura desc ;";
    $factura = array();
    $factura = obtenerRegistros($sqlstr);
    return $factura;
  }
  function obtenerDetalles()
  {
  $sqlstr = "select * from detallefactura where codFactura=". $_GET["codFactura"].";";
  $factura = array();
  $factura = obtenerRegistros($sqlstr);
  return $factura;
}


function actualizarFactura($data)
{
    $updSql = "UPDATE `factura` set
 `estFactura` = '%s'
   where `factura`.`codFactura` = ".$_GET["codFactura"].";";

    $result = ejecutarNonQuery(
        sprintf(
            $updSql,
            $data["estFactura"]
    )
    );
    return $result;
}


  function obtieneComboPorId($codCombo)
  {
      $sqlstr = "Select * from combos where codCombo=%d;";
      return obtenerUnRegistro(sprintf($sqlstr, $codCombo));
  }


  function obtenerCategoria()
  {
      return Array(
          Array("cod" => "ACT", "dsc" => "Activo"),
          Array("cod" => "INC", "dsc" => "Inactivo"),


      );
  }


  ?>
