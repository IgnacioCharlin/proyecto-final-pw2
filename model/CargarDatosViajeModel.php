<?php


class CargarDatosViajeModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

    }

    public function viajeActual()
    {
        $id= $_SESSION["idUser"];
        $datos = $this->database->query("SELECT * FROM proforma p LEFT JOIN estado_viaje e on p.numero = e.id_viaje WHERE p.id_chofer = $id AND e.viaje_activo = true");
        return $datos["0"];
    }

    public function registrarPosicion($numeroViaje, $coordenadas, $fecha, $hora,$km, $descripcion,$gasto)
    {
        if (!$this->database->query("SELECT * FROM proforma WHERE numero = $numeroViaje")){
            $result["vista"] = "View/cargarPosicion.php";
            $result["error"] = "No existe ese viaje, revisa el numero de viaje";
        } elseif(!$this->database->insert("INSERT INTO posicion(numeroViaje,posicion,fecha, hora,kilometraje, descripcion, gasto) VALUES ( $numeroViaje , '$coordenadas','$fecha','$hora',$km, '$descripcion',$gasto)")) {
            $result["vista"] = "View/cargarPosicion.php";
            $result["error"] = "Error al cargar la poicion";
        } else {
            $msg = "datos cargados corretamente";
            header("location:/home?msg=$msg");
            exit();
        }
        return $result;
    }
    public function consultarGastosDeViaje($numeroViaje){
        $gastoPorViaje = $this->database->query("SELECT * FROM posicion WHERE numeroViaje = $numeroViaje");
        if($gastoPorViaje != null){
            return $gastoPorViaje;
        }else{
            $result["vista"]="View/HomeChoferView";
            $result["error"] = "No se encontraron Gastos para ese viaje";
        }
    }

    public function sumatoriaGasto($numeroViaje){
        $sumatoriaGasto = $this->database->query("SELECT SUM(gasto) as total FROM `posicion` WHERE numeroViaje = 1;");
        if($sumatoriaGasto != null){
            return $sumatoriaGasto;
        }else{
            $result["vista"]="View/HomeChoferView";
            $result["error"] = "No se encontraron Gastos para ese viaje";
        }
    }
}