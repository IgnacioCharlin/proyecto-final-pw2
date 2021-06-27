<?php
    session_start();
    include_once("ModuleInitializer.php");
    include_once("Router.php");

        $page = isset($_GET["module"]) ? $_GET["module"] : (isset($_SESSION["isLogin"]) ? "home":"login");
        $action = isset($_GET["action"]) ? $_GET["action"] : "index";
        $moduleInitializer = new ModuleInitializer();


    Router::executeActionFromController($moduleInitializer, $page, $action);

