<?php

include_once 'usuario.php';
class sql{
    // Declaración de un constructor public
    public function __construct() { }

    protected $pdo;
    protected $mysqli;

    function buscar_usuario_id($id){
        $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
        $gsent = $this->$pdo->prepare($sql);
        $gsent->execute();
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

    function conexion_mysqli(){
        $this->$mysqli=new mysqli("localhost:3307","root","root","sisa"); 

        if(mysqli_connect_errno()){
            echo 'Conexion Fallida : ', mysqli_connect_error();
            exit();
        }
        echo 'conecto';
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
}


?>