<?php
    // Comprobamos que no puedan entrar por ruta absoluta
    if (session_status() != PHP_SESSION_ACTIVE) {
        die('Hey Bro! You cannot access this file... twat!');
    }

    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo module.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los módulos.
    require_once 'model/course.php';

    /* 
     * Esta clase hace de intermediaria entre el controlador courseController
     * con funcionalidades de gestión de módulos, y modelos como el de la base 
     * de datos db y el modelo que define los campos de los módulos module.
     * De forma que termina de ejecutar las funcionalidades implementadas en el
     * controlador courseController como crear, duplicar, editar y eliminar
     * módulos, haciendo comprobaciones con la lista de módulos actuales de la
     * base de datos y posteriormente llamar a los métodos de la base de datos 
     * para terminar el proceso y devolver el resultado.
     * 
     * @author: Carlos Maroto
     * @version: v1.0.0 Carlos Maroto
    */
    class CourseManagement {
        
        // Atributos
        private $db;
        private $courses;

        /*
         * Creamos una instancia de Db al inicio para poder utilizarla más 
         * adelante, a su vez el constructor de esta clase crea una conexión
         * con la base de datos. Además actualiza la lista de módulos, por
         * lo que siempre estamos trabajando con los nuevos datos.
        */
        function __construct() {
            $this->db = new Db();
            $this->updateCourses();
        }

        /*
         * Método que llama a la base de datos para crear el módulo. Si todo 
         * funciona correctamente se devuelve que ha tenido éxito, en caso 
         * contrario se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros name, 
         * header_image, preview, preview_image, content y content_image en 
         * el controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function createCourse() {
            if ($this->db->createCourse()) {
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
                        'msg'     => 'No se ha podido crear el curso en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de un 
         * módulo de la base de datos y llama a la base de datos para eliminar
         * el módulo. Si todo funciona correctamente y se cumple las 
         * condiciones se devuelve que ha tenido éxito, en caso contrario se 
         * muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function deleteCourse() {
            if ($this->getCourseById($_GET['id'])) {
                if ($this->db->deleteCourse()) {
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
                            'msg'     => 'No se ha podido eliminar el mócursodulo de la base de datos.'
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
         * Método que comprueba que el id introducido corresponde al id de un 
         * módulo de la base de datos, guarda en la varible POST los datos del
         * módulo que se quiere duplicar y llama a la base de datos para crear
         * el módulo. Si todo funciona correctamente y se cumplen las 
         * condiciones se actualiza la lista de módulos para extraer el que 
         * hemos creado previamente y se devuelve con el resultado, en caso 
         * contrario se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success, en caso de error msg y en caso 
         *         de éxito module con todos los parámetros del módulo creado.
        */
        function duplicateCourse() {
            $course = $this->getCourseById($_GET['id']);
            if ($course) {
                $_POST['name']       = uniqid();
                $_POST['id_subject'] = $course->getAssignedSubject();
                $_POST['studies']    = $course->getStudies();
                $_POST['location']   = $course->getLocation();
                $_POST['type']       = $course->getType();
                $_POST['start_date'] = $course->getStartDate();
                $_POST['end_date']   = $course->getEndDate();
                if ($this->db->createCourse()) {
                    $this->updateCourses();
                    $new_course = $this->getCourseByName($_POST['name']);
                    $_POST['id']   = $new_course->getId();
                    $_POST['name'] = $course->getName() . ' Copia';
                    $this->db->editCourse();
                    $this->updateCourses();
                    $new_course = $this->getCourseById($_POST['id']);
                    $result = json_encode(
                        array(
                            'success'   => 1, 
                            'course'    => array(
                                'id'         => $new_course->getId(),
                                'name'       => $new_course->getName(),
                                'id_subject' => $new_course->getAssignedSubject(),
                                'studies'    => $new_course->getStudies(),
                                'location'   => $new_course->getLocation(),
                                'type'       => $new_course->getType(),
                                'start_date' => $new_course->getStartDate(),
                                'end_date'   => $new_course->getEndDate()
                            )
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido duplicar el curso de la base de datos.'
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
         * Método que comprueba que el id introducido corresponde al id de un 
         * módulo de la base de datos y llama a la base de datos para editar el
         * módulo. Si todo funciona correctamente y se cumple las condiciones 
         * se devuelve que ha sido un éxito, en caso contrario se muestra un 
         * mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros id, name, 
         * header_image, preview, preview_image, content y content_image en el 
         * controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function editCourse() {
            if ($this->getCourseById($_POST['id'])) {
                if ($this->db->editCourse()) {
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
                            'msg'     => 'No se ha podido editar el curso de la base de datos.'
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
         * Método que devuelve el módulo dado por su id.
         * 
         * @param  int id del módulo a consultar.
         * @return Devuelve el módulo dado su id o null si no se encuentra.
        */
        function getCourseById($id) {
            $result = null;
            for ($i=0; $i<count($this->courses) && !$result; $i++) {
                if ($this->courses[$i]->getId() == $id) {
                    $result = $this->courses[$i];
                }
            }
            return $result;
        }

        /*
         * Método que devuelve el módulo dado por su nombre.
         * 
         * @param  String nombre del módulo a consultar.
         * @return Devuelve el módulo dado su nombre o null si no se encuentra.
        */
        private function getCourseByName($name) {
            $result = null;
            for ($i=0; $i<count($this->courses) && !$result; $i++) {
                if ($this->courses[$i]->getName() == $name) {
                    $result = $this->courses[$i];
                }
            }
            return $result;
        }

        /*
         * Método de consulta que devuelve el array privado modules que contiene
         * la lista de todos los módulos actuales de la base de datos.
         * 
         * @return Lista de los módulos de la base de datos.
        */
        function getCourses() {
            return $this->courses;
        }

        /*
         * Método que guarda en el array modules los datos de los módulos
         * registados en la base de datos.
        */
        private function updateCourses() {
            $this->courses = [];
            $query = $this->db->getCourses();
            foreach ($query as $row) {
                array_push($this->courses, new Course($row['id'], $row['name'], $row['id_subject'], $row['studies'], $row['location'], $row['type'], $row['start_date'], $row['end_date']));
            }
        }
    }
?>