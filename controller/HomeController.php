<?php

class HomeController
{
    private $datos;
    private $render;
    private $usuarioModel;


    public function __construct($datos, $render,$usuarioModel)
    {
        $this->datos = $datos;
        $this->render =$render;
        $this->usuarioModel = $usuarioModel;
    }
    public function index()
    {
        $data["usuarios"] = $this->usuarioModel->getUsuarios();
        foreach ($data["usuarios"] as $usuario){

            if($usuario["name"] == $_SESSION["usuario"]){
                if($usuario["rol"]=="Administrador"){
                    $this->vistaAdm();
                }else{
                    $this->vistaChofer();
                }
            }

        }
        echo $this->render->render("View/homeView.php", $data);
    }
    public function vistaChofer()
    {
        $data["usuario"] = $_SESSION["usuario"];
        echo $this->render->render("View/homeView.php", $data);
    }
    public function vistaAdm(){
        $data["usuario"] = $_SESSION["usuario"];
        echo $this->render->render("View/homeAdministradorView.php", $data);
    }

}