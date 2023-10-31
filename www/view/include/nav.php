<!-- Navigation panel -->
<nav class="main-nav dark transparent stick-fixed wow-menubar">
    <div class="full-wrapper relative clearfix">
        
        <!-- Logo ( * your text or image into link tag *) -->
        <div class="nav-logo-wrap local-scroll">
            <a href="index.php" class="logo">
                <img src="view/assets/images/logo-white.png" alt="Company logo" width="188" height="37" />
            </a>
        </div>
        
        <!-- Mobile Menu Button -->
        <div class="mobile-nav" role="button" tabindex="0">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Menu</span>
        </div>
        
        <!-- Main Menu -->
        <div class="inner-nav desktop-nav">
            <ul class="clearlist">
                
                <!-- Item With Sub -->
                <li>
                    <a href="index.php" class="active">Inicio</a>
                </li>
                <!-- End Item With Sub -->
                
                <!-- Item With Sub -->
                <li>
                    <a href="index.php?controller=courseController&action=index">Cursos</a>
                </li>
                <!-- End Item With Sub -->
                
                <?php
                    if (!hasLoggedIn()) {
                        echo "<li>";
                            echo "<a href='index.php?controller=userController&action=home'>Mi área <i class='fa fa-lock'></i></a>";
                        echo "</li>";
                    }
                    else {
                        echo "<li>";
                            echo "<a href='index.php?controller=courseController&action=home'>Mi área</a>";
                        echo "</li>";
                        if (isSecretary() || isAdmin()) {
                            echo "<li>";
                                echo "<a href='index.php?controller=courseController&action=secretary'>Secretaría <i class='fa fa-unlock-alt'></i></a>";
                            echo "</li>";
                        }
                        if (isAdmin()) {
                            echo "<li>";
                                echo "<a href='index.php?controller=userController&action=admin'>Administración <i class='fa fa-unlock-alt'></i></a>";
                            echo "</li>";
                        }
                        echo "<li>";
                            echo "<a href='index.php?controller=userController&action=logout'>Cerrar sesión <i class='fa fa-sign-out-alt'></i></a>";
                        echo "</li>";
                    }
                ?>
                
            </ul>
        </div>
        <!-- End Main Menu -->
        
    </div>
</nav>
<!-- End Navigation panel -->