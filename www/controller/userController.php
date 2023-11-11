<?php
  // Comprobamos que no puedan entrar por ruta absoluta
  if (session_status() != PHP_SESSION_ACTIVE) {
      die('Hey Bro! You cannot access this file... twat!');
  }

  // Incluimos el archivo userManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los usuarios de la bd.
  require_once 'model/userManagement.php';

  /* 
   * Esta clase gestiona las funcionalidades que tienen relación con los 
   * usuarios, tales como crear, editar y eliminar usuarios (si el usuario que
   * realiza la acción es administrador), registrarse, iniciar o cerrar sesión
   * en la página cualquier usuario, definir rutas como home, admin y login 
   * para cambiar la vista del usuario, y métodos para verificar datos.
   * 
   * @author: Carlos Maroto
   * @version: v1.0.0 Carlos Maroto
  */
  class userController {

    // Atributos
    private $view;
    private $userManagement;
    private $types = ['student', 'teacher', 'secretary', 'admin'];

    /*
     * Creamos una instancia de UserManagement al inicio para poder utilizarla
     * más adelante, a su vez el constructor de esta clase actualiza la lista
     * de usuarios, por lo que siempre estamos trabajando con los nuevos datos.
    */
    function __construct() {
      $this->userManagement = new UserManagement();
    }

    /*
     * En caso de que este método sea llamado por un administrador mostrará la
     * vista del archivo admin.php y devolverá la lista de todos los usuarios
     * de la BD hasta ese momento, en caso contrario llama al método login el
     * cual mostrará un formulario para iniciar sesión o registrarse.
     * 
     * @return Array de todos los usuarios de la BD. 
    */
    function admin() {
      $result = null;
      if (isAdmin()) {
        $this->view = 'admin';
        $result = $this->userManagement->getUsers();
      }
      else {
        $this->login();
      }
      return $result;
    }

    /*
     * En caso de que este método sea llamado por un administrador y se le pase
     * todas las variables: email, password, name, last_name, phone_number, dni
     * y type (siendo obligatorio que email, password y type sean válidos) a 
     * través de POST, creará el usuario con los datos pasados, en caso 
     * contrario mostrará el mensaje de error correspondiente.
     * 
     * @return JSON con parámetros success, en caso de error msg y en caso 
     *         de éxito user con todos los parámetros del usuario creado.
    */
    function create() {
      if (isAdmin()) {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type']) && $this->validType($_POST['type'])) {
          if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if ($this->validEmail($_POST['email'])) {
              if ($this->validPassword($_POST['password'])) {
                echo $this->userManagement->createUser();
              }
              else {
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'La contraseña debe tener entre 8 y 60 carácteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial.'
                  )
                );
              }
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'El formato del correo no es correcto.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No puedes dejar vacíos los campos: correo y contraseña.'
              )
            );
          }
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido crear el usuario.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para crear un usuario.'
          )
        );
      }
    }

    /*
     * En caso de que este método sea llamado por un administrador y se le pase
     * el id a través de GET (siendo obligatorio que el id no esté vacío), 
     * eliminará el usuario correspondiente al id, en caso contrario mostrará 
     * el mensaje de error correspondiente.
     * 
     * @return JSON con parámetros success, en caso de error msg.
    */
    function delete() {
      if (isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->userManagement->deleteUser();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar el usuario.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar un usuario.'
          )
        );
      }
    }

    /*
     * En caso de que este método sea llamado por un administrador y se le pase
     * todas las variables: id, email, password, name, last_name, phone_number,
     * dni y type (siendo obligatorio que el id no esté vacío, y que el email,
     * password y type sean válidos) a través de POST, editará el usuario
     * correspondiente al id con los datos pasados, en caso contrario mostrará
     * el mensaje de error correspondiente.
     * 
     * @return JSON con parámetros success, en caso de error msg y en caso 
     *         de éxito password con la contraseña encriptada.
    */
    function edit() {
      if (isAdmin()) {
        if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type']) && $this->validType($_POST['type'])) {
          if (!empty($_POST['email'])  && !empty($_POST['password'])) {
            if ($this->validEmail($_POST['email'])) {
              if ($this->validPassword($_POST['password'])) {
                echo $this->userManagement->editUser();
              }
              else {
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'La contraseña debe tener entre 8 y 60 carácteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial.'
                  )
                );
              }
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'El formato del correo no es correcto.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No puedes dejar vacíos los campos: correo y contraseña.'
              )
            );
          }
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido editar el usuario.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para editar un usuario.'
          )
        );
      }
    }

    /*
     * Método de consulta que devuelve la variable privada view que contiene
     * el nombre la vista que va a ser cargada a continuación.
     * 
     * @return Nombre de la vista a ser cargada.
    */
    function getView() {
      return $this->view;
    }

    /*
     * En caso de que este método sea llamado por un administrador redirige
     * al usuario a la página admin, en caso de que sea alguien de secretaría
     * lo redirige a la página de secretaría y en caso de que sea un alumno o
     * un profesor lo redirige a la página home, por último en caso de que no 
     * esté logeado llama al método login.
    */
    function home() {
      if (isAdmin()) {
        header("Location: index.php?controller=userController&action=admin");
        die();
      }
      elseif (isSecretary()) {
        header("Location: index.php?controller=courseController&action=secretary");
        die();
      }
      else if (isStudent() || isTeacher()) {
        header("Location: index.php?controller=userController&action=home");
        die();
      }
      else if (!hasLoggedIn()) {
        $this->login();
      }
    }

    /*
     * En caso de que este método sea llamado y se le pase las variables email
     * y password (siendo obligatorio que sean válidos) a través de POST, 
     * iniciará sesión el usuario según el tipo de usuario que sea, en caso 
     * de que no sean válidos los parámetros se mostrará el mensaje de error 
     * correspondiente, y en caso de que no se manden los parámetros por el
     * POST se mostrará la vista de login para iniciar sesión o registrarse.
     * 
     * @return JSON con parámetros success y en caso de error msg.
    */
    function login() {
      if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
          if ($this->validEmail($_POST['email'])) {
            if ($this->validPassword($_POST['password'])) {
              if ($this->userManagement->isUser()) {
                echo json_encode(array('success' => 1));
              }
              else {
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'El correo o la contraseña no coinciden.'
                  )
                );
              }
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'La contraseña debe tener entre 8 y 60 carácteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'El formato del correo no es correcto.'
              )
            );
          }
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'Se debe introducir el correo y la contraseña.'
            )
          );
        }
      }
      else {
        $this->view = 'login';
      }
    }

    /*
     * Método que comprueba si se ha iniciado sesión, en ese caso la destruye
     * y redirige al usuario a la página de inicio.
    */
    function logout() {
      if (hasLoggedIn()) {
        $_SESSION["type"] = null;
        session_destroy();
        header("Location: index.php");
        die();
      }
    }

    /*
     * En caso de que este método sea llamado y se le pase las variables email
     * y password (siendo obligatorio que sean válidos) a través de POST, 
     * se registrará e iniciará sesión el usuario siendo de tipo estudiante,
     * en caso contrario mostrará el mensaje de error correspondiente.
     * 
     * @return JSON con parámetros success y en caso de error msg.
    */
    function register() {
      if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
          if ($this->validEmail($_POST['email'])) {
            if ($this->validPassword($_POST['password'])) {
              echo $this->userManagement->registerUser();
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'La contraseña debe tener entre 8 y 60 carácteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter especial.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'El formato del correo no es correcto.'
              )
            );
          }
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'Se debe introducir el correo y la contraseña.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No se ha podido registrar el usuario.'
          )
        );
      }
    }

    /*
     * Método que comprueba si el String pasado como argumento cumple el
     * formato válido de email: <example>@<example>.<example>
     * 
     * @param  String a comprobar si es un email válido.
     * @return Delvuelve true si cumple el formato válido para email.
    */
    private function validEmail($email) {
      return preg_match('/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/', $email);
    }

    /*
     * Método que comprueba si el String pasado como argumento cumple el
     * formato válido de contraseña: Tener entre 8 y 60 carácteres, al menos
     * un dígito, al menos una minúscula, al menos una mayúscula y al menos 
     * un caracter especial.
     * 
     * @param  String a comprobar si es una contraseña válida.
     * @return Delvuelve true si cumple el formato válido para la contraseña.
    */
    private function validPassword($password) {
      return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])([A-Za-z\d$@$!%*?&.]|[^ ]){8,60}$/', $password);
    }

    /*
     * Método que comprueba si el tipo pasado es uno de los tipos permitidos.
     * 
     * @param  String a comprobar si es un tipo permitido.
     * @return Devuelve true si el tipo está dentro de los permitidos.
    */
    private function validType($type) {
      return in_array($type, $this->types);
    }
  }
?>