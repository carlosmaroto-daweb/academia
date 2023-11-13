<?php
    // Comprobamos que no puedan entrar por ruta absoluta
    if (session_status() != PHP_SESSION_ACTIVE) {
        die('Hey Bro! You cannot access this file... twat!');
    }

    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo lessonManagement.php para instanciar la clase como 
    // objeto, esta clase va a gestionar las operaciones sobre las lecciones.
    require_once 'model/lessonManagement.php';
  
    // Incluimos el archivo moduleManagement.php para instanciar la clase como
    // objeto, esta clase va a gestionar las operaciones sobre los módulos.
    require_once 'model/moduleManagement.php';

    /* 
     * Esta clase realiza las consultas a la base de datos relacionadas con las
     * tablas creadas como resultado de la relación entre otras tablas como 
     * módulo/lección, asignatura/módulo, curso/asignatura, usuario/curso.
     * 
     * @author: Carlos Maroto
     * @version: v1.0.0 Carlos Maroto
    */
    class RelatedTableManager {
        
        // Atributos
        private $db;

        /*
         * Creamos una instancia de Db al inicio para poder utilizarla más 
         * adelante, a su vez el constructor de esta clase crea una conexión
         * con la base de datos. Además instancia los modelos de las tablas
         * con las que vamos a trabajar.
        */
        function __construct() {
            $this->db = new Db();
            $this->lessonManagement    = new LessonManagement();
            $this->moduleManagement    = new ModuleManagement();
        }
        
        /*
         * Método que devuelve un array con los objetos Module y Lesson
         * correspondientes a los registros guardados en la tabla module_lesson.
         * 
         * @return Array con pares de valores Module y Lesson
        */
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