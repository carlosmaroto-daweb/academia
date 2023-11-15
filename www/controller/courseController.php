<?php
  // Comprobamos que no puedan entrar por ruta absoluta
  if (session_status() != PHP_SESSION_ACTIVE) {
      die('Hey Bro! You cannot access this file... twat!');
  }

  // Incluimos el archivo lessonManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre las lecciones.
  require_once 'model/lessonManagement.php';

  // Incluimos el archivo moduleManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los módulos.
  require_once 'model/moduleManagement.php';

  // Incluimos el archivo subjectManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre las asignaturas.
  require_once 'model/subjectManagement.php';

  // Incluimos el archivo relatedTableManager.php para instanciar la clase como objeto,
  // esta clase va a consultar los registros de las tablas relacionadas.
  require_once 'model/relatedTableManager.php';

  // Incluimos el archivo userController.php para instanciar la clase como objeto,
  // esta clase va a redirigir a los usuarios no logeados.
  require_once 'controller/userController.php';

  class courseController {

    // Atributos
    private $view;
    private $subjectManagement;
    private $moduleManagement;
    private $lessonManagement;

    function __construct() {
      $this->lessonManagement    = new LessonManagement();
      $this->moduleManagement    = new ModuleManagement();
      $this->subjectManagement   = new SubjectManagement();
      $this->relatedTableManager = new RelatedTableManager();
    }

    function deleteLesson() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->lessonManagement->deleteLesson();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar la lección.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar una lección.'
          )
        );
      }
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

    function deleteSubject() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->subjectManagement->deleteSubject();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar la asignatura.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar una asignatura.'
          )
        );
      }
    }

    function duplicateLesson() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->lessonManagement->duplicateLesson();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido duplicar la lección.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para duplicar una lección.'
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

    function duplicateSubject() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->subjectManagement->duplicateSubject();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido duplicar la asignatura.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para duplicar una asignatura.'
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
          $result = [
            'lesson'  => $this->lessonManagement->getLessonById($_GET['id']),
            'modules' => $this->moduleManagement->getModules(),
            'module_lesson' => $this->relatedTableManager->getModuleLesson(),
          ];
          return $result;
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['count_archives'])){
            if (!empty($_POST['name']) && $_POST['count_archives']>0) {
              $valid = true;
              $title = '';
              for ($i=0; $i<$_POST['count_archives'] && $valid; $i++) { 
                  if (isset($_POST['title-'.$i]) && !empty($_POST['title-'.$i])) {
                      $title = str_replace(' ', '_', $_POST['title-'.$i]);
                      if (isset($_FILES[$title]) && !empty($_FILES[$title]) && is_uploaded_file($_FILES[$title]['tmp_name'])) {
                        $array = explode('.', $_FILES[$title]['name']);
                        $ext = end($array);
                        if ($ext != 'mp4' && $ext != 'avi' && $ext != 'pdf') {
                          $valid = false;
                        }
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
                if (!empty($_POST['assigned_modules']) && $_POST['assigned_modules'] != "No hay módulos.") {
                  $id_modules = explode(';;', $_POST['assigned_modules']);
                  if (count($id_modules) == count(array_unique($id_modules))) {
                    $errorModule = false;
                    for ($i=0; $i<count($id_modules) && !$errorModule; $i++) {
                      if (!$this->moduleManagement->getModuleById($id_modules[$i])) {
                          $errorModule = true;
                      }
                    }
                    if ($errorModule) {
                      echo json_encode(
                        array(
                          'success' => 0, 
                          'msg'     => 'No se ha podido editar la lección.'
                        )
                      );
                    }
                    else {
                      echo $this->lessonManagement->editLesson();
                    }
                  }
                  else {
                    echo json_encode(
                      array(
                        'success' => 0, 
                        'msg'     => 'Los módulos asignados no pueden repetirse.'
                      )
                    );
                  }
                }
                else {
                  echo $this->lessonManagement->editLesson();
                }
              }
              else {
                echo json_encode(
                    array(
                    'success' => 0, 
                    'msg'     => 'No se ha podido editar la lección.'
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
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No se ha podido editar la lección.'
              )
            );
          }
        }
        else if (isset($_POST['name']) && isset($_POST['count_archives'])){
          if (!empty($_POST['name']) && $_POST['count_archives']>0) {
            $valid = true;
            $title = '';
            for ($i=0; $i<$_POST['count_archives'] && $valid; $i++) { 
                if (isset($_POST['title-'.$i]) && !empty($_POST['title-'.$i])) {
                    $title = str_replace(' ', '_', $_POST['title-'.$i]);
                    if (isset($_FILES[$title]) && !empty($_FILES[$title]) && is_uploaded_file($_FILES[$title]['tmp_name'])) {
                      $array = explode('.', $_FILES[$title]['name']);
                      $ext = end($array);
                      if ($ext != 'mp4' && $ext != 'avi' && $ext != 'pdf') {
                        $valid = false;
                      }
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
              if (!empty($_POST['assigned_modules']) && $_POST['assigned_modules'] != "No hay módulos.") {
                $id_modules = explode(';;', $_POST['assigned_modules']);
                if (count($id_modules) == count(array_unique($id_modules))) {
                  $errorModule = false;
                  for ($i=0; $i<count($id_modules) && !$errorModule; $i++) {
                    if (!$this->moduleManagement->getModuleById($id_modules[$i])) {
                        $errorModule = true;
                    }
                  }
                  if ($errorModule) {
                    echo json_encode(
                      array(
                        'success' => 0, 
                        'msg'     => 'No se ha podido crear la lección.'
                      )
                    );
                  }
                  else {
                    echo $this->lessonManagement->createLesson();
                  }
                }
                else {
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'Los módulos asignados no pueden repetirse.'
                    )
                  );
                }
              }
              else {
                echo $this->lessonManagement->createLesson();
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
          $result = [
            'lesson'  => null,
            'modules' => $this->moduleManagement->getModules(),
          ];
          return $result;
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
          $result = [
            'module'  => $this->moduleManagement->getModuleById($_GET['id']),
            'lessons' => $this->lessonManagement->getLessons(),
            'module_lesson' => $this->relatedTableManager->getModuleLesson(),
          ];
          return $result;
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['preview_image']) && isset($_POST['content']) && isset($_POST['content_image']) && isset($_POST['assigned_lessons'])){
            if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['preview_image']) && !empty($_POST['content']) && !empty($_POST['content_image'])) {
              if (!empty($_POST['assigned_lessons']) && $_POST['assigned_lessons'] != "No hay lecciones.") {
                $id_lessons = explode(';;', $_POST['assigned_lessons']);
                if (count($id_lessons) == count(array_unique($id_lessons))) {
                  $errorLesson = false;
                  for ($i=0; $i<count($id_lessons) && !$errorLesson; $i++) {
                    if (!$this->lessonManagement->getLessonById($id_lessons[$i])) {
                        $errorLesson = true;
                    }
                  }
                  if ($errorLesson) {
                    echo json_encode(
                      array(
                        'success' => 0, 
                        'msg'     => 'No se ha podido editar el módulo.'
                      )
                    );
                  }
                  else {
                    echo $this->moduleManagement->editModule();
                  }
                }
                else {
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'Las lecciones asignadas no pueden repetirse.'
                    )
                  );
                }
              }
              else {
                echo $this->moduleManagement->editModule();
              }
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'Se deben de rellenar los campos señalados.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No se ha podido editar el módulo.'
              )
            );
          }
        }
        else if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['preview_image']) && isset($_POST['content']) && isset($_POST['content_image']) && isset($_POST['assigned_lessons'])){
          if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['preview_image']) && !empty($_POST['content']) && !empty($_POST['content_image'])) {
            if (!empty($_POST['assigned_lessons']) && $_POST['assigned_lessons'] != "No hay lecciones.") {
              $id_lessons = explode(';;', $_POST['assigned_lessons']);
              if (count($id_lessons) == count(array_unique($id_lessons))) {
                $errorLesson = false;
                for ($i=0; $i<count($id_lessons) && !$errorLesson; $i++) {
                  if (!$this->lessonManagement->getLessonById($id_lessons[$i])) {
                      $errorLesson = true;
                  }
                }
                if ($errorLesson) {
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'No se ha podido crear el módulo.'
                    )
                  );
                }
                else {
                  echo $this->moduleManagement->createModule();
                }
              }
              else {
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'Las lecciones asignadas no pueden repetirse.'
                  )
                );
              }
            }
            else {
              echo $this->moduleManagement->createModule();
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'Se deben de rellenar los campos señalados.'
              )
            );
          }
        }
        else {
          $this->view = 'editModule';
          $result = [
            'module'  => null,
            'lessons' => $this->lessonManagement->getLessons(),
          ];
          return $result;
        }
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }

    function editSubject() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          $this->view = 'editSubject';
          $result = [
            'subject'  => $this->subjectManagement->getSubjectById($_GET['id']),
            'modules' => $this->moduleManagement->getModules(),
            'subject_module' => $this->relatedTableManager->getSubjectModule(),
          ];
          return $result;
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['preview_image']) && isset($_POST['content']) && isset($_POST['content_image']) && isset($_POST['assigned_modules'])){
            if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['preview_image']) && !empty($_POST['content']) && !empty($_POST['content_image'])) {
              if (!empty($_POST['assigned_modules']) && $_POST['assigned_modules'] != "No hay módulos.") {
                $id_modules = explode(';;', $_POST['assigned_modules']);
                if (count($id_modules) == count(array_unique($id_modules))) {
                  $errorModule = false;
                  for ($i=0; $i<count($id_modules) && !$errorModule; $i++) {
                    if (!$this->moduleManagement->getModuleById($id_modules[$i])) {
                        $errorModule = true;
                    }
                  }
                  if ($errorModule) {
                    echo json_encode(
                      array(
                        'success' => 0, 
                        'msg'     => 'No se ha podido editar la asignatura.'
                      )
                    );
                  }
                  else {
                    echo $this->subjectManagement->editSubject();
                  }
                }
                else {
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'Los módulos asignados no pueden repetirse.'
                    )
                  );
                }
              }
              else {
                echo $this->subjectManagement->editSubject();
              }
            }
            else {
              echo json_encode(
                array(
                  'success' => 0, 
                  'msg'     => 'Se deben de rellenar los campos señalados.'
                )
              );
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'No se ha podido editar la asignatura.'
              )
            );
          }
        }
        else if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['preview_image']) && isset($_POST['content']) && isset($_POST['content_image']) && isset($_POST['assigned_modules'])){
          if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['preview_image']) && !empty($_POST['content']) && !empty($_POST['content_image'])) {
            if (!empty($_POST['assigned_modules']) && $_POST['assigned_modules'] != "No hay módulos.") {
              $id_modules = explode(';;', $_POST['assigned_modules']);
              if (count($id_modules) == count(array_unique($id_modules))) {
                $errorModule = false;
                for ($i=0; $i<count($id_modules) && !$errorModule; $i++) {
                  if (!$this->moduleManagement->getModuleById($id_modules[$i])) {
                      $errorModule = true;
                  }
                }
                if ($errorModule) {
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'No se ha podido crear la asignatura.'
                    )
                  );
                }
                else {
                  echo $this->subjectManagement->createSubject();
                }
              }
              else {
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'Los módulos asignados no pueden repetirse.'
                  )
                );
              }
            }
            else {
              echo $this->subjectManagement->createSubject();
            }
          }
          else {
            echo json_encode(
              array(
                'success' => 0, 
                'msg'     => 'Se deben de rellenar los campos señalados.'
              )
            );
          }
        }
        else {
          $this->view = 'editSubject';
          $result = [
            'subject'  => null,
            'modules' => $this->moduleManagement->getModules(),
          ];
          return $result;
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
      if (hasLoggedIn()) {
        $this->view = 'home';
      }
      else {
        $userController = new userController();
        $userController->login();
        $this->view = $userController->getView();
      }
    }

    function courses() {
      $this->view = 'courses';
    }

    function module() {
      $this->view = 'module';
    }

    function subject() {
      $this->view = 'subject';
    }


    function secretary() {
      if (isSecretary() || isAdmin()) {
        $result = [
          'subjects'       => $this->subjectManagement->getSubjects(),
          'modules'        => $this->moduleManagement->getModules(),
          'lessons'        => $this->lessonManagement->getLessons(),
          'subject_module' => $this->relatedTableManager->getSubjectModule(),
          'module_lesson'  => $this->relatedTableManager->getModuleLesson(),
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