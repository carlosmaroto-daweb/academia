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
    require_once 'model/module.php';

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
    class ModuleManagement {
        
        // Atributos
        private $db;
        private $modules;

        /*
         * Creamos una instancia de Db al inicio para poder utilizarla más 
         * adelante, a su vez el constructor de esta clase crea una conexión
         * con la base de datos. Además actualiza la lista de módulos, por
         * lo que siempre estamos trabajando con los nuevos datos.
        */
        function __construct() {
            $this->db = new Db();
            $this->updateModules();
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
        function createModule() {
            $name = $_POST['name'];
            $_POST['name'] = uniqid();
            if ($this->db->createModule()) {
                $this->updateModules();
                $module = $this->getModuleByName($_POST['name']);
                $_POST['id']   = $module->getId();
                $_POST['name'] = $name;
                $this->db->editModule();
                if (!empty($_POST['assigned_lessons']) && $_POST['assigned_lessons'] != "No hay lecciones.") {
                    $id_lessons = explode(';;', $_POST['assigned_lessons']);
                    $errorCreate = false;
                    $_POST['id_module'] = $_POST['id'];
                    for ($i=0; $i<count($id_lessons) && !$errorCreate; $i++) {
                        $_POST['id_lesson'] = $id_lessons[$i];
                        if (!$this->db->createModuleLesson()) {
                            $errorCreate = true;
                        }
                    }
                    if ($errorCreate) {
                        $result = json_encode(
                            array(
                                'success' => 0, 
                                'msg'     => 'No se ha podido crear el módulo en la base de datos.'
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
                        'msg'     => 'No se ha podido crear el módulo en la base de datos.'
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
        function deleteModule() {
            if ($this->getModuleById($_GET['id'])) {
                if ($this->db->deleteModule()) {
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
                            'msg'     => 'No se ha podido eliminar el módulo de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'El módulo no se encuentra en la base de datos.'
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
        function duplicateModule() {
            $module = $this->getModuleById($_GET['id']);
            if ($module) {
                $_POST['name']          = uniqid();
                $_POST['header_image']  = $module->getHeaderImage();
                $_POST['preview']       = $module->getPreview();
                $_POST['preview_image'] = $module->getPreviewImage();
                $_POST['content']       = $module->getContent();
                $_POST['content_image'] = $module->getContentImage();
                if ($this->db->createModule()) {
                    $this->updateModules();
                    $new_module = $this->getModuleByName($_POST['name']);
                    $_POST['id']   = $new_module->getId();
                    $_POST['name'] = $module->getName() . ' Copia';
                    $this->db->editModule();
                    $this->updateModules();
                    $new_module = $this->getModuleById($_POST['id']);
                    $result = json_encode(
                        array(
                            'success'   => 1, 
                            'module'    => array(
                                'id'            => $new_module->getId(),
                                'name'          => $new_module->getName(),
                                'header_image'  => $new_module->getHeaderImage(),
                                'preview'       => $new_module->getPreview(),
                                'preview_image' => $new_module->getPreviewImage(),
                                'content'       => $new_module->getContent(),
                                'content_image' => $new_module->getContentImage()
                            )
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido duplicar el módulo de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'El módulo no se encuentra en la base de datos.'
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
        function editModule() {
            if ($this->getModuleById($_POST['id'])) {
                if ($this->db->editModule()) {
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
                            'msg'     => 'No se ha podido editar el módulo de la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'El módulo no se encuentra en la base de datos.'
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
        function getModuleById($id) {
            $result = null;
            for ($i=0; $i<count($this->modules) && !$result; $i++) {
                if ($this->modules[$i]->getId() == $id) {
                    $result = $this->modules[$i];
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
        private function getModuleByName($name) {
            $result = null;
            for ($i=0; $i<count($this->modules) && !$result; $i++) {
                if ($this->modules[$i]->getName() == $name) {
                    $result = $this->modules[$i];
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
        function getModules() {
            return $this->modules;
        }

        /*
         * Método que guarda en el array modules los datos de los módulos
         * registados en la base de datos.
        */
        private function updateModules() {
            $this->modules = [];
            $query = $this->db->getModules();
            foreach ($query as $row) {
                array_push($this->modules, new Module($row['id'], $row['name'], $row['header_image'], $row['preview'], $row['preview_image'], $row['content'], $row['content_image']));
            }
        }
    }
?>