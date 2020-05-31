
<?php
include_once 'sql.php';
class producto{


    public 	$id_producto;
    public 	$id_clasificacion;
    public 	$descripcion;
    public 	$nombre;
    public 	$precio;
    public 	$descuento;
    private $dir_imagenes;

    public function __construct() { }



    public function set_producto($id_clasificacion,$descripcion,$nombre,$precio,$dir_imagenes){

        
        $this->id_clasificacion=$id_clasificacion;
        $this->descripcion=$descripcion;
        $this->nombre=$nombre;
        $this->precio=$precio;
        $this->dir_imagenes=$dir_imagenes;
        
        

    }

    public function set_img(){
        $sql_objeto = new sql();
        $sql_objeto->conexion_pdo();     
        $sql_objeto->pdo_insertar_img_producto($this->dir_imagenes,$this->id_producto);
        $sql_objeto -> cerrar_pdo();
        
    }
    public function insertar_producto(){
        $sql_objeto = new sql();
        $sql_objeto->conexion_pdo();
        $sql_objeto->pdo_insertar_producto($this->id_clasificacion,$this->descripcion,$this->nombre,$this->precio);
        $sql_objeto -> cerrar_pdo();
    }

    public function set_id($id_producto){
        $this->id_producto=$id_producto;
    }

}


?>