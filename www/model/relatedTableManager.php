<?php
    // Comprobamos que no puedan entrar por ruta absoluta
    if (session_status() != PHP_SESSION_ACTIVE) {
        die('Hey Bro! You cannot access this file... twat!');
    }

    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo lessonManagement.php para instanciar la clase como objeto,
    // esta clase va a gestionar las operaciones sobre las lecciones.
    require_once 'model/lessonManagement.php';
  
    // Incluimos el archivo moduleManagement.php para instanciar la clase como objeto,
    // esta clase va a gestionar las operaciones sobre los módulos.
    require_once 'model/moduleManagement.php';

    class RelatedTableManager {
        
        // Atributos
        private $db;

        function __construct() {
            $this->db = new Db();
            $this->lessonManagement    = new LessonManagement();
            $this->moduleManagement    = new ModuleManagement();
        }
        
        function getModuleLesson() {
            $moduleLesson = [];
            $query = $this->db->getModuleLesson();
            foreach ($query as $row) {
                array_push($moduleLesson, [$this->moduleManagement->getModuleById($row['id_module']), $this->lessonManagement->getLessonById($row['id_lesson'])]);
            }
            return $moduleLesson;
        }
    }
?>