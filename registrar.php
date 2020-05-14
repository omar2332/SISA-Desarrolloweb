<?php 
      if(isset($_SESSION['email'])){
        header('location: index.php');

      }
      
      $mysqli=new mysqli("localhost:3307","root","root","sisa"); 
  
        if(mysqli_connect_errno()){
            echo 'Conexion Fallida : ', mysqli_connect_error();
            exit();
        }

        if(!empty($_POST))
        {
          $errores = ''          
         
          $nombre = mysqli_real_escape_string($mysqli,$_POST['fname']);
          $apellido = mysqli_real_escape_string($mysqli,$_POST['lname']);
          $email = mysqli_real_escape_string($mysqli,$_POST['email']);
          $telefono = mysqli_real_escape_string($mysqli,$_POST['phone']);
          $contraseña = mysqli_real_escape_string($mysqli,$_POST['contraseña']);
          $contraseña2 = mysqli_real_escape_string($mysqli,$_POST['contraseña2']);
        
          $contraseña = hash('ripemd160', $contraseña);
          $contraseña2 = hash('ripemd160', $contraseña2);


          if($contraseña != $contraseña){
            $errores .= '<div class="alert alert-danger" role="alert">Las contraseñas no coinciden</div>'

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errores .= '<div class="alert alert-danger" role="alert">Email no es valido</div>'
              
            }


            $sql = "select * from usuarios where email = '$usuario' "
            $resultado=$mysqli->query($sql2);
            $columnas = $resultado->num_rows;
          }

          
          $sql = "insert into usuario(nombre,apellido,email,contraseña,telefono,id_jerarquia) values ('$nombre','$apellido','$email','$contraseña','$telefono',1)";
          $result=$mysqli->query($sql);

          
          header("location: index.php");  
        
        }


?>
<?php include('cabecera_usuario.php'); ?>


          <div class="container py-5">
                <div class="row py-5">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" method="post" onsubmit="return validar();">
                                <fieldset id="campos">
                                    <legend class="text-center header">Registrarse</legend>
            
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"></span>
                                        <div class="col-md-8">
                                            <input id="fname" name="name" type="text" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"></span>
                                        <div class="col-md-8">
                                            <input id="lname" name="Apellido" type="text" placeholder="Apellido" class="form-control" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"></span>
                                        <div class="col-md-8">
                                            <input id="email" name="email" type="text" placeholder="Correo Electronico" class="form-control" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"></i></span>
                                        <div class="col-md-8">
                                            <input id="phone" name="phone" type="text" placeholder="Telefono" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <span class="col-md-1 col-md-offset-2 text-center"></i></span>
                                      <div class="col-md-8">
                                          <input id="pass" name="contraseña" type="pass" placeholder="Contraseña" class="form-control" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <span class="col-md-1 col-md-offset-2 text-center"></i></span>
                                      <div class="col-md-8">
                                          <input id="pass" name="contraseña2" type="pass" placeholder="Confirma tu contraseña" class="form-control" required>
                                      </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary btn-lg" onclick = "">Enviar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
  <script src="js/registro.js"></script>
</body>
</html>
