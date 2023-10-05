<div class="container pt70">
    <h4 class="text-center mt100 mb10">Creación del Módulo</h4>
    <form id="module-create-form" class="mb100">
        Nombre <span class="color-pasific">(*)</span>
        <br>
        <input id="subject-create-name" type="text" name="email">
        <br>
        <br>
        Estudios <span class="color-pasific">(*)</span>
        <br>
        <div>
            <input id="module-create-studies-name-1" placeholder="Nombre" type="text" name="password">
            <input id="module-create-studies-location-1" placeholder="Ubicación"  type="text" name="password">
            <select id="module-create-studies-type-1" name="type">
                <option id="type-student-edit" value="student">Oposiciones</option>
                <option id="type-teacher-edit" value="teacher">Univerdidad</option>
                <option id="type-secretary-edit" value="secretary">Instituto</option>
            </select>
            <a class="button-3d button-xs button-circle button-danger"><i class='fa fa-close'></i></a>
        </div>
        <a class="button-3d button-xs button-circle button-success"><i class='fa fa-plus'></i></a>
        <br>
        <br>
        Foto de cabecera: <span class="color-pasific">(*)</span>
        <br>
        <input type="file" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png" />
        <br>
        <br>
        Contenido previsualización: <span class="color-pasific">(*)</span>
        <br>
        <textarea id="w3review" name="w3review" rows="5" cols="50"></textarea>
        <br>
        <br>
        Contenido
        <br>
        <div id="summernote"></div>
    </form>
</div>