<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Cursos</title>
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
                                    <h1 class="hs-line-7 mb-20 mb-xs-10">Catálogo de cursos</h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                        Explora nuestros cursos online
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                                <div class="mod-breadcrumbs text-end">
                                    <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;Cursos
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
                            <div class="col-md-8 offset-lg-1 mb-sm-80 order-first order-md-last">

                                <?php
                                    $studies  = $dataToView["studies"];
                                    $location = $dataToView["location"];
                                    $type     = $dataToView["type"];
                                    $courses  = $dataToView["courses"];
                                    $subjects = $dataToView["subjects"];
                                ?>
                                
                                <?php
                                    foreach ($courses as $course) {
                                        $assignedSubject = null;
                                        for ($i=0; $i<count($subjects) && !$assignedSubject; $i++) { 
                                            if ($course->getAssignedSubject() == $subjects[$i]->getId()) { 
                                                $assignedSubject = $subjects[$i];
                                            }
                                        }
                                ?>
                                    <!-- Course -->
                                    <div class="blog-item">
                                        
                                        <!-- Course Title -->
                                        <h2 class="blog-item-title"><a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $assignedSubject->getId();?>"><?php echo $course->getName();?></a></h2>
                                        
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
                                            <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $assignedSubject->getId();?>"><img src="<?php echo $assignedSubject->getHeaderImage();?>" alt="" /></a>
                                        </div>
                                        
                                        <!-- Text Intro -->
                                        <div class="blog-item-body">
                                            <?php echo $assignedSubject->getPreview();?>
                                        </div>
                                        
                                        <!-- Read More Link -->
                                        <div class="blog-item-foot">
                                            <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $course->getId();?>&id_subject=<?php echo $assignedSubject->getId();?>" class="btn btn-mod btn-round  btn-small">Ver curso</a>
                                        </div>
                                        
                                    </div>
                                    <!-- End Post -->
                                <?php
                                    }
                                ?>
                                
                                <!-- Pagination 
                                <div class="pagination">
                                    <a href=""><i class="fa fa-chevron-left"></i></a>
                                    <a href="" class="active">1</a>
                                    <a href="">2</a>
                                    <a href="">3</a>
                                    <a class="no-active">...</a>
                                    <a href="">9</a>
                                    <a href=""><i class="fa fa-chevron-right"></i></a>
                                </div>
                                End Pagination -->
                                
                            </div>
                            <!-- End Content -->
                            
                            <!-- Sidebar -->
                            <div class="col-md-4 col-lg-3 mt-10">
                                
                                <!-- Search Widget -->
                                <div class="widget">
                                    <form class="form">
                                        <div class="search-wrap">
                                            <button class="search-button animate" type="submit" title="Start Search">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <input type="text" class="form-control search-field round" placeholder="Buscar...">
                                        </div>
                                    </form>
                                </div>
                                <!-- End Search Widget -->
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Nivel Académico</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist widget-menu">
                                            <?php
                                                foreach ($type as $i) {
                                            ?>
                                                    <li>
                                                        <label class="checkbox-inline">
                                                            <input class="course_filter_type" type="checkbox" value="<? echo $i;?>" <?php if (isset($_GET['type']) && $_GET['type'] == $i) echo "checked" ?>><? echo $i;?>
                                                        </label>
                                                    </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <!-- End Widget -->
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Ubicación</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist widget-menu">
                                            <?php
                                                foreach ($location as $i) {
                                            ?>
                                                    <li>
                                                        <label class="checkbox-inline">
                                                            <input class="course_filter_location" type="checkbox" value="<? echo $i;?>" <?php if (isset($_GET['location']) && $_GET['location'] == $i) echo "checked" ?>><? echo $i;?>
                                                        </label>
                                                    </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <!-- End Widget -->
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Formación</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist widget-menu">
                                            <?php
                                                foreach ($studies as $i) {
                                            ?>
                                                    <li>
                                                        <label class="checkbox-inline">
                                                            <input class="course_filter_studies" type="checkbox" value="<? echo $i;?>" <?php if (isset($_GET['studies']) && $_GET['studies'] == $i) echo "checked" ?>><? echo $i;?>
                                                        </label>
                                                    </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <!-- End Widget -->
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Últimos cursos</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist widget-posts">

                                        <?php
                                            for ($i=0; $i<count($courses) && $i<5; $i++) { 
                                                $assignedSubject = null;
                                                for ($j=0; $j<count($subjects) && !$assignedSubject; $j++) { 
                                                    if ($courses[$i]->getAssignedSubject() == $subjects[$j]->getId()) { 
                                                        $assignedSubject = $subjects[$j];
                                                    }
                                                }
                                            ?>
                                                <li class="clearfix last-courses">
                                                    <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $courses[$i]->getId();?>&id_subject=<?php echo $assignedSubject->getId();?>"><img src="<?php echo $assignedSubject->getHeaderImage();?>" alt="" width="150" class="widget-posts-img" /></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="index.php?controller=courseController&action=subject&id_course=<?php echo $courses[$i]->getId();?>&id_subject=<?php echo $assignedSubject->getId();?>" title=""><?php echo $courses[$i]->getName();?></a>
                                                        <?php echo $course->getLocation() . ", " . $course->getType();?>
                                                    </div>
                                                </li>
                                        <?php
                                            }
                                        ?>

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