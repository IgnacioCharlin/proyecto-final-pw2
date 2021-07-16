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
        $choferes = $this->database->query("SELECT us.id, us.name FROM sistematransporte.usuario us WHERE rol = 'Chofer'
                                            and not exists ( SELECT p.id_chofer FROM sistematransporte.proforma p 
                                            left join sistematransporte.estado_viaje e on p.numero = e.id_viaje 
                                            WHERE e.viaje_activo = true
                                            and us.id = p.id_chofer)");
        $camiones = $this->database->query("SELECT ca.patente FROM camion ca WHERE estado = true
                                            AND NOT EXISTS(SELECT p.id_camion FROM sistematransporte.proforma p  
                                            left join sistematransporte.estado_viaje e on p.numero = e.id_viaje 
                                            WHERE  e.viaje_activo = true
                                            AND ca.patente = p.id_camion)");
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
        } else header("location:/home");
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
        $res["error"]= "No se te asigno ningun viaje";
        $result= ($this->database->query("SELECT * FROM proforma p LEFT JOIN estado_viaje e on p.numero = e.id_viaje WHERE p.id_chofer = $id_chofer AND e.viaje_activo = true") ? $this->database->query("SELECT * FROM proforma p LEFT JOIN estado_viaje e on p.numero = e.id_viaje WHERE p.id_chofer = $id_chofer AND e.viaje_activo = true") : $res );
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
        if(!$this->database->insert("UPDATE proforma SET numero = $numero , fecha = '$fecha', cliente='$cliente',origen='$origen',destino='$destino',id_chofer = $id_chofer,km_previsto=$km_previsto,combustible_previsto=$combustible_previsto,id_camion='$patente' WHERE numero = $numero")){
            $result["vista"] = "View/proformaView.php";
            $result["error"] = "Error al modificar la proforma";
        }else header("location:/home");
        return $result;
    }

    public function activar($numero)
    {
       $result = $this->database->query("SELECT id_chofer, id_camion FROM proforma where numero = $numero");
        $camion = $result["0"]["id_camion"];
        $chofer = $result["0"]["id_chofer"];
      if($this->database->query("SELECT ca.patente FROM sistematransporte.camion ca
                                WHERE ca.patente = '$camion' AND
                                EXISTS (SELECT p.id_camion FROM sistematransporte.proforma p  
                                left join sistematransporte.estado_viaje e on p.numero = e.id_viaje 
                                WHERE  e.viaje_activo = true
                                AND ca.patente = p.id_camion)")){
          $msg= "No se pudo activar la proforma, el camion ya tiene un viaje activo";
          header("location:/home?error=$msg");
          exit();
      } elseif ($this->database->query("SELECT us.id FROM sistematransporte.usuario us 
                                        WHERE us.id = $chofer
                                        AND EXISTS ( SELECT p.id_chofer FROM sistematransporte.proforma p 
                                        left join sistematransporte.estado_viaje e on p.numero = e.id_viaje 
                                        WHERE e.viaje_activo = true
                                        and us.id = p.id_chofer)")){
          $msg= "No se pudo activar la proforma, el chofer ya tiene un viaje activo";
          header("location:/home?error=$msg");
          exit();
      }
        elseif(!$this->database->insert("INSERT INTO estado_viaje values ($numero, true)")){
           $msg= "No se pudo activar la proforma";
            header("location:/home?error=$msg");
            exit();
        }
        $msg = "Proforma activada";
        header("location:/home?msg=$msg");
        exit();
    }


}