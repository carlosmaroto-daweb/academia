<?php
  // Incluimos el archivo courseManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/courseManagement.php';

  class courseController {

    // Atributos
    private $view;
    private $courses;
    private $courseManagement;

    function __construct() {
      $this->courseManagement = new CourseManagement();
    }

    function deleteModule() {
      //if ($this->isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->courseManagement->deleteModule();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar el módulo.'
            )
          );
        }
      /*}
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar un módulo.'
          )
        );
      }*/
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
      $this->view = 'secretary';
      return $this->courseManagement->getModules();
    }

    function editCourse() {
      $this->view = 'editCourse';
    }

    function duplicateModule() {
      if (isset($_GET['id'])) {
        if (!empty($_GET['id'])) {
          echo $this->courseManagement->duplicateModule();
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

    function editModule() {
      if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['content'])){
        if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['content'])) {
          if ($this->courseManagement->createModule()) {
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

    function module() {
      $this->view = 'module';
    }
  }
?>