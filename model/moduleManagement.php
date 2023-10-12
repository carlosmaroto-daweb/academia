<?php
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
         * header_image, preview y content en el controlador y que sean
         * válidos.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function createModule() {
            if ($this->db->createModule()) {
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
                        'msg'     => 'No se ha podido crear el módulo en la base de datos.'
                    )
                );
            }
            return $result;
        }

        function deleteModule() {
            //if ($this->isRegistered($_GET['id'])) {
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
            /*}
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'El usuario no se encuentra registrado.'
                    )
                );
            }*/
            return $result;
        }

        function duplicateModule() {
            $module = $this->getModuleById($_GET['id']);
            $_POST['name']         = $module->getName() . " Copia";
            $_POST['header_image'] = $module->getHeaderImage();
            $_POST['preview']      = $module->getPreview();
            $_POST['content']      = $module->getContent();
            if ($this->db->createModule()) {
                $this->updateModules();
                $module = $this->getModuleByName($_POST['name']);
                $result = json_encode(
                    array(
                        'success' => 1, 
                        'module'    => array(
                            'id'           => $module->getId(),
                            'name'         => $module->getName(),
                            'header_image' => $module->getHeaderImage(),
                            'preview'      => $module->getPreview(),
                            'content'      => $module->getContent()
                        )
                    )
                );
            }
            return $result;
        }

        function editModule() {
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
                        'success' => 0
                    )
                );
            }
            return $result;
        }

        /*
         * Método que devuelve el módulo dado por su id.
         * 
         * @param  String id del módulo a consultar.
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
                array_push($this->modules, new Module($row['id'], $row['name'], $row['header_image'], $row['preview'], $row['content']));
            }
        }
    }
?>