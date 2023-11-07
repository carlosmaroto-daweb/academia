<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Edición módulo</title>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Edición de módulo</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    El contenido editado se mostrará en el módulo específico
                                    El contenido editado se mostrará en el módulo específico
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=secretary">Secretaría</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Edición módulo</span>
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=secretary">Secretaría</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Edición módulo</span>
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->
        
            <?php
                $id           = "";
                $name         = "";
                $header_image = "";
                $preview      = "";
                $content      = "";
                if ($dataToView) {
                    $id           = $dataToView->getId();
                    $name         = $dataToView->getName();
                    $header_image = $dataToView->getHeaderImage();
                    $preview      = $dataToView->getPreview();
                    $content      = $dataToView->getContent();
                }
                echo "<section class='page-section'>";
                    echo "<div class='container'>";
                        echo "<form id='module-edit-form' class='form'>";
                            echo "<input id='module-edit-id' type='hidden' name='id' value='{$id}'>";
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
                                echo "<label for='header_image'>Contenido previsualización <span class='required-field-color'>(*)</span></label>";
                                echo "<div id='preview'>{$preview}</div>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                                echo "<label for='header_image'>Contenido <span class='required-field-color'>(*)</span></label>";
                                echo "<div id='content'>{$content}</div>";
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