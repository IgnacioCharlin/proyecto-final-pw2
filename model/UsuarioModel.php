<?php
include_once("MailModel.php");

class UsuarioModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function getUsuarios(){
        return $this->connexion->query("SELECT * FROM usuario");
    }

    public function setRol($rol, $id){
        return $this->connexion->insert("update usuario set rol ='$rol' where id = $id");
    }
    public function enviarMail($id)
    {
        $usuario = $this->connexion->query("SELECT * FROM usuario WHERE id = '$id'");
        $userExistente = $this->connexion->query("SELECT * FROM estado_usuario WHERE numero = '$id'");
        if ($userExistente["0"]["codigo"]) {
            $codigo = $userExistente["0"]["codigo"];

        } else {
            $codigo = md5(rand(50, 300));
            $this->connexion->insert("INSERT INTO estado_usuario (numero , codigo) values ($id, '$codigo')");
        }

        if (MailModel::enviarMail($usuario, $codigo)) {
            echo "mail enviado correctamente";
        }
    }
}
 ?>