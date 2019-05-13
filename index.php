<?php
    session_start();

    require_once("libs/utilities.php");

    //Este switch se encarga de todo el enrutamiento público
    $pageRequest = "home";
    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }
    switch($pageRequest){
        case "home":
            require_once("controllers/home.control.php");
            die();
        case "clientes":
            require_once("controllers/clientes/clientes.control.php");
            die();
        case "cliente":
            require_once("controllers/clientes/cliente.control.php");
            die();
        case "contactos":
            echo "entre en contactos";
            die();
            //require_once("controllers/tests/test.control.php");
    }
    require_once("controllers/error.control.php");
?>