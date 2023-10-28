<?php
    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo lesson.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener las lecciones.
    require_once 'model/lesson.php';

    // Incluimos el archivo config.php para utilizar las constantes definidas en él.
    require_once 'config/config.php';

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
         * Método que llama a la base de datos para crear la lección. Si todo 
         * funciona correctamente se devuelve que ha tenido éxito, en caso 
         * contrario se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros name 
         * y files en el controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function createLesson() {
            $valid = true;
            $title = '';
            $result = '';
            for ($i=0; $i<$_POST['count_archives'] && $valid; $i++) { 
                if (isset($_POST['title-'.$i]) && !empty($_POST['title-'.$i])) {
                    $title = $_POST['title-'.$i];
                    if (isset($_FILES[$title]) && !empty($_FILES[$title])) {
                        $array = explode('.', $_FILES[$title]["name"]);
                        $ext = end($array);
                        $url_temp = $_FILES[$title]["tmp_name"];
                        $url_insert = constant('DEFAULT_UPDATE');
                        $url_target = $url_insert . '/' . uniqid() . '.' . $ext;
                        if (!file_exists($url_insert)) {
                            mkdir($url_insert, 0777, true);
                        }
                        if (move_uploaded_file($url_temp, $url_target)) {
                            $result .= $title . ';;' . $url_target . ';;';
                        }
                        else {
                            $valid = false;
                        }
                    }
                    else {
                        $valid = false;
                    }
                }
                else {
                    $valid = false;
                }
            }
            if ($valid) {
                $_POST['files'] = $result;
                if ($this->db->createLesson()) {
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
                            'msg'     => 'No se ha podido crear la lección en la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                    'success' => 0, 
                    'msg'     => 'No se ha podido crear la lección.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una 
         * lección de la base de datos y llama a la base de datos para eliminar
         * la lección. Si todo funciona correctamente y se cumple las 
         * condiciones se devuelve que ha tenido éxito, en caso contrario se 
         * muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function deleteLesson() {
            if ($this->getLessonById($_GET['id'])) {
                if ($this->db->deleteLesson()) {
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
         * Método que comprueba que el id introducido corresponde al id de una
         * lección de la base de datos, guarda en la varible POST los datos de la
         * lección que se quiere duplicar y llama a la base de datos para crear
         * la lección. Si todo funciona correctamente y se cumplen las 
         * condiciones se actualiza la lista de lecciones para extraer la que 
         * hemos creado previamente y se devuelve con el resultado, en caso 
         * contrario se muestra un mensaje del error correspondiente.
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
                $_POST['name']   = $lesson->getName() . " Copia";
                $_POST['files']  = $lesson->getFiles();
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
            if ($this->getLessonById($_POST['id'])) {
                $valid = true;
                $title = '';
                $result = '';
                for ($i=0; $i<$_POST['count_archives'] && $valid; $i++) { 
                    if (isset($_POST['title-'.$i]) && !empty($_POST['title-'.$i])) {
                        $title = $_POST['title-'.$i];
                        if (isset($_FILES[$title]) && !empty($_FILES[$title])) {
                            $array = explode('.', $_FILES[$title]["name"]);
                            $ext = end($array);
                            $url_temp = $_FILES[$title]["tmp_name"];
                            $url_insert = constant('DEFAULT_UPDATE');
                            $url_target = $url_insert . '/' . uniqid() . '.' . $ext;
                            if (!file_exists($url_insert)) {
                                mkdir($url_insert, 0777, true);
                            }
                            if (move_uploaded_file($url_temp, $url_target)) {
                                $result .= $title . ';;' . $url_target . ';;';
                            }
                            else {
                                $valid = false;
                            }
                        }
                        else {
                            $valid = false;
                        }
                    }
                    else {
                        $valid = false;
                    }
                }
                if ($valid) {
                    $_POST['files'] = $result;
                    if ($this->db->editLesson()) {
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
                                'msg'     => 'No se ha podido editar la lección de la base de datos.'
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