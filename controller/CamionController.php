<?php
include_once ("model/CamionModel.php");
class CamionController
{
    private $database;
    private $render;
    private $camion;
    private $reparacion;
    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
        $this->camion = new CamionModel($database);
        $this->reparacion = new ReparacionModel($database);
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

    public function traerCamionesEnReparacion(){
        return $this->camion->camionesEnReparacion();
    }

    public function reparacion(){

        $data["camiones"] = $this->traerCamionesEnReparacion();

        echo $this->render->render("View/reparacionView.php", $data);
    }

    public function cargarDeReparacion(){
       $patente = $_POST["patente"];
       $repuesto = $_POST["repuesto"];
       $precio = $_POST["precio"];
       $estado = $_POST["estado"];
       $dias = $_POST["dias"];
        $result = $this->reparacion->agregarReparacion($patente,$repuesto,$precio,$estado,$dias);
       if($estado == 1){
           $this->reparacionFinalizada($patente);
           $this->camion->camionReparado($patente);
       }else{
           header("location:/home");
       }
    }

    public function reparacionFinalizada($patente){
       $datos["montoTotal"] =$this->reparacion->gastoTotalReparacion($patente);
       $datos["reparaciones"] = $this->reparacion->traerReparacion($patente);
        echo $this->render->render("View/finalizarReparacionView.php",$datos);
    }

}