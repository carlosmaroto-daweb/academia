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
        
        <!-- CSS
        ===================================== -->
        <?php require_once "view/include/style.php"?>
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
        
        <!-- Nav
        ===================================== -->
        <?php require_once "view/include/nav.php"?>
        
        <div class="mt100 mb100">
            <div id="formLogin" class="inner cover text-center animated mb35" data-animation="fadeIn" data-animation-delay="100">
                <br>
                <h3 class="font-montserrat cover-heading mb20 mt100">Inicio sesión</h3>
                <form class="clearfix">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input id="login-email" type="email" name="email" class="form-control text-center no-border input-lg input-circle bg-gray2" placeholder="Correo">
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt10">
                        <input id="login-password" type="password" name="password" class="form-control text-center no-border input-lg input-circle bg-gray2" placeholder="Contraseña">
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt5">
                        <button id="btn-login" class="button button-lg button-circle button-block button-pasific hover-ripple-out">Iniciar</button><br>
                        <div class="mt20" id="showFormRegister">¿No tienes cuenta? Regístrate</div>
                    </div>
                </form>
                <br>
            </div>
        
            <div id="formRegister" class="inner cover text-center hidden animated mb35" data-animation="fadeIn" data-animation-delay="100">
                <br>
                <h3 class="font-montserrat cover-heading mb20 mt100">Crear cuenta</h3>
                <form class="clearfix">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input id="register-email" type="email" name="email" class="form-control text-center no-border input-lg input-circle bg-gray2" placeholder="Correo">
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt10">
                        <input id="register-password" type="password" name="password" class="form-control text-center no-border input-lg input-circle bg-gray2" placeholder="Contraseña">
                    </div>
                    <div class="col-sm-8 col-sm-offset-2 mt5">
                        <button id="btn-register" class="button button-lg button-circle button-block button-pasific hover-ripple-out">Regístrate</button><br>
                        <div class="mt20" id="showFormLogin">¿Tienes una cuenta? Inicia sesión</div>
                    </div>
                </form>
                <br>
            </div>
        </div>

        <!-- Footer
        ===================================== -->
        <?php require_once 'view/include/footer.php';?>
        
        <!-- JS
        ===================================== -->
        <?php require_once "view/include/script.php"?>
    </body>
</html>