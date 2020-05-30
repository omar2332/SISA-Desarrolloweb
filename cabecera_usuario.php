<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SISA</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">


  <?php if(isset($_SESSION["id_usuario"])): ?>
  <link rel="stylesheet" href="css/estilos.css">
  <?php endif ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
 
  <?php
    $archivo_actual = basename($_SERVER['PHP_SELF']); //Regresa el nombre del archivo actual

    switch($archivo_actual) 
    {
        case "registrar.php":
                echo '<link href="css/registrar.css" rel="stylesheet">';
        
    }

    include_once 'conexion_pdo.php';
    $sql_categorias = 'select * from clasificacion_productos';
  
    $gsent= $pdo -> prepare($sql_categorias);
    $gsent->execute();
    $resultado = $gsent->fetchAll();

  ?>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav"> 
    <div class="container">
      <a class="navbar-brand js-scroll-trigger " href="index.php" style="font-family:Ar Destine;"> <span class="mb-0 h2 ">CE.SISA</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> 
            <a class="nav-link js-scroll-trigger tamaño_nav" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger tamaño_nav" href="acerca.php ">Acerca de</a>
          </li>
          <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle tamaño_nav" id="productos" data-toggle="dropdown">Productos</a>
                <div class="dropdown-menu">
                  <?php foreach($resultado as $categoria): ?>
                  <a class="dropdown-item" href="catalogo.php?clasificacion=<?php echo $categoria['id_clasificacion']?>"><?php echo $categoria['nombre_clasificacion']; ?></a>

                  <?php endforeach?>
              </div>
            </div>  

            


          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger tamaño_nav" href="#contact">Promociones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger tamaño_nav" href="contacto.php">Contacto</a>
          </li>

          <?php
                 
                if(isset($_SESSION["id_usuario"])){
                  echo '<li class="nav-item"> <a class="btn btn-outline-danger btn-md tamaño_nav mt-2" href="cerrar_sesion.php">Cerrar Sesion</a> </li>';
                }else{
                  echo '<li class="nav-item"> 
                  <a href="inicio_sesion.php" class="button">
                    <button type="button" class="btn btn-outline-primary btn-md tamaño_nav mt-2">Iniciar Sesion</button>
                  </a>
                </li>
      
                <li class="nav-item"> 
                  <a href="registrar.php" class="button">
                    <button type="button" class="btn btn-secondary btn-md tamaño_nav mt-2">Registrarse</button>
                  </a>
                </li>';
                }
              
              ?>

         

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger fab fa-facebook-square tamaño_logo" href="https://www.facebook.com/ConfeccionessSISA/"></a>
          </li>


        </ul>
      </div>
    </div>
  </nav>