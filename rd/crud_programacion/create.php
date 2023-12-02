<?php include("./../../data/conexion.php"); ?>

<?php 

/*---NEW programacion---*/

if (isset($_POST['guardar'])) {
 $S_FECHA = $_POST["S_FECHA"];
 $S_USER = $_POST["id_user"];

$query= "INSERT INTO  rd_segimientos_head(  

S_FECHA,
PLACA,
S_USER 

) VALUES (

'$S_FECHA',
'$PLACA',
'$S_USER'
)";

/*---create ---*/
$result = mysqli_query($conexion, $query);


/*---secion para msj ---*/

/*---redireccion ---*/
mysqli_close($conexion);   

 echo '<script type="text/javascript">
    window.location.href="./../rd_programaciones_read.php?f=' . $S_FECHA . '";
</script>';


}

?>
