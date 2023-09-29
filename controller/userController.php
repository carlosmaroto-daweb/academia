<?php
  require_once 'model/userManagement.php';

  class userController {

    private $view;
    private $userManagement;

    function __construct() {
      $this->userManagement = new UserManagement();
    }

    function admin() {
      $this->view = 'admin';
      return $this->userManagement->getUsers();
    }

    function create() {
      if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type'])) {
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
      if (isset($_GET['id']) && !empty($_GET['id'])) {
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
      if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type'])) {
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

    function login() {
      $this->view = 'login';
    }
  }
?>