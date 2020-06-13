<?php

include_once 'usuario.php';
class sql{
    // Declaración de un constructor public
    public function __construct() { }

    protected $pdo;
    protected $mysqli;
    protected $contraseña = '3307';

    function consultar_usuarios_por_categoria($categoria){
        $sql_categorias = 'SELECT * from usuario where id_jerarquia = ?';
		$gsent= $this->$pdo-> prepare($sql_categorias);
		$gsent->execute(array($categoria));
        $resultado = $gsent->fetchAll();
        return $resultado;
    }

    function mostrar_productos_por_id_categoria($id){
        $sql_categorias = 'SELECT * from producto,direcciones_imgs where producto.id_clasificacion = ? and direcciones_imgs.id_producto=producto.id_producto';
		$gsent= $this->$pdo-> prepare($sql_categorias);
		$gsent->execute(array($id));
        $resultado = $gsent->fetchAll();
        return $resultado;
    }

    function insertar_categoria($nombre){
        $sql_agregar = 'insert into clasificacion_productos(nombre_clasificacion) values (?)';
        $sentencia = $this->$pdo -> prepare($sql_agregar);
        $sentencia-> execute(array($nombre));
    }
    function consulta_producto_por_categoria(){
        $sql_categorias = 'SELECT * from producto,clasificacion_productos where producto.id_clasificacion = clasificacion_productos.id_clasificacion';
		$gsent= $this->$pdo -> prepare($sql_categorias);
		$gsent->execute();
        $resultado = $gsent->fetchAll();
        return $resultado;
    }
    function consultar_todas_clasificacion_producto(){
        $sql_categorias = 'select * from clasificacion_productos';
        $gsent= $this->$pdo -> prepare($sql_categorias);
        $gsent->execute();
        $resultado = $gsent->fetchAll();
        return $resultado;
    }
    function buscar_por_email_mysqli($email){
        $sql = "select * from usuario where email = ? ";
        $stmt2 = $this->$mysqli->prepare($sql);
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $result= $stmt2->get_result();
        $columnas = $result->num_rows;
        return $columnas;
    }

    function editar_categoria_id($id,$nombre){
        $sql = 'UPDATE clasificacion_productos SET nombre_clasificacion = ? WHERE id_clasificacion = ?';
        $sentencia = $this->$pdo-> prepare($sql);
        $sentencia->execute(array($nombre,$id));
        
        return true;

    }

    function eliminar_clasificacion_producto_por_id($id){
        $sql_eliminar = 'delete from clasificacion_productos where id_clasificacion = ?';
        $sentencia_eliminar = $this->$pdo -> prepare($sql_eliminar);
        $sentencia_eliminar ->execute(array($id));
    }


    function buscar_maximo_tabla($sql){

        $gsent = $this->$pdo->prepare($sql);
        $gsent->execute();
        $resultado = $gsent-> fetchAll();
        
        return intval($resultado[0][0]);
    }

    function buscar_nombre_categoria_producto_id($id){
        $sql = "SELECT * FROM clasificacion_productos WHERE id_clasificacion = $id";
        $gsent = $this->$pdo->prepare($sql);
        $gsent->execute();
        $resultado = $gsent->fetchAll();  
    
        
        return $resultado[0]['nombre_clasificacion'];
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
            $this->$pdo = new PDO('mysql:host=localhost:'.$this->contraseña.';dbname=sisa', $usuario, $contraseña);
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        } 


    }

    function pdo_insertar_producto($id_clasificacion,$descripcion,$nombre,$precio){
        $sql_agregar = "INSERT INTO producto(id_clasificacion, descripcion, nombre, precio,descuento) VALUES (?, ?,?, ?,0);";
        $sentencia = $this->$pdo->prepare($sql_agregar);
        //  var_dump($sentencia);
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
        $this->$mysqli=new mysqli("localhost:".$this->contraseña,"root","root","sisa"); 

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

    function eliminar_usuario_por_id($id){
        $sql_eliminar = 'delete from usuario where id_usuario = ?';
        $sentencia_eliminar = $this->$pdo-> prepare($sql_eliminar);
        $sentencia_eliminar ->execute(array($id));

    }

    function cerrar_mysqli(){
        $this->$mysqli = null;
    }
    function cerrar_pdo(){
        $pdo=null;
    }



}


?>