<?php include('cabecera_usuario.php'); ?>

      <section id="contact">
        <div class="container">
          <div class="row mr-5">
            <div class="col-lg-8 mx-auto">
              <h1 class = "px-4">Contactanos</h1>
              <p class="lead mr-5" style="padding: 30px; float: left; width: 40%; text-align: justify;">
                Castilla 157, Int 3 <br>
                Álamos C.P. 03400 <br>
                Benito Juárez <br>
                Ciudad de México, México. <br>
                Teléfono: 62 59 53 00 <br>
                Correo: <a href="">cbpuniformes@gmail.com</a> 
                <br> <br>
                
              </p>
              <p style=" margin-bot:50px;float: right; width: 45%; text-align: inherit;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7526.723490785786!2d-99.143118!3d19.39677!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4ecab6e2de70ed84!2sConfecciones%20Empresariales%20SISA!5e0!3m2!1ses!2smx!4v1587842219326!5m2!1ses!2smx" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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