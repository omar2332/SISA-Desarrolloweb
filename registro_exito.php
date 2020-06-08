
<?php include('cabecera_usuario.php'); ?>
<?php



    if(isset($_SESSION['email'])){
     header('location: index.php');

    }
  
    $mysqli=new mysqli("localhost:3306","root","root","sisa"); 

    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }

    $sql = "select * from usuario where email = ? ";
    $stmt2 = $mysqli->prepare($sql);
    $stmt2->bind_param("s", $_GET['email']);
    $stmt2->execute();
    $result= $stmt2->get_result();
    $columnas = $result->num_rows;
    
    if($columnas > 0) {


      echo '<header class="bg-success text-white" style = "margin-top:50px;">
      <center> <h2>Se ha registrado correctamente</h2></center>.
    </header>';
      
  
    
    }else {
            
      echo $columnas;
    }
?>


<footer class="py-5 bg-dark" style = "margin-top:150px;">
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

</body>

</html>
