        <!-- Table Styles
        ===================================== -->
        <section class="mt70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container pt50">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center mb30">Gestión Usuarios</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Dni</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="user-table">
                                <?php
                                    $count = 0; 
                                    foreach ($dataToView as $row):
                                        echo "<tr id='row{$count}'>";
                                            echo "<td>{$row->getEmail()}</td>";
                                            echo "<td>{$row->getPassword()}</td>";
                                            echo "<td>{$row->getName()}</td>";
                                            echo "<td>{$row->getLastName()}</td>";
                                            echo "<td>{$row->getPhoneNumber()}</td>";
                                            echo "<td>{$row->getDni()}</td>";
                                            switch ($row->getType()) {
                                                case "student":
                                                    $type = "Alumno";
                                                    break;
                                                case "teacher":
                                                    $type = "Profesor";
                                                    break;
                                                case "secretary":
                                                    $type = "Secretaría";
                                                    break;
                                                case "admin":
                                                    $type = "Administrador";
                                                    break;
                                            };
                                            echo "<td>{$type}</td>";
                                            echo "<td>";
                                                echo "<a class='button-o button-sm button-rounded button-blue hover-fade' data-toggle='modal' data-target='#user-edit' data-id_row='row{$count}' data-id='{$row->getId()}' data-email='{$row->getEmail()}' data-password='{$row->getPassword()}' data-name='{$row->getName()}' data-last_name='{$row->getLastName()}' data-phone_number='{$row->getPhoneNumber()}' data-dni='{$row->getDni()}' data-type='{$row->getType()}'>Modificar</a>&nbsp;";
                                                echo "<a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#user-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
                                            echo "</td>";
                                        echo "</tr>";
                                        $count++; 
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid pb70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="color-light text-capitalize font-open-sans">
                                <a class="button-3d button-md button-rounded button-success" data-toggle='modal' data-target='#user-create'>Añadir nuevo usuario</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Modals
        ===================================== -->
        <div class="modal fade" id="user-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            Correo
                            <br>
                            <input id="edit-form-email" type="text" name="email">
                            <br>
                            <br>
                            Contraseña
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
                            Tipo
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
        <div class="modal fade" id="user-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <div class="modal fade" id="user-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            Correo
                            <br>
                            <input id="create-form-email" type="text" name="email">
                            <br>
                            <br>
                            Contraseña
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
                            Tipo
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