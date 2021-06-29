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
        return $this->connexion->insert("update usuario set rol ='$rol' where id = $id");
    }
    public function enviarMail($id){
        $usuario = $this->connexion->query("SELECT * FROM usuario WHERE id = '$id'");
//      var_dump($usuario["0"]["name"]);email
        $codigo = md5( rand(50 , 300));
        $this->connexion->insert("INSERT INTO estado_usuario (numero , codigo) values ($id, '$codigo')");


        $headers = 'From:noreply@trasnporte.com.ar' . "\r\n";
        $subject = 'Activa tu cuenta - Transporte La Matanza';

        $message = '
 
            Gracias por registrarte!
            Tu cuenta ha sido creada, activala utilizando el enlace de la parte inferior.
             
            ------------------------
            Username: '.$usuario["0"]["name"].'
            
            ------------------------
             
            Por favor haz clic en este enlace para activar tu cuenta:
            http://localhost/login/activarUsuario/email='.$usuario["0"]["name"].'&hash='.$codigo.'
            ';

//        mail($usuario["0"]["name"], $subject, $message, $headers);
    }
}
 ?>