<?php
    include_once("ModuleInitializer.php");
    include_once("Router.php");

    session_start();
        $page = isset($_GET["module"]) ? $_GET["module"] : "login";
        $action = isset($_GET["action"]) ? $_GET["action"] : "index";
        $moduleInitializer = new ModuleInitializer();

    Router::executeActionFromController($moduleInitializer, $page, $action);

