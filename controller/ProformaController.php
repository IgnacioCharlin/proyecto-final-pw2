<?php
include_once ("model/ProformaModel.php");
class ProformaController
{
    private $database;
    private $render;
    private $proforma;
    private $usuario;
    private $camion;
    public function __construct($render, $database,$usuarioModel,$camionModel)
    {
        $this->database = $database;
        $this->render = $render;
        $this->proforma =  new ProformaModel($this->database);
        $this->usuario = $usuarioModel;
        $this->camion = $camionModel;
    }

    public function index()
    {
        echo $this->render->render("View/proformaView.php");
    }

    public function cargarProforma(){
        $numero = $_POST["numero"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $cliente = $_POST["cliente"];
        $origen=$_POST["origen"];
        $destino = $_POST["destino"];
        $id_chofer = $_POST["id_chofer"];
        $km_previsto = $_POST["km_previstos"];
        $combustible_previsto = $_POST["combustible_previsto"];
        $patente = $_POST["patente"];
        if($this->usuario->esChofer($id_chofer) != null) {
            if($this->camion->estaDisponible($patente) != null){
                $result = $this->proforma->registrarProforma($numero, $fecha, $cliente, $origen, $destino, $id_chofer, $km_previsto, $combustible_previsto, $patente);
                echo $this->render->render($result["vista"], $result);
            }else{
                $result["error"] = "Ese camion no esta disponible";
                echo $this->render->render("View/proformaView.php", $result);
            }
        } else{
            $result["error"] = "No existe Chofer con ese legajo";
            echo $this->render->render("View/proformaView.php", $result);
        }

    }
    public function verProforma(){
        $numero = $_GET["numero"];
        $result["data"]= $this->proforma->verProforma($numero);
        echo $this->render->render("View/verProformaView.php", $result);
    }

    public function eliminarProforma(){
        $numero = $_GET["numero"];
        $this->proforma->eliminarProforma($numero);
        echo $this->render->render("View/homeAdministradorView.php");
    }

    public function editarProforma(){
        $numero = $_GET["numero"];
        $result["data"]= $this->proforma->verProforma($numero);
        echo $this->render->render("View/editarProformaView.php",$result);
    }

    public function actualizarProforma(){
        $numero = $_POST["numero"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $cliente = $_POST["cliente"];
        $origen=$_POST["origen"];
        $destino = $_POST["destino"];
        $id_chofer = $_POST["id_chofer"];
        $km_previsto = $_POST["km_previstos"];
        $combustible_previsto = $_POST["combustible_previsto"];
        $patente = $_POST["patente"];
        if($this->usuario->esChofer($id_chofer) != null) {
            if($this->camion->estaDisponible($patente) != null){
                $result = $this->proforma->editarProforma($numero, $fecha, $cliente, $origen, $destino, $id_chofer, $km_previsto, $combustible_previsto, $patente);
                echo $this->render->render($result["vista"], $result);
            }else{
                $result["error"] = "Ese camion no esta disponible";
                echo $this->render->render("View/editarProformaView.php", $result);
            }
        } else{
            $result["error"] = "No existe Chofer con ese legajo";
            echo $this->render->render("View/editarProformaView.php", $result);
        }

    }

}