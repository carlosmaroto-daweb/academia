<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Academia Cartabón</title>
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
                                <h1 class="hs-line-7 mb-20 mb-xs-10">Blog</h1>
                            </div>
                            <div class="wow fadeInUpShort" data-wow-delay=".2s">
                                <p class="hs-line-6 opacity-075 mb-20 mb-xs-0">
                                    We share our best ideas in our blog
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30 wow fadeInUpShort" data-wow-delay=".1s">
                            <div class="mod-breadcrumbs text-end">
                                <a href="#">Home</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<a href="#">Blog</a>&nbsp;<span class="mod-breadcrumbs-slash">•</span>&nbsp;<span>Classic</span>
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
                                                echo "<td>" . substr($row->getPassword(), 0, 10) . "...</td>";
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
                                                    echo "<a href='#user-edit' class='btn btn-mod btn-border btn-circle btn-small lightbox-gallery-5 mfp-inline' data-id_row='row{$count}' data-id='{$row->getId()}' data-email='{$row->getEmail()}' data-password='{$row->getPassword()}' data-name='{$row->getName()}' data-last_name='{$row->getLastName()}' data-phone_number='{$row->getPhoneNumber()}' data-dni='{$row->getDni()}' data-type='{$row->getType()}'>Modificar</a>&nbsp;";
                                                    echo "<a href='#user-delete' class='btn btn-mod btn-border btn-circle btn-small lightbox-gallery-5 mfp-inline' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
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
                            <a href='#user-create' class="btn btn-mod btn-circle btn-large lightbox-gallery-5 mfp-inline">Añadir nuevo usuario</a>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- Modals
            ===================================== -->
            <div id="user-edit" class="mfp-hide white-popup-block">
                <div class="text-center mb-50 mb-sm-30">
                    <h2 class="section-title">Modificar usuario</h2>
                </div>
                <div id="edit-form" class="form">
                    <div class="mb-20 mb-md-10">
                        Correo <strong>(*)</strong>
                        <input id="edit-form-email" type="text" name="email" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Contraseña <strong>(*)</strong>
                        <input id="edit-form-password" type="text" name="password" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Nombre
                        <input id="edit-form-name" type="text" name="name" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Apellidos
                        <input id="edit-form-last_name" type="text" name="last_name" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Teléfono
                        <input id="edit-form-phone_number" type="text" name="phone_number" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        DNI
                        <input id="edit-form-dni" type="text" name="dni" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Tipo <strong>(*)</strong>
                        <select id="edit-form-type" name="type" class="input-md round form-control">
                            <option id="type-student-edit" value="student">Alumno</option>
                            <option id="type-teacher-edit" value="teacher">Profesor</option>
                            <option id="type-secretary-edit" value="secretary">Secretaría</option>
                            <option id="type-admin-edit" value="admin">Administrador</option>
                        </select>
                    </div>
                </div>
                <div id="edit-modal-footer" class="modal-footer">
                    <button class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>
                </div>
            </div>
            <div id="user-delete" class="mfp-hide white-popup-block">
                <div class="text-center mb-50 mb-sm-30">
                    <h2 class="section-title">Eliminar usuario</h2>
                </div>
                <div id="delete-form">
                    <p>¿Seguro que quieres eliminar este usuario?</p>
                </div>
                <div id="delete-modal-footer" class="modal-footer">
                    <button class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>
                </div>
            </div>
            <div id="user-create" class="mfp-hide white-popup-block">
                <div class="text-center mb-50 mb-sm-30">
                    <h2 class="section-title">Crear usuario</h2>
                </div>
                <div id="create-form" class="form">
                    <div class="mb-20 mb-md-10">
                        Correo <strong>(*)</strong>
                        <input id="create-form-email" type="text" name="email" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Contraseña <strong>(*)</strong>
                        <input id="create-form-password" type="text" name="password" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Nombre
                        <input id="create-form-name" type="text" name="name" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Apellidos
                        <input id="create-form-last_name" type="text" name="last_name" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Teléfono
                        <input id="create-form-phone_number" type="text" name="phone_number" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        DNI
                        <input id="create-form-dni" type="text" name="dni" class="input-md round form-control">
                    </div>
                    <div class="mb-20 mb-md-10">
                        Tipo <strong>(*)</strong>
                        <select id="create-form-type" name="type" class="input-md round form-control">
                            <option id="type-student-create" value="student">Alumno</option>
                            <option id="type-teacher-create" value="teacher">Profesor</option>
                            <option id="type-secretary-create" value="secretary">Secretaría</option>
                            <option id="type-admin-create" value="admin">Administrador</option>
                        </select>
                    </div>
                </div>
                <div id="create-modal-footer" class="modal-footer">
                    <button class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>
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