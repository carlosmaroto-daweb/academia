<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Edición curso</title>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Edición de curso</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    El contenido editado se mostrará en el curso específico
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=secretary">Secretaría</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Edición curso</span>
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->
        
            <?php
                $id           = "";
                $name         = "";
                $subjects = $dataToView["subjects"];
                $options_subjects = "<option>No hay asignaturas.</option>";
                if ($subjects) {
                    $options_subjects = "";
                    foreach ($subjects as $subject):
                        $options_subjects .= '<option value="' . $subject->getId() . '">(' . $subject->getId() . ') ' . $subject->getName() . '</option>';
                    endforeach;
                }
                echo "<section class='page-section'>";
                    echo "<div class='container'>";
                        echo "<form id='course-create-form' class='form'>";
                            echo "<input id='course-edit-id' type='hidden' name='id' value='{$id}'>";
                            echo "<div class='form-group'>";
                                echo "<label for='course-edit-name'>Nombre <span class='required-field-color'>(*)</span></label>";
                                echo "<input id='course-edit-name' type='text' name='name' value='{$name}' class='input-md round form-control'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label for='assigned_subject'>Asignatura <span class='required-field-color'>(*)</span></label>";
                                echo "<select id='assigned_subject' class='input-md round form-control'>{$options_subjects}</select>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Etiquetas <span class='required-field-color'>(*)</span></label>";
                                echo "<div class='row-tags'>";
                                    echo "<input id='studies' class='input-md round form-control' placeholder='Estudios' type='text' name='name'>";
                                    echo "<input id='location' class='input-md round form-control' placeholder='Ubicación'  type='text' name='location'>";
                                    echo "<select id='type' class='input-md round form-control'>";
                                        echo "<option disabled selected>Selecciona el tipo</option>";
                                        echo "<option value='oppositions'>Oposiciones</option>";
                                        echo "<option value='university'>Univerdidad</option>";
                                        echo "<option value='institute'>Instituto</option>";
                                    echo "</select>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label for='start_date'>Fecha Inicio <span class='required-field-color'>(*)</span></label>";
                                $date = getdate();
                                $year = $date['year'];
                                $mon = str_pad($date['mon'], 2, "0", STR_PAD_LEFT);
                                $day = str_pad($date['mday'], 2, "0", STR_PAD_LEFT);
                                echo "<input id='start_date' type='date' value='{$year}-{$mon}-{$day}' class='input-md round form-control'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label for='end_date'>Fecha Fin <span class='required-field-color'>(*)</span></label>";
                                $date = getdate();
                                $year = $date['year'];
                                $mon = str_pad($date['mon'], 2, "0", STR_PAD_LEFT);
                                $day = str_pad($date['mday'], 2, "0", STR_PAD_LEFT);
                                echo "<input id='end_date' type='date' value='{$year}-{$mon}-{$day}' class='input-md round form-control'>";
                            echo "</div>";
                        echo "</form>";
                        echo "<div class='container mt-50'>";
                            echo "<div class='row'>";
                                echo "<div class='col-md-12 text-center'>";
                                    echo "<a href='index.php?controller=courseController&action=secretary' class='btn btn-mod btn-circle btn-large button-cancel'>Cancelar</a>&nbsp;";
                                    echo "<a id='create-course' class='btn btn-mod btn-circle btn-large button-success'>Guardar</a>";
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