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
        
        <?php require_once "view/include/header.php"
        
        $id           = "";
        $name         = "";
        $header_image = "";
        $preview      = "";
        $content      = "";
        if ($dataToView) {
            $id           = $dataToView->getId();
            $name         = $dataToView->getName();
            $header_image = $dataToView->getHeaderImage();
            $preview      = $dataToView->getPreview();
            $content      = $dataToView->getContent();
        }
        echo "<div class='container pt70'>";
            echo "<h4 class='text-center mt100 mb10'>Creación del Módulo</h4>";
            echo "<form id='module-edit-form'>";
                echo "<input id='module-edit-id' type='hidden' name='id' value='{$id}'>";
                echo "Nombre: <span class='color-pasific'>(*)</span>";
                echo "<br>";
                echo "<input id='module-edit-name' type='text' name='name' value='{$name}'>";
                echo "<br>";
                echo "<br>";
                echo "Foto de cabecera: <span class='color-pasific'>(*)</span>";
                echo "<br>";
                echo "<input type='file' id='header_image' name='header_image' accept='.jpg, .jpeg, .png' />";
                echo "<img id='header_image_preview' src='{$header_image}'>";
                echo "<br>";
                echo "<br>";
                echo "Contenido previsualización: <span class='color-pasific'>(*)</span>";
                echo "<br>";
                echo "<div id='preview'>{$preview}</div>";
                echo "<br>";
                echo "<br>";
                echo "Contenido: <span class='color-pasific'>(*)</span>";
                echo "<br>";
                echo "<div id='content'>{$content}</div>";
            echo "</form>";
            echo "<div class='container mb100'>";
                echo "<div class='row'>";
                    echo "<div class='col-md-12 text-center'>";
                        echo "<h3 class='color-light text-capitalize font-open-sans'>";
                            echo "<a href='index.php?controller=courseController&action=secretary' class='button-3d button-md button-rounded button-danger'>Cancelar</a>&nbsp;";
                            echo "<a id='edit-module' class='button-3d button-md button-rounded button-success'>Guardar</a>";
                        echo "</h3>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
        
        require_once 'view/include/footer.php';
    ?>