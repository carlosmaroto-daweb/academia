<?php
    // Comprobamos que no puedan entrar por ruta absoluta
    if (session_status() != PHP_SESSION_ACTIVE) {
        die('Hey Bro! You cannot access this file... twat!');
    }

    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo subject.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener las asignaturas.
    require_once 'model/subject.php';

    /* 
     * Esta clase hace de intermediaria entre el controlador courseController
     * con funcionalidades de gestión de asignaturas, y modelos como el de la base 
     * de datos db y el modelo que define los campos de las asignaturas subject.
     * De forma que termina de ejecutar las funcionalidades implementadas en el
     * controlador courseController como crear, duplicar, editar y eliminar
     * asignaturas, haciendo comprobaciones con la lista de asignaturas actuales de la
     * base de datos y posteriormente llamar a los métodos de la base de datos 
     * para terminar el proceso y devolver el resultado.
     * 
     * @author: Carlos Maroto
     * @version: v1.0.0 Carlos Maroto
    */
    class SubjectManagement {
        
        // Atributos
        private $db;
        private $subjects;

        /*
         * Creamos una instancia de Db al inicio para poder utilizarla más 
         * adelante, a su vez el constructor de esta clase crea una conexión
         * con la base de datos. Además actualiza la lista de asignaturas, por
         * lo que siempre estamos trabajando con los nuevos datos.
        */
        function __construct() {
            $this->db = new Db();
            $this->updateSubjects();
        }

        /*
         * Método que llama a la base de datos para crear la asignatura. Si todo 
         * funciona correctamente se devuelve que ha tenido éxito, en caso 
         * contrario se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros name, 
         * header_image, preview, preview_image, content y content_image en 
         * el controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function createSubject() {
            $name = $_POST['name'];
            $_POST['name'] = uniqid();
            if ($this->db->createSubject()) {
                $this->updateSubjects();
                $subject = $this->getSubjectByName($_POST['name']);
                $_POST['id']   = $subject->getId();
                $_POST['name'] = $name;
                $this->db->editSubject();
                if (!empty($_POST['assigned_modules']) && $_POST['assigned_modules'] != "No hay módulos.") {
                    $id_modules = explode(';;', $_POST['assigned_modules']);
                    $errorCreate = false;
                    $_POST['id_subject'] = $_POST['id'];
                    for ($i=0; $i<count($id_modules) && !$errorCreate; $i++) {
                        $_POST['id_module'] = $id_modules[$i];
                        if (!$this->db->createSubjectModule()) {
                            $errorCreate = true;
                        }
                    }
                    if ($errorCreate) {
                        $result = json_encode(
                            array(
                                'success' => 0, 
                                'msg'     => 'No se ha podido crear la asignatura en la base de datos.'
                            )
                        );
                    }
                    else {
                        $result = json_encode(
                            array(
                                'success' => 1
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 1
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'No se ha podido crear la asignatura en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una
         * asignatura de la base de datos y llama a la base de datos para eliminar
         * la asignatura. Si todo funciona correctamente y se cumple las 
         * condiciones se devuelve que ha tenido éxito, en caso contrario se 
         * muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function deleteSubject() {
            $subject = $this->getSubjectById($_GET['id']);
            if ($subject) {
                if ($this->db->deleteSubject()) {
                    $_GET['id_subject'] = $subject->getId();
                    if ($this->db->deleteSubjectModule()) {
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
                                'msg'     => 'No se ha podido eliminar la asignatura de la base de datos.'
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido eliminar la asignatura de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'La asignatura no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una
         * asignatura de la base de datos, guarda en la varible POST los datos de la
         * asignatura que se quiere duplicar y llama a la base de datos para crear
         * la asignatura. Si todo funciona correctamente y se cumplen las 
         * condiciones se actualiza la lista de asignaturas para extraer la que 
         * hemos creado previamente y se devuelve con el resultado, en caso 
         * contrario se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success, en caso de error msg y en caso 
         *         de éxito subject con todos los parámetros de la asignatura creada.
        */
        function duplicateSubject() {
            $subject = $this->getSubjectById($_GET['id']);
            if ($subject) {
                $_POST['name']          = uniqid();
                $_POST['header_image']  = $subject->getHeaderImage();
                $_POST['preview']       = $subject->getPreview();
                $_POST['preview_image'] = $subject->getPreviewImage();
                $_POST['content']       = $subject->getContent();
                $_POST['content_image'] = $subject->getContentImage();
                if ($this->db->createSubject()) {
                    $this->updateSubjects();
                    $new_subject = $this->getSubjectByName($_POST['name']);
                    $_POST['id']   = $new_subject->getId();
                    $_POST['name'] = $subject->getName() . ' Copia';
                    $this->db->editSubject();
                    $this->updateSubjects();
                    $new_subject = $this->getSubjectById($_POST['id']);
                    $result = json_encode(
                        array(
                            'success'   => 1, 
                            'subject'    => array(
                                'id'            => $new_subject->getId(),
                                'name'          => $new_subject->getName(),
                                'header_image'  => $new_subject->getHeaderImage(),
                                'preview'       => $new_subject->getPreview(),
                                'preview_image' => $new_subject->getPreviewImage(),
                                'content'       => $new_subject->getContent(),
                                'content_image' => $new_subject->getContentImage()
                            )
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido duplicar la asignatura de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'La asignatura no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de una 
         * asignatura de la base de datos y llama a la base de datos para editar la
         * asignatura. Si todo funciona correctamente y se cumple las condiciones 
         * se devuelve que ha sido un éxito, en caso contrario se muestra un 
         * mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros id, name, 
         * header_image, preview, preview_image, content y content_image en el 
         * controlador y que sean válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function editSubject() {
            if ($this->getSubjectById($_POST['id'])) {
                $_GET['id_subject'] = $_POST['id'];
                if ($this->db->editSubject() && $this->db->deleteSubjectModule()) {
                    if (!empty($_POST['assigned_modules']) && $_POST['assigned_modules'] != "No hay módulos.") {
                        $id_modules = explode(';;', $_POST['assigned_modules']);
                        $errorCreate = false;
                        $_POST['id_subject'] = $_POST['id'];
                        for ($i=0; $i<count($id_modules) && !$errorCreate; $i++) {
                            $_POST['id_module'] = $id_modules[$i];
                            if (!$this->db->createSubjectModule()) {
                                $errorCreate = true;
                            }
                        }
                        if ($errorCreate) {
                            $result = json_encode(
                                array(
                                    'success' => 0, 
                                    'msg'     => 'No se ha podido editar la asignatura en la base de datos.'
                                )
                            );
                        }
                        else {
                            $result = json_encode(
                                array(
                                    'success' => 1
                                )
                            );
                        }
                    }
                    else {
                        $result = json_encode(
                            array(
                                'success' => 1
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0,
                            'msg'     => 'No se ha podido editar la asignatura en la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'La asignatura no se encuentra en la base de datos.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que devuelve la asignatura dado por su id.
         * 
         * @param  int id de la asignatura a consultar.
         * @return Devuelve la asignatura dado su id o null si no se encuentra.
        */
        function getSubjectById($id) {
            $result = null;
            for ($i=0; $i<count($this->subjects) && !$result; $i++) {
                if ($this->subjects[$i]->getId() == $id) {
                    $result = $this->subjects[$i];
                }
            }
            return $result;
        }

        /*
         * Método que devuelve la asignatura dada por su nombre.
         * 
         * @param  String nombre de la asignatura a consultar.
         * @return Devuelve la asignatura dado su nombre o null si no se encuentra.
        */
        private function getSubjectByName($name) {
            $result = null;
            for ($i=0; $i<count($this->subjects) && !$result; $i++) {
                if ($this->subjects[$i]->getName() == $name) {
                    $result = $this->subjects[$i];
                }
            }
            return $result;
        }

        /*
         * Método de consulta que devuelve el array privado subjects que contiene
         * la lista de todas las asignaturas actuales de la base de datos.
         * 
         * @return Lista de las asignaturas de la base de datos.
        */
        function getSubjects() {
            return $this->subjects;
        }

        /*
         * Método que guarda en el array subjects los datos de las asignaturas
         * registadas en la base de datos.
        */
        private function updateSubjects() {
            $this->subjects = [];
            $query = $this->db->getSubjects();
            foreach ($query as $row) {
                array_push($this->subjects, new Subject($row['id'], $row['name'], $row['header_image'], $row['preview'], $row['preview_image'], $row['content'], $row['content_image']));
            }
        }
    }
?>