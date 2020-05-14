
<?php include('cabecera_usuario.php'); ?>
<?php


    $email = $_GET['email'];

    if(isset($_SESSION['email'])){
     header('location: index.php');

    }
  
    $mysqli=new mysqli("localhost:3307","root","root","sisa"); 

    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }

                $sql = "select * from usuarios where email = '$email' ";
                $resultado=$mysqli->query($sql);
               $columnas = $resultado->num_rows;
               if($columnas > 0) {
                 $errores .= '<div class="alert alert-success " role="alert">Se ha registrado correctamente</div>.';
               }else {
            
                    header("location: index.php");
                }
?>