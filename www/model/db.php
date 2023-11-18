<?php
  // Comprobamos que no puedan entrar por ruta absoluta
  if (session_status() != PHP_SESSION_ACTIVE) {
    die('Hey Bro! You cannot access this file... twat!');
  }

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
     * Previamente se ha comprobado que estén los parámetros name,
     * header_image, preview, preview_image, content y content_image en el 
     * controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createCourse() {
      $data = [
        'name'       => $_POST['name'],
        'id_subject' => $_POST['id_subject'],
        'studies'    => $_POST['studies'],
        'location'   => $_POST['location'],
        'type'       => $_POST['type'],
        'start_date' => $_POST['start_date'],
        'end_date'   => $_POST['end_date']
      ];
      $sql = "insert into course (name, id_subject, studies, location, type, start_date, end_date) values (:name, :id_subject, :studies, :location, :type, :start_date, :end_date)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
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
     * header_image, preview, preview_image, content y content_image en el 
     * controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createModule() {
      $data = [
        'name'          => $_POST['name'],
        'header_image'  => $_POST['header_image'],
        'preview'       => $_POST['preview'],
        'preview_image' => $_POST['preview_image'],
        'content'       => $_POST['content'],
        'content_image' => $_POST['content_image']
      ];
      $sql = "insert into module (name, header_image, preview, preview_image, content, content_image) values (:name, :header_image, :preview, :preview_image, :content, :content_image)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
     * Método que asigna todos los valores pasados por el POST a un array
     * asociativo para ejecutar una sentencia sql con la base de datos. En
     * este caso la sentencia inserta un registro nuevo a la base de datos.
     * 
     * Previamente se ha comprobado que estén los parámetros id_module y
     * id_lesson en el controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createModuleLesson() {
      $data = [
        'id_module' => $_POST['id_module'],
        'id_lesson' => $_POST['id_lesson']
      ];
      $sql = "insert into module_lesson (id_module, id_lesson) values (:id_module, :id_lesson)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
     * Método que asigna todos los valores pasados por el POST a un array
     * asociativo para ejecutar una sentencia sql con la base de datos. En
     * este caso la sentencia inserta un registro nuevo a la base de datos.
     * 
     * Previamente se ha comprobado que estén los parámetros name,
     * header_image, preview, preview_image, content y content_image en el 
     * controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createSubject() {
      $data = [
        'name'          => $_POST['name'],
        'header_image'  => $_POST['header_image'],
        'preview'       => $_POST['preview'],
        'preview_image' => $_POST['preview_image'],
        'content'       => $_POST['content'],
        'content_image' => $_POST['content_image']
      ];
      $sql = "insert into subject (name, header_image, preview, preview_image, content, content_image) values (:name, :header_image, :preview, :preview_image, :content, :content_image)";
      $stmt = $this->conection->prepare($sql);
      return $stmt->execute($data);
    }

    /*
     * Método que asigna todos los valores pasados por el POST a un array
     * asociativo para ejecutar una sentencia sql con la base de datos. En
     * este caso la sentencia inserta un registro nuevo a la base de datos.
     * 
     * Previamente se ha comprobado que estén los parámetros id_subject y
     * id_module en el controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function createSubjectModule() {
      $data = [
        'id_subject' => $_POST['id_subject'],
        'id_module'  => $_POST['id_module']
      ];
      $sql = "insert into subject_module (id_subject, id_module) values (:id_subject, :id_module)";
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
    function deleteCourse() {
      $data = [
        'id' => $_GET['id']
      ];
      $sql = "delete from course where id=:id";
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
    function deleteModuleLesson() {
      if (isset($_GET['id_module'])) {
        $data = [
          'id_module' => $_GET['id_module']
        ];
        $sql = "delete from module_lesson where id_module=:id_module";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute($data);
      }
      else if (isset($_GET['id_lesson'])) {
        $data = [
          'id_lesson' => $_GET['id_lesson']
        ];
        $sql = "delete from module_lesson where id_lesson=:id_lesson";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute($data);
      }
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
    function deleteSubject() {
      $data = [
        'id' => $_GET['id']
      ];
      $sql = "delete from subject where id=:id";
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
    function deleteSubjectModule() {
      if (isset($_GET['id_subject'])) {
        $data = [
          'id_subject' => $_GET['id_subject']
        ];
        $sql = "delete from subject_module where id_subject=:id_subject";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute($data);
      }
      else if (isset($_GET['id_module'])) {
        $data = [
          'id_module' => $_GET['id_module']
        ];
        $sql = "delete from subject_module where id_module=:id_module";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute($data);
      }
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
    function editCourse() {
      $data = [
        'name'       => $_POST['name'],
        'id_subject' => $_POST['id_subject'],
        'studies'    => $_POST['studies'],
        'location'   => $_POST['location'],
        'type'       => $_POST['type'],
        'start_date' => $_POST['start_date'],
        'end_date'   => $_POST['end_date'],
        'id'         => $_POST['id']
      ];
      $sql = "update course set name=:name, id_subject=:id_subject, studies=:studies, location=:location, type=:type, start_date=:start_date, end_date=:end_date where id=:id";
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
     * header_image, preview, preview_image, content y content_image en el 
     * controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function editModule() {
      $data = [
        'name'          => $_POST['name'],
        'header_image'  => $_POST['header_image'],
        'preview'       => $_POST['preview'],
        'preview_image' => $_POST['preview_image'],
        'content'       => $_POST['content'],
        'content_image' => $_POST['content_image'],
        'id'            => $_POST['id']
      ];
      $sql = "update module set name=:name, header_image=:header_image, preview=:preview, preview_image=:preview_image, content=:content, content_image=:content_image where id=:id";
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
     * header_image, preview, preview_image, content y content_image en el 
     * controlador y que sean válidos.
     * 
     * @return Devuelve true si ha tenido éxito la sentencia sql.
    */
    function editSubject() {
      $data = [
        'name'          => $_POST['name'],
        'header_image'  => $_POST['header_image'],
        'preview'       => $_POST['preview'],
        'preview_image' => $_POST['preview_image'],
        'content'       => $_POST['content'],
        'content_image' => $_POST['content_image'],
        'id'            => $_POST['id']
      ];
      $sql = "update subject set name=:name, header_image=:header_image, preview=:preview, preview_image=:preview_image, content=:content, content_image=:content_image where id=:id";
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
    function getCourses() {
      $sql = "select * from course";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*
     * Método que ejecuta una sentencia sql para obtener todos los registros
     * de la relación entre cursos y usuarios de la base de datos y los 
     * devuelve.
     * 
     * @return Devuelve una query con todos los registros de la tabla.
    */
    function getCourseUser() {
      $sql = "select * from course_user";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
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
     * Método que ejecuta una sentencia sql para obtener todos los registros
     * de la relación entre módulos y lecciones de la base de datos y los 
     * devuelve.
     * 
     * @return Devuelve una query con todos los registros de la tabla.
    */
    function getModuleLesson() {
      $sql = "select * from module_lesson";
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
     * Método que ejecuta una sentencia sql para obtener todos los registros
     * de la relación entre las asignaturas y módulos de la base de datos y los
     * devuelve.
     * 
     * @return Devuelve una query con todos los registros de la tabla.
    */
    function getSubjectModule() {
      $sql = "select * from subject_module";
      $stmt = $this->conection->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    /*
     * Método que ejecuta una sentencia sql para obtener todas las asignaturas
     * de la base de datos y las devuelve.
     * 
     * @return Devuelve una query con todos las asignaturas de la base de datos.
    */
    function getSubjects() {
      $sql = "select * from subject";
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
        'name'         => $_POST['name'],
        'last_name'    => $_POST['last_name'],
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