<div class="container pt100">
    <h4 class="text-center mt100 mb10">Creación Asignatura</h4>
    <form id="subject-create-form" class="mb100">
        Nombre <span class="color-pasific">(*)</span>
        <br>
        <input id="subject-create-name" type="text" name="email">
        <br>
        <br>
        Estudios <span class="color-pasific">(*)</span>
        <br>
        <div>
            <input id="subject-create-studies-name-1" placeholder="Nombre" type="text" name="password">
            <input id="subject-create-studies-location-1" placeholder="Ubicación"  type="text" name="password">
            <select id="subject-create-studies-type-1" name="type">
                <option id="type-student-edit" value="student">Oposiciones</option>
                <option id="type-teacher-edit" value="teacher">Univerdidad</option>
                <option id="type-secretary-edit" value="secretary">Instituto</option>
            </select>
            <a class="button-3d button-xs button-circle button-danger"><i class='fa fa-close'></i></a>
        </div>
        <a class="button-3d button-xs button-circle button-success"><i class='fa fa-plus'></i></a>
        <br>
        <br>
        <div id="summernote"></div>
    </form>
</div>