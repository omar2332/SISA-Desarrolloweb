<?php include('cabecera_usuario.php');

$sql_objeto =  new sql();
$sql_objeto->conexion_pdo();
$error = '';
$correcto = '';
if($_POST){
   $id_usuario = $_SESSION['id_usuario'];
   $clasificacion = $_SESSION['id_clasificacion'];
   $asunto = $_POST['asunto'];
   $texto = $_POST['mensaje'];

   if(empty($asunto) or empty($texto)){
     $error = '<div class="alert alert-danger" role="alert">Llene todos los campos por favor</div>';
   }else{
     if($clasificacion != 1){
      $sql_objeto->insertar_cotizacion_por_usuario($id_usuario,$texto,$asunto);
      $correcto='<div class="alert alert-success" role="alert">La cotizacion se ha enviado correctamente</div>';
     }else{
      $error = '<div class="alert alert-danger" role="alert">Usuario Adminitrador no tiene permitida esta accion</div>';
     }
      
   }


}

?>



  


  <section id="cotizacion" class ="bg-light">
    <h1 class="col-md-7 ml-md-auto">Cotización</h1>

    <div class = ' container py-3 '>
    <?php echo $error;?>
    <?php echo $correcto;?>
    </div>
    
    <div class="container">
      
      <form method = 'POST'>
      <div class="form-group">
        <label for="exampleFormControlInput1">Asunto</label>
        <input  name= 'asunto' type='text' class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mensaje</label>
        <textarea name= 'mensaje' class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
      </div>
    

    <div class="row">
        <div class="col-md-11 col-md-offset-3 ml-5 py-4 text-center">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                        Enviar
                </button>
            </div>
        </div>
    </div>
    
      


      </form>
    </div>
  </section>


  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contactanos</h2>
          <p class="lead">
            Castilla 157, Int 3 <br>
            Álamos C.P. 03400 <br>
            Benito Juárez <br>
            Ciudad de México, México. <br>
            Teléfono: : 62 59 53 00<br>
            Correo: <a href="">cbpuniformes@gmail.com</a> 
            <br> <br>
            
          </p>
        </div>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright</p>
    </div>
    
   

    <!-- /.container -->
  </footer>

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
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0"></script>
  
  <!-- corregir chat -->
  <?php if(isset($_SESSION["id_usuario"])): ?> 
  <section class="chat-container">
	<div class="chat-button">
		Chat de Facebook
	</div>
	<div class="chat-content">
  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FConfecciones-Sisa-1389825841100484&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
	</div>
  </section>

  <script>
    $(".chat-button").on('click', function(e){
          e.preventDefault();
          $(".chat-content").slideToggle('fast');
    });
  </script>
  <?endif?>
</body>

</html>
