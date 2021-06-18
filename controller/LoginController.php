<?php


class LoginController
{
    private $database;
    private $render;

    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render =$render;
    }

    public function index()
    {

        echo $this->render->render("View/loginView.php");
    }
    public function validar(){
        include_once ("model/LoginModel.php");

        $email = $_POST["email"];
        $contraseña = $_POST["password"];
        $model = new LoginModel($this->database);
        $result = $model->validarUsuario($email,$contraseña);

        echo $this->render->render($result["vista"], $result);

    }
        public function cerrarSesion(){
            session_destroy();
            header('location:/');
            exit();
        }

}