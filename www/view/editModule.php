<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Edición módulo</title>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Edición de módulo</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    El contenido editado se mostrará en el módulo específico
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=secretary">Secretaría</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Edición módulo</span>
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->
        
            <?php
                $module  = $dataToView["module"];
                $id           = "";
                $name         = "";
                $header_image = "";
                $preview      = "";
                $content      = "";
                $assigned_subjects = [];
                $assigned_lessons = [];
                if ($module) {
                    $id                = $module->getId();
                    $name              = $module->getName();
                    $header_image      = $module->getHeaderImage();
                    $preview           = $module->getPreview();
                    $content           = $module->getContent();
                    $subject_module = $dataToView["subject_module"];
                    for ($i=0; $i<count($subject_module); $i++) { 
                        if ($subject_module[$i][1]->getId() == $id) {
                            array_push($assigned_subjects, $subject_module[$i][0]->getId());
                        }
                    }
                    $module_lesson = $dataToView["module_lesson"];
                    for ($i=0; $i<count($module_lesson); $i++) { 
                        if ($module_lesson[$i][0]->getId() == $id) {
                            array_push($assigned_lessons, $module_lesson[$i][1]->getId());
                        }
                    }
                }
                $subjects = $dataToView["subjects"];
                $options_subjects = "<option>No hay asignaturas.</option>";
                if ($subjects) {
                    $options_subjects = "";
                    foreach ($subjects as $subject):
                        $options_subjects .= '<option value="' . $subject->getId() . '">(' . $subject->getId() . ') ' . $subject->getName() . '</option>';
                    endforeach;
                }
                $lessons = $dataToView["lessons"];
                $options_lessons = "<option>No hay lecciones.</option>";
                if ($lessons) {
                    $options_lessons = "";
                    foreach ($lessons as $lesson):
                        $options_lessons .= '<option value="' . $lesson->getId() . '">(' . $lesson->getId() . ') ' . $lesson->getName() . '</option>';
                    endforeach;
                }
                echo "<section class='page-section'>";
                    echo "<div class='container'>";
                        echo "<form id='module-edit-form' class='form'>";
                            echo "<input id='module-edit-id' type='hidden' name='id' value='{$id}'>";
                            echo "<div id='preview_image'></div>";
                            echo "<div id='content_image'></div>";
                            echo "<div class='form-group'>";
                                echo "<label for='module-edit-name'>Nombre <span class='required-field-color'>(*)</span></label>";
                                echo "<input id='module-edit-name' type='text' name='name' value='{$name}' class='input-md round form-control'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label for='header_image'>Foto de cabecera <span class='required-field-color'>(*)</span></label>";
                                echo "<input type='file' id='header_image' name='header_image' accept='.jpg, .jpeg, .png' class='input-md round form-control' />";
                                echo "<img id='header_image_preview' src='{$header_image}'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Contenido previsualización <span class='required-field-color'>(*)</span></label>";
                                echo "<div id='preview'>{$preview}</div>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Contenido <span class='required-field-color'>(*)</span></label>";
                                echo "<div id='content'>{$content}</div>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Asignaturas asignadas</label>";
                                echo "<div id='container-assigned_subjects'>";
                                    if ($assigned_subjects) {
                                        foreach ($assigned_subjects as $assigned_subject):
                                            $options_subjects_selected = "";
                                            foreach ($subjects as $subject):
                                                $stringSelected = '';
                                                if ($subject->getId() == $assigned_subject) {
                                                    $stringSelected = ' selected ';
                                                }
                                                $options_subjects_selected .= '<option value="' . $subject->getId() . '"' . $stringSelected . '>(' . $subject->getId() . ') ' . $subject->getName() . '</option>';
                                            endforeach;
                                            echo "<div class='row-assigned_subjects'>";
                                                echo "<div class='grid-row-assigned_subjects btn btn-mod btn-circle'><i class='fa fa-grip-vertical'></i></div>";
                                                echo "<select class='assigned_subjects input-md round form-control'>{$options_subjects_selected}</select>";
                                                echo "<div class='delete-row-assigned_subjects btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>";
                                            echo "</div>";
                                        endforeach;
                                    }
                                echo "</div>";
                                echo "<a id='add-row-assigned_subjects' class='btn btn-mod btn-circle button-success' data-options_subjects='{$options_subjects}'><i class='fa fa-plus'></i></a>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Lecciones asignadas</label>";
                                echo "<div id='container-assigned_lessons'>";
                                    if ($assigned_lessons) {
                                        foreach ($assigned_lessons as $assigned_lesson):
                                            $options_lessons_selected = "";
                                            foreach ($lessons as $lesson):
                                                $stringSelected = '';
                                                if ($lesson->getId() == $assigned_lesson) {
                                                    $stringSelected = ' selected ';
                                                }
                                                $options_lessons_selected .= '<option value="' . $lesson->getId() . '"' . $stringSelected . '>(' . $lesson->getId() . ') ' . $lesson->getName() . '</option>';
                                            endforeach;
                                            echo "<div class='row-assigned_lessons'>";
                                                echo "<div class='grid-row-assigned_lessons btn btn-mod btn-circle'><i class='fa fa-grip-vertical'></i></div>";
                                                echo "<select class='assigned_lessons input-md round form-control'>{$options_lessons_selected}</select>";
                                                echo "<div class='delete-row-assigned_lessons btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>";
                                            echo "</div>";
                                        endforeach;
                                    }
                                echo "</div>";
                                echo "<a id='add-row-assigned_lessons' class='btn btn-mod btn-circle button-success' data-options_lessons='{$options_lessons}'><i class='fa fa-plus'></i></a>";
                            echo "</div>";
                        echo "</form>";
                        echo "<div class='container mt-50'>";
                            echo "<div class='row'>";
                                echo "<div class='col-md-12 text-center'>";
                                    echo "<a href='index.php?controller=courseController&action=secretary' class='btn btn-mod btn-circle btn-large button-cancel'>Cancelar</a>&nbsp;";
                                    echo "<a id='edit-module' class='btn btn-mod btn-circle btn-large button-success'>Guardar</a>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</section>";
            ?>

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