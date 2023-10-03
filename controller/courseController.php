<?php
  // Incluimos el archivo courseManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/courseManagement.php';

  class courseController {

    // Atributos
    private $view;
    private $courseManagement;

    function __construct() {
      $this->courseManagement = new CourseManagement();
    }
    
    function getView() {
      return $this->view;
    }

    function index() {
      $this->view = 'courses';
    }

    function secretary() {
      $this->view = 'secretary';
    }

    function subject() {
      $this->view = 'subject';
    }
  }
?>