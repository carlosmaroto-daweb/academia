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
        
        <?php
            $id    = "";
            $name  = "";
            $files = "";
            if ($dataToView) {
                $id    = $dataToView->getId();
                $name  = $dataToView->getName();
                $files = $dataToView->getFiles();
            }
            echo "<div class='container pt70'>";
                echo "<h4 class='text-center mt100 mb10'>Creación de la Lección</h4>";
                echo "<form id='lesson-edit-form'>";
                    echo "<input id='lesson-edit-id' type='hidden' name='id' value='{$id}'>";
                    echo "Nombre: <span class='color-pasific'>(*)</span>";
                    echo "<br>";
                    echo "<input id='lesson-edit-name' type='text' name='name' value='{$name}'>";
                    echo "<br>";
                    echo "<br>";
                    echo "Archivos: <span class='color-pasific'>(*)</span>";
                    echo "<br>";
                    echo "<div id='lesson-edit-files'>";
                        echo "<div class='row-files-complete'>";
                            echo "<div class='row-files'>";
                                echo "<input placeholder='Título' type='text' name='title'>";
                                echo "<input type='file' name='file' class='file'>";
                            echo "</div>";
                            echo "<div class='file-type-preview'>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<a id='add-lesson-edit-files' class='button-3d button-xs button-circle button-success'><i class='fa fa-plus'></i></a>";
                echo "</form>";
                echo "<div class='container mb100'>";
                    echo "<div class='row'>";
                        echo "<div class='col-md-12 text-center'>";
                            echo "<h3 class='color-light text-capitalize font-open-sans'>";
                                echo "<a href='index.php?controller=courseController&action=secretary' class='button-3d button-md button-rounded button-danger'>Cancelar</a>&nbsp;";
                                echo "<a id='edit-lessons' class='button-3d button-md button-rounded button-success'>Guardar</a>";
                            echo "</h3>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        ?>        

        <!-- Footer
        ===================================== -->
        <?php require_once 'view/include/footer.php';?>
        
        <!-- JS
        ===================================== -->
        <?php require_once "view/include/script.php"?>
    </body>
</html>