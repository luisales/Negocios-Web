<?php
session_start();
    $database_name = "vmart";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"codCarrito");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'codCarrito' => $_GET["id"],
                    'nomCarrito' => $_POST["nombreoculto"],
                    'preCarrito' => $_POST["preciooculto"],
                    'canCarrito' => $_POST["cantidad"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Ya esta en el carro")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'codCarrito' => $_GET["id"],
                'nomCarrito' => $_POST["nombreoculto"],
                'preCarrito' => $_POST["preciooculto"],
                'canCarrito' => $_POST["cantidad"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    if (isset($_POST["limpiar"])){
      Clean();

    }
    function Clean()
    {
      unset($_SESSION["cart"]);

    }
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }


      if (isset($_GET["pay"])){
          if ($_GET["pay"] == "pagar"){



                if(!empty($_SESSION["cart"])){
                    $Val=1;
                    foreach ($_SESSION["cart"] as $key => $value) {

                      $sql = "SELECT b.codInventario, b.nomInventario, a.canIntermedia, b.canInventario from Intermedia AS a inner join Inventario AS b on a.codInventario =b.codInventario where a.codCombo = ". $value["codCarrito"].";";

                        $AcValor=0;
                        $total=0;

                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                $primerValor=$row["canInventario"];
                                $segundoValor=$row["canIntermedia"];
                                    for ($i = 1; $i <= $value["canCarrito"]; $i++) {
                                  $AcValor=$AcValor+ $segundoValor;
                                }
                                $codInv=$row["codInventario"];
                                $total=$primerValor-  $AcValor;
                                if ($total<0)
                                {
                                  $Val=0;


                              }

                                  $AcValor=0;

                              }


                }
                if ($Val==1)
                {
                  $Dia=date('Y-m-d');
                  $Hora=date( 'h:i', strtotime('-8 hours'));

                  $SQL = "INSERT INTO Factura  ( fecFactura, estFactura, horFactura)
                  VALUES ( '$Dia', 'ACT', '$Hora');";

                  if ($con->query($SQL) === TRUE) {
                      $last_id = $con->insert_id;

                  }
                  else {
                    phpAlert($con->error)    ;
                }
                  foreach ($_SESSION["cart"] as $key => $value) {
                $sql = "SELECT b.codInventario, b.nomInventario, a.canIntermedia, b.canInventario from Intermedia AS a inner join Inventario AS b on a.codInventario =b.codInventario where a.codCombo = ". $value["codCarrito"].";";
                          for ($i = 1; $i <= $value["canCarrito"]; $i++) {
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                        $primerValor=$row["canInventario"];
                        $segundoValor=$row["canIntermedia"];
                        $codInv=$row["codInventario"];
                        $total=$primerValor-  $segundoValor;
                        if ($total>0)
                        {
                        $Sql = "UPDATE `inventario`  set
                      `canInventario` = ($total)
                       where `inventario`.`codInventario` = $codInv;";
                        mysqli_query($con, $Sql);
                          $Val=1;

                      }

                      };
                      }
                        $cod =$value["codCarrito"];
                        $cat = $value["canCarrito"];
                        $SQL = "INSERT INTO detalleFactura  ( codFactura, codCombo, cantidad)
                        VALUES ( $last_id ,  $cod,   $cat);";
                        mysqli_query($con, $SQL);




              }
            Clean();
      echo '<script>alert("Factura pagada correctamente")</script>';
          echo '<script>window.location="Cart.php"</script>';
        }  else
                    echo '<script>alert("No se puede cumplir esa orden...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }

              }
            }


    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["codCarrito"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Eliminado del carro...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }



?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Combos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="stylesheet" href="public/css/estilo2.css" />
    <link rel="stylesheet" href="public/css/grid0.css" />
      <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">
    <script src="public/js/jquery.min.js"></script>


</head>

  <div class="menu">
      <div class="brand" style>Vmart</div>
        <ul>

        <li>  <a href="index.php?page=logout">Cerrar Sesión</a></li>
        </div>
      </ul>
  </div>

</header>
<body>
  <br><br><br>
    <div   class="col-s-12 col-m-12 col-l-12 " >

