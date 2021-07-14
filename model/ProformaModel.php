<?php
class ProformaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

    }
    public function datosProforma()
    {
        $choferes = $this->database->query("SELECT id, name FROM usuario WHERE rol = 'Chofer'");
        $camiones = $this->database->query("SELECT patente FROM camion WHERE estado = true");
        $semis = $this->database->query("SELECT patente FROM semi WHERE estado = true");
        $data["choferes"] = $choferes;
        $data["camiones"] = $camiones;
        $data["semis"] = $semis;
        return $data;
    }
    public function registrarProforma($numero, $fecha, $cliente,$origen,$destino,$id_chofer,$km_previstos,$combustible_previsto,$patente_camion){
        if(!$this->database->insert("INSERT INTO proforma(numero,fecha,cliente,origen,destino,id_chofer,km_previsto,combustible_previsto,id_camion) VALUES ( $numero , '$fecha','$cliente','$origen','$destino',$id_chofer,$km_previstos,$combustible_previsto,'$patente_camion')")) {
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

    public function verTodasLasProforma(){
        $res["error"]= "Proformas no encontradas";
        $result= ($this->database->query("SELECT * FROM proforma") ? $this->database->query("SELECT * FROM proforma ") : $res );
        return $result;
    }

    public function verProfromaAsignadaAlChofer($id_chofer){
        $res["error"]= "Proformas no encontradas";
        $result= ($this->database->query("SELECT * FROM proforma WHERE id_chofer = $id_chofer") ? $this->database->query("SELECT * FROM proforma WHERE id_chofer = $id_chofer") : $res );
        return $result;
    }

    public function eliminarProforma($numero){
        if(!$this->database->insert("DELETE FROM `proforma` WHERE `proforma`.`numero` = $numero")) {
            $result["vista"] = "View/proformaView.php";
            $result["error"] = "Error al eliminar la proforma";
        } else $result["vista"] = "View/homeAdministradorView.php";
        return $result;
    }

    public function editarProforma($numero, $fecha, $cliente, $origen, $destino, $id_chofer, $km_previsto, $combustible_previsto, $patente){

        if(!$this->database->insert("UPDATE proforma SET numero = $numero , fecha = '$fecha', cliente='$cliente',origen='$origen',destino='$destino',id_chofer = $id_chofer,km_previsto=$km_previsto,combustible_previsto=$combustible_previsto,id_camion='$patente' WHERE numero = $numero")) {
            $result["vista"] = "View/proformaView.php";
            $result["error"] = "Error al cargar la proforma";
        } else $result["vista"] = "View/homeSupervisorView.php";

        return $result;
        /*
        $res["error"]= "Proformas no encontradas";
        $res = ($this->database->insert("UPDATE proforma SET numero = $numero , fecha = '$fecha', cliente='$cliente',origen='$origen',destino='$destino',id_chofer = $id_chofer,km_previsto=$km_previsto,combustible_previsto=$combustible_previsto,id_camion='$patente' WHERE numero = $numero") ? $this->database->insert("UPDATE proforma SET numero = $numero , fecha = '$fecha', cliente='$cliente',origen='$origen',destino='$destino',id_chofer = $id_chofer,km_previsto=$km_previsto,combustible_previsto=$combustible_previsto,id_camion='$patente' WHERE numero = $numero") : $res );
        $res["vista"] = "View/homeAdministradorView.php";
        return $res;
        */
    }



}