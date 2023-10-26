        <!-- JQuery Core
        =====================================-->
        <script src="view/assets/js/core/jquery.min.js"></script>
        <script src="view/assets/js/core/bootstrap-3.3.7.min.js"></script>

        <!-- JQuery Main
        =====================================-->
        <script src="view/assets/academia/js/index.js"></script>
        <script src="view/assets/js/main/jquery.appear.js"></script>
        <script src="view/assets/js/main/isotope.pkgd.min.js"></script>
        <script src="view/assets/js/main/parallax.min.js"></script>
        <script src="view/assets/js/main/jquery.countTo.js"></script>
        <script src="view/assets/js/main/owl.carousel.min.js"></script>
        <script src="view/assets/js/main/jquery.sticky.js"></script>
        <script src="view/assets/js/main/ion.rangeSlider.min.js"></script>
        <script src="view/assets/js/main/imagesloaded.pkgd.min.js"></script>
        <script src="view/assets/js/main/main.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script src="view/assets/academia/js/html2canvas.js" type="text/javascript"></script> 
    
        <!-- Custom Script
        =====================================-->
        <script>
            $(function(){
                "use strict";
                $("#showFormRegister").on('click',function(){
                    $("#formLogin").addClass("hidden");
                    $("#formRegister").removeClass("hidden");
                });
                $("#showFormLogin").on('click',function(){
                    $("#formLogin").removeClass("hidden");
                    $("#formRegister").addClass("hidden");
                })
            })
        </script>