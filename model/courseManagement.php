<?php
    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';
    // Incluimos el archivo module.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los módulos.
    require_once 'model/module.php';
    // Incluimos el archivo user.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los usuarios.
    require_once 'model/user.php';

    class CourseManagement {
        
        // Atributos
        private $db;
        private $modules;
        private $users;

        function __construct() {
            $this->db = new Db();
        }

        function createModule() {
            $result = false;
            if ($this->db->createModule()) {
                $result = true;
            }
            return $result;
        }
    }
?>