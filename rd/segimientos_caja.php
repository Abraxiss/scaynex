<?php include("../data/conexion.php"); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/menubar.php'); ?>
<?php

if (isset($_POST['f'])) {
  $fecha = $_POST['f'];

} else  {
  $fecha = $_GET['f'];

}


$query="
SELECT RD_SEGIMIENTOS_HEAD.*, RD_SEGIMIENTOS_HEAD.S_FECHA
FROM RD_SEGIMIENTOS_HEAD
WHERE (((RD_SEGIMIENTOS_HEAD.S_FECHA)='$fecha'))";
$result=mysqli_query($conexion, $query);

?>

<style>
  .form-inline {
  justify-content: flex-end;
}

.btn-primary {
  margin-left: 10px;
}


</style>


<div class="card text-center">
  <div class="card-header">
    <B><h4>
    <span class="icon-truck"></span>  REPORTE DIARIO - CONTROL DE SERVICIOS <?php echo $fecha ?>
    </B></h4>

<div class="dropdown-divider"></div> 

<style>
  .form-container {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}


</style>
<?php
$queryT="
SELECT Count(RD_SEGIMIENTOS_HEAD.Id_SERG) AS CuentaDeId_SERG, RD_SEGIMIENTOS_HEAD.S_FECHA
FROM RD_SEGIMIENTOS_HEAD
GROUP BY RD_SEGIMIENTOS_HEAD.S_FECHA
HAVING (((RD_SEGIMIENTOS_HEAD.S_FECHA)='$fecha'))";
$resultT=mysqli_query($conexion, $queryT);
$filasT=mysqli_fetch_assoc($resultT);

?>
<?php
$queryTS="
SELECT RD_SEGIMIENTOS_HEAD.S_FECHA, Count(RD_SERVICIO.Id_SERV) AS CuentaDeId_SERV
FROM RD_SEGIMIENTOS_HEAD INNER JOIN RD_SERVICIO ON RD_SEGIMIENTOS_HEAD.Id_SERG = RD_SERVICIO.Id_SERG
GROUP BY RD_SEGIMIENTOS_HEAD.S_FECHA
HAVING (((RD_SEGIMIENTOS_HEAD.S_FECHA)='$fecha'))
";
$resultTS=mysqli_query($conexion, $queryTS);
$filasTS=mysqli_fetch_assoc($resultTS);

?>

<?php
$queryEF="
SELECT RD_SEGIMIENTOS_HEAD.S_FECHA, Count(rd_operadores.Id_SERG) AS CuentaDeId_SERV, Sum(EFECTIVO + YAPE + PLIN + OTROEF) AS TOTALEF
FROM RD_SEGIMIENTOS_HEAD INNER JOIN rd_operadores ON RD_SEGIMIENTOS_HEAD.Id_SERG = rd_operadores.Id_SERG
GROUP BY RD_SEGIMIENTOS_HEAD.S_FECHA
HAVING (((RD_SEGIMIENTOS_HEAD.S_FECHA)='$fecha'));

";
$resultEF=mysqli_query($conexion, $queryEF);
$filasEF=mysqli_fetch_assoc($resultEF);

?>





<div style="display: flex; justify-content: space-between;">
  <div class="form-container" style="text-align: right;">
    <a href="segimientos_caja.php?f=<?php echo $fecha ?>">
    <button href="www.google.com" type="button" class="btn btn-outline-primary">EFECTIVO DEL DIA: S/.<?php echo $filasEF ['TOTALEF'] ?>      
    </button>
    </a>
    &nbsp
    <a href="">
    <button type="button" class="btn btn-outline-success">VIAJES DEL DIA: 0<?php echo $filasT ['CuentaDeId_SERG'] ?>
    </button>
    </a>
    &nbsp
    <a href="segimientos_servicios.php?f=<?php echo $fecha ?>">
    <button type="button" class="btn btn-outline-dark">SERVICIOS DEL DIA: 0<?php echo $filasTS ['CuentaDeId_SERV'] ?>      
    </button>
    </a>
  </div>

  <div class="form-container text-right" style="text-align: left;">

        <a href="segimientos_read.php?f=<?php echo $FECHAW ?>" style="color: white ;" type="button" class="btn btn-secondary mb-2">
          <span class="icon-reply "></span> CERRAR
        </a>
  </div>
</div>


  </div>
</div>


<div class="dropdown-divider"></div> 

<?php
$queryCC="

SELECT RD_SEGIMIENTOS_HEAD.S_FECHA, RD_SEGIMIENTOS_HEAD.PLACA, Sum(EFECTIVO+YAPE+PLIN+OTROEF) AS TOTALEF, rd_operadores.TIPO_OP, rd_operadores.NOMBRE, rd_operadores.EFECTIVO, rd_operadores.YAPE, rd_operadores.PLIN, rd_operadores.OTROEF
FROM RD_SEGIMIENTOS_HEAD INNER JOIN rd_operadores ON RD_SEGIMIENTOS_HEAD.Id_SERG = rd_operadores.Id_SERG
WHERE (((RD_SEGIMIENTOS_HEAD.S_FECHA)='$fecha'));


";
$resultCC=mysqli_query($conexion, $queryCC);

?>

<div class="container">
  <div class="row">
    <div class="col-sm">

<table id="example" class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">FECHA</th>
      <th scope="col">PLACA</th>
      <th scope="col">CARGO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">EFECTIVO</th>
      <th scope="col">YAPE</th>
      <th scope="col">PLIN</th>
      <th scope="col">OTRO</th>
      <th scope="col">TOTAL</th>
      
    </tr>
  </thead>
  <tbody>
  
      <?php while($filasCC=mysqli_fetch_assoc($resultCC)) { ?>
      <tr>       

      <td>
        <?php echo $filasCC ['S_FECHA']  ?> 
      </td>
      <td>
        <?php echo $filasCC ['PLACA']  ?> 

      </td>
      <td>
        <?php echo $filasCC ['TIPO_OP']  ?>

      </td>
      <td>
        <?php echo $filasCC ['NOMBRE']  ?>

      </td>
      <td>
        <?php echo $filasCC ['EFECTIVO']  ?>

      </td>
      <td>
        <?php echo $filasCC ['YAPE']  ?>

      </td>
      <td>
        <?php echo $filasCC ['PLIN']  ?>

      </td>
      <td>
        <?php echo $filasCC ['OTROEF']  ?>

      </td>
      <td>
        <?php echo $filasCC ['TOTALEF']  ?>

      </td>    
      </tr>
    <?php } ?>
  
  </tbody>
</table>



    </div>
  </div>
</div>



<?php include('includes/footer.php'); ?>