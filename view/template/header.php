<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Academia</title>        
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Harry Boo">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="view/assets/img/favicon.png">
        <link rel="apple-touch-icon" href="view/assets/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="view/assets/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="view/assets/img/apple-touch-icon-114x114.png">
        
        <!-- Load Core CSS 
        =====================================-->
        <link rel="stylesheet" href="view/assets/css/core/bootstrap-3.3.7.min.css">
        <link rel="stylesheet" href="view/assets/css/core/animate.min.css">
        <link rel="stylesheet" href="view/assets/css/demo.css">
        
        <!-- Load Main CSS 
        =====================================-->
        <link rel="stylesheet" href="view/assets/css/main/main.css">
        <link rel="stylesheet" href="view/assets/css/main/setting.css">
        <link rel="stylesheet" href="view/assets/css/main/hover.css">
        <link rel="stylesheet" href="view/assets/css/main/cover.css">
        
        <!-- Load Magnific Popup CSS 
        =====================================-->
        <link rel="stylesheet" href="view/assets/css/magnific/magic.min.css">        
        <link rel="stylesheet" href="view/assets/css/magnific/magnific-popup.css">              
        <link rel="stylesheet" href="view/assets/css/magnific/magnific-popup-zoom-gallery.css">
        
        <!-- Load OWL Carousel CSS 
        =====================================-->
        <link rel="stylesheet" href="view/assets/css/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="view/assets/css/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="view/assets/css/owl-carousel/owl.transitions.css">
        
        <!-- Load Color CSS - Please uncomment to apply the color.
        =====================================      
        <link rel="stylesheet" href="view/assets/css/color/blue.css">
        <link rel="stylesheet" href="view/assets/css/color/brown.css">
        <link rel="stylesheet" href="view/assets/css/color/cyan.css">
        <link rel="stylesheet" href="view/assets/css/color/dark.css">
        <link rel="stylesheet" href="view/assets/css/color/green.css">
        <link rel="stylesheet" href="view/assets/css/color/orange.css">
        <link rel="stylesheet" href="view/assets/css/color/purple.css">
        <link rel="stylesheet" href="view/assets/css/color/pink.css">
        <link rel="stylesheet" href="view/assets/css/color/red.css">
        <link rel="stylesheet" href="view/assets/css/color/yellow.css">-->
        <link rel="stylesheet" href="view/assets/css/color/pasific.css">
        
        <!-- Load Fontbase Icons - Please Uncomment to use linea icons
        =====================================       
        <link rel="stylesheet" href="view/assets/css/icon/linea-arrows-10.css">
        <link rel="stylesheet" href="view/assets/css/icon/linea-basic-10.css">
        <link rel="stylesheet" href="view/assets/css/icon/linea-basic-elaboration-10.css">
        <link rel="stylesheet" href="view/assets/css/icon/linea-ecommerce-10.css">
        <link rel="stylesheet" href="view/assets/css/icon/linea-music-10.css">
        <link rel="stylesheet" href="view/assets/css/icon/linea-software-10.css">
        <link rel="stylesheet" href="view/assets/css/icon/linea-weather-10.css">--> 
        <link rel="stylesheet" href="view/assets/css/icon/font-awesome.css">
        <link rel="stylesheet" href="view/assets/css/icon/et-line-font.css">

        <link rel="stylesheet" href="view/assets/academia/css/style.css">
        
        <!-- Load JS
        HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
        WARNING: Respond.js doesn't work if you view the page via file://
        =====================================-->

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body  id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">
        
        <!-- Page Loader
        ===================================== -->
		<div id="pageloader" class="bg-grad-animation-1">
			<div class="loader-item">
                <img src="view/assets/img/other/oval.svg" alt="page loader">
            </div>
		</div>
        <a href="view/shortcode-tables.html#page-top" class="go-to-top">
            <i class="fa fa-long-arrow-up"></i>
        </a>
        
        <!-- Navigation Area
        ===================================== -->
        <nav class="navbar navbar-pasific navbar-mp navbar-standart megamenu navbar-fixed-top" style="border-bottom:1px solid #fff;">
            <div class="container">
                <div id="navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand page-scroll" href="index.php">
                            <img src="view/assets/img/logo/logo-default.png" alt="logo">
                            Academia
                        </a>
                    </div>
                    <div class="navbar-collapse collapse navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php" class="color-light">Inicio</a></li>
                            <li><a href="index.php?controller=courseController&action=index" class="color-light">Cursos</a></li>
                            <?php
                                if (!isset($_SESSION["type"])) {
                                    echo "<li><a href='index.php?controller=userController&action=home'>";
                                        echo "<button class='button-3d button-sm button-circle button-orange'>Mi área <i class='fa fa-lock'></i></button>";
                                    echo "</a></li>";
                                }
                                else {
                                    if ($_SESSION["type"] == "admin") {
                                        echo "<li><a href='index.php?controller=userController&action=secretary'>";
                                            echo "<button class='button-3d button-sm button-circle button-orange'>Secretaría <i class='fa fa-unlock'></i></button>";
                                        echo "</a></li>";
                                        echo "<li><a href='index.php?controller=userController&action=home'>";
                                            echo "<button class='button-3d button-sm button-circle button-orange'>Administración <i class='fa  fa-unlock'></i></button>";
                                        echo "</a></li>";
                                    }
                                    else if ($_SESSION["type"] == "secretary") {
                                        echo "<li><a href='index.php?controller=userController&action=secretary'>";
                                            echo "<button class='button-3d button-sm button-circle button-orange'>Secretaría <i class='fa fa-unlock'></i></button>";
                                        echo "</a></li>";
                                    }
                                    else {
                                        echo "<li><a href='index.php?controller=userController&action=home'>";
                                            echo "<button class='button-3d button-sm button-circle button-orange'>Mi área <i class='fa  fa-unlock'></i></button>";
                                        echo "</a></li>";
                                    }
                                    echo "<li><a href='index.php?controller=userController&action=logout'>";
                                        echo "<button class='button-3d button-sm button-circle button-red'>Cerrar sesión <i class='fa fa-sign-out'></i></button>";
                                    echo "</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>