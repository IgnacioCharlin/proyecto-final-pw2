<?php

class HomeController
{
    private $datos;
    private $render;

    public function __construct($datos, $render)
    {
        $this->datos = $datos;
        $this->render =$render;
    }

    public function index()
    {
        $data["datos"] = array();
        echo $this->render->render("View/homeView.php", $data);
    }
    public function saludar()
    {
        $data["usuario"] = $_SESSION["usuario"];
        echo $this->render->render("View/homeView.php", $data);
    }

}