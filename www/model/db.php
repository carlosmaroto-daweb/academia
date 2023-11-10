<?php
  // Comprobamos que no puedan entrar por ruta absoluta
  if (session_status() != PHP_SESSION_ACTIVE) {
    die('Hey Bro! You cannot access this file... twat!');
  }

  // Incluimos el archivo config.php para utilizar las constantes definidas en él.
  require_once 'config/config.php';

  /* 
   * Esta clase ejecuta sentencias sql mediante una conexión a la base
   * de datos mediante los datos pasados por GET y POST.
   * 
   * @author: Carlos Maroto
   * @version: v1.0.0 Carlos Maroto
  */
  class Db {

    // Atributos
    private $host;
    private $db;
    private $user;
    private $pass;
    private $conection;

    /*
     * Inicializamos los atributos a los valores de las constantes del archivo 
     * config y establecemos la conexión con la base de datos.
    */
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

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia inserta un registro nuevo a la base de datos.
      * 
      * Previamente se ha comprobado que estén los parámetros name y files 
      * en el controlador y que sean válidos.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createLesson() {
      $data = [
        'name'  => $_POST['name'],
        'files' => $_POST['files']
      ];
      $sql = "insert into lesson (name, files) values (:name, :files)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia inserta un registro nuevo a la base de datos.
      * 
      * Previamente se ha comprobado que estén los parámetros name,
      * header_image, preview y content en el controlador y que sean válidos.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createModule() {
      $data = [
        'name'         => $_POST['name'],
        'header_image' => $_POST['header_image'],
        'preview'      => $_POST['preview'],
        'content'      => $_POST['content']
      ];
      $sql = "insert into module (name, header_image, preview, content) values (:name, :header_image, :preview, :content)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia inserta un registro nuevo a la base de datos.
      * 
      * Previamente se ha comprobado que estén los parámetros email, password,
      * name, last_name, phone_number, dni y type en el controlador y que sean
      * válidos.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
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

    /*
      * Método que asigna todos los valores pasados por el GET a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia elimina el registro que coincide con el id.
      * 
      * Previamente se ha comprobado que esté el parámetro id y que sea válido.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function deleteLesson() {
      $data = [
        'id' => $_GET['id']
      ];
      $sql = "delete from lesson where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el GET a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia elimina el registro que coincide con el id.
      * 
      * Previamente se ha comprobado que esté el parámetro id y que sea válido.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function deleteModule() {
      $data = [
        'id' => $_GET['id']
      ];
      $sql = "delete from module where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el GET a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia elimina el registro que coincide con el id.
      * 
      * Previamente se ha comprobado que esté el parámetro id y que sea válido.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function deleteUser() {
      $data = [
        'id' => $_GET['id']
      ];
      $sql = "delete from user where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia actualiza el registro que coincide con el id 
      * de la base de datos.
      * 
      * Previamente se ha comprobado que estén los parámetros id, name,
      * y files en el controlador y que sean válidos.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function editLesson() {
      $data = [
        'name'  => $_POST['name'],
        'files' => $_POST['files'],
        'id'    => $_POST['id']
      ];
      $sql = "update lesson set name=:name, files=:files where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia actualiza el registro que coincide con el id 
      * de la base de datos.
      * 
      * Previamente se ha comprobado que estén los parámetros id, name,
      * header_image, preview y content en el controlador y que sean válidos.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function editModule() {
      $data = [
        'name'         => $_POST['name'],
        'header_image' => $_POST['header_image'],
        'preview'      => $_POST['preview'],
        'content'      => $_POST['content'],
        'id'           => $_POST['id']
      ];
      $sql = "update module set name=:name, header_image=:header_image, preview=:preview, content=:content where id=:id";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia actualiza el registro que coincide con el id 
      * de la base de datos.
      * 
      * Previamente se ha comprobado que estén los parámetros id, email,
      * password, name, last_name, phone_number, dni y type en el controlador
      * y que sean válidos.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
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

    /*
      * Método que ejecuta una sentencia sql para obtener todas las lecciones
      * de la base de datos y las devuelve.
      * 
      * @return Devuelve una query con todas las lecciones de la base de datos.
    */
    function getLessons() {
      $sql = "select * from lesson";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*
      * Método que ejecuta una sentencia sql para obtener todos los módulos
      * de la base de datos y los devuelve.
      * 
      * @return Devuelve una query con todos los módulos de la base de datos.
    */
    function getModules() {
      $sql = "select * from module";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*
      * Método que ejecuta una sentencia sql para obtener todos los usuarios
      * de la base de datos y los devuelve.
      * 
      * @return Devuelve una query con todos los usuarios de la base de datos.
    */
    function getUsers() {
      $sql = "select * from user";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*
      * Método que asigna todos los valores pasados por el POST a un array
      * asociativo para ejecutar una sentencia sql con la base de datos. En
      * este caso la sentencia inserta un registro nuevo a la base de datos.
      * 
      * Previamente se ha comprobado que estén y sean válidos los parámetros
      * email y password en el controlador.
      * 
      * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
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