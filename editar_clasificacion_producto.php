<?php
session_start();
include_once './PHP/sql.php';
$sql_objeto = new sql();
$sql_objeto ->conexion_pdo();
$id_categoria = $_GET['id_clasificacion_producto'];
$nombre_categoria = $sql_objeto->buscar_nombre_categoria_producto_id($id_categoria);



if($_SESSION['id_clasificacion'] == 2){
    
    header('location: index.php');
}

if(!isset($_SESSION["nombre"])){
    
	header('location: index.php');
}







?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Editar</title>
  </head >
  <body class ="bg-dark">
    <h2 class= 'text-center text-light my-5'>Editar Categoria</h2>
    
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method= 'POST'>
                    <div class="form-group">
                        <label class = "text-light mb-3" >Nombre Categoria</label>
                        <input type="text" name='nombre' value='<?php if(!isset($_GET['id_clasificacion_producto'])){
                                                                            header('location: home.php');
                                                                            }else{
                                                                                echo $nombre_categoria;
                                                                            }?>' class="form-control"  require>
                        
                    </div>

                    <button type="submit" class="btn btn-success px-3 mr-4 mt-4">Enviar</button>
                    <a  class="btn btn-danger mt-4" href = "admin_categorias.php">Cancelar</a>

                    
                </form>
            </div>    
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <?php
        if(isset($_POST['nombre'])){
            $nombre_categoria=  $_POST['nombre'];
            if($sql_objeto ->editar_categoria_id($id_categoria,$nombre_categoria)){
                echo'<script type="text/javascript">
                    alert("Cambio Realizado Correctamente");
                    window.location.href="admin_categorias.php";
                    </script>';
                
            }
        }
    ?>
  
  </body>
</html>