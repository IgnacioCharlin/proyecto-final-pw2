<?php


class LoginModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

    }


    public function validarUsuario($email, $contraseña)
    {
        $msg["vista"] = "View/loginView.php";
        $listUsuarios = $this->database->query("SELECT * FROM usuario");


        foreach ($listUsuarios as $usuario){
            if ($usuario["rol"] != "inactivo") {
                if (password_verify($contraseña, $usuario["password"]) && $usuario["name"] == $email) {
                    $_SESSION["isLogin"] = true;
                    $_SESSION["idUser"] = $usuario["id"];
                    $_SESSION["usuario"] = $usuario["name"];

                    return header('location:/home');

                } else {
                    $msg["error"] =   "no coincide";

                }
            } else {
                $msg["error"] =  "usuario inactivo";

            }
        }  return $msg;
    }
    public function activarUsuario($email, $codigo){
        if ($email && $codigo) {
            $usuario = $this->database->query("SELECT * FROM usuario WHERE name = '$email'");
            if($usuario){
                $id =$usuario["0"]["id"];
                $estado = $this->database->query("SELECT * FROM estado_usuario WHERE numero = $id");
                if( $estado["0"]["codigo"] == $codigo){
                    $this->database->insert("update estado_usuario set estado = TRUE where numero = $id");
                    $msg["activado"] = "se activo el usuario";
                    return $msg;
                } echo "codigo incorrecto";
            }  echo "usuario incorrecto";
        } echo "usuario y/o codigo no ingresado";
    }
}