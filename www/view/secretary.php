<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Secretaría</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- CSS
        ===================================== -->
        <?php require_once "view/include/style.php"?>
    </head>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">
        
            <!-- Nav
            ===================================== -->
            <?php require_once "view/include/nav.php"?>
            
            <!-- Home Section -->
            <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="view/assets/academia/img/headers/board.jpg" id="home">
                <div class="container relative pt-70">
                
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Secretaría</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    Gestiona todo lo relacionado con los cursos
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;Secretaría
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->

            <section class="page-section">
                <div class="container">
                        
                    <!-- Nav Tabs -->
                    <div class="align-center mb-40 mb-xxs-30">
                        <ul class="nav nav-tabs tpl-tabs animate" id="productItem" role="tablist">
                            
                            <li class="nav-item" role="presentation">
                                <a href="#tuition" aria-controls="tuition" class="nav-link active" data-bs-toggle="tab"  role="tab" aria-selected="true">Matrículas</a>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <a href="#course" aria-controls="course" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Cursos</a>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <a href="#subject" aria-controls="subject" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Asignaturas</a>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <a href="#module" aria-controls="module" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Módulos</a>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <a href="#lesson" aria-controls="lesson" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Lecciones</a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- End Nav Tabs -->
            
                    <?php
                        $tuition        = $dataToView["tuition"];
                        $users          = $dataToView["users"];
                        $courses        = $dataToView["courses"];
                        $subjects       = $dataToView["subjects"];
                        $modules        = $dataToView["modules"];
                        $lessons        = $dataToView["lessons"];
                        $subject_module = $dataToView["subject_module"];
                        $module_lesson  = $dataToView["module_lesson"];
                    ?>
                                
                    <!-- Tab panes -->
                    <div class="tab-content tpl-minimal-tabs-cont">
                        
                        <div class="tab-pane fade show active" id="tuition" role="tabpanel">

                            <!-- Table Tuition
                            ===================================== -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Curso</th>
                                                    <th>Profesores</th>
                                                    <th>Alumnos</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tuition-table">
                                                <?php
                                                    $count = 0;
                                                    for ($i=0; $i<count($tuition); $i++) {
                                                        echo "<tr id='row{$count}'>";
                                                            echo "<td>" . "(" . $tuition[$i][0]->getId() . ") " . $tuition[$i][0]->getName() . "</td>";
                                                            echo "<td class='related_table'>";
                                                            $asigned_users = $tuition[$i][1];
                                                            $id_users = '';
                                                            for ($j=0; $j<count($asigned_users); $j++) { 
                                                                if ($asigned_users[$j]->getType() == "teacher") {
                                                                    echo "<p>" . $asigned_users[$j]->getName() . ", " . $asigned_users[$j]->getLastName() . "</p>";
                                                                    if ($id_users != '') {
                                                                        $id_users .= ';;';
                                                                    }
                                                                    $id_users .= $asigned_users[$j]->getId();
                                                                }
                                                            }
                                                            echo "</td>";
                                                            echo "<td class='related_table'>";
                                                            $asigned_users = $tuition[$i][1];
                                                            for ($j=0; $j<count($asigned_users); $j++) { 
                                                                if ($asigned_users[$j]->getType() == "student") {
                                                                    echo "<p>" . $asigned_users[$j]->getName() . ", " . $asigned_users[$j]->getLastName() . "</p>";
                                                                    if ($id_users != '') {
                                                                        $id_users .= ';;';
                                                                    }
                                                                    $id_users .= $asigned_users[$j]->getId();
                                                                }
                                                            }
                                                            echo "</td>";
                                                            echo "<td class='table-col-btn'>";
                                                                echo "<a href='#tuition-edit' class='btn-tuition-edit btn btn-mod btn-circle btn-small button-edit magnificPopup-tuition-edit' data-id_row='row{$count}' data-id_course='" . $tuition[$i][0]->getId() . "' data-id_users='{$id_users}'>Editar</a>";
                                                                echo "<a href='#tuition-delete' class='btn-tuition-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-tuition-delete' data-id_row='row{$count}' data-id='" . $tuition[$i][0]->getId() . "'>Eliminar</a>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        $count++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#tuition-create" class="btn-tuition-create btn btn-mod btn-circle btn-large button-success magnificPopup-tuition-create">Añadir nuevas matrículas</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane fade" id="course" role="tabpanel">
                            
                            <!-- Table Course
                            ===================================== -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Asignatura</th>
                                                    <th>Etiquetas</th>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Fin</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="course-table">
                                                <?php
                                                    $count = 0; 
                                                    foreach ($courses as $row):
                                                        echo "<tr id='row{$count}'>";
                                                            echo "<td>{$row->getId()}</td>";
                                                            echo "<td>{$row->getName()}</td>";
                                                            echo "<td class='related_table'>";
                                                            for ($i=0; $i<count($subjects); $i++) { 
                                                                if ($subjects[$i]->getId() == $row->getAssignedSubject()) {
                                                                    echo "<p class='assigned_subject_{$subjects[$i]->getId()}'>({$subjects[$i]->getId()}) {$subjects[$i]->getName()}</p>";
                                                                }
                                                            }
                                                            echo "</td>";
                                                            echo "<td class='tags'>";
                                                                echo "<p>{$row->getStudies()}</p>";
                                                                echo "<p>{$row->getLocation()}</p>";
                                                                echo "<p>{$row->getType()}</p>";
                                                            echo "</td>";
                                                            echo "<td>{$row->getStartDate()}</td>";
                                                            echo "<td>{$row->getEndDate()}</td>";
                                                            echo "<td class='table-col-btn'>";
                                                                echo "<a href='index.php?controller=courseController&action=editCourse&id={$row->getId()}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>";
                                                                echo "<a href='#course-duplicate' class='btn-course-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-course-duplicate' data-id='{$row->getId()}'>Duplicar</a>";
                                                                echo "<a href='#course-delete' class='btn-course-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-course-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        $count++; 
                                                    endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="index.php?controller=courseController&action=editCourse" class="btn btn-mod btn-circle btn-large button-success">Añadir nuevo curso</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane fade" id="subject" role="tabpanel">
                            
                            <!-- Table Subject
                            ===================================== -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Cabecera</th>
                                                    <th>Previsualización</th>
                                                    <th>Contenido</th>
                                                    <th>Módulos asig.</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="subject-table">
                                                <?php
                                                    $count = 0; 
                                                    foreach ($subjects as $row):
                                                        echo "<tr id='row{$count}'>";
                                                            echo "<td>{$row->getId()}</td>";
                                                            echo "<td>{$row->getName()}</td>";
                                                            echo "<td><img class='header_image_preview' src='{$row->getHeaderImage()}'></td>";
                                                            echo "<td><img class='preview_image_preview' src='{$row->getPreviewImage()}'></td>";
                                                            echo "<td><img class='content_image_preview' src='{$row->getContentImage()}'></td>";
                                                            echo "<td class='related_table'>";
                                                                for ($i=0; $i<count($subject_module); $i++) { 
                                                                    if ($subject_module[$i][0]->getId() == $row->getId()) {
                                                                        echo "<p class='assigned_module_{$subject_module[$i][1]->getId()}'>({$subject_module[$i][1]->getId()}) {$subject_module[$i][1]->getName()}</p>";
                                                                    }
                                                                }
                                                            echo "</td>";
                                                            echo "<td class='table-col-btn'>";
                                                                echo "<a href='index.php?controller=courseController&action=editSubject&id={$row->getId()}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>";
                                                                echo "<a href='#subject-duplicate' class='btn-subject-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-subject-duplicate' data-id='{$row->getId()}'>Duplicar</a>";
                                                                echo "<a href='#subject-delete' class='btn-subject-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-subject-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        $count++; 
                                                    endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="index.php?controller=courseController&action=editSubject" class="btn btn-mod btn-circle btn-large button-success">Añadir nueva asignatura</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="tab-pane fade" id="module" role="tabpanel">
                            
                            <!-- Table Module
                            ===================================== -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Cabecera</th>
                                                    <th>Previsualización</th>
                                                    <th>Contenido</th>
                                                    <th>Asignaturas asig.</th>
                                                    <th>Lecciones asig.</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="module-table">
                                                <?php
                                                    $count = 0; 
                                                    foreach ($modules as $row):
                                                        echo "<tr id='row{$count}'>";
                                                            echo "<td>{$row->getId()}</td>";
                                                            echo "<td>{$row->getName()}</td>";
                                                            echo "<td><img class='header_image_preview' src='{$row->getHeaderImage()}'></td>";
                                                            echo "<td><img class='preview_image_preview' src='{$row->getPreviewImage()}'></td>";
                                                            echo "<td><img class='content_image_preview' src='{$row->getContentImage()}'></td>";
                                                            echo "<td class='related_table'>";
                                                                for ($i=0; $i<count($subject_module); $i++) { 
                                                                    if ($subject_module[$i][1]->getId() == $row->getId()) {
                                                                        echo "<p class='assigned_subject_{$subject_module[$i][0]->getId()}'>({$subject_module[$i][0]->getId()}) {$subject_module[$i][0]->getName()}</p>";
                                                                    }
                                                                }
                                                            echo "</td>";
                                                            echo "<td class='related_table'>";
                                                                for ($i=0; $i<count($module_lesson); $i++) { 
                                                                    if ($module_lesson[$i][0]->getId() == $row->getId()) {
                                                                        echo "<p class='assigned_lesson_{$module_lesson[$i][1]->getId()}'>({$module_lesson[$i][1]->getId()}) {$module_lesson[$i][1]->getName()}</p>";
                                                                    }
                                                                }
                                                            echo "</td>";
                                                            echo "<td class='table-col-btn'>";
                                                                echo "<a href='index.php?controller=courseController&action=editModule&id={$row->getId()}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>";
                                                                echo "<a href='#module-duplicate' class='btn-module-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-module-duplicate' data-id='{$row->getId()}'>Duplicar</a>";
                                                                echo "<a href='#module-delete' class='btn-module-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-module-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        $count++; 
                                                    endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="index.php?controller=courseController&action=editModule" class="btn btn-mod btn-circle btn-large button-success">Añadir nuevo módulo</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="tab-pane fade" id="lesson" role="tabpanel">

                            <!-- Table Lesson
                            ===================================== -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Archivos</th>
                                                    <th>Módulos asig.</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="lesson-table">
                                                <?php
                                                    $count = 0; 
                                                    foreach ($lessons as $row):
                                                        echo "<tr id='row{$count}'>";
                                                            echo "<td>{$row->getId()}</td>";
                                                            echo "<td>{$row->getName()}</td>";
                                                            $arrays = explode(';;', $row->getFiles());
                                                            $countVideo = 0;
                                                            $countPdf = 0;
                                                            for ($i=0; $i<count($arrays); $i+=2) {
                                                                if (str_contains($arrays[$i+1], '.mp4')  || str_contains($arrays[$i+1], '.avi')) {
                                                                    $countVideo++;
                                                                }
                                                                else if (str_contains($arrays[$i+1], '.pdf')) {
                                                                    $countPdf++;
                                                                }
                                                            }
                                                            echo "<td>";
                                                                if ($countVideo != 0) {
                                                                    echo "<i class='fa fa-video'> {$countVideo}</i> ";
                                                                }
                                                                if ($countPdf != 0) {
                                                                    echo "<i class='fa fa-file-pdf'> {$countPdf}</i>";
                                                                }
                                                            echo "</td>";
                                                            echo "<td class='related_table'>";
                                                                for ($i=0; $i<count($module_lesson); $i++) { 
                                                                    if ($module_lesson[$i][1]->getId() == $row->getId()) {
                                                                        echo "<p class='assigned_module_{$module_lesson[$i][0]->getId()}'>({$module_lesson[$i][0]->getId()}) {$module_lesson[$i][0]->getName()}</p>";
                                                                    }
                                                                }
                                                            echo "</td>";
                                                            echo "<td class='table-col-btn'>";
                                                                echo "<a href='index.php?controller=courseController&action=editLesson&id={$row->getId()}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>";
                                                                echo "<a href='#lesson-duplicate' class='btn-lesson-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-lesson-duplicate' data-id='{$row->getId()}'>Duplicar</a>";
                                                                echo "<a href='#lesson-delete' class='btn-lesson-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-lesson-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        $count++;
                                                    endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="index.php?controller=courseController&action=editLesson" class="btn btn-mod btn-circle btn-large button-success">Añadir nueva lección</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <!-- End Tab panes -->
                        
                </div>
            
            </section>

            <?php
                $options_courses = "<option>No hay cursos.</option>";
                if ($courses) {
                    $options_courses = "";
                    foreach ($courses as $course):
                        $options_courses .= '<option value="' . $course->getId() . '">(' . $course->getId() . ') ' . $course->getName() . '</option>';
                    endforeach;
                }
                $options_users = "<option>No hay usuarios.</option>";
                if ($users) {
                    $options_users = "";
                    foreach ($users as $user):
                        if ($user->getType() == 'student' || $user->getType() == 'teacher') {
                            $options_users .= '<option value="' . $user->getId() . '">' . $user->getName() . ', ' . $user->getLastName() . '</option>';
                        }
                    endforeach;
                    if ($options_users == "") {
                        $options_users = "<option>No hay usuarios.</option>";
                    }
                }
            ?>

            <!-- Modal create tuition
            ===================================== -->
            <div id="tuition-create" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Crear matrículas del curso</h2>
                </div>
                <form id="tuition-create-form" class="form">
                    <div class='form-group'>
                        <label>Curso <span class='required-field-color'>(*)</span></label>
                        <select id='assigned_course' class='input-md round form-control'><?php echo $options_courses ?></select>
                    </div>
                    <div class="form-group">
                        <label>Users <span class='required-field-color'>(*)</span></label>
                        <div id='container-assigned_users'>
                            <div class='row-assigned_users'>
                                <select class='assigned_users input-md round form-control'><?php echo $options_users ?></select>
                                <div class='delete-row-assigned_users btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>
                            </div>
                        </div>
                        <a id='add-row-assigned_users' class='btn btn-mod btn-circle button-success' data-options_users='<?php echo $options_users; ?>'><i class='fa fa-plus'></i></a>
                    </div>
                </form>
                <div id="create-modal-footer" class="modal-footer">
                </div>
            </div>

            <!-- Modal edit tuition
            ===================================== -->
            <div id="tuition-edit" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Editar matrículas del curso</h2>
                </div>
                <form id="tuition-edit-form" class="form">
                    <div class='form-group'>
                        <label>Curso <span class='required-field-color'>(*)</span></label>
                        <select id='assigned_course' class='input-md round form-control'><?php echo $options_courses ?></select>
                    </div>
                    <div class="form-group">
                        <label>Users <span class='required-field-color'>(*)</span></label>
                        <div id='container-assigned_users'>
                            <div class='row-assigned_users'>
                                <select class='assigned_users input-md round form-control'><?php echo $options_users ?></select>
                                <div class='delete-row-assigned_users btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>
                            </div>
                        </div>
                        <a id='add-row-assigned_users' class='btn btn-mod btn-circle button-success' data-options_users='<?php echo $options_users; ?>'><i class='fa fa-plus'></i></a>
                    </div>
                </form>
                <div id="edit-modal-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal delete tuition
            ===================================== -->
            <div id="tuition-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Eliminar matrículas del curso</h2>
                </div>
                <div id="tuition-delete-form">
                    <p>¿Seguro que quieres eliminar todas las matrículas de este curso?</p>
                </div>
                <div id="delete-modal-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal duplicate course
            ===================================== -->
            <div id="course-duplicate" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Duplicar curso</h2>
                </div>
                <div id="course-duplicate-form">
                    <p>¿Seguro que quieres duplicar este curso?</p>
                </div>
                <div id="course-duplicate-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal delete course
            ===================================== -->
            <div id="course-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Eliminar curso</h2>
                </div>
                <div id="course-delete-form">
                    <p>¿Seguro que quieres eliminar este curso?</p>
                </div>
                <div id="course-delete-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal duplicate subject
            ===================================== -->
            <div id="subject-duplicate" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Duplicar asignatura</h2>
                </div>
                <div id="subject-duplicate-form">
                    <p>¿Seguro que quieres duplicar esta asignatura?</p>
                </div>
                <div id="subject-duplicate-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal delete subject
            ===================================== -->
            <div id="subject-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Eliminar asignatura</h2>
                </div>
                <div id="subject-delete-form">
                    <p>¿Seguro que quieres eliminar esta asignatura?</p>
                </div>
                <div id="subject-delete-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal duplicate module
            ===================================== -->
            <div id="module-duplicate" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Duplicar módulo</h2>
                </div>
                <div id="module-duplicate-form">
                    <p>¿Seguro que quieres duplicar este módulo?</p>
                </div>
                <div id="module-duplicate-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal delete module
            ===================================== -->
            <div id="module-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Eliminar módulo</h2>
                </div>
                <div id="module-delete-form">
                    <p>¿Seguro que quieres eliminar este módulo?</p>
                </div>
                <div id="module-delete-footer" class="modal-footer">
                </div>
            </div>
            
            <!-- Modal duplicate lesson
            ===================================== -->
            <div id="lesson-duplicate" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Duplicar lección</h2>
                </div>
                <div id="lesson-duplicate-form">
                    <p>¿Seguro que quieres duplicar esta lección?</p>
                </div>
                <div id="lesson-duplicate-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal delete lesson
            ===================================== -->
            <div id="lesson-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Eliminar lección</h2>
                </div>
                <div id="lesson-delete-form">
                    <p>¿Seguro que quieres eliminar esta lección?</p>
                </div>
                <div id="lesson-delete-footer" class="modal-footer">
                </div>
            </div>

            <!-- Footer
            ===================================== -->
            <?php require_once 'view/include/footer.php';?>
        
        </div>
        <!-- End Page Wrap -->
        
        <!-- JS
        ===================================== -->
        <?php require_once "view/include/script.php"?>
    </body>
</html>