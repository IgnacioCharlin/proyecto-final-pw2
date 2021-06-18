<?php
    include_once("ModuleInitializer.php");
    include_once("Router.php");

    session_start();



        $page = isset($_GET["module"]) ? $_GET["module"] : "login";
        $action = isset($_GET["action"]) ? $_GET["action"] : "index";
        $moduleInitializer = new ModuleInitializer();

    Router::executeActionFromController($moduleInitializer, $page, $action);



    /*
     * Desde el index vamos a manejar que pagina queremos visualizar para no repetir tanto codigo como header o footer
     *
    $page = isset($_GET["page"]) ? $_GET["page"] : "home"
    switch ($page){
        case "inicio":
            include_once ("inicio.php");
            break;
        case "Nosotros";
            include_once ("nosotros.php");
            break;


    }
    */



    ?>
