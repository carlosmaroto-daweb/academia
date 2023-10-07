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
                                    <th>Módulos</th>
                                    <th>Precios</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Alumnos</th>
                                    <th>Profesores</th>
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
                                    <th>Estudios</th>
                                    <th>Cabecera</th>
                                    <th>Previsualización</th>
                                    <th>Contenido</th>
                                </tr>
                            </thead>
                            <tbody id="module-table">
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
                                <a class="button-3d button-md button-rounded button-success" href="index.php?controller=courseController&action=createModule">Añadir nuevo módulo</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>