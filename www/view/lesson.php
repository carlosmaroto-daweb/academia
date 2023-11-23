<!DOCTYPE html>
<?php
    $course  = $dataToView["course"];
    $subject = $dataToView["subject"];
    $module  = $dataToView["module"];
    $lesson  = $dataToView["lesson"];
?>
<html lang="es">
    <head>
        <title>Academia Cartabón | Lección: <?php echo $lesson->getName();?></title>
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
        
            <main id="main">    
            
                <!-- Home Section -->
                <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="view/assets/images/full-width-images/section-bg-19.jpg" id="home">
                    <div class="container relative pt-70">
                    
                        <div class="row">
                            
                            <div class="col-md-8">
                                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                    <h1 class="hs-line-7 mb-40 mb-xs-20"><?php echo $lesson->getName();?></h1>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                                <div class="mod-breadcrumbs text-end">
                                    <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=courses">Cursos</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>"><?php echo $subject->getName();?></a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=module&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>&id_module=<?php echo $module->getId();?>"><?php echo $module->getName();?></a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span><?php echo $lesson->getName();?></span>
                                </div>                                
                            </div>
                            
                        </div>
                    
                    </div>
                </section>
                <!-- End Home Section -->
                
                
                <!-- Section -->
                <section class="page-section">
                    <div class="container relative">
                        
                        <div class="row">
                            
                            <?php
                                $files = $lesson->getFiles();
                                $files = explode(';;', $files);
                                for ($i=0; $i<count($files); $i+=2) {
                                    echo "<h3>" . $files[$i] . "</h3>";
                                    if (str_contains($files[$i+1], '.mp4')  || str_contains($files[$i+1], '.avi')) {
                                        echo "<video src='" . $files[$i+1] . "' controls disablepictureinpicture controlslist='nodownload noplaybackrate'></video>";
                                    }
                                    else if (str_contains($files[$i+1], '.pdf')) {
                                        echo "<embed src='" . $files[$i+1] . "' type='application/pdf'></embed>";
                                    }
                                }
                            ?>
                                                   
                        
                        </div>
                        
                    </div>
                </section>
                <!-- End Section -->                
                
            </main>

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