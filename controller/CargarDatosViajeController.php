<?php
include_once('model/CargarDatosViajeModel.php');

class CargarDatosViajeController
{
    private $database;
    private $render;
    private $cargar;
    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
        $this->cargar = new CargarDatosViajeModel($this->database);
    }

    public function index()
    {
        echo $this->render->render("View/cargarGasto.php");
    }

    public function Posicion()
    {
        echo $this->render->render("View/cargarPosicion.php");
    }
    public function cargarGasto(){
        $numeroViaje = $_POST["numeroViaje"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $gasto = $_POST["gasto"];
        $descripcion=$_POST["descripcion"];
        $result= $this->cargar->registrarGasto($numeroViaje,$gasto,$descripcion,$fecha);
        echo $this->render->render($result["vista"], $result);

    }
    public function cargarPosicion(){
        $numeroViaje = $_POST["numeroViaje"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $hora = $_POST["hora"];
        $coordenadas=$_POST["coordenadas"];
        $result= $this->cargar->registrarPosicion($numeroViaje,$coordenadas,$fecha,$hora);
        echo $this->render->render($result["vista"], $result);

    }

}