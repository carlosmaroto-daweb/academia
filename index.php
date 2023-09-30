<?php
    require_once 'config/config.php';

    if (!isset($_GET["controller"])) {
        $_GET["controller"] = constant("DEFAULT_CONTROLLER");
    }
    if (!isset($_GET["action"])) {
        $_GET["action"] = constant("DEFAULT_ACTION");
    }

    $controller_path = 'controller/'.$_GET["controller"].'.php';
    if (!file_exists($controller_path)) {
        $controller_path = 'controller/'.constant("DEFAULT_CONTROLLER").'.php';
    }

    require_once $controller_path;
    $controllerName = $_GET["controller"];
    $controller = new $controllerName();

    if (method_exists($controller, $_GET["action"])) {
        $dataToView = $controller->{$_GET["action"]}();
    }

    if (!isset($_GET["ajax"]) || $_GET["ajax"] != "true") {
        require_once 'view/template/header.php';
        require_once 'view/'.$controller->getView().'.php';
        require_once 'view/template/footer.php';
    }
?>