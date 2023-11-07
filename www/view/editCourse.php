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
        
            <section class="page-section">
                <div class="container">
                    <form id="course-create-form" class="form">
                        <div class="form-group">
                            <label for="course-create-name">Nombre <span class="required-field-color">(*)</span></label>
                            <input id="course-create-name" type="text" name="email" class="input-md round form-control">
                        </div>
                        <div class="form-group">
                            <label>Estudios <span class="required-field-color">(*)</span></label>
                            <div id="course-create-studies">
                                <div class="row-studies">
                                    <input class="name-studies input-md round form-control" placeholder="Nombre" type="text" name="name">
                                    <input class="location-studies input-md round form-control" placeholder="Ubicación"  type="text" name="location">
                                    <select class="type-studies input-md round form-control">
                                        <option value="oppositions">Oposiciones</option>
                                        <option value="university">Univerdidad</option>
                                        <option value="institute">Instituto</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="header_image">Foto de cabecera <span class="required-field-color">(*)</span></label>
                            <input type="file" id="header_image" name="header_image" accept=".jpg, .jpeg, .png" class="input-md round form-control" />
                        </div>
                        <img id="header_image_preview">
                        <div class="form-group">
                            <label>Contenido previsualización <span class="required-field-color">(*)</span></label>
                            <div id="preview"></div>
                        </div>
                        <div class="form-group">
                            <label>Contenido <span class="required-field-color">(*)</span></label>
                            <div id="content"></div>
                        </div>
                        <?php
                            echo "<div class='form-group'>";
                                echo "<label for='start'>Fecha inicio <span class='required-field-color'>(*)</span></label>";
                                $date = getdate();
                                $year = $date['year'];
                                $mon = str_pad($date['mon'], 2, "0", STR_PAD_LEFT);
                                $day = str_pad($date['mday'], 2, "0", STR_PAD_LEFT);
                                echo "<input type='date' id='start' name='trip-start' value='{$year}-{$mon}-{$day}' class='input-md round form-control' />";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label for='end'>Fecha fin <span class='required-field-color'>(*)</span></label>";
                                $date = getdate();
                                $year = $date['year'];
                                $mon = str_pad($date['mon'], 2, "0", STR_PAD_LEFT);
                                $day = str_pad($date['mday'], 2, "0", STR_PAD_LEFT);
                                echo "<input type='date' id='end' name='trip-start' value='{$year}-{$mon}-{$day}' class='input-md round form-control' />";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Módulos <span class='required-field-color'>(*)</span> (en caso de precio 0 el acceso es gratuito solo a los registrados)</label>";
                                echo "<div class='row-modules'>";
                                    echo "<input class='price-modules input-md round form-control' placeholder='Pago único' type='text' name='name'>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div id='course-create-modules form-group'>";
                                echo "<div class='row-modules'>";
                                    echo "<select id='select-modules' class='modules input-md round form-control'>";
                                        echo "<option value='modulo_1'>Modulo 1</option>";
                                        echo "<option value='modulo_2'>Modulo 2</option>";
                                        echo "<option value='modulo_3'>Modulo 3</option>";
                                    echo "</select>";
                                    echo "<input class='price-modules input-md round form-control' placeholder='Precio' type='text' name='name'>";
                                echo "</div>";
                            echo "</div>";
                            echo "<a id='add-course-create-modules' class='btn btn-mod btn-circle button-success'><i class='fa fa-plus'></i></a>";
                            echo "<div class='form-group'>";
                                echo "<label>Alumnos <span class='required-field-color'>(*)</span></label>";
                                echo "<select class='alumn input-md round form-control' multiple>";
                                    echo "<option value='modulo_1'>Alumn 1</option>";
                                    echo "<option value='modulo_2'>Alumn 2</option>";
                                    echo "<option value='modulo_3'>Alumn 3</option>";
                                echo "</select>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label>Profesores <span class='required-field-color'>(*)</span></label>";
                                echo "<select class='alumn input-md round form-control' multiple>";
                                    echo "<option value='alumn_1'>Alumn 1</option>";
                                    echo "<option value='alumn_2'>Alumn 2</option>";
                                    echo "<option value='alumn_3'>Alumn 3</option>";
                                echo "</select>";
                            echo "</div>";
                        ?>
                    </form>
                    <div class="container mt-50">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="index.php?controller=courseController&action=secretary" class="btn btn-mod btn-circle btn-large button-cancel">Cancelar</a>
                                <a id="create-course" class="btn btn-mod btn-circle btn-large button-success">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                
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