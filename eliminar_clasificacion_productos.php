<?php


session_start();

if($_SESSION['id_clasificacion'] == 2){
    header('location: index.php');
}

if(!isset($_SESSION["nombre"])){
	header('location: index.php');
}
echo isset($_GET['id_clasificacion_producto']);
if(isset($_GET['id_clasificacion_producto'])){
    include_once 'conexion_pdo.php';
    $id = $_GET['id_clasificacion_producto'];
    $sql_eliminar = 'delete from clasificacion_productos where id_clasificacion = ?';
    $sentencia_eliminar = $pdo -> prepare($sql_eliminar);
    $sentencia_eliminar ->execute(array($id));
    header('location: admin_categorias.php');
}
?>