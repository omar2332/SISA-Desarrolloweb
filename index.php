<?php include('cabecera_usuario.php');

  

?>

  



  <header class="bg-primary text-white">
    <div class="container text-center">
      <div class="row">

        <div class="col mt-3 mr-4">
          <img src="imagenes/logo.png" width="350" height="301">
        </div>
        <div class="col mb-4">
          <h1 class="py-3">Bienvenido A Confecciones Empresariales SISA</h1>
          <p class="lead">Somos una empresa consiente de lo que el cliente espera, por lo que siempre trabajamos, con el objetivo de brindar satisfacción a todos aquellos que confían en nosotros. <br> Por ello, ofrecemos precios razonables, calidad, seriedad, eficiencia y puntualidad.</p>
          <p><button type="button" class="btn btn-secondary"><a href="validacion_cot.php" style="color: black;">Cotización</a></button></p>
        </div>
      </div>
      
    
    </div>

  </header>

  <section id="cotizacion" class ="bg-light">
    <h1 class="col-md-7 ml-md-auto">Cotización</h1>
    <div class="container">
      <form>
      <div class="form-group">
        <label for="exampleFormControlInput1">Asunto</label>
        <input type="email" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mensaje</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
      </div>
      </form>
    </div>
  </section>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Acerca de esta pagina</h2>
          <p class="lead">Somos una empresa 100% Mexicana</p>
          <ul>
            <li>Somos un negocio especializado en la manufactura y venta de Uniformes Ejecutivos, Empresariales, Industriales, de Seguridad y Médicos.</li>
            <li>Nuestro negocio ofrece soluciones y servicios acordes a sus necesidades, con notable calidad en la materia prima que utilizamos para la fabricación de nuestras prendas.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Servicios que ofrecemos</h2>
          <p class="lead">Nuestro negocio ofrece soluciones y servicios acordes a sus necesidades, con notable calidad en la materia prima que utilizamos para la fabricación de nuestras prendas.</p>
        </div>
      </div>
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
  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FConfeccionessSISA%2F&tabs=messages&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
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
