<?php
  // Incluimos el archivo courseManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/courseManagement.php';

  // Incluimos el archivo moduleManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los módulos.
  require_once 'model/moduleManagement.php';

  // Incluimos el archivo lessonManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre las lecciones.
  require_once 'model/lessonManagement.php';

  // Incluimos el archivo userController.php para instanciar la clase como objeto,
  // esta clase va a redirigir a los usuarios no logeados.
  require_once 'controller/userController.php';

  class courseController {

    // Atributos
    private $view;
    private $courseManagement;
    private $moduleManagement;
    private $lessonManagement;

    function __construct() {
      $this->courseManagement = new CourseManagement();
      $this->moduleManagement = new ModuleManagement();
      $this->lessonManagement = new LessonManagement();
    }

    function deleteModule() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->moduleManagement->deleteModule();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar el módulo.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar un módulo.'
          )
        );
      }
    }

    function duplicateModule() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->moduleManagement->duplicateModule();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido duplicar el módulo.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para duplicar un módulo.'
          )
        );
      }
    }

    function editCourse() {
      if (isSecretary() || isAdmin()) {
        $this->view = 'editCourse';
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }

    function editLesson() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          $this->view = 'editLesson';
          return $this->lessonManagement->getLessonById($_GET['id']);
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['files'])){
            if (!empty($_POST['name']) && !empty($_POST['files'])) {
              echo $this->lessonManagement->editLesson();
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
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No se ha podido crear la lección.'
              )
            );
          }
        }
        else if (isset($_POST['name']) && isset($_POST['count_archives'])){
          if (!empty($_POST['name']) && $_POST['count_archives']>0) {
            $valid = true;
            $title = '';
            $result = '';
            for ($i=0; $i<$_POST['count_archives'] && $valid; $i++) { 
              if (isset($_POST['title-'.$i]) && !empty($_POST['title-'.$i])) {
                $title = $_POST['title-'.$i];
                if (isset($_FILES[$title]) && !empty($_FILES[$title])) {
                  
                  $file = $_FILES[$title]["name"]; //Nombre de nuestro archivo
                  $url_temp = $_FILES[$title]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

                  //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
                  $url_insert = "view/assets/academia/files"; //Carpeta donde subiremos nuestros archivos

                  //Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
                  $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

                  //Si la carpeta no existe, la creamos
                  if (!file_exists($url_insert)) {
                    mkdir($url_insert, 0777, true);
                  };

                  //movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
                  if (move_uploaded_file($url_temp, $url_target)) {
                    echo "El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";
                  } else {
                    echo "Ha habido un error al cargar tu archivo.";
                  }


                  // Guardar el archivo $_FILES[$title] y obtener el path del archivo
                  $path = '';
                  $result += $title . ';;' . $path . ';;';
                }
                else {
                  $valid = false;
                }
              }
              else {
                $valid = false;
              }
            }
            if ($valid) {
              $_POST['files'] = $result;
              //echo $this->lessonManagement->createLesson();
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'Se han mandado los parámetros correctamente.'
                )
              );
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'No se ha podido crear la lección.'
                )
              );
            }
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
          $this->view = 'editLesson';
        }
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }

    function editModule() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          $this->view = 'editModule';
          return $this->moduleManagement->getModuleById($_GET['id']);
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['content'])){
            if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['content'])) {
              echo $this->moduleManagement->editModule();
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
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No se ha podido crear el módulo.'
              )
            );
          }
        }
        else if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['content'])){
          if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['content'])) {
            echo $this->moduleManagement->createModule();
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
          $this->view = 'editModule';
        }
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }
    
    function getView() {
      return $this->view;
    }

    function home() {
      if (isStudent() || isTeacher()) {
        $this->view = 'home';
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }

    function index() {
      $this->view = 'courses';
    }

    function module() {
      $this->view = 'module';
    }

    function secretary() {
      if (isSecretary() || isAdmin()) {
        $result = [
          "modules" => $this->moduleManagement->getModules(),
          "lessons" => $this->lessonManagement->getLessons(),
        ];
        $this->view = 'secretary';
        return $result;
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }
  }
?>