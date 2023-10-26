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
        
        <!-- Subheader Area
        ===================================== -->
        <header class="bg-grad-stellar mt70">

            <div class="container">
                <div class="row mt20 mb30">
                    <div class="col-md-6 text-left">
                        <h3 class="color-light text-uppercase animated" data-animation="fadeInUp" data-animation-delay="100">Blog Posts<small class="color-light alpha7">some notes.</small></h3>
                    </div>
                    <div class="col-md-6 text-right pt35">
                        <ul class="breadcrumb">
                            <li><a href="blog-posts-three-left-sb-2col.html#">Home</a></li>
                            <li><a href="blog-posts-three-left-sb-2col.html#">Blog Page</a></li>
                            <li>Blog Post</li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>
        
        
        <!-- Blog Area
        ===================================== -->
        <div id="blog" class="pt20 pb50">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-9 col-md-push-3 mt25">
                        <div class="row">
                            


                        
                        </div>
                        
                        <!-- Blog Paging
                        ===================================== -->
                        <div class="row animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="col-md-12 text-left">
                                <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-square button-gray">Prev</a>
                                <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-square button-gray">1</a>
                                <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-square button-pasific">2</a>
                                <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-square button-gray">3</a>
                                <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-square button-gray">4</a>
                                <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-square button-gray">Next</a>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <!-- Blog Sidebar
                    ===================================== --> 
                    <div id="sidebar" class="col-md-3 col-md-pull-9 mt50 animated" data-animation="fadeInRight" data-animation-delay="250">           
                        
                        
                        <!-- Search
                        ===================================== -->
                        <div class="pr25 clearfix"> 
                            <form action="#">
                                <div class="blog-sidebar-form-search">
                                    <input type="text" name="search" class="" placeholder="e.g. Javascript">
                                    <button type="submit" name="submit" class="pull-right"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                           
                        </div>
                        
                        
                        <!-- Categories
                        ===================================== -->
                        <div class="mt25 pr25 clearfix">
                            <h5 class="mt25">
                                Categories
                                <span class="heading-divider mt10"></span>
                            </h5>                            
                            <ul class="shop-sidebar pl25">
                                <li class="active"><a href="blog-posts-three-left-sb-2col.html#">Fashion<span class="badge badge-pasific pull-right">14</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Sport<span class="badge badge-pasific pull-right">125</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Electronic<span class="badge badge-pasific pull-right">350</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Jewellery<span class="badge badge-pasific pull-right">520</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Food<span class="badge badge-pasific pull-right">1,290</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Furniture<span class="badge badge-pasific pull-right">7</span></a></li>
                            </ul>
                           
                        </div>
                        
                        
                        <!-- Tags
                        ===================================== -->
                        <div class="pr25 clearfix">
                            <h5 class="mt25">
                                Popular Tags
                                <span class="heading-divider mt10"></span>
                            </h5>
                            <ul class="tag">
                                <li><a href="blog-posts-three-left-sb-2col.html#">Jacket</a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Accesories</a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Jewelley</a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">iWatch</a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">iPad</a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Macbook</a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">Apple</a></li>
                            </ul>
                           
                        </div>
                        
                        
                        <!-- Popular Products
                        ===================================== -->
                        <div class="mt25 pr25 clearfix">
                            <h5 class="mt25">
                                Popular Post
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <div class="blog-sidebar-popular-post-container">
                                <img src="view/assets/img/blog/img-blog-1.jpg" alt="" class="img-responsive pull-left">
                                <h6><a href="blog-posts-three-left-sb-2col.html#">Lorem Ipsum Dolor</a></h6>
                                <span class="text-gray">Jan 24th, 2016</span>
                            </div>
                            
                            <div class="blog-sidebar-popular-post-container">
                                <img src="view/assets/img/blog/img-blog-3.jpg" alt="" class="img-responsive pull-left">
                                <h6><a href="blog-posts-three-left-sb-2col.html#">nisi ut aliquip</a></h6>
                                <span class="text-gray">Jan 24th, 2016</span>
                            </div>
                            
                            <div class="blog-sidebar-popular-post-container">
                                <img src="view/assets/img/blog/img-blog-2.jpg" alt="" class="img-responsive pull-left">
                                <h6><a href="blog-posts-three-left-sb-2col.html#">tempor incididunt</a></h6>
                                <span class="text-gray">Jan 24th, 2016</span>
                            </div>
                                
                        </div>
                        
                        
                        <!-- Archieve
                        ===================================== -->
                        <div class="mt25 pr25 clearfix">
                            <h5 class="mt25">
                                Archieve
                                <span class="heading-divider mt10"></span>
                            </h5>                            
                            <ul class="shop-sidebar pl25">
                                <li class="active"><a href="blog-posts-three-left-sb-2col.html#">January<span class="badge badge-pasific pull-right">14</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">February<span class="badge badge-pasific pull-right">125</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">March<span class="badge badge-pasific pull-right">350</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">April<span class="badge badge-pasific pull-right">520</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">May<span class="badge badge-pasific pull-right">1,290</span></a></li>
                                <li><a href="blog-posts-three-left-sb-2col.html#">June<span class="badge badge-pasific pull-right">7</span></a></li>
                            </ul>
                           
                        </div>
                        
                        
                         <!-- Facebook Plugin
                        ===================================== -->
                        <div class="mt75 pr25 clearfix">
                           <div id="fb-root"></div>
                            <script>
                                (function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }
                                 (document, 'script', 'facebook-jssdk'));
                            </script>
                            
                            <div class="fb-page" data-href="https://www.facebook.com/myboodesign.studio" data-tabs="timeline" data-width="350" data-height="210" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/myboodesign.studio"><a href="https://www.facebook.com/myboodesign.studio">Myboodesign Studio</a></blockquote></div></div>
                            
                        </div>
                                                
                        
                    </div>                   
                    
                </div>                
            </div>
        </div>
         
        
        <!-- Newsletter Area
        =====================================-->
        <div id="newsletter" class="bg-dark2 pt50 pb50">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-2">
                        <h4 class="color-light">
                            Newsletter
                        </h4>
                    </div>
                    
                    <div class="col-md-10">
                        <form name="newsletter">
                            <div class="input-newsletter-container">
                                <input type="text" name="email" class="input-newsletter" placeholder="enter your email address">
                            </div>
                            <a href="blog-posts-three-left-sb-2col.html#" class="button button-sm button-pasific hover-ripple-out">Subscribe<i class="fa fa-envelope"></i></a>
                        </form>
                    </div>
                </div>
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