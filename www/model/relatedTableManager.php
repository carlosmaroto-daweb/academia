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
  
    // Incluimos el archivo subjectManagement.php para instanciar la clase como
    // objeto, esta clase va a gestionar las operaciones sobre las asignaturas.
    require_once 'model/subjectManagement.php';
  
    // Incluimos el archivo courseManagement.php para instanciar la clase como
    // objeto, esta clase va a gestionar las operaciones sobre los cursos.
    require_once 'model/courseManagement.php';
  
    // Incluimos el archivo userManagement.php para instanciar la clase como
    // objeto, esta clase va a gestionar las operaciones sobre los usuarios.
    require_once 'model/userManagement.php';

    /* 
     * Esta clase realiza las consultas a la base de datos relacionadas con las
     * tablas creadas como resultado de la relación entre otras tablas como 
     * usuario/curso, asignatura/módulo, módulo/lección.
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
            $this->lessonManagement  = new LessonManagement();
            $this->moduleManagement  = new ModuleManagement();
            $this->subjectManagement = new SubjectManagement();
            $this->courseManagement  = new CourseManagement();
            $this->userManagement    = new UserManagement();
        }

        function deleteCourseUser() {
            if ($this->courseManagement->getCourseById($_GET['id_course'])) {
                if ($this->db->deleteCourseUser()) {
                    $result = json_encode(
                        array(
                            'success' => 1
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                        'success' => 0, 
                        'msg'     => 'No se han podido eliminar las matrículas del curso de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                    'success' => 0, 
                    'msg'     => 'El curso no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }

        function editCourseUser() {
            $course = $this->courseManagement->getCourseById($_POST['id_course']);
            if ($course) {
                $_GET['id_course'] = $_POST['id_course'];
                $this->db->deleteCourseUser();
                $id_users = explode(';;', $_POST['id_users']);
                $errorCreate = false;
                for ($i=0; $i<count($id_users) && !$errorCreate; $i++) {
                    if ($this->userManagement->getUserById($id_users[$i])) {
                        $_POST['id_user'] = $id_users[$i];
                        if (!$this->db->createCourseUser()) {
                            $errorCreate = true;
                        }
                    }
                    else {
                        $errorCreate = true;
                    }
                }
                if ($errorCreate) {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido crear las matrículas del curso en la base de datos.'
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 1,
                            'course'    => array(
                                'id'   => $course->getId(),
                                'name' => $course->getName(),
                            )
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                    'success' => 0, 
                    'msg'     => 'El curso no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }
        
        /*
         * Método que devuelve un array con los objetos Course y User
         * correspondientes a los registros guardados en la tabla course_user.
         * 
         * @return Array con pares de valores Course y User.
        */
        function getTuition() {
            $courseUser = [];
            $query = $this->db->getCourseUser();
            foreach ($query as $row) {
                array_push($courseUser, [$row['id_course'], $row['id_user']]);
            }
            $tuition = [];
            $course = null;
            $users = [];
            for ($i=0; $i<count($courseUser); $i++) {
                if ($i==0) {
                    $course = $this->courseManagement->getCourseById($courseUser[$i][0]);
                    array_push($users, $this->userManagement->getUserById($courseUser[$i][1]));
                }
                else {
                    if ($courseUser[$i-1][0] != $courseUser[$i][0]) {
                        array_push($tuition, [$course, $users]);
                        $course = $this->courseManagement->getCourseById($courseUser[$i][0]);
                        $users = [];
                        array_push($users, $this->userManagement->getUserById($courseUser[$i][1]));
                    }
                    else {
                        array_push($users, $this->userManagement->getUserById($courseUser[$i][1]));
                    }
                }
            }
            if ($course != null) {
                array_push($tuition, [$course, $users]);
            }
            return $tuition;
        }
        
        /*
         * Método que devuelve un array con los objetos Module y Lesson
         * correspondientes a los registros guardados en la tabla module_lesson.
         * 
         * @return Array con pares de valores Module y Lesson.
        */
        function getModuleLesson() {
            $moduleLesson = [];
            $query = $this->db->getModuleLesson();
            foreach ($query as $row) {
                array_push($moduleLesson, [$this->moduleManagement->getModuleById($row['id_module']), $this->lessonManagement->getLessonById($row['id_lesson'])]);
            }
            return $moduleLesson;
        }
        
        /*
         * Método que devuelve un array con los objetos Subject y Module
         * correspondientes a los registros guardados en la tabla subject_module.
         * 
         * @return Array con pares de valores Subject y Module.
        */
        function getSubjectModule() {
            $subjectModule = [];
            $query = $this->db->getSubjectModule();
            foreach ($query as $row) {
                array_push($subjectModule, [$this->subjectManagement->getSubjectById($row['id_subject']), $this->moduleManagement->getModuleById($row['id_module'])]);
            }
            return $subjectModule;
        }
    }
?>