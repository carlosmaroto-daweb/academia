<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón</title>
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
            
                <!-- Fullwidth Slider -->
                <div class="home-section fullwidth-slider bg-dark light-content" id="home">
                    
                    <!-- Slide Item -->
                    <section class="home-section bg-scroll bg-dark-alfa-50 light-content" data-background="view/assets/academia/img/full-width-images/section-bg-1.jpg">
                        <div class="container min-height-100vh d-flex align-items-center pt-100 pb-100">
                            
                            <!-- Hero Content -->
                            <div class="home-content">
                                <h1 class="hs-line-4 mb-30 mb-xs-20 wow fadeInUpShort" data-wow-delay=".1s">Calidad y formación desde 1994</h1>
                                <h2 class="hs-line-7 mb-60 mb-xs-40 wow fadeInUpShort" data-wow-delay=".2s">Dibujo Técnico Online</h2>
                                <div class="local-scroll mb-20 wow fadeInUpShort" data-wow-delay=".3s">
                                    <a href="index.php?controller=courseController&action=courses" class="btn btn-mod btn-yellow btn-medium btn-round mx-md-1">Ver Cursos</a>
                                </div>
                            </div>
                            <!-- End Hero Content -->
                            
                        </div>
                    </section>
                    <!-- End Slide Item -->
                    
                
                </div>
                <!-- End Fullwidth Slider -->
                
                
                <!-- Promo Section -->
                <section class="page-section">
                    <div class="container relative">
                        <div class="row">
                            
                            <!-- Text -->
                            <div class="col-lg-6 wow fadeInUpShort" data-wow-duration="1.2s" data-wow-offset="205">
                                
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h2 class="section-title mb-60 mb-sm-30">Sobre Nuestros Cursos</h2>
                                    </div>
                                </div>
                                
                                <!-- Features Grid -->
                                <div class="row alt-features-grid">
                                    
                                    <!-- Features Item -->
                                    <div class="col-lg-6">
                                        <div class="alt-features-item">
                                            <div class="alt-features-icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M22 9.74l-2 1.02v7.24c-1.007 2.041-5.606 3-8.5 3-3.175 0-7.389-.994-8.5-3v-7.796l-3-1.896 12-5.308 11 6.231v8.769l1 3h-3l1-3v-8.26zm-18 1.095v6.873c.958 1.28 4.217 2.292 7.5 2.292 2.894 0 6.589-.959 7.5-2.269v-6.462l-7.923 4.039-7.077-4.473zm-1.881-2.371l9.011 5.694 9.759-4.974-8.944-5.066-9.826 4.346z"/></svg>
                                            </div>
                                            <h3 class="alt-features-title">Excelencia Académica</h3>
                                            <div class="alt-features-descr">
                                                Ofrecemos cursos de dibujo técnico actualizados y detallados con materiales de alta calidad para mejorar la comprensión y dominio de las asignaturas.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Features Item -->
                                    
                                    <!-- Features Item -->
                                    <div class="col-lg-6">
                                        <div class="alt-features-item">
                                            <div class="alt-features-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                                    <path d="M5 22h4v-3h-9v-18h24v18h-10v3h4v1h-13v-1zm5-3v3h3v-3h-3zm13-17h-22v16h22v-16z"/>
                                                </svg>
                                            </div>
                                            <h3 class="alt-features-title">Accesibilidad y Flexibilidad</h3>
                                            <div class="alt-features-descr">
                                                Ofrecemos cursos accesibles en línea para estudiantes de todas partes, en cualquier momento y dispositivo.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Features Item -->
                                    
                                    <!-- Features Item -->
                                    <div class="col-lg-6">
                                        <div class="alt-features-item">
                                            <div class="alt-features-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                                    <path d="M6 3.447h-1v-1.447h19v16h-7.731l2.731 4h-1.311l-2.736-4h-1.953l-2.736 4h-1.264l2.732-4h-2.732v-1h8v-1h3v1h3v-14h-17v.447zm2.242 17.343c-.025.679-.576 1.21-1.256 1.21-.64 0-1.179-.497-1.254-1.156l-.406-4.034-.317 4.019c-.051.656-.604 1.171-1.257 1.171-.681 0-1.235-.531-1.262-1.21l-.262-6.456-.308.555c-.241.437-.8.638-1.265.459-.404-.156-.655-.538-.655-.951 0-.093.012-.188.039-.283l1.134-4.098c.17-.601.725-1.021 1.351-1.021h4.096c.511 0 1.012-.178 1.285-.33.723-.403 2.439-1.369 3.136-1.793.394-.243.949-.147 1.24.217.32.396.286.95-.074 1.297l-3.048 2.906c-.375.359-.595.849-.617 1.381-.061 1.397-.3 8.117-.3 8.117zm-5.718-10.795c-.18 0-.34.121-.389.294-.295 1.04-1.011 3.666-1.134 4.098l1.511-2.593c.172-.295.623-.18.636.158l.341 8.797c.01.278.5.287.523.002 0 0 .269-3.35.308-3.944.041-.599.449-1.017.992-1.017.547.002.968.415 1.029 1.004.036.349.327 3.419.385 3.938.043.378.505.326.517.022 0 0 .239-6.725.3-8.124.033-.791.362-1.523.925-2.061l3.045-2.904c-.661.492-2.393 1.468-3.121 1.873-.396.221-1.07.457-1.772.457h-4.096zm16.476 1.005h-5v-1h5v1zm2-2h-7v-1h7v1zm-15.727-4.994c-1.278 0-2.315 1.038-2.315 2.316 0 1.278 1.037 2.316 2.315 2.316s2.316-1.038 2.316-2.316c0-1.278-1.038-2.316-2.316-2.316zm0 1c.726 0 1.316.59 1.316 1.316 0 .726-.59 1.316-1.316 1.316-.725 0-1.315-.59-1.315-1.316 0-.726.59-1.316 1.315-1.316zm15.727 1.994h-7v-1h7v1z"/>
                                                </svg>
                                            </div>
                                            <h3 class="alt-features-title">Apoyo Integral</h3>
                                            <div class="alt-features-descr">
                                                Clases en vivo, tutorías individuales con profesores expertos para garantizar el éxito académico de cada estudiante.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Features Item -->
                                    
                                    <!-- Features Item -->
                                    <div class="col-lg-6">
                                        <div class="alt-features-item">
                                            <div class="alt-features-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                                                    <path d="M16 3.383l-.924-.383-7.297 17.617.924.383 7.297-17.617zm.287 3.617l6.153 4.825-6.173 5.175.678.737 7.055-5.912-7.048-5.578-.665.753zm-8.478 0l-6.249 4.825 6.003 5.175-.679.737-6.884-5.912 7.144-5.578.665.753z"/>
                                                </svg>
                                            </div>
                                            <h3 class="alt-features-title">Innovación Continua</h3>
                                            <div class="alt-features-descr">
                                                Nos actualizamos constantemente para liderar en educación en línea, adaptándonos a las cambiantes necesidades del dibujo técnico y los estudiantes.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Features Item -->
                                    
                                </div>
                                <!-- End Features Grid -->
                                
                            </div>
                            <!-- End Text -->
                            
                            <!-- Images --> 
                            <div class="col-lg-6">                                                               
                                <div class="call-action-3-images mt-xs-0 text-end">
                                    
                                    <div class="call-action-3-image-1">
                                        <img src="view/assets/academia/img/images/online-classes-1.jpg" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" data-wow-offset="205" />
                                    </div>
                                    
                                    <div class="call-action-3-image-2-wrap d-flex align-items-center">
                                        <div class="call-action-3-image-2">
                                            <img src="view/assets/academia/img/images/online-classes-2.jpg" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" />
                                        </div>
                                    </div>
                                    
                                </div>                                                                              
                            </div>
                            <!-- End Images -->
                            
                        </div>
                    </div>
                </section>
                <!-- End Promo Section -->
                
                
                <!-- Testimonials Section -->
                <section class="page-section bg-dark bg-dark-alfa-70 bg-scroll light-content" data-background="view/assets/academia/img/backgrounds/comments.webp">
                    <div class="container relative">
                        
                    <div class="row">
                        <div class=" col-lg-8 offset-lg-2 wow fadeInUpShort">
                            
                            <div class="text-center mb-50 mb-sm-20">
                                <h2 class="section-title">¿Qué opinan nuestros alumnos?</h2>
                            </div>
                            
                            <div class="text-slider">
                                
                                <!-- Slide Item -->
                                <div>
                                    <blockquote class="testimonial">
                                        <p>
                                            Es una academia magnífica, la organización extraordinaria y la atención un 10. El profesor, Juanma...🤔, un 1000. He aprendido muchísimo, y lo mejor, tengo muchas más ganas de seguir aprendiendo todo lo que pueda.  Garcías Academia Cartabón.
                                        </p>
                                        <footer class="testimonial-author mt-50 mt-sm-20">
                                            — Marisa, alumna de Oposiciones
                                        </footer>
                                    </blockquote>
                                </div>
                                <!-- End Slide Item -->
                                
                                <!-- Slide Item -->
                                <div>
                                    <blockquote class="testimonial">
                                        <p>
                                            No tuve dibujo técnico en Segundo de bachillerato y he conseguido sacarme la asignatura de Expresión Gráfica (ingeniería química) con buena nota. Recomendable 100% tanto on-line, como presencial.					
                                        </p>
                                        <footer class="testimonial-author mt-50 mt-sm-20">
                                            — Elena M, alumna UGR
                                        </footer>
                                    </blockquote>
                                </div>
                                <!-- End Slide Item -->
                                
                                <!-- Slide Item -->
                                <div>
                                    <blockquote class="testimonial">
                                        <p>
                                            Es una academia ONLINE que se ha sabido adaptar perfectamente a los tiempos que corren. Dan muchas facilidades de aprendizaje, el profesor explica muy bien y no se da por vencido, utiliza todas las herramientas a su alcance hasta que se entiende sobradamente el ejercicio, adaptándose al nivel de cada alumno/a. RECOMENDADO 🙂
                                        </p>
                                        <footer class="testimonial-author mt-50 mt-sm-20">
                                            — Óscar Sánchez, alumno UGR
                                        </footer>
                                    </blockquote>
                                </div>
                                <!-- End Slide Item -->
                                
                            </div>                            
                                                      
                        </div>
                    </div>
                        
                    </div>
                </section>
                <!-- End Testimonials Section -->
                
                
                <!-- Call Action Section -->
                <section class="page-section">
                    <div class="container relative">
                        <div class="row">
                            
                            <!-- Images --> 
                            <div class="col-lg-7 mb-md-60 mb-xs-30">                                                               
                                <div class="call-action-2-images">
                                    
                                    <div class="call-action-2-image-1">
                                        <img src="view/assets/academia/img/images/educational-level-3.jpg" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" data-wow-offset="255" />
                                    </div>
                                    
                                    <div class="call-action-2-image-2">
                                        <img src="view/assets/academia/img/images/educational-level-2.jpg" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" data-wow-offset="134" />
                                    </div>
                                    
                                    <div class="call-action-2-image-3">
                                        <img src="view/assets/academia/img/images/educational-level-1.jpg" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" data-wow-offset="0" />
                                    </div>
                                    
                                </div>                                                                              
                            </div>
                            <!-- End Images -->
                            
                            <!-- Text -->
                            <div class="col-lg-5 wow fadeInUpShort" data-wow-duration="1.2s" data-wow-offset="255">
                                
                                <h2 class="section-title mb-50 mb-sm-20">Niveles de Estudios Ofertados</h2>
                                
                                <dl class="call-action-2-text mb-60 mb-sm-30">
                                    <dt>
                                        1. Bachillerato
                                    </dt>
                                    <dd>
                                        Preparamos a estudiantes de bachillerato con cursos detallados que abarcan asignaturas clave para reforzar su comprensión, brindando la confianza necesaria para superar los exámenes con éxito.
                                    </dd>
                                    <dt>
                                        2. Universidad
                                    </dt>
                                    <dd>
                                        Ofrecemos cursos diseñados para estudiantes universitarios, abarcando desde materias fundamentales hasta especializadas, con el objetivo de complementar y fortalecer su educación en áreas clave de estudio.
                                    </dd>
                                    <dt>
                                        3. Oposiciones
                                    </dt>
                                    <dd>
                                        Ofrecemos cursos especializados en dibujo técnico para exámenes de oposiciones, con materiales expertos que se enfocan en los aspectos clave para destacar en estas pruebas.
                                    </dd>
                                </dl>
                                
                                <div class="local-scroll">
                                    <a href="index.php?controller=courseController&action=courses" class="btn btn-mod btn-large btn-round">Ver Cursos</a>
                                </div>
                                
                            </div>
                            <!-- End Text -->
                            
                        </div>
                    </div>
                </section>
                <!-- End Call Action Section -->
                
                
                <!-- Call Action Section -->
                <section class="page-section pt-0 pb-0 banner-section bg-dark light-content">
                    <div class="container relative">
                        
                        <div class="row">
                            
                            <div class="col-lg-6 relative">
                                <div class="banner-image-1">
                                    <img src="view/assets/academia/img/images/exclusive-service-2.png" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" data-wow-offset="292" />
                                </div>
                                <div class="banner-image-2">
                                    <img src="view/assets/academia/img/images/exclusive-service-1.png" alt="" class="wow scaleOutIn" data-wow-duration="1.2s" data-wow-offset="70" />
                                </div>
                            </div>
                            
                            <div class="col-lg-5 offset-lg-1">                                
                                <div class="mt-140 mt-lg-80 mt-md-60 mt-xs-30 mb-140 mb-lg-80">
                                    <div class="banner-content wow fadeInUpShort" data-wow-duration="1.2s">
                                        <h3 class="banner-heading">¿Estas buscando un servicio exclusivo?</h3>
                                        <div class="banner-decription">
                                            En nuestro catálogo de cursos encontrarás dibujo técnico a la carta para matricularte solo de lo que buscas.
                                        </div>
                                        <div class="local-scroll">
                                            <a href="index.php?controller=courseController&action=courses" class="btn btn-mod btn-w btn-large btn-round">Ver Cursos</a>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            
                        </div>
                        
                    </div>
                </section>
                <!-- End Call Action Section -->


                <!-- About Section -->
                <section class="page-section" id="about">
                    <div class="container relative">
                        
                        <div class="mb-120 mb-sm-50 mb-xs-20">
                            <div class="row section-text">
                            
                                <div class="col-md-12 col-lg-4 mb-md-50 mb-xs-30">
                                    <div class="lead-alt wow linesAnimIn" data-splitting="lines">
                                        Nuestra Oferta Educativa: Cursos, Módulos y Recursos Multimedia.
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-4 mb-sm-50 mb-xs-30 wow linesAnimIn" data-splitting="lines">
                                    La Academia Cartabón es una comunidad educativa en línea con una amplia base de alumnos. Ofrecemos una variedad de cursos para instituto, bachillerato y oposiciones, todos centrados en dibujo técnico. 
                                </div>
                                
                                <div class="col-md-6 col-lg-4 mb-sm-50 mb-xs-30 wow linesAnimIn" data-splitting="lines">
                                    Tenemos una extensa selección de cursos divididos en módulos que abarcan desde lo básico hasta niveles avanzados. Nuestra plataforma está repleta de recursos, incluyendo videos y PDFs, creados por expertos para ofrecer una comprensión profunda de cada tema.
                                </div>
                                
                            </div>
                        </div>
                        
                         <!-- Counters -->
                        <div class="count-wrapper">
                            <div class="row">
                                
                                <!-- Counter Item -->
                                <div class="col-md-6 col-lg-3 mb-md-30">
                                    <div class="count-item">
                                        <div class="count-bg wow scalexIn"></div>
                                        <div class="relative wow fadeIn" data-wow-delay="1s">
                                            <div class="count-number">
                                                456
                                            </div>
                                            <div class="count-descr">
                                                <i class="fa fa-user-graduate"></i>
                                                <span class="count-title">Alumnos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Counter Item -->
                                
                                <!-- Counter Item -->
                                <div class="col-md-6 col-lg-3 mb-md-30">
                                    <div class="count-item">
                                        <div class="count-bg wow scalexIn"></div>
                                        <div class="relative wow fadeIn" data-wow-delay="1.1s">
                                            <div class="count-number">
                                                83
                                            </div>
                                            <div class="count-descr">
                                                <i class="fa fa-briefcase"></i>
                                                <span class="count-title">Cursos Ofertados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Counter Item -->
                                
                                <!-- Counter Item -->
                                <div class="col-md-6 col-lg-3 mb-md-30">
                                    <div class="count-item">
                                        <div class="count-bg wow scalexIn"></div>
                                        <div class="relative wow fadeIn" data-wow-delay="1.2s">
                                            <div class="count-number">
                                                263
                                            </div>
                                            <div class="count-descr">
                                                <i class="fa fa-book-reader"></i>
                                                <span class="count-title">Módulos Disponibles</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Counter Item -->
                                
                                <!-- Counter Item -->
                                <div class="col-md-6 col-lg-3 mb-md-30">
                                    <div class="count-item">
                                        <div class="count-bg wow scalexIn"></div>
                                        <div class="relative wow fadeIn" data-wow-delay="1.3s">
                                            <div class="count-number">
                                                975
                                            </div>
                                            <div class="count-descr">
                                                <i class="fa fa-archive"></i>
                                                <span class="count-title">Recursos</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Counter Item -->
                                
                            </div>
                        </div>
                        <!-- End Counters -->
                                            
                    </div>
                </section>
                <!-- End About Section -->
            
                
                <!-- Newsletter Section -->
                <section class="small-section bg-dark bg-dark-alfa-70 bg-scroll bg-position-top light-content" data-background="view/assets/academia/img/backgrounds/newsletter.jpg">
                    <div class="container relative">
                        
                        <form id="mailchimp" class="form wow fadeInUpShort">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    
                                    <div class="newsletter-label d-flex mb-50 mb-sm-20">
                                        <div class="newsletter-label-icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M1.999 1v7.269l-2 1.456v13.275h24.001v-13.275l-2.001-1.453v-7.272h-20zm1 11.234v-10.234h18v10.233l-9 5.766-9-5.765zm19 .54v-3.17l1.001.764v11.632h-22.001v-11.641l1-.707.063 3.134 9.937 6.413 10-6.425zm-14.305-6.752l-2.694.496 1.888 1.986-.361 2.716 2.472-1.182 2.473 1.182-.361-2.716 1.888-1.986-2.695-.496-1.305-2.41-1.305 2.41zm.248 2.139l-.945-.994 1.349-.249.653-1.206.654 1.206 1.349.249-.945.994.18 1.36-1.238-.591-1.238.591.181-1.36zm6.058-3.078h4.999v-1h-4.999v1zm0 2h4.999v-1h-4.999v1zm0 2h4.999v-1h-4.999v1zm0 2h3v-1h-3v1z"/></svg>
                                        </div>
                                        <h2 class="newsletter-label-text">
                                            Mantente informado con&nbsp;nuestro boletín
                                        </h2>
                                    </div>
                                    
                                    <div class="d-sm-flex justify-content-between mb-20">
                                        <input placeholder="Tu correo" class="newsletter-field input-lg round" type="email" pattern=".{5,100}" required aria-required="true">
                                        <button type="submit" aria-controls="subscribe-result" class="newsletter-button btn btn-mod btn-w btn-large btn-round">
                                            Suscríbete ahora
                                        </button>
                                    </div>
                                    
                                    <div class="form-tip">
                                        <a href="#">Términos y Condiciones</a>.
                                    </div>
                                    
                                    <div id="subscribe-result" role="region" aria-live="polite" aria-atomic="true"></div>
                                    
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </section>
                <!-- End Newsletter Section -->

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