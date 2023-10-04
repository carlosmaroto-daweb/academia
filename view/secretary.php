        <!-- Table Subject
        ===================================== -->
        <section class="pt100 pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container pt70">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center mb30">Gestión Cursos</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Asignaturas</th>
                                    <th>Precios</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Profesores</th>
                                    <th>Alumnos</th>
                                </tr>
                            </thead>
                            <tbody id="course-table">
                                <?php
                                    //
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid pb50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="color-light text-capitalize font-open-sans">
                                <a class="button-3d button-md button-rounded button-success" data-toggle='modal' data-target='#course-create'>Añadir nuevo curso</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Subject
        ===================================== -->
        <section class="pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container pt70">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center mb30">Gestión Asignaturas</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Estudios</th>
                                    <th>Contenido</th>
                                </tr>
                            </thead>
                            <tbody id="course-table">
                                <?php
                                    //
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid pb50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="color-light text-capitalize font-open-sans">
                                <a class="button-3d button-md button-rounded button-success" data-toggle='modal' data-target='#subject-create'>Añadir nueva asignatura</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Modals
        ===================================== -->
        <div class="modal fade" id="subject-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Crear asignatura</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form id="subject-create-form">
                            Nombre <span class="color-pasific">(*)</span>
                            <br>
                            <input id="create-form-email" type="text" name="email">
                            <br>
                            <br>
                            Estudios <span class="color-pasific">(*)</span>
                            <br>
                            <div>
                                <input id="create-form-password" placeholder="Nombre" type="text" name="password">
                                <input id="create-form-password" placeholder="Ubicación"  type="text" name="password">
                                <select id="edit-form-type" placeholder="Tipo" name="type">
                                    <option id="type-student-edit" value="student">Oposiciones</option>
                                    <option id="type-teacher-edit" value="teacher">Univerdidad</option>
                                    <option id="type-secretary-edit" value="secretary">Instituto</option>
                                </select>
                                <a class="button-3d button-xs button-circle button-danger"><i class='fa fa-close'></i></a>
                            </div>
                            <a class="button-3d button-xs button-circle button-success"><i class='fa fa-plus'></i></a>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-create" class="btn btn-primary">Crear asignatura</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                </div>
            </div>
        </div>