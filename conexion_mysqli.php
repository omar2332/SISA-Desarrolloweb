<?php

    $mysqli=new mysqli("localhost:3306","root","root","sisa"); 

    if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }
    echo 'conecto';
?>