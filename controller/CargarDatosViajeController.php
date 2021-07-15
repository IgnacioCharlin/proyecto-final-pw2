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
        $result = $this->cargar->viajeActual();
        echo $this->render->render("View/cargarPosicion.php", $result);
    }

    public function cargarPosicion(){
        $numeroViaje = $_POST["numeroViaje"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $hora = $_POST["hora"];
        $coordenadas=$_POST["coordenadas"];
        $km = $_POST["km"];
        $gasto = $_POST["gasto"];
        $descripcion = $_POST["descripcion"];
        $result= $this->cargar->registrarPosicion($numeroViaje,$coordenadas,$fecha,$hora,$km, $descripcion,$gasto);
        echo $this->render->render($result["vista"], $result);

    }
    public function finalizarViaje(){

        $numeroViaje = $_GET["numero"];
        $result["data"] = $this->cargar->consultarGastosDeViaje($numeroViaje);
        $result["total"] = $this->cargar->sumatoriaGasto($numeroViaje);
        echo $this->render->render("View/finalizarViajeView.php", $result);
    }



}