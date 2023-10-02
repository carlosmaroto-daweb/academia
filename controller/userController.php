<?php
  require_once 'model/userManagement.php';

  class userController {

    private $view;
    private $userManagement;

    function __construct() {
      $this->userManagement = new UserManagement();
    }

    function admin() {
      $result = null;
      if ($this->isAdmin()) {
        $this->view = 'admin';
        $result = $this->userManagement->getUsers();
      }
      else {
        $this->login();
      }
      return $result;
    }

    function courses() {
      $this->view = 'courses';
    }

    function create() {
      if ($this->isAdmin()) {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type']) && !empty($_POST['type'])) {
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

    function delete() {
      if ($this->isAdmin()) {
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

    function edit() {
      if ($this->isAdmin()) {
        if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['phone_number']) && isset($_POST['dni']) && isset($_POST['type']) && !empty($_POST['type'])) {
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

    function getView() {
      return $this->view;
    }

    function home() {
      $result = null;
      if ($this->isAdmin()) {
        $result = $this->admin();
      }
      else if (isset($_SESSION["type"])) {
        $this->view = 'home';
      }
      else {
        $this->login();
      }
      return $result;
    }

    function index() {
      $this->view = 'index';
    }

    function isAdmin() {
      return isset($_SESSION["type"]) && $_SESSION["type"] == 'admin';
    }

    function login() {
      if (isset($_POST['email']) && isset($_POST['password'])){
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

    function logout() {
      if (isset($_SESSION["type"])) {
        $_SESSION["type"] = null;
        session_destroy();
      }
      $this->view = 'index';
    }

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

    function validEmail($email) {
      return preg_match('/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/', $email);
    }

    function validPassword($password) {
      return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.])([A-Za-z\d$@$!%*?&.]|[^ ]){8,60}$/', $password);
    }
  }
?>