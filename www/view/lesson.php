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
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <div class="mb-20 mb-xs-0">
                                        <!-- Author, Categories, Comments -->
                                        <div class="blog-item-data">
                                            <i class="fa fa-tags"></i>
                                            <a href=""><?php echo $course->getStudies();?></a>, <a href="#"><?php echo $course->getLocation();?></a>, <a href="#"><?php echo $course->getType();?></a>
                                            <span class="separator">&nbsp;</span>
                                            <a href="#"><i class="fa fa-clock"></i> <?php echo $course->getStartDate();?></a>
                                            <span class="separator">&nbsp;</span>
                                            <a href="#"><i class="fa fa-clock"></i> <?php echo $course->getEndDate();?></a>
                                            <span class="separator">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                                <div class="mod-breadcrumbs text-end mod-breadcrumbs-column">
                                    <a href="index.php">Inicio <i class="fa fa-chevron-down"></i></a>
                                    <a href="index.php?controller=courseController&action=courses">Cursos <i class="fa fa-chevron-down"></i></a>
                                    <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>"><?php echo $subject->getName();?> <i class="fa fa-chevron-down"></i></a>
                                    <a href="index.php?controller=courseController&action=module&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>&id_module=<?php echo $module->getId();?>"><?php echo $module->getName();?> <i class="fa fa-chevron-down"></i></a>
                                    <?php echo $lesson->getName();?>
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