<?php

class ProformaController
{
    private $database;
    private $render;

    public function __construct($render, $database)
    {
        $this->database = $database;
        $this->render = $render;
    }

    public function index()
    {
        echo $this->render->render("View/proformaView.php");
    }

    public function cargarProforma(){
        include_once ("model/ProformaModel.php");
        $proforma =  new ProformaModel($this->database);
        $numero = $_POST["numero"];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));
        $cliente = $_POST["cliente"];
        $origen=$_POST["origen"];
        $destino = $_POST["destino"];
        $result= $proforma->registrarProforma($numero,$fecha,$cliente,$origen,$destino);
        echo $this->render->render($result["vista"], $result);
    }

}