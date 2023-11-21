<!DOCTYPE html>
<?php
    $course  = $dataToView["course"];
    $subject = $dataToView["subject"];
    $modules = $dataToView["modules"];
?>
<html lang="es">
    <head>
        <title>Academia Cartabón | Curso: <?php echo $subject->getName();?></title>
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
                                    <h1 class="hs-line-7 mb-40 mb-xs-20"><?php echo $subject->getName();?></h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <div class="mb-20 mb-xs-0">
                                        <!-- Author, Categories, Comments -->
                                        <div class="blog-item-data">
                                            <i class="fa fa-folder-open"></i>
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
                                <div class="mod-breadcrumbs text-end">
                                    <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="index.php?controller=courseController&action=courses">Cursos</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span><?php echo $subject->getName();?></span>
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
                                                    <img src="<?php echo $subject->getHeaderImage();?>" alt="" />
                                                </li>
                                            </ul>
                                        </div>
                                        <?php echo $subject->getContent();?>
        							</div>
                                    <!-- End Text -->
        							
        						</div>
        						<!-- End Post -->
    						
                                <?php
                                    foreach ($modules as $module) {
                                ?>
                                    <section class="page-section">
                                        <div class="container relative">
                                            
                                            <div class="row wow fadeInUpShort animated" style="visibility: visible; animation-name: fadeInUpShort;">
                                                
                                                <div class="col-md-7 mb-sm-40">
                                                    <img src="<?php echo $module->getHeaderImage();?>" alt="">
                                                    
                                                </div>
                                                <div class="col-md-5 col-lg-4 offset-lg-1 d-flex align-items-center">
                                                    <div>
                                                        <h2 class="mb-30 mb-xxs-10"><?php echo $module->getName();?></h2>
                                                        
                                                        <?php echo $module->getPreview();?>
                                                        
                                                        <div class="mt-40">
                                                            <a href="index.php?controller=courseController&action=module&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>&id_module=<?php echo $module->getId();?>" class="btn btn-mod btn-border btn-round btn-medium">Ver módulo</a>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- End About Project -->
                                                    
                                                </div>
                                                
                                            </div>
                                        
                                        </div>
                                    </section>
                                <?php
                                    }
                                ?>
        						
                                <!-- Prev/Next Post -->
                                <div class="clearfix mt-40">
                                    <a href="#" class="blog-item-more left"><i class="fa fa-chevron-left"></i>&nbsp;Prev post</a>
                                    <a href="#" class="blog-item-more right">Next post&nbsp;<i class="fa fa-chevron-right"></i></a>
                                </div>
                                <!-- End Prev/Next Post -->
                                
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