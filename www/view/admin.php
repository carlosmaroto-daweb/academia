<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón | Administración</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- CSS
        ===================================== -->
        <?php require_once "view/include/style.php"?>
    </head>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">
        
            <!-- Nav
            ===================================== -->
            <?php require_once "view/include/nav.php"?>
            
            <!-- Home Section -->
            <section class="small-section bg-dark-alfa-50 bg-scroll light-content" data-background="view/assets/images/full-width-images/section-bg-19.jpg" id="home">
                <div class="container relative pt-70">
                
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="wow fadeInUpShort" data-wow-delay=".1s">
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Administración</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    Gestiona todo lo relacionado con los usuarios
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="index.php">Inicio</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;Administración
                            </div>                                
                        </div>
                        
                    </div>
                
                </div>
            </section>
            <!-- End Home Section -->

            <!-- Table Styles
            ===================================== -->
            <section class="page-section">
                <!-- Table Style 2 -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center mb-80 mb-sm-50">
                                <h2 class="section-title">Gestión Usuarios</h2>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Tipo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="user-table">
                                    <?php
                                        $count = 0; 
                                        foreach ($dataToView as $row):
                                            echo "<tr id='row{$count}'>";
                                                echo "<td>{$row->getName()}</td>";
                                                echo "<td>{$row->getLastName()}</td>";
                                                echo "<td>{$row->getEmail()}</td>";
                                                echo "<td>{$row->getPhoneNumber()}</td>";
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
                                                echo "<td class='table-col-btn'>";
                                                    echo "<a href='#user-edit' class='btn-user-edit btn btn-mod btn-circle btn-small button-edit magnificPopup-user-edit' data-id_row='row{$count}' data-id='{$row->getId()}' data-email='{$row->getEmail()}' data-password='{$row->getPassword()}' data-name='{$row->getName()}' data-last_name='{$row->getLastName()}' data-phone_number='{$row->getPhoneNumber()}' data-dni='{$row->getDni()}' data-type='{$row->getType()}'>Modificar</a>";
                                                    echo "<a href='#user-delete' class='btn-user-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-user-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
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
                <div class="container mt-50">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href='#user-create' class="btn-user-create btn btn-mod btn-circle btn-large button-success lightbox-gallery-3 mfp-inline">Añadir nuevo usuario</a>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- Modal edit user
            ===================================== -->
            <div id="user-edit" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Modificar usuario</h2>
                </div>
                <form id="edit-form" class="form">
                    <div class="form-group">
                        <label for="edit-form-name">Nombre <span class="required-field-color">(*)</span></label>
                        <input id="edit-form-name" type="text" name="name" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-form-last_name">Apellidos <span class="required-field-color">(*)</span></label>
                        <input id="edit-form-last_name" type="text" name="last_name" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-form-email">Correo <span class="required-field-color">(*)</span></label>
                        <input id="edit-form-email" type="email" name="email" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-form-password">Contraseña <span class="required-field-color">(*)</span></label>
                        <input id="edit-form-password" type="text" name="password" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-form-phone_number">Teléfono</label>
                        <input id="edit-form-phone_number" type="text" name="phone_number" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-form-dni">DNI</label>
                        <input id="edit-form-dni" type="text" name="dni" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-form-type">Tipo <span class="required-field-color">(*)</span></label>
                        <select id="edit-form-type" name="type" class="input-md round form-control">
                            <option id="type-student-edit" value="student">Alumno</option>
                            <option id="type-teacher-edit" value="teacher">Profesor</option>
                            <option id="type-secretary-edit" value="secretary">Secretaría</option>
                            <option id="type-admin-edit" value="admin">Administrador</option>
                        </select>
                    </div>
                </form>
                <div id="edit-modal-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal delete user
            ===================================== -->
            <div id="user-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Eliminar usuario</h2>
                </div>
                <div id="delete-form">
                    <p>¿Seguro que quieres eliminar este usuario?</p>
                </div>
                <div id="delete-modal-footer" class="modal-footer">
                </div>
            </div>
        
            <!-- Modal create user
            ===================================== -->
            <div id="user-create" class="mfp-hide white-popup-block">
                <div class="text-center mb-30">
                    <h2 class="section-title">Crear usuario</h2>
                </div>
                <form id="create-form" class="form">
                    <div class="form-group">
                        <label for="create-form-name">Nombre <span class="required-field-color">(*)</span></label>
                        <input id="create-form-name" type="text" name="name" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="create-form-last_name">Apellidos <span class="required-field-color">(*)</span></label>
                        <input id="create-form-last_name" type="text" name="last_name" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="create-form-email">Correo <span class="required-field-color">(*)</span></label>
                        <input id="create-form-email" type="text" name="email" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="create-form-password">Contraseña <span class="required-field-color">(*)</span></label>
                        <input id="create-form-password" type="text" name="password" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="create-form-phone_number">Teléfono</label>
                        <input id="create-form-phone_number" type="text" name="phone_number" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="create-form-dni">DNI</label>
                        <input id="create-form-dni" type="text" name="dni" class="input-md round form-control">
                    </div>
                    <div class="form-group">
                        <label for="create-form-type">Tipo <span class="required-field-color">(*)</span></label>
                        <select id="create-form-type" name="type" class="input-md round form-control">
                            <option id="type-student-create" value="student">Alumno</option>
                            <option id="type-teacher-create" value="teacher">Profesor</option>
                            <option id="type-secretary-create" value="secretary">Secretaría</option>
                            <option id="type-admin-create" value="admin">Administrador</option>
                        </select>
                    </div>
                </form>
                <div id="create-modal-footer" class="modal-footer">
                </div>
            </div>
                
            <!-- Footer
            ===================================== -->
            <?php require_once 'view/include/footer.php';?>
        
        </div>
        <!-- End Page Wrap -->
        
        <!-- JS
        ===================================== -->
        <?php require_once "view/include/script.php"?>
    </body>
</html>