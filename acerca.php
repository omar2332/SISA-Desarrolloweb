<?php include('cabecera_usuario.php'); ?>

      <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-9 mx-auto">
              <h1>Confecciones empresariales SISA</h1>
              <div class="px-5 ml-5">
                <img src="imagenes/logo.png" width="350" height="301">
              </div>
              
              
               <p> Somos una empresa consiente de lo que el cliente espera, por lo que siempre trabajamos, con el objetivo de brindar satisfacción a todos aquellos que confian en nosotros.<br><br> Por ello, ofrecemos precios razonables, calidad, seriedad, eficiencia y puntualidad. 
                Nuestro negocio ofrece soluciones y servicios acordes a sus necesidades, con notable calidad en la materia prima que utilizamos para la fabricación de nuestras prendas. <br><br>
                Por todo lo anterior, le invito a formar parte y ser impulsor de esta nueva generación de empresas.<br><br>
                En esta pagina podras encontrar todos nuestros productos.<br><br>
                Tambien podras contactar con nosotros desde este sitio web.<br><br></p>

                <p>Reciba un cordial saludo.</p>
              
              
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