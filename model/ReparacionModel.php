<?php


class ReparacionModel
{
    public function __construct($database){
        $this->connexion = $database;
    }

    public function agregarReparacion($patente, $repuesto, $precio, $estado, $dias){
        if(!$this->connexion->insert("INSERT INTO reparacion (patente, descripcion, precio, estado, cant_dias) values ('$patente','$repuesto',$precio,$estado, $dias )")){
            return "error";
        }
    }

    public function getReparaciones(){
        return $this->connexion->query("SELECT * FROM reparacion ORDER BY patente");
    }

    public function traerReparacion($patente){
        return $this->connexion->query("SELECT * FROM reparacion WHERE patente = '$patente'");
    }

    public function gastoTotalReparacion($patente){
        return $this->connexion->query("SELECT SUM(precio) as montoTotal FROM reparacion WHERE patente = '$patente'");
    }
}