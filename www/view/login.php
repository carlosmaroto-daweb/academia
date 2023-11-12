<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Acceso</title>
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
                <section class="page-section bg-dark-alfa-50 bg-scroll" data-background="view/assets/images/full-width-images/section-bg-19.jpg" id="home">
                    <div class="container relative">
                    
                        <div class="row">
                            
                            <div class="col-md-8">
                                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                    <h1 class="hs-line-7 mb-20 mb-xs-10">Acceso</h1>
                                </div>
                                <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                    <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                        Únete a nuestra comunidad para acceder a recursos gratuitos
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                                <div class="mod-breadcrumbs text-end">
                                    <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Acceso</span>
                                </div>                                
                            </div>
                            
                        </div>
                    
                    </div>
                </section>
                <!-- End Home Section -->
                
                
                <!-- Section -->
                <section class="page-section">
                    <div class="container">
                        
                        <!-- Nav Tabs -->
                        <div class="align-center mb-70 mb-xxs-50 wow fadeInUpShort">
                            <ul class="nav nav-tabs tpl-minimal-tabs animate" id="myTab-account" role="tablist">
                                
                                <li class="nav-item" role="presentation">
                                    <a href="#account-login" class="nav-link active" id="account-login-tab" data-bs-toggle="tab"  role="tab" aria-controls="account-login" aria-selected="true">Inicio sesión</a>
                                </li>
                                
                                <li class="nav-item" role="presentation">
                                    <a href="#account-registration" class="nav-link" id="account-registration-tab" data-bs-toggle="tab" role="tab" aria-controls="account-registration" aria-selected="false">Crear cuenta</a>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- End Nav Tabs -->
						
                        <!-- Tab panes -->
                        <div class="tab-content tpl-minimal-tabs-cont section-text wow fadeInUpShort" id="myTabContent-1">
                            
                            <div class="tab-pane fade show active" id="account-login" role="tabpanel" aria-labelledby="account-login-tab">
                                
                                <!-- Login Form -->                            
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        
                                        <form id="formLogin" class="form contact-form">
                                            <div class="clearfix">
                                                
                                                <!-- Email -->
                                                <div class="form-group">
                                                    <label for="login-email">Correo <span class="required-field-color">(*)</span></label>
                                                    <input type="email" name="email" id="login-email" class="input-lg round form-control" placeholder="Introduce tu correo">
                                                </div>
                                                
                                                <!-- Password -->
                                                <div class="form-group">
                                                    <label for="login-password">Contraseña <span class="required-field-color">(*)</span></label>
                                                    <input type="password" name="password" id="login-password" class="input-lg round form-control" placeholder="Introduce tu contraseña">
                                                </div>
                                                    
                                            </div>
                                            
                                            <div class="clearfix">
                                                
                                                <div class="cf-left-col">
                                                    
                                                    <!-- Inform Tip -->                                        
                                                    <div class="form-tip pt-20">
                                                        <a href="">¿Olvidaste la contraseña?</a>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="cf-right-col">
                                                    
                                                    <!-- Send Button -->
                                                    <div class="text-end pt-10">
                                                        <button class="btn btn-mod btn-large btn-round" id="btn-login">Iniciar</button>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                                <!-- End Login Form -->
                                
                            </div>
                            
                            <div class="tab-pane fade" id="account-registration" role="tabpanel" aria-labelledby="account-registration-tab">
                            
                                <!-- Registry Form -->                            
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        
                                        <form id="formRegister" class="form contact-form">
                                            <div class="clearfix">
                                                
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <label for="register-name">Nombre <span class="required-field-color">(*)</span></label>
                                                    <input type="text" name="name" id="register-name" class="input-lg round form-control" placeholder="Introduce tu nombre">
                                                </div>
                                                
                                                <!-- Last Name -->
                                                <div class="form-group">
                                                    <label for="register-last-name">Apellidos <span class="required-field-color">(*)</span></label>
                                                    <input type="text" name="last-name" id="register-last-name" class="input-lg round form-control" placeholder="Introduce tus apellidos">
                                                </div>
                                                
                                                <!-- Email -->
                                                <div class="form-group">
                                                    <label for="register-email">Correo <span class="required-field-color">(*)</span></label>
                                                    <input type="email" name="email" id="register-email" class="input-lg round form-control" placeholder="Introduce tu correo">
                                                </div>
                                                
                                                <!-- Password -->
                                                <div class="form-group">
                                                    <label for="register-password">Contraseña <span class="required-field-color">(*)</span></label>
                                                    <input type="password" name="password" id="register-password" class="input-lg round form-control" placeholder="Introduce tu contraseña">
                                                </div>
                                                    
                                            </div>
                                            
                                            <!-- Send Button -->
                                            <div class="pt-10">
                                                <button class="btn btn-mod btn-large btn-round btn-full" id="btn-register">Regístrate</button>
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                </div>
                                <!-- End Registry Form -->
                            
                            </div>
                            
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