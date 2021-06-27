<?php
class ProformaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

    }

    public function registrarProforma($numero, $fecha, $cliente,$origen,$destino){
        if(!$this->database->insert("INSERT INTO proforma(numero,fecha,cliente,origen,destino) VALUES ( $numero , '$fecha','$cliente','$origen','$destino' )")) {
            $result["vista"] = "View/proformaView.php";
            $result["error"] = "Error al cargar la proforma";
        } else $result["vista"] = "View/homeSupervisorView.php";
        return $result;
    }

    public function verProforma($numero){
        $res["error"]= "Proforma no encontrada";
        $result= ($this->database->query("SELECT * FROM proforma WHERE numero = $numero") ? $this->database->query("SELECT * FROM proforma WHERE numero = $numero") : $res );
        return $result;
    }
}