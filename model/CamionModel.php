<?php
class CamionModel
{
    private $connexion;

    public function __construct($database){
        $this->connexion = $database;

    }
    public function registrarCamion($patente, $marca, $modelo,$estado){
        if(!$this->connexion->insert("INSERT INTO camion(patente,marca,modelo,estado) VALUES ( '$patente' , '$marca','$modelo',$estado );")) {
            $result["vista"] = "View/camionView.php";
            $result["error"] = "Error al cargar el camion";
        } else $result["vista"] = "View/homeSupervisorView.php";
        return $result;
    }

    public function getCamiones(){
        return $this->connexion->query("SELECT * FROM camion");
    }

    public function estaDisponible($patente){
        $camiones = $this->getCamiones();
        foreach ($camiones as $camion){
            if($camion["patente"] == $patente && $camion["estado"] == 1){
                return $camion;
            }
        }
    }

    public function camionesActivos()
    {
        return $this->connexion->query("SELECT * FROM camion WHERE estado = true");
    }

    public function enviarAMantenimietno($patente)
    {
        $datos = "No se pudo enviar el camion a mantenimiento";

        if ($this->connexion->insert("UPDATE camion set estado = false WHERE '$patente' = patente")){
            $datos = "Se envio el camion a mantenimiento";
        }
        return $datos;
    }

    public function camionesEnReparacion(){
        return $this->connexion->query("SELECT * FROM camion WHERE estado = false");
    }

    public function camionReparado($patente){
        $datos = "No se pudo enviar la reparacion del camion";
        if ($this->connexion->insert("UPDATE camion set estado = true WHERE '$patente' = patente")){
            $datos = "Se cargo la reparacion ";
        }
        return $datos;
    }

    public function sacarMantenimiento($patente, $repuesto, $precio, $estado, $dias){
        if($this->connexion->insert("INSERT INTO reparacion (patente, descripcion, precio, estado, cant_dias) values ('$patente','$repuesto',$precio,$estado, $dias )")){
            $estado ? $this->camionReparado($patente) : null;
            if($estado == 1){
                if($this->camionReparado($patente)){
                    return "ok";
                }
            }
            return "ok";
        }
        return "error";

    }



}