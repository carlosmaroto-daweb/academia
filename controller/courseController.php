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
      if (isset($_POST['name']) && isset($_POST['name_studies']) && isset($_POST['location_studies']) && isset($_POST['type_studies']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['content'])){
        if (!empty($_POST['name']) && !empty($_POST['name_studies']) && !empty($_POST['location_studies']) && !empty($_POST['type_studies']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['content'])) {
          /*if ($this->validEmail($_POST['email'])) {
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
          }*/
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'Se deben de rellenar todos los campos.'
            )
          );
        }
      }
      else {
        $this->view = 'createModule';
      }
    }

    function module() {
      $this->view = 'module';
    }
  }
?>