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

            <section class="page-section container">
                        
                <!-- Nav Tabs -->
                <div class="align-center mb-40 mb-xxs-30">
                    <ul class="nav nav-tabs tpl-tabs animate" id="productItem" role="tablist">
                        
                        <li class="nav-item" role="presentation">
                            <a href="#tuition" aria-controls="tuition" class="nav-link active" data-bs-toggle="tab"  role="tab" aria-selected="true">Matrículas</a>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <a href="#course" aria-controls="course" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Cursos</a>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <a href="#subject" aria-controls="subject" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Asignaturas</a>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <a href="#module" aria-controls="module" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Módulos</a>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <a href="#lesson" aria-controls="lesson" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">Lecciones</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- End Nav Tabs -->
        
                <?php     
                    $modules = $dataToView["modules"];
                    $lessons = $dataToView["lessons"];
                ?>
                            
                <!-- Tab panes -->
                <div class="tab-content tpl-minimal-tabs-cont">
                    
                    <div class="tab-pane fade show active" id="tuition" role="tabpanel">

                        <!-- Table Styles
                        ===================================== -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
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
                        <div class="container mt-50">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="" class="btn btn-mod btn-circle btn-large">Añadir nueva matrícula</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="tab-pane fade" id="course" role="tabpanel">
                        
                        <!-- Table Styles
                        ===================================== -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
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
                        <div class="container mt-50">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="index.php?controller=courseController&action=editCourse" class="btn btn-mod btn-circle btn-large">Añadir nuevo curso</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="tab-pane fade" id="subject" role="tabpanel">
                        
                        <!-- Table Styles
                        ===================================== -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
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
                        <div class="container mt-50">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="" class="btn btn-mod btn-circle btn-large">Añadir nueva asignatura</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="tab-pane fade" id="module" role="tabpanel">
                        
                        <!-- Table Styles
                        ===================================== -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
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
                                                        echo "<td><div class='canvas_preview'>{$row->getContent()}</div></td>";
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
                        <div class="container mt-50">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="index.php?controller=courseController&action=editModule" class="btn btn-mod btn-circle btn-large">Añadir nuevo módulo</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="tab-pane fade" id="lesson" role="tabpanel">

                        <!-- Table Styles
                        ===================================== -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
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
                        <div class="container mt-50">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="index.php?controller=courseController&action=editLesson" class="btn btn-mod btn-circle btn-large">Añadir nueva lección</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <!-- End Tab panes -->
            
            </section>
            
            
            <!-- Modals
            ===================================== -->
            <div class="modal fade" id="module-duplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Duplicar módulo</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="module-duplicate-form">
                                <p>¿Seguro que quieres duplicar este módulo?</p>
                            </div>
                        </div>
                        <div id="module-duplicate-footer" class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="module-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Eliminar módulo</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="module-delete-form">
                                <p>¿Seguro que quieres eliminar este módulo?</p>
                            </div>
                        </div>
                        <div id="module-delete-footer" class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="lesson-duplicate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Duplicar lección</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="lesson-duplicate-form">
                                <p>¿Seguro que quieres duplicar esta lección?</p>
                            </div>
                        </div>
                        <div id="lesson-duplicate-footer" class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="lesson-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Eliminar lección</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="lesson-delete-form">
                                <p>¿Seguro que quieres eliminar esta lección?</p>
                            </div>
                        </div>
                        <div id="lesson-delete-footer" class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
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