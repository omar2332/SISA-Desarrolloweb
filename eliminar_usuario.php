<?php
session_start();
include_once './PHP/usuario.php';
include_once './PHP/sql.php';


if(isset($_SESSION['usuario'])){
    
    
    
    if($_SESSION['id_clasificacion'] == 1){

        if ($_GET['id'] != $_SESSION['id_usuario']){ //para que no te borres a ti mismo :v
            $sql_objeto = new sql();
            $sql_objeto->conexion_pdo();
            $sql_objeto->conexion_mysqli();

            try {

                $id = $_GET['id'];                               
                $sql = 'SELECT * From usuario where id_usuario = '.$id;
                $rows = $sql_objeto->pdo_contar_filas($sql);

                
                
                if($rows > 0){
                     $sql_objeto->eliminar_usuario_por_id($id);
                    header("location: admin_clientes.php?correctamente=1"); 
                }else{
                    header("location: admin_clientes.php?correctamente=2"); 
                }
                
                
                
            } catch (\Throwable $th) {
                echo 'error';
                header("location: admin_clientes.php?correctamente=2"); 
            }

            
            
        }else{
            //header("location: admin_clientes.php?correctamente=2"); 
        }

        
    }else{
        header('location: index.php');
    }

}else{
    header('location: index.php');
}


?>