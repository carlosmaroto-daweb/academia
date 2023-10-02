        <!-- Table Styles
        ===================================== -->
        <section class="pt100 pb70" id="shortcodeTable">
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
                                    <th>Lecciones</th>
                                    <th>Datos</th>
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
                                <a class="button-3d button-md button-rounded button-success" data-toggle='modal' data-target='#course-create'>Añadir nuevo usuario</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Modals
        ===================================== -->
        <div class="modal fade" id="course-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Modificar usuario</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form id="edit-form">
                            Correo <span class="color-pasific">(*)</span>
                            <br>
                            <input id="edit-form-email" type="text" name="email">
                            <br>
                            <br>
                            Contraseña <span class="color-pasific">(*)</span>
                            <br>
                            <input id="edit-form-password" type="text" name="password">
                            <br>
                            <br>
                            Nombre
                            <br>
                            <input id="edit-form-name" type="text" name="name">
                            <br>
                            <br>
                            Apellidos
                            <br>
                            <input id="edit-form-last_name" type="text" name="last_name">
                            <br>
                            <br>
                            Teléfono
                            <br>
                            <input id="edit-form-phone_number" type="text" name="phone_number">
                            <br>
                            <br>
                            DNI
                            <br>
                            <input id="edit-form-dni" type="text" name="dni">
                            <br>
                            <br>
                            Tipo <span class="color-pasific">(*)</span>
                            <br>
                            <select id="edit-form-type" name="type">
                                <option id="type-student-edit" value="student">Alumno</option>
                                <option id="type-teacher-edit" value="teacher">Profesor</option>
                                <option id="type-secretary-edit" value="secretary">Secretaría</option>
                                <option id="type-admin-edit" value="admin">Administrador</option>
                            </select>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-edit" class="btn btn-primary">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="course-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="delete-form">
                            <p>¿Seguro que quieres eliminar este usuario?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-delete" class="btn btn-primary">Aceptar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="course-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Crear usuario</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form id="create-form">
                            Correo <span class="color-pasific">(*)</span>
                            <br>
                            <input id="create-form-email" type="text" name="email">
                            <br>
                            <br>
                            Contraseña <span class="color-pasific">(*)</span>
                            <br>
                            <input id="create-form-password" type="text" name="password">
                            <br>
                            <br>
                            Nombre
                            <br>
                            <input id="create-form-name" type="text" name="name">
                            <br>
                            <br>
                            Apellidos
                            <br>
                            <input id="create-form-last_name" type="text" name="last_name">
                            <br>
                            <br>
                            Teléfono
                            <br>
                            <input id="create-form-phone_number" type="text" name="phone_number">
                            <br>
                            <br>
                            DNI
                            <br>
                            <input id="create-form-dni" type="text" name="dni">
                            <br>
                            <br>
                            Tipo <span class="color-pasific">(*)</span>
                            <br>
                            <select id="create-form-type" name="type">
                                <option id="type-student-create" value="student">Alumno</option>
                                <option id="type-teacher-create" value="teacher">Profesor</option>
                                <option id="type-secretary-create" value="secretary">Secretaría</option>
                                <option id="type-admin-create" value="admin">Administrador</option>
                            </select>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-create" class="btn btn-primary">Crear usuario</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                </div>
            </div>
        </div>