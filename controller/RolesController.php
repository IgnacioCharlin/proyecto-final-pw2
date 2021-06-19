<?php
include_once ("model/UsuarioModel.php");
class rolesController
{
    private $database;
    private $render;

    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render =$render;
    }

    public function index(){
        $usuarioModel = new UsuarioModel($this->database);
        $data["usuarios"] = $usuarioModel->getUsuarios();
        echo $this->render->render("View/rolesView.php",$data);
    }

    public function update(){
        $usuarioModel = new UsuarioModel($this->database);
        $usuarioModel->setRol($_POST["rol"], $_POST["id"]);
        $this->index();
    }
}