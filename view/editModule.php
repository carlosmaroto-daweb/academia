<div class="container pt70">
    <h4 class="text-center mt100 mb10">Creación del Módulo</h4>
    <form id="module-create-form">
        Nombre: <span class="color-pasific">(*)</span>
        <br>
        <input id="module-create-name" type="text" name="email">
        <br>
        <br>
        Foto de cabecera: <span class="color-pasific">(*)</span>
        <br>
        <input type="file" id="header_image" name="header_image" accept=".jpg, .jpeg, .png" />
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