<?php


class CargarDatosViajeModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

    }

    public function registrarGasto($numeroViaje, $gasto, $descripcion,$fecha){
        if (!$this->database->query("SELECT * FROM proforma WHERE numero = $numeroViaje")){
            $result["vista"] = "View/cargarGasto.php";
            $result["error"] = "No existe ese viaje";
        } elseif(!$this->database->insert("INSERT INTO gasto(numeroViaje,gasto,descripcion,fecha) VALUES ( $numeroViaje , '$gasto','$descripcion','$fecha')")) {
            $result["vista"] = "View/cargarGasto.php";
            $result["error"] = "Error al cargar el gasto";
        } else {
            $result["vista"] = "View/homeChoferView.php";
            $result["msg"] = "Gasto cargado corretamente";
        }
        return $result;
    }

    public function registrarPosicion($numeroViaje, $coordenadas, $fecha, $hora)
    {
        if (!$this->database->query("SELECT * FROM proforma WHERE numero = $numeroViaje")){
            $result["vista"] = "View/cargarPosicion.php";
            $result["error"] = "No existe ese viaje, revisa el numero de viaje";
        } elseif(!$this->database->insert("INSERT INTO posicion(numeroViaje,posicion,fecha, hora) VALUES ( $numeroViaje , '$coordenadas','$fecha','$hora')")) {
            $result["vista"] = "View/cargarPosicion.php";
            $result["error"] = "Error al cargar la poicion";
        } else {
            $result["vista"] = "View/homeChoferView.php";
            $result["msg"] = "Posicion cargada corretamente";
        }
            return $result;
    }


}