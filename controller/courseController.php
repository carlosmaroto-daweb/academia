<?php

  class courseController {

    private $view;

    function __construct() {

    }
    
    function getView() {
      return $this->view;
    }

    function index() {
      $this->view = 'courses';
    }

    function subject() {
      $this->view = 'subject';
    }
  }
?>