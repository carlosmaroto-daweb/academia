<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Matricúlate</title>
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
                                    <h1 class="hs-line-7 mb-20 mb-xs-10">Matricúlate</h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                        Para acceder al contenido debes comprar el curso
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                                <div class="mod-breadcrumbs text-end">
                                    <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;Matricúlate
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
                            <div class="col-md-8 mb-sm-80">

                                <?php
                                    $course  = $dataToView["course"];
                                    $subject = $dataToView["subject"];
                                ?>
                                <!-- Course -->
                                <div class="blog-item">
                                    
                                    <!-- Course Title -->
                                    <h2 class="blog-item-title"><a href="blog-single-sidebar-right.html"><?php echo $course->getName();?></a></h2>
                                    
                                    <!-- Tags and Info -->
                                    <div class="blog-item-data">
                                        <a href="index.php?controller=courseController&action=courses&type=<?php echo $course->getType();?>"><i class="fa fa-tags"></i> <?php echo $course->getType();?></a>
                                        <span class="separator">&nbsp;</span>
                                        <a href="index.php?controller=courseController&action=courses&location=<?php echo $course->getLocation();?>"><i class="fa fa-tags"></i> <?php echo $course->getLocation();?></a>
                                        <span class="separator">&nbsp;</span>
                                        <a href="index.php?controller=courseController&action=courses&studies=<?php echo $course->getStudies();?>"><i class="fa fa-tags"></i> <?php echo $course->getStudies();?></a>
                                        <span class="separator">&nbsp;</span>
                                        <i class="fa fa-clock"></i> <?php echo $course->getStartDate();?>
                                        <span class="separator">&nbsp;</span>
                                        <i class="fa fa-clock"></i> <?php echo $course->getEndDate();?>
                                        <span class="separator">&nbsp;</span>
                                    </div>
                                    
                                    <!-- Image -->
                                    <div class="blog-media">
                                        <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>"><img src="<?php echo $subject->getHeaderImage();?>" alt="" /></a>
                                    </div>
                                    
                                    <!-- Text Intro -->
                                    <div class="blog-item-body">
                                        <?php echo $subject->getPreview();?>
                                    </div>
                                    
                                    <!-- Read More Link -->
                                    <div class="blog-item-foot">
                                        <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $subject->getId();?>" class="btn btn-mod btn-round  btn-small">Ver curso</a>
                                    </div>
                                    
                                </div>
                                <!-- End Post -->
                                
                            </div>
                            <!-- End Content -->
                            
                            <!-- Sidebar -->
                            <div class="col-md-4 col-lg-3 offset-lg-1 mt-10">
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Opciones de pago</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist widget-menu button-buy">
                                            <li>
                                                <a href='#' class='btn btn-mod btn-circle btn-small btn-bizzum'><i class='fab fa-google-wallet'></i> Bizzum</a>
                                            </li>
                                            <li>
                                                <a href='#' class='btn btn-mod btn-circle btn-small button-card'><i class='fa fa-money-check'></i> Tarjeta</a>
                                            </li>
                                            <li>
                                                <a href='#' class='btn btn-mod btn-circle btn-small button-transfer'><i class='fa fa-wallet'></i> Transferencia</a>
                                            </li>
                                            <li>
                                                <a href='#' class='btn btn-mod btn-circle btn-small btn-paypal'><i class='fab fa-paypal'></i> PayPal</a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <!-- End Widget -->
                                
                            </div>
                            <!-- End Sidebar -->
                        
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