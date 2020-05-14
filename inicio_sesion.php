
<?php

session_start();
	
if(isset($_SESSION['id_usuario'])){
  header("Location: index.php");
}

include_once 'conexion_mysqli.php';

if(!empty($_POST))
{

 
  $usuario = mysqli_real_escape_string($mysqli,$_POST['email']);
  $password = mysqli_real_escape_string($mysqli,$_POST['password']);
  $error = '';
  
  $password =  hash('ripemd160', $password);
  
  $sql = "SELECT * FROM usuario WHERE email = '$usuario' AND contraseña = '$password' AND id_jerarquia = 2"; //usuario normal
  $result=$mysqli->query($sql);
  $rows = $result->num_rows;
  
  //SELECT * FROM normal,cliente WHERE cliente.correo = 'luis@gmail.com' AND cliente.contrasenia = '12345' AND normal.id_normal = cliente.id_cliente

  if($rows > 0) {
    
    $row = $result->fetch_assoc();
    $_SESSION['id_usuario'] = $row['id_usuario'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['nombre'] = $row['nombre'];

    
    header("location: index.php"); 
    exit();
    
  }

    $sql2 = "SELECT * FROM usuario WHERE email = '$usuario' AND contraseña = '$password' AND id_jerarquia = 1"; //usuario administrador
    $result2=$mysqli->query($sql2);
    $rows2 = $result2->num_rows;
    //echo $rows2;
    if($rows2 > 0) {
      $row2 = $result2->fetch_assoc();
      $_SESSION['id_usuario'] = $row2['id_usuario'];
      $_SESSION['nombre'] = $row2['nombre'];
      $_SESSION['id_clasificacion'] = $row2['id_clasificacion'];
      
      header("location: home.php");
      exit();
   }else {
    $error .= '<div class="alert alert-danger" role="alert">El email o contraseña son incorrectos.</div>';
  }


}



?>

<?php include('cabecera_usuario.php'); ?>




    <div class="container mt-5 py-3">
      <div class="row">
        <div class="col-5">
          <header class="bg-info text-white">
            <div class="ml-5 mb-5" >
              <img src="imagenes/logo.png" width="350"
              height="301">
            </div>
          </header>
        </div>
        <div class="col-7 align-items-center mt-5 py-5">
          <div class="container-fluid">             
              <div class="login py-5 ">
          
                  <div class="col-md-4 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4 text-sm-center">INICIO DE SESION</h3>
                        <?php
                          echo "$sql";
                        ?>
                        
                      <form method ="post">

                          <div class="form-label-group py-3 ">
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
                            <a class="small" href="#" >¿Olvidaste tu contraseña?</a></div>
                        </form>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>


  
  

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