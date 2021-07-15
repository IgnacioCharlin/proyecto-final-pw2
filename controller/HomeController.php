<?php

class HomeController
{
    private $database;
    private $render;
    private $usuarioModel;
    private $profomaModel;


    public function __construct($render,$database,$usuarioModel)
    {
        $this->render =$render;
        $this->database = $database;
        $this->usuarioModel = $usuarioModel;
        $this->profomaModel = new ProformaModel($this->database);
    }
    public function index()
    {
        $data["usuarios"] = $this->usuarioModel->getUsuarios();
        foreach ($data["usuarios"] as $usuario){
            if($usuario["name"] == $_SESSION["usuario"]){
                if($usuario["rol"]=="Administrador"){
                    $this->vistaAdm();
                }if($usuario["rol"]=="Supervisor"){
                    $this->vistaSupervisor();
                } else{
                    $this->vistaChofer($usuario["id"]);
                }
            }
        }
        echo $this->render->render("View/homeChoferView.php", $data);
    }
    public function vistaChofer($id_chofer)
    {
        $data["proforma"] = $this->profomaModel->verProfromaAsignadaAlChofer($id_chofer);
        $data["usuario"] = $_SESSION["usuario"];
        $data["msg"]= (isset($_GET["msg"]) ? $_GET["msg"] : null);

        echo $this->render->render("View/homeChoferView.php", $data);

    }
    public function vistaAdm(){
        $data["proforma"] = $this->profomaModel->verTodasLasProforma();
        $data["usuario"] = $_SESSION["usuario"];
        $data["msg"]= (isset($_GET["msg"]) ? $_GET["msg"] : null);
        if(isset($_GET["error"])){
            $data["error"]= $_GET["error"];
        }
        echo $this->render->render("View/homeAdministradorView.php", $data);
    }

    public function vistaSupervisor(){
        $data["proforma"] = $this->profomaModel->verTodasLasProforma();
        $data["usuario"] = $_SESSION["usuario"];
        $data["msg"]= (isset($_GET["msg"]) ? $_GET["msg"] : null);

        if(isset($_GET["error"])){
            $data["error"]= $_GET["error"];
        }
        echo $this->render->render("View/homeSupervisorView.php", $data);
    }

}