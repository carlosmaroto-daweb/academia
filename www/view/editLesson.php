<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Edición lección</title>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Edición de lección</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    El contenido editado se mostrará en la lección específica
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=secretary">Secretaría</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;Edición lección
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->
        
            <?php
                $lesson  = $dataToView["lesson"];
                $id    = "";
                $name  = "";
                $files = "";
                $assigned_modules = [];
                if ($lesson) {
                    $id    = $lesson->getId();
                    $name  = $lesson->getName();
                    $files = $lesson->getFiles();
                    $arrays = explode(';;', $files);
                    $module_lesson = $dataToView["module_lesson"];
                    for ($i=0; $i<count($module_lesson); $i++) { 
                        if ($module_lesson[$i][1]->getId() == $id) {
                            array_push($assigned_modules, $module_lesson[$i][0]->getId());
                        }
                    }
                }
                $modules = $dataToView["modules"];
                $options_modules = "<option>No hay módulos.</option>";
                if ($modules) {
                    $options_modules = "";
                    foreach ($modules as $module):
                        $options_modules .= '<option value="' . $module->getId() . '">(' . $module->getId() . ') ' . $module->getName() . '</option>';
                    endforeach;
                }
                echo "<section class='page-section'>";
                    echo "<div class='container'>";
                        echo "<form id='lesson-edit-form' class='form'>";
                            echo "<input id='lesson-edit-id' type='hidden' name='id' value='{$id}'>";
                            echo "<div class='form-group'>";
                                echo "<label for='lesson-edit-name'>Nombre <span class='required-field-color'>(*)</span></label>";
                                echo "<input id='lesson-edit-name' type='text' name='name' value='{$name}' class='input-md round form-control'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Archivos (vídeo y pdf) <span class='required-field-color'>(*)</span></label>";
                                echo "<div id='lesson-edit-files'>";
                                    if ($files != '') {
                                        for ($i=0; $i<count($arrays); $i+=2) {
                                            echo "<div class='row-files-complete'>";
                                                echo "<div class='row-files'>";
                                                    echo "<input placeholder='Título' type='text' name='title' value='" . $arrays[$i] . "' class='input-md round form-control'>";
                                                    echo "<input type='file' name='file' class='file' value='" . $arrays[$i+1] . "'>";
                                                    echo "<div class='delete-lesson-edit-files btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>";
                                                echo "</div>";
                                                echo "<div class='file-type-preview'>";
                                                    if (str_contains($arrays[$i+1], '.mp4')  || str_contains($arrays[$i+1], '.avi')) {
                                                        echo "<video src='" . $arrays[$i+1] . "' controls disablepictureinpicture controlslist='nodownload noplaybackrate'></video>";
                                                    }
                                                    else if (str_contains($arrays[$i+1], '.pdf')) {
                                                        echo "<embed src='" . $arrays[$i+1] . "' type='application/pdf'></embed>";
                                                    }
                                                echo "</div>";
                                            echo "</div>";
                                        }
                                    }
                                    else {
                                        echo "<div class='row-files-complete'>";
                                            echo "<div class='row-files'>";
                                                echo "<input placeholder='Título' type='text' name='title' class='input-md round form-control'>";
                                                echo "<input type='file' name='file' class='file'>";
                                            echo "</div>";
                                            echo "<div class='file-type-preview'>";
                                            echo "</div>";
                                        echo "</div>";
                                    }
                                echo "</div>";
                                echo "<a id='add-lesson-edit-files' class='btn btn-mod btn-circle button-success'><i class='fa fa-plus'></i></a>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Módulos asignados</label>";
                                echo "<div id='container-assigned_modules'>";
                                    if ($assigned_modules) {
                                        foreach ($assigned_modules as $assigned_module):
                                            $options_modules_selected = "";
                                            foreach ($modules as $module):
                                                $stringSelected = '';
                                                if ($module->getId() == $assigned_module) {
                                                    $stringSelected = ' selected ';
                                                }
                                                $options_modules_selected .= '<option value="' . $module->getId() . '"' . $stringSelected . '>(' . $module->getId() . ') ' . $module->getName() . '</option>';
                                            endforeach;
                                            echo "<div class='row-assigned_modules'>";
                                                echo "<div class='grid-row-assigned_modules btn btn-mod btn-circle'><i class='fa fa-grip-vertical'></i></div>";
                                                echo "<select class='assigned_modules input-md round form-control'>{$options_modules_selected}</select>";
                                                echo "<div class='delete-row-assigned_modules btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>";
                                            echo "</div>";
                                        endforeach;
                                    }
                                echo "</div>";
                                echo "<a id='add-row-assigned_modules' class='btn btn-mod btn-circle button-success' data-options_modules='{$options_modules}'><i class='fa fa-plus'></i></a>";
                            echo "</div>";
                        echo "</form>";
                        echo "<div class='container mt-50'>";
                            echo "<div class='row'>";
                                echo "<div class='col-md-12 text-center'>";
                                    echo "<a href='index.php?controller=courseController&action=secretary' class='btn btn-mod btn-circle btn-large button-cancel'>Cancelar</a>&nbsp;";
                                    echo "<a id='edit-lessons' class='btn btn-mod btn-circle btn-large button-success'>Guardar</a>";
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