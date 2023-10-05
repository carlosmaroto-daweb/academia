<?php
  // Incluimos el archivo courseManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/courseManagement.php';

  class courseController {

    // Atributos
    private $view;
    private $courses;

    function __construct() {
      
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
    }

    function createModule() {
      $this->view = 'createModule';
    }

    function module() {
      $this->view = 'module';
    }
  }
?>