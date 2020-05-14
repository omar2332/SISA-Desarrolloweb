<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Iniciar Sesion</title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
<!-- Custom styles for this template -->
<link href="css/scrolling-nav.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
</head>
<body>

  <!-- Start your project here-->  
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger " href="#page-top" style="font-family:Ar Destine;"> <span class="mb-0 h2 ">CE.SISA</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"> 
              <a class="nav-link js-scroll-trigger tamaño_nav" href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger tamaño_nav" href="acerca.html">Acerca de</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                  <a class="nav-link dropdown-toggle tamaño_nav" id="productos" data-toggle="dropdown">Productos</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://www.google.com">Categoria 1</a>
                    <a class="dropdown-item" href="http://www.bing.com">Categoria 2</a>
                    <a class="dropdown-item" href="http://www.yahoo.com">Categoria3</a>
                </div>
              </div>  
  
              
  
  
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger tamaño_nav" href="index.html#contact">Promociones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger tamaño_nav" href="contacto.html">Contacto</a>
            </li>
            <li class="nav-item"> 
              <a href="inicio_sesion.html" class="button">
                <button type="button" class="btn btn-outline-primary btn-md tamaño_nav">Iniciar Sesion</button>
              </a>
            </li>
  
            <li class="nav-item"> 
              <a href="registrar.html" class="button">
                <button type="button" class="btn btn-secondary btn-md tamaño_nav">Registrarse</button>
              </a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger fab fa-facebook-square tamaño_logo" href="index.html#contact"></a>
            </li>
  
            <li class="nav-item"> 
              <a class="nav-link js-scroll-trigger fab fa-google-plus-g tamaño_logo" href="index.html#contact"></a>
            </li>
  
  
          </ul>
        </div>
      </div>
    </nav>


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
                      <form action="home.html">
                          <div class="form-label-group py-3 ">
                            <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Correo Electronico">
                            
                          </div>
          
                          <div class="form-label-group py-3 mb-3">
                            <input type="password" id="inputPassword" name = "password" class="form-control" placeholder="Contraseña" >
                            
                          </div>
                          
                              
                          <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" href = "home.html">Iniciar Sesion</button>
                          <div class="form-group"> <!-- State Button -->               
                        </div>
                          <div class="text-center">
                            <a class="small" href="#">¿Olvidaste tu contraseña?</a></div>
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