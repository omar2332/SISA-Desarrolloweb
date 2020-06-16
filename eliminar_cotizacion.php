<?php



include_once './PHP/sql.php';
$sql_objeto = new sql();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql_objeto->conexion_pdo();
    $sql_objeto->eliminar_cotizacion_por_id($id);
    header('Location: lista_cotizaciones.php?correctamente=1');

}else{
    header('Location: lista_cotizaciones.php?correctamente=0');
}

?>