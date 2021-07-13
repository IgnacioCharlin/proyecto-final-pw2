<?php
include_once("helpers/DataBase.php");
include_once("helpers/Render.php");
include_once("helpers/Config.php");
require_once('vendor/mustache/mustache/src/Mustache/Autoloader.php');
include_once ("model/UsuarioModel.php");
include_once ("model/ProformaModel.php");
include_once ("model/CamionModel.php");


class ModuleInitializer
{
    private $render;
    private $config;
    private $database;
    private $usuarioModel;

    public function __construct()
    {
        $this->render = new Render('view/partial');
        $this->config = new Config("Config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
        $this->usuarioModel = new UsuarioModel($this->database);
    }

    public function createHomeController()
    {
        include_once("controller/HomeController.php");
        return new HomeController($this->render,$this->database,$this->usuarioModel);
    }

    public function createDefaultController()
    {

        return (isset($_SESSION["isLogin"]) ? $this->createHomeController() : $this->createLoginController());
    }

    public function createLoginController(){

        include_once("controller/LoginController.php");

        return new LoginController($this->render, $this->database);
    }
    public function createRegistrarController(){

        include_once("controller/RegistrarController.php");

        return new RegistrarController($this->render, $this->database);
    }

    public function createRolesController(){

        include_once("controller/RolesController.php");
        return new RolesController($this->render, $this->database);
    }

    public function createProformaController(){

        include_once("controller/ProformaController.php");
        return new ProformaController($this->render, $this->database);
    }

    public function createCargarDatosViajeController(){

        include_once("controller/CargarDatosViajeController.php");
        return new CargarDatosViajeController($this->render, $this->database);
    }

    public function createCamionController(){

        include_once("controller/CamionController.php");
        return new CamionController($this->render, $this->database);
    }

}