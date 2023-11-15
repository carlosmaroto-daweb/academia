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
            <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="view/assets/images/full-width-images/section-bg-19.jpg" id="home">
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
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Secretaría</span>
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
                                                    <th>Alumnos</th>
                                                    <th>Profesores</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tuition-table">
                                                <?php
                                                    //
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-50">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="" class="btn btn-mod btn-circle btn-large button-success">Añadir nueva matrícula</a>
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
                                                    <th>Nombre</th>
                                                    <th>Asignatura</th>
                                                    <th>Estudios</th>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Fin</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="course-table">
                                                <?php
                                                    //
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
                                                            echo "<td> </td>";
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