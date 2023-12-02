<?php include('session.php'); ?>


<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="stylosmenu.css">

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #094D7F;">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 

<a class="btn btn-info"  href=""><?php  echo $FECHAW ; ?></a>  
    
  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      <li class="nav-item active">
         <a class="nav-link" href="home.php">HOME</a>
      </li>     


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PROGRAMACION
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="rd_plantilla_read.php">PLANTILLA</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="rd_programaciones_read.php?f=<?php echo $FECHAW ?>">PROGRAMACIONES</a>
        </div>
      </li>

      <li class="nav-item active">

        <a class="nav-link" href="segimientos_read.php?f=<?php echo $FECHAW ?>">SEGUIMIENTO</a>
      </li>



      <li class="nav-item active">
        <a class="nav-link active" href="user_update.php">MI PERFIL</a>
      </li>


    </ul>

  </div>




          <div class="userup">
            <span class="icon-user">&nbsp</span>
            <h6 class="font-weight-bold"> <?php  echo $userup ; ?>&nbsp &nbsp</h6>   
          <a href="#V1" class="btn btn-danger" data-toggle="modal"> 
           <span class="icon-exit"></span>
          </a>

          </div>



<div class="modal" tabindex="-1" role="dialog" id="V1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CERRAR SESIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas Cerrar Sesión?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CANCELAR</button>
          <a href="./valida/valida_exit.php" class="btn btn-danger" > 

         CERRAR SESIÓN
          </a>
        
      </div>
    </div>
  </div>
</div>



</nav>