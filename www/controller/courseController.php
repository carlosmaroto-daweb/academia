<?php
  // Comprobamos que no puedan entrar por ruta absoluta
  if (session_status() != PHP_SESSION_ACTIVE) {
      die('Hey Bro! You cannot access this file... twat!');
  }

  // Incluimos el archivo userManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los usuarios de la bd.
  require_once 'model/userManagement.php';

  // Incluimos el archivo lessonManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre las lecciones.
  require_once 'model/lessonManagement.php';

  // Incluimos el archivo moduleManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los módulos.
  require_once 'model/moduleManagement.php';

  // Incluimos el archivo subjectManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre las asignaturas.
  require_once 'model/subjectManagement.php';

  // Incluimos el archivo courseManagement.php para instanciar la clase como objeto,
  // esta clase va a gestionar las operaciones sobre los cursos.
  require_once 'model/courseManagement.php';

  // Incluimos el archivo relatedTableManager.php para instanciar la clase como objeto,
  // esta clase va a consultar los registros de las tablas relacionadas.
  require_once 'model/relatedTableManager.php';

  // Incluimos el archivo userController.php para instanciar la clase como objeto,
  // esta clase va a redirigir a los usuarios no logeados.
  require_once 'controller/userController.php';

  class courseController {

    // Atributos
    private $view;
    private $courseManagement;
    private $userManagement;
    private $subjectManagement;
    private $moduleManagement;
    private $lessonManagement;
    private $relatedTableManager;

    function __construct() {
      $this->lessonManagement    = new LessonManagement();
      $this->moduleManagement    = new ModuleManagement();
      $this->subjectManagement   = new SubjectManagement();
      $this->courseManagement    = new CourseManagement();
      $this->userManagement      = new UserManagement();
      $this->relatedTableManager = new RelatedTableManager();
    }

    function deleteCourse() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->courseManagement->deleteCourse();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido eliminar el curso.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar un curso.'
          )
        );
      }
    }

    function deleteCourseUser() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id_course']) && !empty($_GET['id_course'])) {
          echo $this->relatedTableManager->deleteCourseUser();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se han podido eliminar las matrículas del curso.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para eliminar las matrículas del curso.'
          )
        );
      }
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

    function duplicateCourse() {
      if (isSecretary() || isAdmin()) {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          echo $this->courseManagement->duplicateCourse();
        }
        else {
          echo json_encode(
            array(
              'success' => 0, 
              'msg'     => 'No se ha podido duplicar el curso.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para duplicar un curso.'
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
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          $this->view = 'editCourse';
          $result = [
            'course'  => $this->courseManagement->getCourseById($_GET['id']),
            'subjects' => $this->subjectManagement->getSubjects(),
          ];
          return $result;
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['id_subject']) && isset($_POST['studies']) && isset($_POST['location']) && isset($_POST['type']) && isset($_POST['start_date']) && isset($_POST['end_date'])){
            if (!empty($_POST['name']) && !empty($_POST['id_subject']) && !empty($_POST['studies']) && !empty($_POST['location']) && !empty($_POST['type']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
              echo $this->courseManagement->editCourse();
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
                'msg'     => 'No se ha podido editar el curso.'
              )
            );
          }
        }
        else if (isset($_POST['name']) && isset($_POST['id_subject']) && isset($_POST['studies']) && isset($_POST['location']) && isset($_POST['type']) && isset($_POST['start_date']) && isset($_POST['end_date'])){
          if (!empty($_POST['name']) && !empty($_POST['id_subject']) && !empty($_POST['studies']) && !empty($_POST['location']) && !empty($_POST['type']) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
            echo $this->courseManagement->createCourse();
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
          $this->view = 'editCourse';
          $result = [
            'course'   => null,
            'subjects' => $this->subjectManagement->getSubjects(),
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

    function editCourseUser() {
      if (isSecretary() || isAdmin()) {
        if (isset($_POST['id_course']) && isset($_POST['id_users'])) {
          if (!empty($_POST['id_course']) && !empty($_POST['id_users'])) {
            echo $this->relatedTableManager->editCourseUser();
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
              'msg'     => 'No se han podido crear las matrículas del curso.'
            )
          );
        }
      }
      else {
        echo json_encode(
          array(
            'success' => 0, 
            'msg'     => 'No tienes permisos para crear las matrículas del curso.'
          )
        );
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
            'subjects' => $this->subjectManagement->getSubjects(),
            'lessons' => $this->lessonManagement->getLessons(),
            'subject_module' => $this->relatedTableManager->getSubjectModule(),
            'module_lesson' => $this->relatedTableManager->getModuleLesson(),
          ];
          return $result;
        }
        else if (isset($_POST['id']) && !empty($_POST['id'])) {
          if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['preview_image']) && isset($_POST['content']) && isset($_POST['content_image']) && isset($_POST['assigned_subjects']) && isset($_POST['assigned_lessons'])){
            if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['preview_image']) && !empty($_POST['content']) && !empty($_POST['content_image'])) {
              $errorSubject = false;
              $errorLesson = false;
              if (!empty($_POST['assigned_subjects']) && $_POST['assigned_subjects'] != "No hay asignaturas.") {
                $id_subjects = explode(';;', $_POST['assigned_subjects']);
                if (count($id_subjects) == count(array_unique($id_subjects))) {
                  for ($i=0; $i<count($id_subjects) && !$errorSubject; $i++) {
                    if (!$this->subjectManagement->getSubjectById($id_subjects[$i])) {
                      $errorSubject = true;
                      echo json_encode(
                        array(
                          'success' => 0, 
                          'msg'     => 'No se ha podido editar el módulo.'
                        )
                      );
                    }
                  }
                }
                else {
                  $errorSubject = true;
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'Las asignaturas asignadas no pueden repetirse.'
                    )
                  );
                }
              }
              if (!empty($_POST['assigned_lessons']) && $_POST['assigned_lessons'] != "No hay lecciones.") {
                $id_lessons = explode(';;', $_POST['assigned_lessons']);
                if (count($id_lessons) == count(array_unique($id_lessons))) {
                  for ($i=0; $i<count($id_lessons) && !$errorLesson; $i++) {
                    if (!$this->lessonManagement->getLessonById($id_lessons[$i])) {
                      $errorLesson = true;
                      echo json_encode(
                        array(
                          'success' => 0, 
                          'msg'     => 'No se ha podido editar el módulo.'
                        )
                      );
                    }
                  }
                }
                else {
                  $errorLesson = true;
                  echo json_encode(
                    array(
                      'success' => 0, 
                      'msg'     => 'Las lecciones asignadas no pueden repetirse.'
                    )
                  );
                }
              }
              if (!$errorSubject && !$errorLesson) {
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
        else if (isset($_POST['name']) && isset($_POST['header_image']) && isset($_POST['preview']) && isset($_POST['preview_image']) && isset($_POST['content']) && isset($_POST['content_image']) && isset($_POST['assigned_subjects']) && isset($_POST['assigned_lessons'])){
          if (!empty($_POST['name']) && !empty($_POST['header_image']) && !empty($_POST['preview']) && !empty($_POST['preview_image']) && !empty($_POST['content']) && !empty($_POST['content_image'])) {
            $errorSubject = false;
            $errorLesson = false;
            if (!empty($_POST['assigned_subjects']) && $_POST['assigned_subjects'] != "No hay asignaturas.") {
              $id_subjects = explode(';;', $_POST['assigned_subjects']);
              if (count($id_subjects) == count(array_unique($id_subjects))) {
                for ($i=0; $i<count($id_subjects) && !$errorSubject; $i++) {
                  if (!$this->subjectManagement->getSubjectById($id_subjects[$i])) {
                    $errorSubject = true;
                    echo json_encode(
                      array(
                        'success' => 0, 
                        'msg'     => 'No se ha podido crear el módulo.'
                      )
                    );
                  }
                }
              }
              else {
                $errorSubject = true;
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'Las asignaturas asignadas no pueden repetirse.'
                  )
                );
              }
            }
            if (!empty($_POST['assigned_lessons']) && $_POST['assigned_lessons'] != "No hay lecciones.") {
              $id_lessons = explode(';;', $_POST['assigned_lessons']);
              if (count($id_lessons) == count(array_unique($id_lessons))) {
                for ($i=0; $i<count($id_lessons) && !$errorLesson; $i++) {
                  if (!$this->lessonManagement->getLessonById($id_lessons[$i])) {
                    $errorLesson = true;
                    echo json_encode(
                      array(
                        'success' => 0, 
                        'msg'     => 'No se ha podido crear el módulo.'
                      )
                    );
                  }
                }
              }
              else {
                $errorLesson = true;
                echo json_encode(
                  array(
                    'success' => 0, 
                    'msg'     => 'Las lecciones asignadas no pueden repetirse.'
                  )
                );
              }
            }
            if (!$errorSubject && !$errorLesson) {
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
            'subjects' => $this->subjectManagement->getSubjects(),
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
          'tuition'        => $this->relatedTableManager->getTuition(),
          'users'          => $this->userManagement->getUsers(),
          'courses'        => $this->courseManagement->getCourses(),
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