<?php


class RegistrarController
{
    private $database;
    private $render;


    public function __construct( $render,  $database)
    {
        $this->render = $render;
        $this->database = $database;
    }

    public function index()
    {
        echo $this->render->render("View/registrarView.php");
    }

    public function registro()
    {
        include_once ("model/RegistrarModel.php");
        include_once ("helpers/HashPassword.php");

        $registrar = new RegistrarModel($this->database);
        $email = $_POST["email"];
        $password = HashPassword::getHashPassword($_POST["password"]);
        $repitePassword= $_POST["repite-password"];

        $result = $registrar->registrarUsuario($email, $password, $repitePassword);


        echo $this->render->render($result["vista"], $result);
    }

}