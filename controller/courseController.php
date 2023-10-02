<?php
  require_once 'model/courseManagement.php';

  class courseController {

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