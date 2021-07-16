<?php
include_once ("model/CamionModel.php");
class CamionController
{
    private $database;
    private $render;
    private $camion;
    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
        $this->camion = new CamionModel($database);
    }

    public function index()
    {
        echo $this->render->render("View/camionView.php");
    }

    public function cargarCamion(){
        $patente = $_POST["patente"];
        $marca = $_POST["marca"];
        $modelo=$_POST["modelo"];
        $estado = $_POST["estado"];
        $result= $this->camion->registrarCamion($patente,$marca,$modelo,$estado);
        echo $this->render->render("View/homeSupervisorView.php", $result);
    }


    public function mantenimietnoCamion(){
        $result["res"] = (isset($_GET["msg"]) ? $_GET["msg"] : null );
        $result["data"]= $this->camion->camionesActivos();
        echo $this->render->render("View/camionesActivosView.php", $result);
    }
    public function enviarMantenimiento(){
        $patente = $_GET["patente"];
        $datos= $this->camion->enviarAMantenimietno($patente);
        header("location:/camion/mantenimietnoCamion?msg=$datos");
        exit();
    }

}