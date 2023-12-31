<!DOCTYPE html>
<?php
    $course  = $dataToView["course"];
    $subject = $dataToView["subject"];
    $module  = $dataToView["module"];
    $lessons = $dataToView["lessons"];
?>
<html lang="es">
    <head>
        <title>Academia Cartabón | Módulo: <?php echo $module->getName();?></title>
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
                <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="view/assets/academia/img/headers/board.jpg" id="home">
                    <div class="container relative pt-70">
                    
                        <div class="row">
                            
                            <div class="col-md-8">
                                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                    <h1 class="hs-line-7 mb-40 mb-xs-20"><?php echo $module->getName();?></h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <div class="mb-20 mb-xs-0">
                                        <!-- Author, Categories, Comments -->
                                        <div class="blog-item-data">
                                            <a href="index.php?controller=courseController&action=courses&type=<?php echo $course->getType();?>"><i class="fa fa-tags"></i> <?php echo $course->getType();?></a>
                                            <span class="separator">&nbsp;</span>
                                            <a href="index.php?controller=courseController&action=courses&location=<?php echo $course->getLocation();?>"><i class="fa fa-tags"></i> <?php echo $course->getLocation();?></a>
                                            <span class="separator">&nbsp;</span>
                                            <a href="index.php?controller=courseController&action=courses&studies=<?php echo $course->getStudies();?>"><i class="fa fa-tags"></i> <?php echo $course->getStudies();?></a>
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
                                    <?php echo $module->getName();?>
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
                            
                            <!-- Content -->
                            <div class="col-lg-8 offset-lg-2 mb-sm-80">
                                
                                <!-- Post -->
                                <div class="blog-item mb-80 mb-xs-40">
                                    
                                    <!-- Text -->
        							<div class="blog-item-body">
                                        
                                        <!-- Media Gallery -->
                                        <div class="blog-media mt-40 mb-40 mb-xs-30">
                                            <ul class="clearlist content-slider">
                                                <li>
                                                    <img src="<?php echo $module->getHeaderImage();?>" alt="" />
                                                </li>
                                            </ul>
                                        </div>
                                        <?php echo $module->getContent();?>

                                        <h2>Lecciones del módulo:</h2>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Archivos</th>
                                                    <th>Enlace</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $count = 0; 
                                                    foreach ($lessons as $lesson):
                                                        echo "<tr>";
                                                            echo "<td>{$lesson->getName()}</td>";
                                                            $arrays = explode(';;', $lesson->getFiles());
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
                                                            echo "</td>";
                                                            echo "<td class='table-col-btn'>";
                                                                echo "<a href='index.php?controller=courseController&action=lesson&id_course={$course->getId()}&id_subject={$subject->getId()}&id_module={$module->getId()}&id_lesson={$lesson->getId()}' class='btn btn-mod btn-circle btn-small button-lesson'>Ver lección</a>";
                                                            echo "</td>";
                                                        echo "</tr>";
                                                        $count++;
                                                    endforeach;
                                                ?>
                                            </tbody>
                                        </table>
        							</div>
                                    <!-- End Text -->
        							
        						</div>
        						<!-- End Post -->

                            </div>
                            <!-- End Content -->                            
                        
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