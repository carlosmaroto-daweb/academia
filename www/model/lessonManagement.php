<?php
    // Comprobamos que no puedan entrar por ruta absoluta
    if (session_status() != PHP_SESSION_ACTIVE) {
        die('Hey Bro! You cannot access this file... twat!');
    }

    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo lesson.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener las lecciones.
    require_once 'model/lesson.php';

    /* 
     * Esta clase hace de intermediaria entre el controlador courseController
     * con funcionalidades de gestión de lecciones, y modelos como el de la base 
     * de datos db y el modelo que define los campos de las lecciones lesson.
     * De forma que termina de ejecutar las funcionalidades implementadas en el
     * controlador courseController como crear, duplicar, editar y eliminar
     * lecciones, haciendo comprobaciones con la lista de lecciones actuales de la
     * base de datos y posteriormente llamar a los métodos de la base de datos 
     * para terminar el proceso y devolver el resultado.
     * 
     * @author: Carlos Maroto
     * @version: v1.0.0 Carlos Maroto
    */
    class LessonManagement {
        
        // Atributos
        private $db;
        private $lessons;

        /*
         * Creamos una instancia de Db al inicio para poder utilizarla más 
         * adelante, a su vez el constructor de esta clase crea una conexión
         * con la base de datos. Además actualiza la lista de lecciones, por
         * lo que siempre estamos trabajando con los nuevos datos.
        */
        function __construct() {
            $this->db = new Db();
            $this->updateLessons();
        }

        /*
         * Método que guarda los archivos pasados por FILES en una ruta
         * especificada en el archivo config con un nombre único. Devuelve
         * una cadena de texto con el siguiente formato para cada archivo:
         * <nombre_archivo>;;<ruta_archivo>. En caso de que no tenga permisos
         * sobre los directorios devolverá una cadena vacía.
         * 
         * @return String nombres de los archivos y las rutas de los
         *                archivos creados o una cadena vacía
        */
        private function createArchives() {
            $title = '';
            $files = '';
            $noPrivileges = false;
            if (!file_exists(constant('DEFAULT_UPDATE')) && !@mkdir(constant('DEFAULT_UPDATE'), 0755, true)) {
                $noPrivileges = true;
            }
            for ($i=0; $i<$_POST['count_archives'] && !$noPrivileges; $i++) { 
                $title = str_replace(" ", "_", $_POST['title-'.$i]);
                $array = explode('.', $_FILES[$title]["name"]);
                $ext = end($array);
                $url_temp = $_FILES[$title]["tmp_name"];
                $url_target = constant('DEFAULT_UPDATE') . '/' . uniqid() . '.' . $ext;
                if (!@move_uploaded_file($url_temp, $url_target)) {
                    $noPrivileges = true;
                }
                else {
                    if ($files != '') {
                        $files .= ';;';
                    }
                    $files .= $title . ';;' . $url_target;
                }
            }
            if ($noPrivileges) {
                $this->deleteArchives($files);
                $files = '';
            }
            return $files;
        }

        /*
         * Método que llama al método createArchives donde se van a crear
         * los archivos pasados por FILES y va a devolver una cadena de
         * texto con su nombre y su ruta, esta cadena la vamos a guardar 
         * en POST para crear en la base de datos la lección con los parámetros.
         * Si todo funciona correctamente se devuelve que ha tenido éxito, 
         * en caso contrario se borran los archivos anteriormente creados (si 
         * se llegan a crear) y se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha compropado que estén los parámetros name, 
         * count_archives, title-X (por cada archivo) y su respectivo FILE en
         * el controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function createLesson() {
            $files = $this->createArchives();
            if ($files != '') {
                $_POST['files'] = $files;
                if ($this->db->createLesson()) {
                    $result = json_encode(
                        array(
                            'success' => 1
                        )
                    );
                }
                else {
                    $this->deleteArchives($files);
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido crear la lección en la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'No se han podido guardar los archivos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que elimina los archivos almacenados en las ruta.
         * 
         * @param  String nombres y rutas de los archivos
         * @return Bool resultado de la operación
        */
        private function deleteArchives($files) {
            $result = true;
            $arrays = explode(';;', $files);
            for ($i=1; $i<count($arrays) && $result; $i+=2) { 
                if (!@unlink($arrays[$i])) {
                    $result = false;
                }
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una 
         * lección de la base de datos y llama a la base de datos para eliminar
         * la lección. Si todo funciona correctamente y se cumple las 
         * condiciones se eliminan los archivos almacenados y se devuelve que
         * ha tenido éxito, en caso contrario se muestra un mensaje del error 
         * correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function deleteLesson() {
            $lesson = $this->getLessonById($_GET['id']);
            if ($lesson) {
                $files  = $lesson->getFiles();
                if ($this->db->deleteLesson()) {
                    if ($this->deleteArchives($files)) {
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
                                'msg'     => 'Se ha borrado la lección, pero no se han podido eliminar los archivos asociados.'
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido eliminar la lección de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'La lección no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que crea una copia de los archivos originales. Devuelve una
         * cadena de texto con el siguiente formato para cada archivo:
         * <nombre_archivo>;;<ruta_archivo>. En caso de que no tenga permisos
         * sobre los directorios devolverá una cadena vacía.
         *  
         * @return String nombres de los archivos y las rutas de los
         *                archivos creados o una cadena vacía
        */
        private function duplicateArchive($original) {
            $arrays = explode(';;', $original);
            $files = '';
            $noPrivileges = false;
            for ($i=0; $i<count($arrays) && !$noPrivileges; $i+=2) {
                $title = $arrays[$i];
                $archive = $arrays[$i+1];
                $array = explode('.', $arrays[$i+1]);
                $ext = end($array);
                $url_target = constant('DEFAULT_UPDATE') . '/' . uniqid() . '.' . $ext;
                if (!@copy($archive, $url_target)) {
                    $noPrivileges = true;
                }
                else {
                    if ($files != '') {
                        $files .= ';;';
                    }
                    $files .= $title . ';;' . $url_target;
                }
            }
            if ($noPrivileges) {
                $this->deleteArchives($files);
                $files = '';
            }
            return $files;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una
         * lección de la base de datos, hace una copia de los archivos del 
         * original, guarda en la varible POST los datos de la lección que se 
         * quiere duplicar y llama a la base de datos para crear la lección. 
         * Si todo funciona correctamente y se cumplen las condiciones se 
         * actualiza la lista de lecciones para extraer la que hemos creado 
         * previamente y se devuelve con el resultado, en caso contrario se 
         * muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success, en caso de error msg y en caso 
         *         de éxito lesson con todos los parámetros de la lección creada.
        */
        function duplicateLesson() {
            $lesson = $this->getLessonById($_GET['id']);
            if ($lesson) {
                $_POST['name'] = $lesson->getName() . ' ' . uniqid();
                $files = $this->duplicateArchive($lesson->getFiles());
                if ($files != '') {
                    $_POST['files'] = $files;
                    if ($this->db->createLesson()) {
                        $this->updateLessons();
                        $lesson = $this->getLessonByName($_POST['name']);
                        $result = json_encode(
                            array(
                                'success'   => 1, 
                                'lesson'    => array(
                                    'id'    => $lesson->getId(),
                                    'name'  => $lesson->getName(),
                                    'files' => $lesson->getFiles()
                                )
                            )
                        );
                    }
                    else {
                        $this->deleteArchives($files);
                        $result = json_encode(
                            array(
                                'success' => 0, 
                                'msg'     => 'No se ha podido duplicar la lección de la base de datos.'
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se han podido duplicar los archivos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'La lección no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una 
         * lección de la base de datos y llama a la base de datos para editar la
         * lección. Si todo funciona correctamente y se cumple las condiciones 
         * se devuelve que ha sido un éxito, en caso contrario se muestra un 
         * mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros id, name, 
         * y files en el controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function editLesson() {
            $lesson = $this->getLessonById($_POST['id']);
            if ($lesson) {
                $files = $this->createArchives();
                if ($files != '') {
                    $_POST['files'] = $files;
                    if ($this->db->editLesson()) {
                        $this->deleteArchives($lesson->getFiles());
                        $result = json_encode(
                            array(
                                'success' => 1
                            )
                        );
                    }
                    else {
                        $this->deleteArchives($files);
                        $result = json_encode(
                            array(
                                'success' => 0,
                                'msg'     => 'No se ha podido editar la lección de la base de datos.'
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se han podido guardar los archivos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                    'success' => 0, 
                    'msg'     => 'No se ha podido editar la lección.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que devuelve la lección dada por su id.
         * 
         * @param  int id de la lección a consultar.
         * @return Devuelve la lección dada su id o null si no se encuentra.
        */
        function getLessonById($id) {
            $result = null;
            for ($i=0; $i<count($this->lessons) && !$result; $i++) {
                if ($this->lessons[$i]->getId() == $id) {
                    $result = $this->lessons[$i];
                }
            }
            return $result;
        }

        /*
         * Método que devuelve la lección dado por su nombre.
         * 
         * @param  String nombre de la lección a consultar.
         * @return Devuelve la lección dado su nombre o null si no se encuentra.
        */
        private function getLessonByName($name) {
            $result = null;
            for ($i=0; $i<count($this->lessons) && !$result; $i++) {
                if ($this->lessons[$i]->getName() == $name) {
                    $result = $this->lessons[$i];
                }
            }
            return $result;
        }

        /*
         * Método de consulta que devuelve el array privado lessons que contiene
         * la lista de todas las lecciones actuales de la base de datos.
         * 
         * @return Lista de las lecciones de la base de datos.
        */
        function getLessons() {
            return $this->lessons;
        }

        /*
         * Método que guarda en el array lessons los datos de las lecciones
         * registadas en la base de datos.
        */
        private function updateLessons() {
            $this->lessons = [];
            $query = $this->db->getLessons();
            foreach ($query as $row) {
                array_push($this->lessons, new Lesson($row['id'], $row['name'], $row['files']));
            }
        }
    }
?>