<?php

include_once ("model/UsuarioModel.php");
class ProformaController
{
    private $database;
    private $render;

    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
    }

    public function index()
    {
        $usuarioModel = new UsuarioModel($this->database);
        $data["usuarios"] = $usuarioModel->getUsuarios();
        echo $this->render->render("View/proformaView.php", $data);
    }

}