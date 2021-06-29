<?php


class GastoModel
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
        } else $result["vista"] = "View/homeChoferView.php";
        return $result;
    }

    public function verProforma($numero){
        $res["error"]= "Proforma no encontrada";
        $result= ($this->database->query("SELECT * FROM proforma WHERE numero = $numero") ? $this->database->query("SELECT * FROM proforma WHERE numero = $numero") : $res );
        return $result;
    }
}