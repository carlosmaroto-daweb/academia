<div class="container pt70">
    <h4 class="text-center mt100 mb10">Creación del Módulo</h4>
    <form id="module-create-form">
        Nombre: <span class="color-pasific">(*)</span>
        <br>
        <input id="module-create-name" type="text" name="email">
        <br>
        <br>
        Estudios: <span class="color-pasific">(*)</span>
        <br>
        <div id="module-create-studies">
            <div class="row-studies">
                <input class="name-studies" placeholder="Nombre" type="text" name="name">
                <input class="location-studies"  placeholder="Ubicación"  type="text" name="location">
                <select class="type-studies">
                    <option value="oppositions">Oposiciones</option>
                    <option value="university">Univerdidad</option>
                    <option value="institute">Instituto</option>
                </select>
                <a class="delete-module-create-studies button-3d button-xs button-circle button-danger"><i class='fa fa-close'></i></a>
            </div>
        </div>
        <a id="add-module-create-studies" class="button-3d button-xs button-circle button-success"><i class='fa fa-plus'></i></a>
        <br>
        <br>
        Foto de cabecera: <span class="color-pasific">(*)</span>
        <br>
        <input type="file" id="header_module" name="profile_pic" accept=".jpg, .jpeg, .png" />
        <br>
        <br>
        Contenido previsualización: <span class="color-pasific">(*)</span>
        <br>
        <textarea id="w3review" name="w3review" rows="5" cols="50"></textarea>
        <br>
        <br>
        Contenido:
        <br>
        <div id="summernote"></div>
    </form>
        <div class="container mb100">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="color-light text-capitalize font-open-sans">
                        <a  href="index.php?controller=courseController&action=secretary" class="button-3d button-md button-rounded button-danger">Cancelar</a>
                        <a id="create-module" class="button-3d button-md button-rounded button-success">Guardar</a>
                    </h3>
                </div>
            </div>
        </div>
</div>