<br><br><br>
        <h3 style="text-align: center;font-size:50px;">Combos</h3>

        <?php
            $query = "SELECT * FROM combos where catCombo='CMB' ORDER BY codCombo ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {


                    ?>  <div class="col-s-6 col-m-5 col-l-3 tab-item">



                        <form  method="post" action="Cart.php?action=add&id=<?php echo $row["codCombo"]; ?>">


                                <img  src="<?php echo $row["urlCombo"]; ?>" >
                                <h5 style="  font-size:35px; " class="tituloitem"><?php echo $row["desCombo"]; ?></h5>

                                <h5 class="text-danger">L. <?php echo  $row["preCombo"]; ?></h5>
                                  <h5 class="text-descrip"><?php echo $row["comCombo"]; ?></h5>
                                <input type="text" name="cantidad" class="form-control" value="1">
                                <input type="hidden"name="nombreoculto" value="<?php echo $row["desCombo"]; ?>">
                                <input type="hidden" name="preciooculto" value="<?php echo $row["preCombo"]; ?>">
                                <input type="hidden" name="hidden_desc" value="<?php echo $row["comCombo"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;"
                                       value="Añadir al carro">

                        </form>
</div>
                      <?php

                }
            }
              ?>

  </div>
  <div   class="col-s-12 col-m-12 col-l-12"  >
    <br><br><br><br>
    <h3  style="font-size:50px;">Individual</h3>

  <?php
            $query = "SELECT * FROM combos where catCombo='IND' ORDER BY codCombo ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>


                    <div class="col-s-6 col-m-5 col-l-3 tab-item">

                        <form  method="post" action="Cart.php?action=add&id=<?php echo $row["codCombo"]; ?>">


                                <img   src="<?php echo $row["urlCombo"];?>">
                                <h5  style="  font-size:35px; " class="tituloitem"><?php echo $row["desCombo"]; ?></h5>

                                <h5 class="text-danger">L. <?php echo  $row["preCombo"]; ?></h5>
                                  <h5 class="text-descrip"><?php echo $row["comCombo"]; ?></h5>
                                <input type="text" name="cantidad" class="form-control" value="1">
                                <input type="hidden" name="nombreoculto" value="<?php echo $row["desCombo"]; ?>">
                                <input type="hidden" name="preciooculto" value="<?php echo $row["preCombo"]; ?>">
                                <input type="hidden" name="hidden_desc" value="<?php echo $row["comCombo"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Añadir al carrin">

                        </form>
                        <br>
                        <br>
                    <br>
                    </div>

                    <?php
                }
            }
        ?>

    </div>
        <div style="clear: both"></div>
        <div>


        <h3 style="font-size: 35px;">Detalle</h3>
        <div class="col-s-10 col-m-10 col-l-10">
            <table  class=" blueTable " >
            <tr>
                <th style="font-size: 30px;" >Nombre</th>
                <th style="font-size: 30px;">Cantidad</th>
                <th style="font-size: 30px;">Precio</th>
                <th style="font-size: 30px;">Total</th>
                <th style="font-size: 30px;" ></th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["nomCarrito"]; ?></td>
                            <td><?php echo $value["canCarrito"]; ?></td>
                            <td>L. <?php echo $value["preCarrito"]; ?></td>
                            <td>
                                L. <?php echo number_format($value["canCarrito"] * $value["preCarrito"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["codCarrito"]; ?>"><span
                                        class="text-danger">Remover</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["canCarrito"] * $value["preCarrito"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">L.  <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php

                    }
                ?>

            </table>
              </div>

                  <?php $fecha = date('H', strtotime('-8 hours'));


            ($fecha <=8 || $fecha >=20) ? $resu="disabled" : $resu="enabled";

 ?>
   <div class="col-s-8 col-m-8 col-l-8 pagar ">
            <?php

          if ( $resu=="enabled")
          echo '<a style="  border-radius:3px;
            border:1px solid #942911;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:13px;
            font-weight:bold;
            padding:8px 24px;
            text-decoration:none;
              background-color:#d0451b;
            text-shadow:0px 1px 0px #854629;" href="Cart.php?pay=pagar" class="disabled"><span
                      class="disabled">Pagar</span></a>';
                      ?>


            <form method="post">

         <input type="submit" name="limpiar" style="margin-top: 5px;" class="btn btn-success"
            value="Limpiar Carrito">

                   </form>
        </div>

  </div>
    </div>


</body>




</html>
