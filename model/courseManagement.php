<?php
    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    class CourseManagement {
        
        // Atributos
        private $db;
        private $modules;
        private $users;

        function __construct() {
            $this->db = new Db();
        }
    }
?>