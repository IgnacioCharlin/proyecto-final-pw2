<?php
include_once ('model/GastoModel.php');

class GastosController
{
    private $database;
    private $render;
    private $gasto;
    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
        $this->gasto = new GastoModel($this->database);
    }

    public function index()
    {
        echo $this->render->render("View/cargarGasto.php");
    }

    public function cargarGasto(){
        $numeroViaje = $_POST["numeroViaje"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $gasto = $_POST["gasto"];
        $descripcion=$_POST["descripcion"];
        $result= $this->gasto->registrarGasto($numeroViaje,$gasto,$descripcion,$fecha);
        echo $this->render->render($result["vista"], $result);

    }

}