<?php
  // Incluimos el archivo moduleManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los módulos.
  require_once 'model/moduleManagement.php';
  
  // Incluimos el archivo courseManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/courseManagement.php';

  class courseController {

    // Atributos
    private $view;
    private $moduleManagement;
    private $courseManagement;

    function __construct() {
      $this->moduleManagement = new ModuleManagement();
      $this->courseManagement = new CourseManagement();
    }

    function deleteModule() {
      if (isSecretary() || isAdmin()) {
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

    function duplicateModule() {
      if (isSecretary() || isAdmin()) {
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

    function editCourse() {
      if (isSecretary() || isAdmin()) {
        $this->view = 'editCourse';
      }
    }

    function editModule() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id'])) {
          $this->view = 'editModule';
          return $this->moduleManagement->getModuleById($_GET['id']);
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['content'])){
            if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['content'])) {
              if ($this->moduleManagement->editModule()) {
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
    
    function getView() {
      return $this->view;
    }

    function home() {
      if (isStudent() || isTeacher()) {
        $this->view = 'home';
      }
    }

    function index() {
      $this->view = 'courses';
    }

    function module() {
      $this->view = 'module';
    }

    function secretary() {
      if (isSecretary() || isAdmin()) {
        $this->view = 'secretary';
        return $this->moduleManagement->getModules();
      }
    }
  }
?>