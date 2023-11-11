<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Contacto</title>
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
            
            <!-- Home Section -->
            <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="view/assets/images/full-width-images/section-bg-19.jpg" id="home">
                <div class="container relative pt-70">
                
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Contacto</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    Cuentanos en qué podemos ayudarte
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Contacto</span>
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->
            
            <!-- Contact Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <div class="row mb-60 mb-xs-40">
                        
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                
                                <!-- Phone -->
                                <div class="col-sm-6 col-lg-4 pb-20">
                                    <div class="contact-item wow fadeScaleIn" data-wow-delay="0" data-wow-duration="1s">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone-alt"></i>
                                        </div>
                                        <div class="ci-title">
                                            Call Us
                                        </div>
                                        <div class="ci-text">
                                            +61 383 767 284
                                        </div>
                                    </div>
                                </div>
                                <!-- End Phone -->
                                
                                <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pb-20">
                                    <div class="contact-item wow fadeScaleIn" data-wow-delay=".1s" data-wow-duration="1s">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker-alt"></i>
                                        </div>
                                        <div class="ci-title">
                                            Address
                                        </div>
                                        <div class="ci-text">
                                            245 Quigley Blvd, Ste K
                                        </div>
                                        <div class="ci-link">
                                            <a href="https://goo.gl/maps/7Vw1PBhxx5BaXStr8" target="_blank">See on the Map</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->
                                
                                <!-- Email -->
                                <div class="col-sm-6 col-lg-4 pb-20">
                                    <div class="contact-item wow fadeScaleIn" data-wow-delay=".2s" data-wow-duration="1s">
                                        <div class="ci-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="ci-title">
                                            Email
                                        </div>
                                        <div class="ci-text">
                                            support@bestlooker.pro
                                        </div>
                                        <div class="ci-link">
                                            <a href="mailto:support@bestlooker.pro">Say Hello</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Email -->
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Contact Form -->                            
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            
                            <form class="form contact-form wow fadeInUpShort" id="contact_form">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="input-lg round form-control" placeholder="Enter your name" pattern=".{3,100}" required aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="input-lg round form-control" placeholder="Enter your email" pattern=".{5,100}" required aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Message -->
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" class="input-lg round form-control" style="height: 130px;" placeholder="Enter your message"></textarea>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Inform Tip -->
                                        <div class="form-tip pt-20 pt-sm-0 mb-sm-20">
                                            All the fields are required
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Send Button -->
                                        <div class="text-end pt-10">
                                            <button class="submit_btn btn btn-mod btn-large btn-round" id="submit_btn" aria-controls="result">
                                                Submit Message
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="result" role="region" aria-live="polite" aria-atomic="true"></div>
                                
                            </form>
                            
                        </div>
                    </div>
                    <!-- End Contact Form -->
                    
                </div>
            </section>
            <!-- End Contact Section -->
                
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