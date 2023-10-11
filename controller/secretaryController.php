<?php
  // Incluimos el archivo moduleManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/moduleManagement.php';

  class secretaryController {

    // Atributos
    private $view;
    private $courses;
    private $moduleManagement;

    function __construct() {
      $this->moduleManagement = new ModuleManagement();
    }

    function deleteModule() {
      if ($this->isSecretary() || $this->isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->moduleManagement->deleteModule();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar el módulo.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar un módulo.'
          )
        );
      }
    }
    
    function getView() {
      return $this->view;
    }

    function home() {
      $this->view = 'home';
    }

    function index() {
      $this->view = 'courses';
    }

    function secretary() {
      if ($this->isSecretary() || $this->isAdmin()) {
        $this->view = 'secretary';
        return $this->moduleManagement->getModules();
      }
    }

    function editCourse() {
      $this->view = 'editCourse';
    }

    function duplicateModule() {
      if ($this->isSecretary() || $this->isAdmin()) {
        if (isset($_GET['id'])) {
          if (!empty($_GET['id'])) {
            echo $this->moduleManagement->duplicateModule();
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'Se deben de rellenar todos los campos.'
              )
            );
          }
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido duplicar el módulo.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para duplicar módulo.'
          )
        );
      }
    }

    function editModule() {
      if ($this->isSecretary() || $this->isAdmin()) {
        if (isset($_GET['id'])) {
          $this->view = 'editModule';
          return $this->moduleManagement->getModuleById($_GET['id']);
        }
        else if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['content'])){
          if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['content'])) {
            if ($this->moduleManagement->createModule()) {
              echo json_encode(array('success' => 1));
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'No se ha podido crear el módulo.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'Se deben de rellenar todos los campos.'
              )
            );
          }
        }
        else {
          $this->view = 'editModule';
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para editar el módulo.'
          )
        );
      }
    }

    function module() {
      $this->view = 'module';
    }

    /*
    * Método que comprueba si el usuario se ha logeado y si es de tipo administrador.
    * 
    * @return Devuelve true si el usuario se ha logeado y si es de tipo administrador, en caso contrario false.
    */
    private function isAdmin() {
        return isset($_SESSION["type"]) && $_SESSION["type"] == 'admin';
    }

    /*
    * Método que comprueba si el usuario se ha logeado y si es de tipo secretaría.
    * 
    * @return Devuelve true si el usuario se ha logeado y si es de tipo secretaría, en caso contrario false.
    */
    private function isSecretary() {
        return isset($_SESSION["type"]) && $_SESSION["type"] == 'secretary';
    }
  }
?>