<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón</title>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Blog</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    We share our best ideas in our blog
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="#">Home</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="#">Blog</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Classic</span>
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->
        
            <?php
                $id    = "";
                $name  = "";
                $files = "";
                if ($dataToView) {
                    $id    = $dataToView->getId();
                    $name  = $dataToView->getName();
                    $files = $dataToView->getFiles();
                }
                echo "<div class='container pt70'>";
                    echo "<h4 class='text-center mt100 mb10'>Creación de la Lección</h4>";
                    echo "<form id='lesson-edit-form'>";
                        echo "<input id='lesson-edit-id' type='hidden' name='id' value='{$id}'>";
                        echo "Nombre: <span class='color-pasific'>(*)</span>";
                        echo "<br>";
                        echo "<input id='lesson-edit-name' type='text' name='name' value='{$name}'>";
                        echo "<br>";
                        echo "<br>";
                        echo "Archivos (vídeo y pdf): <span class='color-pasific'>(*)</span>";
                        echo "<br>";
                        echo "<div id='lesson-edit-files'>";
                            echo "<div class='row-files-complete'>";
                                echo "<div class='row-files'>";
                                    echo "<input placeholder='Título' type='text' name='title'>";
                                    echo "<input type='file' name='file' class='file'>";
                                echo "</div>";
                                echo "<div class='file-type-preview'>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        echo "<a id='add-lesson-edit-files' class='button-3d button-xs button-circle button-success'><i class='fa fa-plus'></i></a>";
                    echo "</form>";
                    echo "<div class='container mb100'>";
                        echo "<div class='row'>";
                            echo "<div class='col-md-12 text-center'>";
                                echo "<h3 class='color-light text-capitalize font-open-sans'>";
                                    echo "<a href='index.php?controller=courseController&action=secretary' class='button-3d button-md button-rounded button-danger'>Cancelar</a>&nbsp;";
                                    echo "<a id='edit-lessons' class='button-3d button-md button-rounded button-success'>Guardar</a>";
                                echo "</h3>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
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