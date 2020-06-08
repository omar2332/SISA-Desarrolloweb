<?php


session_start();

if($_SESSION['id_clasificacion'] == 2){
    header('location: index.php');
}

if(!isset($_SESSION["nombre"])){
	header('location: index.php');
}
if(isset($_GET['id_clasificacion_producto'])){
    include_once './PHP/sql.php';
    $sql_objeto = new sql();
    $sql_objeto->conexion_pdo();
    $id = $_GET['id_clasificacion_producto'];
    $sql_objeto->eliminar_clasificacion_producto_por_id($id);
    header('location: admin_categorias.php');

}
?>