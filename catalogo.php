<?php

if(!isset($_GET['clasificacion'])){
  header('location: index.php');
}


include('cabecera_usuario.php'); 


?>

  <section id="services" class="bg-light">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 mx-auto">
                <!-- se muestran imagenes de los productos que se desean comprar -->
                  <div id="productos">
                    <div class="media-left media-middle" style="padding-left:120px; display: block; margin-left: auto; margin-right: auto; width: 40%;">
                          <a href="#!" class="tooltips-general" data-toggle="tooltip" data-placement="right" title="Más información del producto">
                            <img class="media-object" src="imagenes/kitchen.png" alt="Medicina" width="50" height="131">
                          </a>
                    </div>
                    <div class="media-body text-center" style="padding: 10px;">
                        <h4 class="media-heading">1 - Only for Kitchen</h4>
                        <div class="pull-left">
                            <strong>Limpiador de Cocina Only For. Elimina cochambre y grasa de la cocina dejando un fresco aroma.<br>
                            <strong>$27.50<br>
                        </div>
                    </div>
                    
                  <h6 style="text-align: right;">
                      Precio total
                  </h6>
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
