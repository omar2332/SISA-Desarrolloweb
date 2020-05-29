<?php
  include_once './PHP/sql.php';
  $sql_objeto = new sql();
  $sql_objeto->conexion_pdo();
  $sql_objeto->buscar_usuario_id(2)

?>