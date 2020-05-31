<figcaption class="text-center text-titles mt-3">
<?php
  include_once './PHP/sql.php';
  include_once './PHP/usuario.php';
  $sql_objeto = new sql();
  $sql_objeto->conexion_pdo();
  echo 'hola';


  echo $sql_objeto->buscar_maximo_tabla('SELECT max(id_usuario) as max_id FROM usuario');

?>

</figcaption>