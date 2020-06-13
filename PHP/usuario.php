<?php


class usuario{

    private $email;
    private $nombre;
    private $apellido;
    private $jerarquia;
    private $id;
    // Declaración de un constructor public
    public function __construct() { }

    function set_usuario($email,$nombre,$apellido,$jerarquia,$id){
        $this->$email=$email;
        $this->$nombre=$nombre;
        $this->$apellido=$apellido;
        $this->$jerarquia =$jerarquia;
        $this->$id=$id;
    }


    function get_email(){
        return $this->email;
    }

    function get_nombre(){
        return $this->nombre;
    }

    function get_apellido(){
        return $this->apellido;
    }

    function get_id(){
        return $this->id;
    }
    function get_jerarquia(){
        return $this->jerarquia;
    }



}

?>