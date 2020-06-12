<?php 
include ('cabecera_usuario.php');
session_start();
    if(isset($_SESSION['id_usuario'])){
        header("location: index.php#cotizacion");
      }else{
        echo('<section>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="alert alert-danger" role="alert">
                Por favor <a href="inicio_sesion.php" class="alert-link">INICIE SESIÓN</a> para realizar una cotización.
              </div>
            </div>
          </div>
        </div>
      </section>');
      }
    ?>