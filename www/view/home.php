<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Mi área</title>
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
                                    <h1 class="hs-line-7 mb-20 mb-xs-10">Mi área</h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                        Configura tu perfil y ten disponible tus cursos
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                                <div class="mod-breadcrumbs text-end">
                                    <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;Mi área
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
                                    $user     = $dataToView["user"];
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
                                    <!-- Post -->
                                    <div class="blog-item">
                                        
                                        <!-- Post Title -->
                                        <h2 class="blog-item-title"><a href="blog-single-sidebar-right.html"><?php echo $course->getName();?></a></h2>
                                        
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
                                
                                <!-- Pagination -->
                                <div class="pagination">
                                    <a href=""><i class="fa fa-chevron-left"></i></a>
                                    <a href="" class="active">1</a>
                                    <a href="">2</a>
                                    <a href="">3</a>
                                    <a class="no-active">...</a>
                                    <a href="">9</a>
                                    <a href=""><i class="fa fa-chevron-right"></i></a>
                                </div>
                                <!-- End Pagination -->
                                
                            </div>
                            <!-- End Content -->
                            
                            <!-- Sidebar -->
                            <div class="col-md-4 col-lg-3 offset-lg-1 mt-10">
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Perfil</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist">
                                            <div class="profile-menu">
                                                <img class="media-object comment-avatar" src="view/assets/academia/img/default-profile-picture.jpg">
                                                <div class="media-body">
                                                    <div class="comment-item-data">
                                                        <div class="name-profile">
                                                            <?php echo $user->getName();?>
                                                        </div>
                                                        <div class="name-profile">
                                                            <?php echo $user->getLastName();?>
                                                        </div>
                                                    </div>
                                                    <div class="comment-item-data">
                                                        <div class="rol-profile">
                                                            <?php 
                                                                if ($user->getType() == 'student') {
                                                                    echo "<i class='fa fa-book-reader'></i> Estudiante";
                                                                }
                                                                else if ($user->getType() == 'teacher') {
                                                                    echo "<i class='fa fa-chalkboard-teacher'></i> Profesor";
                                                                }
                                                                else if ($user->getType() == 'secretary') {
                                                                    echo "<i class='fa fa-clipboard-list'></i> Secretaría";
                                                                }
                                                                else if ($user->getType() == 'admin') {
                                                                    echo "<i class='fa fa-laptop-code'></i> Administrador";
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-info">
                                                <div><i class="fa fa-envelope"></i> <?php echo $user->getEmail();?></div>
                                                <div><i class="fa fa-phone-alt"></i> <?php echo substr($user->getPhoneNumber(), 0, 3) . "-" . substr($user->getPhoneNumber(), 3, 2) . "-" . substr($user->getPhoneNumber(), 5, 2) . "-" . substr($user->getPhoneNumber(), 7, 2);?></div>
                                            </div>
                                        </ul>
                                    </div>
                                    
                                </div>
                                <!-- End Widget -->
                                
                                <!-- Widget -->
                                <div class="widget">
                                    
                                    <h3 class="widget-title">Configuración de perfil</h3>
                                    
                                    <div class="widget-body">
                                        <ul class="clearlist widget-menu profile-config">
                                            <li>
                                                <a href="#" title=""><i class='fa fa-user-cog'></i>- Datos personales</a>
                                            </li>
                                            <li>
                                                <a href="#" title=""><i class='fa fa-key'></i>- Contraseñas</a>
                                            </li>
                                            <li>
                                                <a href="#" title=""><i class='fa fa-bell'></i>- Notificaciones</a>
                                            </li>
                                            <li>
                                                <a href="#" title=""><i class='fa fa-wallet'></i>- Pagos</a>
                                            </li>
                                            <li>
                                                <a href="#" title=""><i class='fa fa-pen-nib'></i>- Apariencia</a>
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