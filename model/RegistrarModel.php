<?php

class RegistrarModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

    }

    public function registrarUsuario($email, $password, $repitePassword)
    {
        if (password_verify($repitePassword, $password )){
            if($this->database->insert("INSERT INTO usuario ( name , password , rol ) values ('$email','$password', 'inactivo')")){
                $result["vista"]="View/loginView.php";
                return $result;
            }
            else{
                $result["vista"]= "View/registrarView.php";
                $result["error"]= "error en la base";
                return $result;
            }
        }
        else {
            $result["vista"]= "View/registrarView.php";
            $result["error"]= "las clves deben ser iguales";
            return $result;
        }

    }


}