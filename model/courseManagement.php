<?php
    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';
    // Incluimos el archivo module.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los módulos.
    require_once 'model/module.php';
    // Incluimos el archivo user.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los usuarios.
    require_once 'model/user.php';

    class CourseManagement {
        
        // Atributos
        private $db;
        private $modules;
        private $users;

        function __construct() {
            $this->db = new Db();
            $this->updateModules();
        }

        function createModule() {
            $result = false;
            if ($this->db->createModule()) {
                $result = true;
            }
            return $result;
        }

        function duplicateModule() {
            $_POST['name']         = null;
            $_POST['header_image'] = null;
            $_POST['preview']      = null;
            $_POST['content']      = null;
            if ($this->db->createModule()) {
                $result = json_encode(
                    array(
                        'success' => 1
                    )
                );
            }
            return $result;
        }

        function getModules() {
            return $this->modules;
        }

        private function updateModules() {
            $this->modules = [];
            $query = $this->db->getModules();
            foreach ($query as $row) {
                array_push($this->modules, new Module($row['id'], $row['name'], $row['header_image'], $row['preview'], $row['content']));
            }
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
    }
?>