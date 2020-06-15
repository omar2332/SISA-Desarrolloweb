<?php 
      
      if(isset($_SESSION['email'])){
        header('location: index.php');

      }
      
        include_once './PHP/sql.php';
        $sql_objeto = new sql();
        if(!empty($_POST))
        {
            
            $sql_objeto->conexion_mysqli();
            $errores = '';          
            $correctamente = '';
            $email = $_POST['email'];
            $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
            $contraseña2 = $_POST['contraseña2'];


            if(password_verify($contraseña2,$contraseña) and !empty($contraseña)){
              
              if (!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errores .= '<div class="alert alert-danger" role="alert">El email no es valido</div>';

              }else{
                $sql = "select * from usuario where email = ? ";
                $result= $sql_objeto->consulta_individual_mysqli_email($sql);
                $columnas = $result->num_rows;
                
                if($columnas > 0) {
                  $errores .= '<div class="alert alert-danger py-3" role="alert">El email ya esta registrado</div>.';
                }else {
                  $sql = "insert into usuario(nombre,apellido,email,contraseña,telefono,id_jerarquia) values (?,?,?,?,?,2)";
                  $sql_objeto->insertar_usuario_mysqli($sql);
                  header("location: registro_exito.php?email=". $email);
                }


              }                      
            }else{
                $errores .= '<div class="alert alert-danger py-3" role="alert">Las contraseñas no coinciden</div>';

            }
        }
        $sql_objeto->cerrar_mysqli();


?>
<?php include('cabecera_usuario.php'); ?>


          <div class="container py-5">
                <div class="row py-5">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" method="post" onsubmit = "return validar();">
                                <fieldset id="campos">

                                
                                    <legend class="text-center header">Registrarse</legend>

                                      <div class="col-md-8 col-md-offset-2 mt-5">
                                        <?php
                                          echo $errores;
                                        ?>
                                      </div>

                                       

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"></span>
                                        <div class="col-md-8">
                                            <input id="fname" name="name" type="text" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"></span>
                                        <div class="col-md-8">
                                            <input id="lname" name="apellido" type="text" placeholder="Apellido" class="form-control" required>
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
                                          <input id="pass" name="contraseña" type="password" placeholder="Contraseña" class="form-control" required>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <span class="col-md-1 col-md-offset-2 text-center"></i></span>
                                      <div class="col-md-8">
                                          <input id="pass" name="contraseña2" type="password" placeholder="Confirma tu contraseña" class="form-control" required>
                                      </div>
                                    </div>
            
                                    <div class="form-group mt-4 py-3">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary btn-lg" onclick = "" name ="btnEnviar">Enviar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal hide fade" id="Modal" >
          <form method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px">×</button>
                </div>
                <div class="modal-body">
                    <textarea id="text" name="text">Test</textarea>
                </div>
                <div class="modal-footer">
                </div>
          </form>
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
