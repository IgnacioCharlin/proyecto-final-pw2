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
        return $datos;
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
//        $gastoPorViaje = $this->database->query("SELECT * FROM posicion WHERE numeroViaje = $numeroViaje");

        $gastoPorViaje["kilometros"] = $this->kilometros($numeroViaje);
        $gastoPorViaje["combustible"] = $this->combustible($numeroViaje);
        $gastoPorViaje["otros"] = $this->otrosGastos($numeroViaje);
        if($gastoPorViaje != null){
            return $gastoPorViaje;
        }else{
            $result["vista"]="View/HomeChoferView";
            $result["error"] = "No se encontraron Gastos para ese viaje";
        }
    }

    public function sumatoriaGasto($numeroViaje){
        $sumatoriaGasto = $this->database->query("SELECT SUM(gasto) as total FROM posicion WHERE numeroViaje = $numeroViaje;");
        if($sumatoriaGasto != null){
            return $sumatoriaGasto;
        }else{
            $result["vista"]="View/HomeChoferView";
            $result["error"] = "No se encontraron Gastos para ese viaje";
        }     $result["error"] = "No se encontraron Gastos para ese viaje";

    }

    public function finalizarViaje($numeroViaje){
        $km= $this->kilometros($numeroViaje);
        $km_previsto = $km["0"]["km_previsto"];
        $km_reales = $km["0"]["km_reales"];
        $combustible =$this->combustible($numeroViaje);
        $com_real = $combustible["0"]["gastado"];
        $com_previsto = $combustible["0"]["previsto"];
        $gastos = $this->otrosGastos($numeroViaje);
        $adicionales = $gastos["0"]["otros"];
        $total = $this->sumatoriaGasto($numeroViaje);
        $total_viaje = $total["0"]["total"];

         $this->database->insert("INSERT INTO reporte_viaje (id,km_previsto,km_real,comb_real,comb_previ,gastos_adicionales,gastos_total)
                                values($numeroViaje,$km_previsto,$km_reales,$com_real,$com_previsto,$adicionales,$total_viaje)");
        return $this->database->insert("UPDATE estado_viaje SET viaje_activo = 0  WHERE id_viaje = $numeroViaje");

    }


    public function kilometros($numeroViaje)
    {
        return $this->database->query("SELECT max(pos.kilometraje)-min(pos.kilometraje) as km_reales, p.km_previsto 
                                                 FROM sistematransporte.posicion pos left 
                                                 join sistematransporte.proforma p on pos.numeroViaje = p.numero 
                                                 where pos.numeroViaje = $numeroViaje");

    }


    public function combustible($numeroViaje)
    {
        return  $this->database->query("SELECT sum(pos.gasto)/80.5 as gastado, p.combustible_previsto as previsto
                                                                FROM sistematransporte.posicion pos left
                                                                 join sistematransporte.proforma p on pos.numeroViaje = p.numero
                                                                 where pos.numeroViaje = $numeroViaje
                                                                 and pos.descripcion = 'Nafta';");

    }


    public function otrosGastos($numeroViaje)
    {
        return $this->database->query("SELECT sum(gasto) as otros
                                                            FROM sistematransporte.posicion
                                                            WHERE numeroViaje = $numeroViaje
                                                            AND descripcion <>'Nafta';");

    }


}