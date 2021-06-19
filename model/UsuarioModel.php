<?php
class UsuarioModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function getUsuarios(){
        return $this->connexion->query("SELECT * FROM usuario");
    }

    public function setRol($rol, $id){
        return $this->connexion->query("update usuario set rol ='$rol' where id = $id");
    }
}
 ?>