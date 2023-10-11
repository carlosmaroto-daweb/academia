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

    class ModuleManagement {
        
        // Atributos
        private $db;
        private $modules;

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
            $result = false;
            if ($this->db->editModule()) {
                $result = true;
            }
            return $result;
        }

        function getModuleById($id) {
            $result = null;
            for ($i=0; $i<count($this->modules) && !$result; $i++) {
                if ($this->modules[$i]->getId() == $id) {
                    $result = $this->modules[$i];
                }
            }
            return $result;
        }

        function getModuleByName($name) {
            $result = null;
            for ($i=0; $i<count($this->modules) && !$result; $i++) {
                if ($this->modules[$i]->getName() == $name) {
                    $result = $this->modules[$i];
                }
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
    }
?>