<?php
    $modules = $dataToView["modules"];
    $lessons = $dataToView["lessons"];
?>
        <!-- Table Tuition
        ===================================== -->
        <section class="pt100 pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container-fluid pt70">
                <div class="row">
                    <div class="col-md-12 table-secretary">
                        <h4 class="text-center mb30">Gestión Matrículas</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Alumnos</th>
                                    <th>Profesores</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tuition-table">
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
                                <a class="button-3d button-md button-rounded button-success" href="">Añadir nueva matrícula</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Course
        ===================================== -->
        <section class="pt100 pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container-fluid pt70">
                <div class="row">
                    <div class="col-md-12 table-secretary">
                        <h4 class="text-center mb30">Gestión Cursos</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Módulos</th>
                                    <th>Precios</th>
                                    <th>Acciones</th>
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
                                <a class="button-3d button-md button-rounded button-success" href="index.php?controller=courseController&action=editCourse">Añadir nuevo curso</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Subject
        ===================================== -->
        <section class="pt100 pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container-fluid pt70">
                <div class="row">
                    <div class="col-md-12 table-secretary">
                        <h4 class="text-center mb30">Gestión Asignaturas</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Estudios</th>
                                    <th>Foto de cabecera</th>
                                    <th>Previsualización</th>
                                    <th>Contenido</th>
                                    <th>Módulos asignados</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="subject-table">
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
                                <a class="button-3d button-md button-rounded button-success" href="">Añadir nueva asignatura</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Module
        ===================================== -->
        <section class="pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container-fluid pt70">
                <div class="row">
                    <div class="col-md-12 table-secretary">
                        <h4 class="text-center mb30">Gestión Módulos</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Foto de cabecera</th>
                                    <th>Previsualización</th>
                                    <th>Contenido</th>
                                    <th>Lecciones asignadas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="module-table">
                                <?php
                                    $count = 0; 
                                    foreach ($modules as $row):
                                        echo "<tr id='row{$count}'>";
                                            echo "<td>{$row->getName()}</td>";
                                            echo "<td><img class='header_image_preview' src='{$row->getHeaderImage()}'></td>";
                                            echo "<td><div class='canvas_preview'>{$row->getPreview()}</div></td>";
                                            echo "<td><div class='canvas_content'>{$row->getContent()}</div></td>";
                                            echo "<td> </td>";
                                            echo "<td>";
                                                echo "<a href='index.php?controller=courseController&action=editModule&id={$row->getId()}' class='button-o button-sm button-rounded button-blue hover-fade'>Editar</a>&nbsp;";
                                                echo "<a class='button-o button-sm button-rounded button-purple hover-fade' data-toggle='modal' data-target='#module-duplicate' data-id='{$row->getId()}'>Duplicar</a>&nbsp;";
                                                echo "<a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#module-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
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
            <div class="container-fluid pb50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="color-light text-capitalize font-open-sans">
                                <a class="button-3d button-md button-rounded button-success" href="index.php?controller=courseController&action=editModule">Añadir nuevo módulo</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table Lesson
        ===================================== -->
        <section class="pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container-fluid pt70">
                <div class="row">
                    <div class="col-md-12 table-secretary">
                        <h4 class="text-center mb30">Gestión Lecciones</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Archivos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="lesson-table">
                                <?php
                                    $count = 0; 
                                    foreach ($lessons as $row):
                                        echo "<tr id='row{$count}'>";
                                            echo "<td>{$row->getName()}</td>";
                                            echo "<td>'{$row->getFiles()}'</td>";
                                            echo "<td> </td>";
                                            echo "<td>";
                                                echo "<a href='index.php?controller=courseController&action=editLesson&id={$row->getId()}' class='button-o button-sm button-rounded button-blue hover-fade'>Editar</a>&nbsp;";
                                                echo "<a class='button-o button-sm button-rounded button-purple hover-fade' data-toggle='modal' data-target='#lesson-duplicate' data-id='{$row->getId()}'>Duplicar</a>&nbsp;";
                                                echo "<a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#lesson-delete' data-id_row='row{$count}' data-id='{$row->getId()}'>Eliminar</a>";
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
            <div class="container-fluid pb50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="color-light text-capitalize font-open-sans">
                                <a class="button-3d button-md button-rounded button-success" href="index.php?controller=courseController&action=editLesson">Añadir nueva lección</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Modals
        ===================================== -->
        <div class="modal fade" id="module-duplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle">Duplicar módulo</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="duplicate-form">
                            <p>¿Seguro que quieres duplicar este módulo?</p>
                        </div>
                    </div>
                    <div id="duplicate-modal-footer" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="module-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle">Eliminar módulo</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="delete-form">
                            <p>¿Seguro que quieres eliminar este módulo?</p>
                        </div>
                    </div>
                    <div id="delete-modal-footer" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="lesson-duplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle">Duplicar lección</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="duplicate-form">
                            <p>¿Seguro que quieres duplicar esta lección?</p>
                        </div>
                    </div>
                    <div id="duplicate-modal-footer" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="lesson-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle">Eliminar lección</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="delete-form">
                            <p>¿Seguro que quieres eliminar esta lección?</p>
                        </div>
                    </div>
                    <div id="delete-modal-footer" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>