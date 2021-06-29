<?php
include_once ("model/UsuarioModel.php");
class rolesController
{
    private $database;
    private $render;
    private $usuarioModel;

    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render =$render;
        $this->usuarioModel = new UsuarioModel($this->database);
    }

    public function index(){
        $usuarioModel = new UsuarioModel($this->database);
        $data["usuarios"] = $usuarioModel->getUsuarios();
        echo $this->render->render("View/rolesView.php",$data);
    }

    public function update(){
        $usuarioModel = new UsuarioModel($this->database);
        $this->usuarioModel->setRol($_POST["rol"], $_POST["id"]);
        $this->index();
    }
    public function activarPorMail(){
        $this->usuarioModel->enviarMail($_GET["id"]);

    }

}