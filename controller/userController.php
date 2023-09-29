<?php
  require_once 'model/userManagement.php';

  class userController {

    private $view;
    private $userManagement;

    function __construct() {
      $this->userManagement = new UserManagement();
    }

    function admin() {
      if ($this->isAdmin()) {
        $this->view = 'admin';
        return $this->userManagement->getUsers();
      }
      else {
        $this->login();
      }
    }

    function courses() {
      $this->view = 'courses';
    }

    function create() {
      if ($this->isAdmin() && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type'])) {
        $jsonData = json_decode($this->userManagement->createUser());
        if ($jsonData->success) {
          echo json_encode($jsonData);
        }
        else {
          echo json_encode(array('success' => 0));
        }
      }
      else {
        echo json_encode(array('success' => 0));
      }
    }

    function delete() {
      if ($this->isAdmin() && isset($_GET['id']) && !empty($_GET['id'])) {
        if ($this->userManagement->deleteUser()) {
          echo json_encode(array('success' => 1));
        }
        else {
          echo json_encode(array('success' => 0));
        }
      }
      else {
        echo json_encode(array('success' => 0));
      }
    }

    function edit() {
      if ($this->isAdmin() && isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type'])) {
        if ($this->userManagement->editUser()) {
          echo json_encode(array('success' => 1));
        }
        else {
          echo json_encode(array('success' => 0));
        }
      }
      else {
        echo json_encode(array('success' => 0));
      }
    }

    function getView() {
      return $this->view;
    }

    function home() {
      if ($this->isAdmin()) {
        $this->view = 'admin';
        return $this->userManagement->getUsers();
      }
      else if (isset($_SESSION["type"])) {
        $this->view = 'home';
      }
      else {
        $this->login();
      }
    }

    function index() {
      $this->view = 'index';
    }

    function isAdmin() {
      return $_SESSION["type"] == 'admin';
    }

    function login() {
      if (isset($_POST['email']) && isset($_POST['password'])){
        if ($this->userManagement->isUser()) {
          echo json_encode(array('success' => 1));
        }
        else {
          echo json_encode(array('success' => 0));
        }
      }
      else {
        $this->view = 'login';
      }
    }

    function logout() {
      if (isset($_SESSION["type"])) {
        $_SESSION["type"] = null;
        session_destroy();
      }
      $this->view = 'index';
    }

    function register() {
      if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['type'])) {
        if ($this->userManagement->registerUser()) {
          echo json_encode(array('success' => 1));
        }
        else {
          echo json_encode(array('success' => 0));
        }
      }
      else {
        echo json_encode(array('success' => 0));
      }
    }
  }
?>