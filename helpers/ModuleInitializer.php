<?php
include_once("DataBase.php");
include_once("Render.php");
include_once("Config.php");
require_once('./vendor/mustache/mustache/src/Mustache/Autoloader.php');


class ModuleInitializer
{
    private $render;
    private $config;
    private $database;

    public function __construct()
    {
        $this->render = new Render('view/partial');
        $this->config = new Config("Config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
    }

    public function createHomeController()
    {
//        include_once("model/PresentacionesModel.php");
        include_once("controller/controllerHome.php");

        $model = array();//$this->database;
        return new HomeController($model, $this->render);
    }

    public function createDefaultController()
    {
        return $this->createHomeController();
    }

    public function createLoginController(){
        include_once("controller/LoginController.php");

        return new LoginController($this->render);
    }

}