<?php

include_once 'usuario.php';
class sql{
    // Declaración de un constructor public
    public function __construct() { }

    protected $pdo;
    protected $mysqli;


    function buscar_maximo_tabla($sql){

        $gsent = $this->$pdo->prepare($sql);
        $gsent->execute();
        $resultado = $gsent-> fetchAll();
        
        return intval($resultado[0][0]);
    }

    function buscar_id_categoria_producto_nombre($nombre){
        $sql = "SELECT * FROM clasificacion_productos WHERE nombre_clasificacion = '$nombre'";
        $gsent = $this->$pdo->prepare($sql);
        $gsent->execute();
        $resultado = $gsent->fetchAll();  
    
        
        return $resultado[0]['id_clasificacion'];
    }

    function buscar_usuario_id($id){
        $sql = "SELECT * FROM usuario WHERE id_usuario = ?";
        $gsent = $this->$pdo->prepare($sql);
        $gsent->execute($id);
        $result = $gsent->fetch(PDO::FETCH_ASSOC);  
        $num = $gsent->rowCount();
        print_r($num);
    }

    function conexion_pdo(){
        $usuario = 'root';
        $contraseña = 'root';    
        try {
            $this->$pdo = new PDO('mysql:host=localhost:3307;dbname=sisa', $usuario, $contraseña);
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        } 


    }

    function pdo_insertar_producto($id_clasificacion,$descripcion,$nombre,$precio){
        $sql_agregar = "INSERT INTO producto(id_clasificacion, descripcion, nombre, precio,descuento) VALUES (?, ?,?, ?,0);";
        $sentencia = $this->$pdo->prepare($sql_agregar);
        var_dump($sentencia);
        $sentencia->execute(array($id_clasificacion,$descripcion,$nombre,$precio));
        //echo "INSERT INTO producto(id_clasificacion, descripcion, nombre, precio,descuento) VALUES($id_clasificacion,'$descripcion','$nombre',$precio)";
        
    }

    function pdo_insertar_img_producto($dir_img,$id_producto){
        $sql_agregar = "INSERT INTO direcciones_imgs (id_producto, dir_img) VALUES (?, ?);";
        $sentencia = $this->$pdo-> prepare($sql_agregar);
        $sentencia->execute(array($id_producto,$dir_img));
        //echo "INSERT INTO direcciones_imgs (id_producto, dir_img) VALUES ($id_producto,$dir_img)";

    }

    function pdo_contar_filas($sql){
        $result= $this->consulta_individual_mysqli($sql);
        $rows = $result->num_rows;
        return $rows;
    }

    function conexion_mysqli(){
        $this->$mysqli=new mysqli("localhost:3307","root","root","sisa"); 

        if(mysqli_connect_errno()){
            echo 'Conexion Fallida : ', mysqli_connect_error();
            exit();
        }
        
    }

    function consulta_individual_mysqli($sql){
        $stmt2 = $this->$mysqli->prepare($sql);
        $stmt2->bind_param("ss", $_POST['email'], hash('ripemd160', $_POST['password']));
        $stmt2->execute();
        $result = $stmt2->get_result();
        return $result;

    }

    function consulta_individual_mysqli_email($sql){
        $stmt2 = $this->$mysqli->prepare($sql);
        $stmt2->bind_param("s", $_POST['email']);
        $stmt2->execute();
        $result= $stmt2->get_result();
        return $result;

    }



    function insertar_usuario_mysqli($sql){
        $stmt2 = $this->$mysqli->prepare($sql);
        $stmt2->bind_param("sssss", $_POST['name'], $_POST['apellido'], $_POST['email'], hash('ripemd160', $_POST['contraseña']), $_POST['phone']);
        $stmt2->execute();
        unset($_POST);
        return;

    }

    function cerrar_mysqli(){
        $this->$mysqli = null;
    }
    function cerrar_pdo(){
        $pdo=null;
    }
}


?>