<?php
    session_start();
    $database_name = "vmart";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Ya esta en el carro")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
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



      if (isset($_GET["pay"])){
          if ($_GET["pay"] == "pagar"){
            $sql = "SELECT b.codInventario, b.canInventario, a.canIntermedia from Intermedia AS a inner join Inventario AS b on a.codInventario =b.codInventario where a.codCombo = 5";
            $Val=1;
              $AcValor=0;
              $total=0;

                  $result = mysqli_query($con, $sql);
                  while($row = mysqli_fetch_assoc($result)) {
                      $primerValor=$row["canInventario"];
                      $segundoValor=$row["canIntermedia"];
                          for ($i = 1; $i <= 100; $i++) {
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
            if ($Val==1)
      {
                  for ($i = 1; $i <= 100; $i++) {
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
              else {
                $Val=0;
              }
              };
              if ($Val==1)
              {

              Clean();
              echo '<script>alert("Pagoo")</script>';
            echo '<script>window.location="Cart.php"</script>';
          }
        }
      }
          else {
            Clean();
            echo '<script>alert("Cantidad de producto no disponible")</script>';
          echo '<script>window.location="Cart.php"</script>';
          }
              }
            }








    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Quitado...!")</script>';
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
    <link rel="stylesheet" href="public/css/papier.css" />
    <link rel="stylesheet" href="public/css/estilo.css" />
    <link rel="stylesheet" href="public/css/grid.css" />
    <script src="public/js/jquery.min.js"></script>


</head>
<header class="row" id="home">
  <br><br>
  <br><br><br><br>
   <nav class="Secundario" class="tab-content row">
         <ul  class="row">
           <li  class="col-s-12 col-m-4 col-x"><a href="Historias.html">Historia</a></li>
           <li  class="col-s-12 col-m-4 col-x"><a href="Empleo.html">Empleo</a></li>
           <li  class="col-s-12 col-m-4 col-x"><a href="Ayudas.html">Donaciones</a></li>
           <li  class="col-s-12 col-m-6 col-x"><a href="Calidad.html">Calidad de Comida</a></li>
            <li  class="col-s-12 col-m-6 col-x"><a href="Contacto.html">Contáctactanos</a></li>
           </ul>
         </nav>
         <nav class="Principal" class="tab-content row">
           <ul class="row">
             <li class="col-s-12 col-m-6 col-4"><a href="MenuPollio.html">MENU</a></li>
             <li class="col-s-12 col-m-6 col-4"><a href="MenuPrincipal.html">MENU PRINCIPAL</a></li>
             <li class="col-s-12 .col-offset-m-6  col-4"><a href="Encuentranos.html">UBICACION</a></li>

           </ul>
         </nav>
</header>
<body>

    <div class="container" style="width: 65%">
      <h2>Carro</h2>
        <h3>Combos</h3>
        <div class="col-m-12">
        <?php
            $query = "SELECT * FROM combos where catCombo='CMB' ORDER BY codCombo ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>

                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["codCombo"]; ?>">

                            <div class="product">
                                <img  style="width:200px; " src="<?php echo $row["urlCombo"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["desCombo"]; ?></h5>

                                <h5 class="text-danger">L. <?php echo  $row["preCombo"]; ?></h5>
                                  <h5 class="text-descrip"><?php echo $row["comCombo"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["desCombo"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["preCombo"]; ?>">
                                <input type="hidden" name="hidden_desc" value="<?php echo $row["comCombo"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Añadir al carrin">
                            </div>
                        </form>
                    </div>
                      <?php

                }
            }
              ?>
  </div>
    <h3>Individual</h3>
    <div class="col-m-12">
  <?php
            $query = "SELECT * FROM combos where catCombo='IND' ORDER BY codCombo ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>


                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["codCombo"]; ?>">

                            <div class="product">
                                <img  style="width:200px; " src="<?php echo $row["urlCombo"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["desCombo"]; ?></h5>

                                <h5 class="text-danger">L. <?php echo  $row["preCombo"]; ?></h5>
                                  <h5 class="text-descrip"><?php echo $row["comCombo"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["desCombo"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["preCombo"]; ?>">
                                <input type="hidden" name="hidden_desc" value="<?php echo $row["comCombo"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Añadir al carrin">
                            </div>
                        </form>
                    </div>

                    <?php
                }
            }
        ?>
  </div>
        <div style="clear: both"></div>
        <h3 class="title2">DEtalle</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Nombre</th>
                <th width="10%">Cantidad</th>
                <th width="13%">PRecio</th>
                <th width="10%">Total</th>
                <th width="17%">Quitar</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>L. <?php echo $value["product_price"]; ?></td>
                            <td>
                                L. <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Quitarrr</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
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
            <a href="Cart.php?pay=pagar"><span
                        class="text-danger">Quitarrr</span></a>
            <form method="post">

         <input type="submit" name="limpiar" style="margin-top: 5px;" class="btn btn-success"
            value="Limpiar Carrito">

                   </form>
        </div>

    </div>


</body>
<nav class="Ultimo">
  <ul>
    <li><a href="MenuPollio.html">MENU</a></li>
    <li><a href="MenuPrincipal.html">MENU PRINCIPAL</a></li>
    <li><a href="Encuentranos.html">UBICACION</a></li>
    <li><a href="#home">subir /\</a></li>
  </ul>
</nav>
<div class="footer">
    Derechos Reservados 2018
</div>


</html>
