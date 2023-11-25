<!-- Navigation panel -->
<nav class="main-nav dark transparent stick-fixed wow-menubar">
    <div class="full-wrapper relative clearfix">
        
        <!-- Logo -->
        <div class="nav-logo-wrap local-scroll">
            <a href="index.php" class="nav-logo">
                <div class="logo">
                    <img src="view/assets/academia/img/logo.png" alt="Academia Cartabón" width="188" height="37" />
                </div>
                <h3>Academia Cartabón</h3>
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
                <li>
                    <a href="index.php" <?php if($_SERVER["REQUEST_URI"] == '/index.php') echo "class='active'"; ?>>Inicio</a>
                </li>
                <li>
                    <a href="index.php?controller=courseController&action=courses" <?php if(str_contains($_SERVER["REQUEST_URI"], 'courses')) echo "class='active'"; ?>>Cursos</a>
                </li>
                <li>
                    <a href="index.php?controller=pageController&action=contact" <?php if(str_contains($_SERVER["REQUEST_URI"], 'contact')) echo "class='active'"; ?>>Contacto</a>
                </li>
                <?php
                    if (!hasLoggedIn()) {
                        echo "<li>";
                            if (str_contains($_SERVER["REQUEST_URI"], 'home')) {
                                echo "<a href='index.php?controller=userController&action=home' class='active'>Mi área <i class='fa fa-lock'></i></a>";
                            }
                            else {
                                echo "<a href='index.php?controller=userController&action=home'>Mi área <i class='fa fa-lock'></i></a>";
                            }
                        echo "</li>";
                    }
                    else {
                        echo "<li>";
                            if (str_contains($_SERVER["REQUEST_URI"], 'home')) {
                                echo "<a href='index.php?controller=courseController&action=home' class='active'>Mi área <i class='fa fa-unlock-alt'></i></a>";
                            }
                            else {
                                echo "<a href='index.php?controller=courseController&action=home'>Mi área <i class='fa fa-unlock-alt'></i></a>";
                            }
                        echo "</li>";
                        if (isSecretary() || isAdmin()) {
                            echo "<li>";
                                if (str_contains($_SERVER["REQUEST_URI"], 'secretary')) {
                                    echo "<a href='index.php?controller=courseController&action=secretary' class='active'>Secretaría <i class='fa fa-unlock-alt'></i></a>";
                                }
                                else {
                                    echo "<a href='index.php?controller=courseController&action=secretary'>Secretaría <i class='fa fa-unlock-alt'></i></a>";
                                }
                            echo "</li>";
                        }
                        if (isAdmin()) {
                            echo "<li>";
                                if (str_contains($_SERVER["REQUEST_URI"], 'admin')) {
                                    echo "<a href='index.php?controller=userController&action=admin' class='active'>Administración <i class='fa fa-unlock-alt'></i></a>";
                                }
                                else {
                                    echo "<a href='index.php?controller=userController&action=admin'>Administración <i class='fa fa-unlock-alt'></i></a>";
                                }
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