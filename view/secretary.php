        <!-- Table Course
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
                                    <th>Nombre</th>
                                    <th>Estudios</th>
                                    <th>Cabecera</th>
                                    <th>Previsualización</th>
                                    <th>Contenido</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Módulos</th>
                                    <th>Precios</th>
                                    <th>Alumnos</th>
                                    <th>Profesores</th>
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

        <!-- Table Module
        ===================================== -->
        <section class="pb70" id="shortcodeTable">
            <!-- Table Style 2 -->
            <div class="container pt70">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center mb30">Gestión Módulos</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cabecera</th>
                                    <th>Previsualización</th>
                                    <th>Contenido</th>
                                    <th>Cursos asignados</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="module-table">
                                <?php
                                    $count = 0; 
                                    foreach ($dataToView as $row):
                                        echo "<tr id='row{$count}'>";
                                            echo "<td>{$row->getName()}</td>";
                                            echo "<td><img id='header_image_preview' src='{$row->getHeaderImage()}'></td>";
                                            echo "<td>{$row->getPreview()}</td>";
                                            echo "<td>{$row->getContent()}</td>";
                                            echo "<td> </td>";
                                            echo "<td>";
                                                echo "<a href='index.php?controller=courseController&action=editModule&id={$row->getId()}' class='button-o button-sm button-rounded button-blue hover-fade' data-id='{$row->getId()}' data-name='{$row->getName()}' data-header_image='{$row->getHeaderImage()}' data-preview='{$row->getPreview()}' data-content='{$row->getContent()}'>Editar</a>&nbsp;";
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