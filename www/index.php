<?php 
    // Incluimos el archivo config.php para utilizar las constantes definidas en él.
    require_once 'config/config.php';

    // Incluimos el archivo session.php para iniciar o mantener la sesión, además de
    // incluir las funciones de control de sesión definidas en el fichero.
    require_once 'config/session.php';

    // Comprobamos si en la llamada se han mandado por argumento el controlador
    // y la acción, en caso de que no, se utilizan los preestablecidos en el 
    // archivo config.php como constantes.
    if (!isset($_GET["controller"])) {
        $_GET["controller"] = constant("DEFAULT_CONTROLLER");
    }
    if (!isset($_GET["action"])) {
        $_GET["action"] = constant("DEFAULT_ACTION");
    }

    // Comprobamos si existe el archivo del controlador, sino se utiliza el
    // preestablecido en el archivo config.php como constante.
    $controller_path = 'controller/'.$_GET["controller"].'.php';
    if (!file_exists($controller_path)) {
        $controller_path = 'controller/'.constant("DEFAULT_CONTROLLER").'.php';
    }

    // Incluimos el controlador y creamos una instancia de él.
    require_once $controller_path;
    $controllerName = $_GET["controller"];
    $controller = new $controllerName();

    // Si el método del controlador existe lo llamamos y guardamos su
    // resultado en la variable dataToView, para más tarde poder utilizar
    // los datos en la vista que se muestre.
    if (method_exists($controller, $_GET["action"])) {
        $dataToView = $controller->{$_GET["action"]}();
    }

    // En caso de que no se haga una llamada desde ajax incluimos los
    // archivos de las vistas para hacer un refresco de la página,
    // siendo estos archivos la cabecera y el pie de página siempre
    // y sustituyendo el cuerpo principal por la variable view del
    // controlador que estamos llamado.
    if (!isset($_GET["ajax"]) || $_GET["ajax"] != "true") {
        require_once 'view/'.$controller->getView().'.php';
    }
?>