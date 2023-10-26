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
                        if (!hasLoggedIn()) {
                            echo "<li><a href='index.php?controller=userController&action=home'>";
                                echo "<button class='button-3d button-sm button-circle button-orange'>Mi área <i class='fa fa-lock'></i></button>";
                            echo "</a></li>";
                        }
                        else {
                            if (isAdmin()) {
                                echo "<li><a href='index.php?controller=courseController&action=secretary'>";
                                    echo "<button class='button-3d button-sm button-circle button-orange'>Secretaría <i class='fa fa-unlock'></i></button>";
                                echo "</a></li>";
                                echo "<li><a href='index.php?controller=userController&action=admin'>";
                                    echo "<button class='button-3d button-sm button-circle button-orange'>Administración <i class='fa  fa-unlock'></i></button>";
                                echo "</a></li>";
                            }
                            else if (isSecretary()) {
                                echo "<li><a href='index.php?controller=courseController&action=secretary'>";
                                    echo "<button class='button-3d button-sm button-circle button-orange'>Secretaría <i class='fa fa-unlock'></i></button>";
                                echo "</a></li>";
                            }
                            else if (isStudent() || isTeacher()) {
                                echo "<li><a href='index.php?controller=courseController&action=home'>";
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