<?php
include_once ("model/ProformaModel.php");
class ProformaController
{
    private $database;
    private $render;
    private $proforma;
    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
        $this->proforma =  new ProformaModel($this->database);
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
        $result= $this->proforma->registrarProforma($numero,$fecha,$cliente,$origen,$destino);
        echo $this->render->render($result["vista"], $result);
    }
    public function verProforma(){
        $numero = $_POST["numero"];
        $result["data"]= $this->proforma->verProforma($numero);
        var_dump($result["data"]);
        //echo $this->render->render($result);
    }

}