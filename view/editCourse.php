<div class="container pt70">
    <h4 class="text-center mt100 mb10">Creación del Curso</h4>
    <form id="course-create-form">
        Nombre: <span class="color-pasific">(*)</span>
        <br>
        <input id="course-create-name" type="text" name="email">
        <br>
        <br>
        Estudios: <span class="color-pasific">(*)</span>
        <br>
        <div id="course-create-studies">
            <div class="row-studies">
                <input class="name-studies" placeholder="Nombre" type="text" name="name">
                <input class="location-studies"  placeholder="Ubicación"  type="text" name="location">
                <select class="type-studies">
                    <option value="oppositions">Oposiciones</option>
                    <option value="university">Univerdidad</option>
                    <option value="institute">Instituto</option>
                </select>
            </div>
        </div>
        <br>
        <br>
        Foto de cabecera: <span class="color-pasific">(*)</span>
        <br>
        <input type="file" id="header_image" name="header_image" accept=".jpg, .jpeg, .png" />
        <img id="header_image_preview">
        <br>
        <br>
        Contenido previsualización: <span class="color-pasific">(*)</span>
        <br>
        <div id="preview"></div>
        <br>
        <br>
        Contenido: <span class="color-pasific">(*)</span>
        <br>
        <div id="content"></div>
        <?php
            echo "<br>";
            echo "<br>";
            echo "Fecha inicio: <span class='color-pasific'>(*)</span>";
            echo "<br>";
            $date = getdate();
            $year = $date['year'];
            $mon = str_pad($date['mon'], 2, "0", STR_PAD_LEFT);
            $day = str_pad($date['mday'], 2, "0", STR_PAD_LEFT);
            echo "<input type='date' id='start' name='trip-start' value='{$year}-{$mon}-{$day}' />";
            echo "<br>";
            echo "<br>";
            echo "Fecha fin: <span class='color-pasific'>(*)</span>";
            echo "<br>";
            $date = getdate();
            $year = $date['year'];
            $mon = str_pad($date['mon'], 2, "0", STR_PAD_LEFT);
            $day = str_pad($date['mday'], 2, "0", STR_PAD_LEFT);
            echo "<input type='date' id='start' name='trip-start' value='{$year}-{$mon}-{$day}' />";
            echo "<br>";
            echo "<br>";
            echo "Módulos: <span class='color-pasific'>(*)</span> (en caso de precio 0 el acceso es gratuito solo a los registrados)";
            echo "<br>";
            echo "<div class='row-modules'>";
                echo "<input class='price-modules' placeholder='Pago único' type='text' name='name'>";
            echo "</div>";
            echo "<div id='course-create-modules'>";
                echo "<div class='row-modules'>";
                    echo "<select id='select-modules' class='modules'>";
                        echo "<option value='modulo_1'>Modulo 1</option>";
                        echo "<option value='modulo_2'>Modulo 2</option>";
                        echo "<option value='modulo_3'>Modulo 3</option>";
                    echo "</select>";
                    echo "<input class='price-modules' placeholder='Precio' type='text' name='name'>";
                echo "</div>";
            echo "</div>";
            echo "<a id='add-course-create-modules' class='button-3d button-xs button-circle button-success'><i class='fa fa-plus'></i></a>";
            echo "<br>";
            echo "<br>";
            echo "Alumnos: <span class='color-pasific'>(*)</span>";
            echo "<br>";
            echo "<select class='alumn' multiple>";
                echo "<option value='modulo_1'>Alumn 1</option>";
                echo "<option value='modulo_2'>Alumn 2</option>";
                echo "<option value='modulo_3'>Alumn 3</option>";
            echo "</select>";
            echo "<br>";
            echo "<br>";
            echo "Profesores: <span class='color-pasific'>(*)</span>";
            echo "<br>";
            echo "<select class='alumn' multiple>";
                echo "<option value='modulo_1'>Teacher 1</option>";
                echo "<option value='modulo_2'>Teacher 2</option>";
                echo "<option value='modulo_3'>Teacher 3</option>";
            echo "</select>";
        ?>
    </form>
        <div class="container mb100">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="color-light text-capitalize font-open-sans">
                        <a  href="index.php?controller=courseController&action=secretary" class="button-3d button-md button-rounded button-danger">Cancelar</a>
                        <a id="create-course" class="button-3d button-md button-rounded button-success">Guardar</a>
                    </h3>
                </div>
            </div>
        </div>
</div>