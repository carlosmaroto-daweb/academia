<?php
    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';
    // Incluimos el archivo subject.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener las asignaturas.
    require_once 'model/subject.php';
    // Incluimos el archivo user.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los usuarios.
    require_once 'model/user.php';

    class CourseManagement {
        
        private $db;
        private $asignature;
        private $users;

        function __construct() {
            $this->db = new Db();
        }
    }
?>