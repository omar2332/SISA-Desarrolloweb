
<?php

session_start();
	
if(isset($_SESSION['id_usuario'])){
  header("Location: index.php");
}

include_once './PHP/sql.php';
include_once './PHP/usuario.php';
$sql_objeto = new sql();
$usuario_objeto = new usuario();
if(!empty($_POST)){
  $error = '';
  $sql = "SELECT * FROM usuario WHERE email = ? AND id_jerarquia = 2"; //usuario normal

  $sql_objeto->conexion_mysqli();
  $result= $sql_objeto->consulta_individual_mysqli_email_otra($sql);
  var_dump($result);
  $rows = $result->num_rows;
  $var = True;

  if($rows > 0) {
    $error = '';
    $row = $result->fetch_assoc();
    if( !password_verify($_POST['password'],$row['contraseña'])   ){
      $error .= '<div class="alert alert-danger" role="alert">La contraseña no coinciden</div>';
      $var = False;
    }else{
      $_SESSION['id_usuario'] = $row['id_usuario'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['nombre'] = $row['nombre'];
      $_SESSION['id_clasificacion'] = $row['id_jerarquia'];
  
      $usuario_objeto->set_usuario($row['email'],$row['nombre'],$row['apellido'],$row['id_clasificacion'],$row['id_usuario']);
      $_SESSION['usuario'] = $usuario_objeto;
      
      header("location: index.php"); 
      exit();
    }
    
    
    
  }

    $sql2 = "SELECT * FROM usuario WHERE email = ? AND id_jerarquia = 1"; //usuario administrador
    $result2=  $sql_objeto->consulta_individual_mysqli_email_otra($sql2);
    $rows = $result2->num_rows;
    
    


  if($rows > 0) {
      $error = '';
      $row = $result2->fetch_assoc();
      if( !password_verify($_POST['password'],$row['contraseña'])   ){
        $error .= '<div class="alert alert-danger" role="alert">La contraseña no coinciden</div>';
        
      }else{
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['id_clasificacion'] = $row['id_jerarquia'];
        $usuario_objeto->set_usuario($row['email'],$row['nombre'],$row['apellido'],$row['id_clasificacion'],$row['id_usuario']);
        $_SESSION['usuario'] = $usuario_objeto;
        header("location: home.php");
        exit();
      }
      
      
    }else {
    if ($var){
      $error  = '<div class="alert alert-danger" role="alert">El email es incorrecto</div>';

    }
      
    
  } 


}

$sql_objeto->cerrar_mysqli();

?>

<?php include('cabecera_usuario.php'); ?>



    <section class="container">
      <div class="col-md-4 col-lg-8 mx-auto">
        <h3 class="login-heading mb-4 text-sm-center pt-">INICIO DE SESION</h3>
        <form method ="post" class="ml-auto mr-auto">
          <div class="form-label-group py-3">
            <?php
              echo $error;
            ?>
          </div>
          <div class="form-label-group py-3 ">
            <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Correo Electronico">
          </div>          
          <div class="form-label-group py-3 mb-3">
            <input type="password" id="inputPassword" name = "password" class="form-control" placeholder="Contraseña" >                  
          </div>                    
          <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Iniciar Sesion</button>
          <div class="form-group"> <!-- State Button -->               
          </div>
          <div class="text-center">
            <a class="small" href="#" >¿Olvidaste tu contraseña?</a>
          </div>
        </form>
      </div>
    </section>


  
  

        <!-- Footer -->
    <footer class="py-5 bg-dark mt-3">
        <div class="container">
          <p class="m-0 text-center text-white">Copyright</p>
        </div>
        <!-- /.container -->
    </footer>
  <!-- End your project here-->

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>
</html>