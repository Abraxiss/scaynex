<?php include("../data/conexion.php"); ?>
<link rel="stylesheet" href="stylos/stylos.css">
<link rel="stylesheet" href="efectos.css">
<?php include('includes/header.php'); ?>
<?php include('includes/menubar.php'); ?>




<?php
$tabla = 'rd_facturacion';

if (isset($_GET['rd'])) {
  $RD = $_GET['rd'];
  
  // Crear la consulta
  $query = "SELECT * FROM $tabla WHERE Id_SERG='$RD'";
  $result = mysqli_query($conexion, $query);

// Generar tabla
?>

<div class="dropdown-divider"></div> 

<style>
  .form-container {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}


</style>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <h5><span class="icon-folder-open "></span> FACTURACION</h5>
      <div class="form-container text-right">

        <a href="rd_facturacion_create.php?rd=<?php echo $RD ?>" style="color: white ;" type="button" class="btn btn-success mb-2">
          <span class="icon-plus "></span> NUEVO
        </a>
        &nbsp
        <a href="segimientos_read.php?f=<?php echo $FECHAW  ?>" style="color: white ;" type="button" class="btn btn-secondary mb-2">
          <span class="icon-reply "></span> CERRAR
        </a>
      </div>
    </div>
  </div>
</div>

<div class="dropdown-divider"></div> 


<div class="container">
  <div class="row">
    <div class="col-sm">

<table id="example" class="table table-striped table-sm">
  <thead  class="thead-dark">
    <tr>
      <th scope="col">FLETE</th>
      <th scope="col">FACTURA</th>
      <th scope="col">FECHA</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">ESTADO</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  
      <?php while($filas=mysqli_fetch_assoc($result)) { ?>
      <tr>       

      <td>
        <?php echo $filas ['FLETE']  ?> 
      </td>
      <td>
        <?php echo $filas ['NFACTURA']  ?> 

      </td>
      <td>
        <?php echo $filas ['FT_FECHA']  ?>

      </td>
      <td>
        <?php echo $filas ['CLIENTE']  ?>

      </td>
      <td>
        <?php echo $filas ['ESTADO']  ?>

      </td>
      <td>
          <a href="crud_tablas/delete.php?id=<?php echo $filas ['ID_FT']?>&rd=<?php echo $RD ?>&t=<?php echo $tabla ?>" class="btn btn-danger"> 
          <span class="icon-bin"></span>
          </a>
          <a href="rd_facturacion_create.php?id=<?php echo $filas ['ID_FT'] ?>&rd=<?php echo $RD ?>" class="btn btn-primary"> 
          <span class="icon-pencil2"></span>
          </a>          
      </td>    
      </tr>
    <?php } ?>
  
  </tbody>
</table>



    </div>
  </div>
</div>

<?php
}
?>



<?php include('includes/footer.php'); ?>