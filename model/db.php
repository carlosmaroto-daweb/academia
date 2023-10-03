<?php
    // Incluimos el archivo config.php para utilizar las constantes definidas en él.
  require_once 'config/config.php';

  class Db {

    private $host;
    private $db;
    private $user;
    private $pass;
    private $conection;

    function __construct() {
      $this->host = constant('DB_HOST');
      $this->db   = constant('DB');
      $this->user = constant('DB_USER');
      $this->pass = constant('DB_PASS');
      
      try {
        $this->conection = new PDO('mysql:host='.$this->host.'; dbname='.$this->db, $this->user, $this->pass);
      } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
      }
    }

    function createUser() {
      $data = [
        'email'        => $_POST['email'],
        'password'     => $_POST['password'],
        'name'         => $_POST['name'],
        'last_name'    => $_POST['last_name'],
        'phone_number' => $_POST['phone_number'],
        'dni'          => $_POST['dni'],
        'type'         => $_POST['type']
      ];
      $sql = "insert into user (email, password, name, last_name, phone_number, dni, type) values (:email, :password, :name, :last_name, :phone_number, :dni, :type)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    function deleteUser() {
      $data = [
        'id' => $_GET['id']
      ];
      $sql = "delete from user where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    function editUser() {
      $data = [
        'email'        => $_POST['email'],
        'password'     => $_POST['password'],
        'name'         => $_POST['name'],
        'last_name'    => $_POST['last_name'],
        'phone_number' => $_POST['phone_number'],
        'dni'          => $_POST['dni'],
        'type'         => $_POST['type'],
        'id'           => $_POST['id']
      ];
      $sql = "update user set email=:email, password=:password, name=:name, last_name=:last_name, phone_number=:phone_number, dni=:dni, type=:type where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    function getUsers() {
      $sql = "select * from user";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    function registerUser() {
      $data = [
        'email'        => $_POST['email'],
        'password'     => $_POST['password'],
        'name'         => '',
        'last_name'    => '',
        'phone_number' => '',
        'dni'          => '',
        'type'         => 'student'
      ];
      $sql = "insert into user (email, password, name, last_name, phone_number, dni, type) values (:email, :password, :name, :last_name, :phone_number, :dni, :type)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }
  }
?>