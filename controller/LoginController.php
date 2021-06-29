<?php
include_once ("model/LoginModel.php");


class LoginController
{
    private $database;
    private $render;
    private $model;

    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render =$render;
        $this->model = new LoginModel($this->database);
    }

    public function index()
    {

        echo $this->render->render("View/loginView.php");
    }
    public function validar(){

        $email = $_POST["email"];
        $contraseña = $_POST["password"];
        $result = $this->model->validarUsuario($email,$contraseña);

        echo $this->render->render($result["vista"], $result);

    }
        public function cerrarSesion(){
            session_destroy();
            header('location:/');
            exit();
        }
    public function activarUsuario(){

        $result = $this->model->activarUsuario($_GET["email"], $_GET["codigo"]);
        $this->index();
    }

}