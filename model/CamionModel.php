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
        } else header("location:/home");
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
}