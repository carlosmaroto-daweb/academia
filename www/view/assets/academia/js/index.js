$(document).ready(function() {
    $("#btn-login").on('click', function(e) {
        e.preventDefault();
        let email    = $('#login-email').val();
        let password = $('#login-password').val();
        $.ajax({
            type: "POST",
            url: 'index.php?controller=userController&action=login&ajax=true',
            data: {
                'email':    email,
                'password': password
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.reload();
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    $("#formLogin").append(msg);
                }
            }
        });
    });

    $("#btn-register").on('click', function(e) {
        e.preventDefault();
        let name      = $('#register-name').val();
        let last_name = $('#register-last-name').val();
        let email     = $('#register-email').val();
        let password  = $('#register-password').val();
        $.ajax({
            type: "POST",
            url: 'index.php?controller=userController&action=register&ajax=true',
            data: {
                'name':      name,
                'last_name': last_name,
                'email':     email,
                'password':  password
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.reload();
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    $("#formRegister").append(msg);
                }
            }
        });
    });

    $(".magnificPopup-user-edit").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-user-edit', function(e) {
        let button = '<button id="btn-edit-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#edit-modal-footer').append(button);
        button = '<button id="btn-edit" class="btn btn-mod btn-small btn-round">Guardar cambios</button>';
        $('#edit-modal-footer').append(button);
        e.preventDefault();
        let id_row       = $(this).data('id_row');
        let id           = $(this).data('id');
        let email        = $(this).data('email');
        let password     = $(this).data('password');
        let name         = $(this).data('name');
        let last_name    = $(this).data('last_name');
        let phone_number = $(this).data('phone_number');
        let dni          = $(this).data('dni');
        let type         = $(this).data('type');
        $('#edit-form-email').val(email);
        $('#edit-form-password').val(password);
        $('#edit-form-name').val(name);
        $('#edit-form-last_name').val(last_name);
        $('#edit-form-phone_number').val(phone_number);
        $('#edit-form-dni').val(dni);
        switch (type) {
            case "student":
                $('#type-student-edit').prop("selected", true);
                break;
            case "teacher":
                $('#type-teacher-edit').prop("selected", true);
                break;
            case "secretary":
                $('#type-secretary-edit').prop("selected", true);
                break;
            case "admin":
                $('#type-admin-edit').prop("selected", true);
                break;
        };

        $("#btn-edit-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });

        $('#btn-edit').on('click', function(e) {
            e.preventDefault();
            let new_email        = $('#edit-form-email').val();
            let new_password     = $('#edit-form-password').val();
            let new_name         = $('#edit-form-name').val();
            let new_last_name    = $('#edit-form-last_name').val();
            let new_phone_number = $('#edit-form-phone_number').val();
            let new_dni          = $('#edit-form-dni').val();
            let new_type;
            if ($('#type-student-edit').prop("selected")) {
                new_type = "student";
            }
            else if ($('#type-teacher-edit').prop("selected")) {
                new_type = "teacher";
            }
            else if ($('#type-secretary-edit').prop("selected")) {
                new_type = "secretary";
            }
            else if ($('#type-admin-edit').prop("selected")) {
                new_type = "admin";
            }

            if (email==new_email && password==new_password && name==new_name && last_name==new_last_name && phone_number==new_phone_number && dni==new_dni && type==new_type) {
                $(".alert").remove();
                let msg = `
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> No has cambiado los datos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                $("#edit-form").append(msg);
            }
            else {
                $.ajax({
                    type: "POST",
                    url: 'index.php?controller=userController&action=edit&ajax=true',
                    data: {
                        'id':           id,
                        'email':        new_email,
                        'password':     new_password,
                        'name':         new_name,
                        'last_name':    new_last_name,
                        'phone_number': new_phone_number,
                        'dni':          new_dni,
                        'type':         new_type
                    },
                    success: function(response) {
                        let jsonData = JSON.parse(response);
                        new_password = jsonData.password;
                        if (jsonData.success == "1") {
                            switch (new_type) {
                                case "student":
                                    type = "Alumno";
                                    break;
                                case "teacher":
                                    type = "Profesor";
                                    break;
                                case "secretary":
                                    type = "Secretaría";
                                    break;
                                case "admin":
                                    type = "Administrador";
                                    break;
                            };
                            let row = `
                                <td>${new_name}</td>
                                <td>${new_last_name}</td>
                                <td>${new_email}</td>
                                <td>${new_phone_number}</td>
                                <td>${type}</td>
                                <td class='table-col-btn'>
                                    <a href='#user-edit' class='btn-user-edit btn btn-mod btn-circle btn-small button-edit magnificPopup-user-edit' data-id_row='${id_row}' data-id='${id}' data-email='${new_email}' data-password='${new_password}' data-name='${new_name}' data-last_name='${new_last_name}' data-phone_number='${new_phone_number}' data-dni='${new_dni}' data-type='${new_type}'>Modificar</a>
                                    <a href='#user-delete' class='btn-user-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-user-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            `;
                            $('#' + id_row).html(row);
                            $(".magnificPopup-user-edit").magnificPopup({
                                gallery: {
                                    enabled: true
                                },
                                mainClass: "mfp-fade"
                            });
                            $(".magnificPopup-user-delete").magnificPopup({
                                gallery: {
                                    enabled: true
                                },
                                mainClass: "mfp-fade"
                            });
                            $.magnificPopup.close();
                        }
                        else {
                            $(".alert").remove();
                            let msg = `
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;
                            $("#edit-form").append(msg);
                        }
                    }
                });
            }
        });
    });

    $(".magnificPopup-user-edit").on('mfpClose', function() {
        $(".alert").remove();
        $('#edit-form').trigger("reset");
        $('#btn-edit-cancel').remove();
        $('#btn-edit').remove();
    });

    $(".magnificPopup-user-delete").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-user-delete', function(e) {
        let button = '<button id="btn-delete-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#delete-modal-footer').append(button);
        button = '<button id="btn-delete" class="btn btn-mod btn-small btn-round">Eliminar usuario</button>';
        $('#delete-modal-footer').append(button);
        e.preventDefault();
        let id_row       = $(this).data('id_row');
        let id           = $(this).data('id');
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=userController&action=delete&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#' + id_row).remove();
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#delete-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-user-delete").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-delete-cancel').remove();
        $('#btn-delete').remove();
    });

    $(".btn-user-create").on('click', function() {
        let button = '<button id="btn-create-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#create-modal-footer').append(button);
        button = '<button id="btn-create" class="btn btn-mod btn-small btn-round">Crear usuario</button>';
        $('#create-modal-footer').append(button);
        $("#btn-create-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-create').on('click', function(event) {
            event.preventDefault();
            let email        = $('#create-form-email').val();
            let password     = $('#create-form-password').val();
            let name         = $('#create-form-name').val();
            let last_name    = $('#create-form-last_name').val();
            let phone_number = $('#create-form-phone_number').val();
            let dni          = $('#create-form-dni').val();
            let type;
            if ($('#type-student-create').prop("selected")) {
                type = "student";
            }
            else if ($('#type-teacher-create').prop("selected")) {
                type = "teacher";
            }
            else if ($('#type-secretary-create').prop("selected")) {
                type = "secretary";
            }
            else if ($('#type-admin-create').prop("selected")) {
                type = "admin";
            }

            $.ajax({
                type: "POST",
                url: 'index.php?controller=userController&action=create&ajax=true',
                data: {
                    'email':        email,
                    'password':     password,
                    'name':         name,
                    'last_name':    last_name,
                    'phone_number': phone_number,
                    'dni':          dni,
                    'type':         type
                },
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        let id               = jsonData.user.id;
                        let id_row           = 'row' + $('#user-table').children('tr').length;
                        let new_email        = jsonData.user.email;
                        let new_password     = jsonData.user.password;
                        let new_name         = jsonData.user.name;
                        let new_last_name    = jsonData.user.last_name;
                        let new_phone_number = jsonData.user.phone_number;
                        let new_dni          = jsonData.user.dni;
                        let new_type         = jsonData.user.type
                        switch (new_type) {
                            case "student":
                                type = "Alumno";
                                break;
                            case "teacher":
                                type = "Profesor";
                                break;
                            case "secretary":
                                type = "Secretaría";
                                break;
                            case "admin":
                                type = "Administrador";
                                break;
                        };
                        let row = 
                            `<tr id='${id_row}'>
                                <td>${new_name}</td>
                                <td>${new_last_name}</td>
                                <td>${new_email}</td>
                                <td>${new_phone_number}</td>
                                <td>${type}</td>
                                <td class='table-col-btn'>
                                    <a href='#user-edit' class='btn-user-edit btn btn-mod btn-circle btn-small button-edit magnificPopup-user-edit' data-id_row='${id_row}' data-id='${id}' data-email='${new_email}' data-password='${new_password}' data-name='${new_name}' data-last_name='${new_last_name}' data-phone_number='${new_phone_number}' data-dni='${new_dni}' data-type='${new_type}'>Modificar</a>
                                    <a href='#user-delete' class='btn-user-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-user-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#user-table').append(row);
                        $(".magnificPopup-user-edit").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $(".magnificPopup-user-delete").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#create-form").append(msg);
                    }
                }
            });
        });
    });

    $(".lightbox-gallery-3").on('mfpClose', function() {
        $(".alert").remove();
        $('#create-form').trigger("reset");
        $('#btn-create-cancel').remove();
        $('#btn-create').remove();
    });

    $(".magnificPopup-lesson-duplicate").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-lesson-duplicate', function(e) {
        e.preventDefault();
        let button = '<button id="btn-duplicate-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#lesson-duplicate-footer').append(button);
        button = '<button id="btn-duplicate" class="btn btn-mod btn-small btn-round">Duplicar lección</button>';
        $('#lesson-duplicate-footer').append(button);
        let id = $(this).data('id');
        $("#btn-duplicate-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-duplicate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=duplicateLesson&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        let id     = jsonData.lesson.id;
                        let id_row = 'row' + $('#lesson-table').children('tr').length;
                        let name   = jsonData.lesson.name;
                        let files  = jsonData.lesson.files;
                        let row = 
                            `<tr id='${id_row}'>
                                <td>${id}</td>
                                <td>${name}</td>`;
                                let arrays = files.split(';;')
                                let countVideo = 0;
                                let countPdf = 0;
                                for (let i=0; i<arrays.length; i+=2) {
                                    if (arrays[i+1].includes('.mp4')  || arrays[i+1].includes('.avi')) {
                                        countVideo++;
                                    }
                                    else if (arrays[i+1].includes('.pdf')) {
                                        countPdf++;
                                    }
                                }
                                row += "<td>";
                                    if (countVideo != 0) {
                                        row += "<i class='fa fa-video'> " + countVideo + "</i> ";
                                    }
                                    if (countPdf != 0) {
                                        row += "<i class='fa fa-file-pdf'> " + countPdf + "</i>";
                                    }
                                    row += "</td>";
                                row += `
                                <td> </td>
                                <td class='table-col-btn'>
                                    <a href='index.php?controller=courseController&action=editLesson&id=${id}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>
                                    <a href='#lesson-duplicate' class='btn-lesson-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-lesson-duplicate' data-id='${id}'>Duplicar</a>
                                    <a href='#lesson-delete' class='btn-lesson-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-lesson-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#lesson-table').append(row);
                        $(".magnificPopup-lesson-duplicate").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $(".magnificPopup-lesson-delete").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#lesson-duplicate-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-lesson-duplicate").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-duplicate-cancel').remove();
        $('#btn-duplicate').remove();
    });

    $(".magnificPopup-lesson-delete").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-lesson-delete', function(e) {
        e.preventDefault();
        let button = '<button id="btn-delete-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#lesson-delete-footer').append(button);
        button = '<button id="btn-delete" class="btn btn-mod btn-small btn-round">Eliminar lección</button>';
        $('#lesson-delete-footer').append(button);
        let id_row       = $(this).data('id_row');
        let id           = $(this).data('id');
        $("#btn-delete-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=deleteLesson&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#lesson-table #' + id_row).remove();
                        $('.assigned_lesson_' + id).remove();
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#lesson-delete-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-lesson-delete").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-delete-cancel').remove();
        $('#btn-delete').remove();
    });

    $(".magnificPopup-module-duplicate").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-module-duplicate', function(e) {
        e.preventDefault();
        let button = '<button id="btn-duplicate-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#module-duplicate-footer').append(button);
        button = '<button id="btn-duplicate" class="btn btn-mod btn-small btn-round">Duplicar módulo</button>';
        $('#module-duplicate-footer').append(button);
        let id = $(this).data('id');
        $("#btn-duplicate-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-duplicate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=duplicateModule&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        let id            = jsonData.module.id;
                        let id_row        = 'row' + $('#module-table').children('tr').length;
                        let name          = jsonData.module.name;
                        let header_image  = jsonData.module.header_image;
                        let preview_image = jsonData.module.preview_image;
                        let content_image = jsonData.module.content_image;
                        let row = 
                            `<tr id='${id_row}'>
                                <td>${id}</td>
                                <td>${name}</td>
                                <td><img class='header_image_preview' src='${header_image}'></td>
                                <td><img class='preview_image_preview' src='${preview_image}'></td>
                                <td><img class='content_image_preview' src='${content_image}'></td>
                                <td> </td>
                                <td> </td>
                                <td class='table-col-btn'>
                                    <a href='index.php?controller=courseController&action=editModule&id=${id}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>
                                    <a href='#module-duplicate' class='btn-module-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-module-duplicate' data-id='${id}'>Duplicar</a>
                                    <a href='#module-delete' class='btn-module-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-module-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#module-table').append(row);
                        $(".magnificPopup-module-duplicate").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $(".magnificPopup-module-delete").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#module-duplicate-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-module-duplicate").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-duplicate-cancel').remove();
        $('#btn-duplicate').remove();
    });

    $(".magnificPopup-module-delete").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-module-delete', function(e) {
        e.preventDefault();
        let button = '<button id="btn-delete-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#module-delete-footer').append(button);
        button = '<button id="btn-delete" class="btn btn-mod btn-small btn-round">Eliminar módulo</button>';
        $('#module-delete-footer').append(button);
        let id_row       = $(this).data('id_row');
        let id           = $(this).data('id');
        $("#btn-delete-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=deleteModule&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#module-table #' + id_row).remove();
                        $('.assigned_module_' + id).remove();
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#module-delete-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-module-delete").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-delete-cancel').remove();
        $('#btn-delete').remove();
    });

    $(".magnificPopup-subject-duplicate").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-subject-duplicate', function(e) {
        e.preventDefault();
        let button = '<button id="btn-duplicate-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#subject-duplicate-footer').append(button);
        button = '<button id="btn-duplicate" class="btn btn-mod btn-small btn-round">Duplicar asignatura</button>';
        $('#subject-duplicate-footer').append(button);
        let id = $(this).data('id');
        $("#btn-duplicate-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-duplicate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=duplicateSubject&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        let id            = jsonData.subject.id;
                        let id_row        = 'row' + $('#subject-table').children('tr').length;
                        let name          = jsonData.subject.name;
                        let header_image  = jsonData.subject.header_image;
                        let preview_image = jsonData.subject.preview_image;
                        let content_image = jsonData.subject.content_image;
                        let row = 
                            `<tr id='${id_row}'>
                                <td>${id}</td>
                                <td>${name}</td>
                                <td><img class='header_image_preview' src='${header_image}'></td>
                                <td><img class='preview_image_preview' src='${preview_image}'></td>
                                <td><img class='content_image_preview' src='${content_image}'></td>
                                <td> </td>
                                <td class='table-col-btn'>
                                    <a href='index.php?controller=courseController&action=editSubject&id=${id}' class='btn btn-mod btn-circle btn-small button-edit'>Editar</a>
                                    <a href='#subject-duplicate' class='btn-subject-duplicate btn btn-mod btn-circle btn-small button-clone magnificPopup-subject-duplicate' data-id='${id}'>Duplicar</a>
                                    <a href='#subject-delete' class='btn-subject-delete btn btn-mod btn-circle btn-small button-cancel magnificPopup-subject-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#subject-table').append(row);
                        $(".magnificPopup-subject-duplicate").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $(".magnificPopup-subject-delete").magnificPopup({
                            gallery: {
                                enabled: true
                            },
                            mainClass: "mfp-fade"
                        });
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#subject-duplicate-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-subject-duplicate").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-duplicate-cancel').remove();
        $('#btn-duplicate').remove();
    });

    $(".magnificPopup-subject-delete").magnificPopup({
        gallery: {
            enabled: true
        },
        mainClass: "mfp-fade"
    });

    $(document).on('click','.btn-subject-delete', function(e) {
        e.preventDefault();
        let button = '<button id="btn-delete-cancel" class="btn btn-mod btn-gray btn-small btn-round">Cancelar</button>';
        $('#subject-delete-footer').append(button);
        button = '<button id="btn-delete" class="btn btn-mod btn-small btn-round">Eliminar asignatura</button>';
        $('#subject-delete-footer').append(button);
        let id_row       = $(this).data('id_row');
        let id           = $(this).data('id');
        $("#btn-delete-cancel").on('click', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=deleteSubject&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#subject-table #' + id_row).remove();
                        $('.assigned_subject_' + id).remove();
                        $.magnificPopup.close();
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        $("#subject-delete-form").append(msg);
                    }
                }
            });
        });
    });

    $(".magnificPopup-subject-delete").on('mfpClose', function() {
        $(".alert").remove();
        $('#btn-delete-cancel').remove();
        $('#btn-delete').remove();
    });
    
    async function encodeFileAsBase64URL(file) {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.addEventListener('loadend', () => {
                resolve(reader.result);
            });
            reader.readAsDataURL(file);
        });
    };

    async function showFileInput(file) {
        if (file.files[0]["name"].includes(".mp4") || file.files[0]["name"].includes(".avi") || file.files[0]["name"].includes(".pdf")) {
            let base64URL = await encodeFileAsBase64URL(file.files[0]);
            if (base64URL == '') {
                let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                file_type_preview.innerHTML = "";
                let msg = `
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> Fallo al cargar el archivo.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                $("#lesson-edit-form").append(msg);
            }
            else if (file.files[0]["name"].includes(".mp4") || file.files[0]["name"].includes(".avi")) {
                let video = document.createElement("video");
                video.setAttribute('src', base64URL);
                video.setAttribute('controls', '');
                video.setAttribute('disablePictureInPicture', '');
                video.setAttribute('controlsList', 'nodownload noplaybackrate');
                let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                file_type_preview.innerHTML = "";
                file_type_preview.appendChild(video);
            }
            else {
                let embed = document.createElement("embed");
                embed.setAttribute('src', base64URL);
                embed.setAttribute('type', 'application/pdf');
                let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                file_type_preview.innerHTML = "";
                file_type_preview.appendChild(embed);
            }
        }
        else {
            let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
            file_type_preview.innerHTML = "";
            let msg = `
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> El archivo debe de ser de tipo mp4, avi o pdf.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            $("#lesson-edit-form").append(msg);
        }
    }

    const files = document.getElementsByClassName('file');
    if (files) {
        for (let i=0; i<files.length; i++) {
            let file = files[i];
            file.addEventListener('input', (e) => {
                $(".alert").remove();
                if (file.files[0]) {
                    showFileInput(file);
                }
            });
        }
    }
    
    $(document).on('click','.delete-lesson-edit-files', function(e) {
        $(this).closest(".row-files-complete").remove();
    });

    $('#add-lesson-edit-files').on('click', function() {
        let row_files_complete = document.createElement("div");
        row_files_complete.setAttribute("class", "row-files-complete");
        let row_files = document.createElement("div");
        row_files.setAttribute("class", "row-files");
        let title = document.createElement("input");
        title.setAttribute("placeholder", "Título");
        title.setAttribute("type", "text");
        title.setAttribute("name", "title");
        title.setAttribute("class", "input-md round form-control");
        row_files.appendChild(title);
        let file = document.createElement("input");
        file.setAttribute("type", "file");
        file.setAttribute("name", "file");
        file.setAttribute("class", "file");
        file.addEventListener('input', (e) => {
            $(".alert").remove();
            if (file.files[0]) {
                showFileInput(file);
            }
        });
        row_files.appendChild(file);
        let button = document.createElement("div");
        button.setAttribute("class", "delete-lesson-edit-files btn btn-mod btn-circle button-cancel");
        button.innerHTML = `<i class='fa fa-times'></i>`;
        button.onclick = function() {
            $(this).closest(".row-files-complete").remove();
        }
        row_files.appendChild(button);
        row_files_complete.appendChild(row_files);
        let file_type_preview = document.createElement("div");
        file_type_preview.setAttribute("class", "file-type-preview");
        row_files_complete.appendChild(file_type_preview);
        $('#lesson-edit-files').append(row_files_complete);
    });

    $('#edit-lessons').on('click', async (event) => {
        event.preventDefault();
        let id    = $('#lesson-edit-id').val();
        let name  = $('#lesson-edit-name').val();
        let row_files_complete = document.getElementsByClassName('row-files-complete');
        let titles = [];
        let archives = [];
        let title = "";
        let archive = null;
        let video = null;
        let pdf = null;
        let count = 1;
        for (let i=0; i<row_files_complete.length; i++) {
            title = row_files_complete[i].querySelector("input[name='title']").value;
            if (title == "") {
                title = name + "(" + count + ")";
            }
            video = row_files_complete[i].querySelector("video");
            pdf = row_files_complete[i].querySelector("embed");
            if (video || pdf) {
                titles.push(title);
                if (row_files_complete[i].querySelector("input[name='file']").getAttribute("value")) {
                    let path = row_files_complete[i].querySelector("input[name='file']").getAttribute("value");
                    await fetch(path)
                    .then(response => response.blob())
                    .then(blob => {
                        if (path.includes(".mp4")) {
                            archive = new File([blob], "nombre_del_archivo.mp4", { type: "video/mp4" });
                        } else if (path.includes(".avi")) {
                            archive = new File([blob], "nombre_del_archivo.avi", { type: "video/avi" });
                        } else if (path.includes(".pdf")) {
                            archive = new File([blob], "nombre_del_archivo.pdf", { type: "application/pdf" });
                        }
                    });
                }
                else {
                    archive = row_files_complete[i].querySelector("input[name='file']").files[0];
                }
                archives.push(archive);
                count++;
            }
        }
        let formData = new FormData();
        formData.append('id', id);
        formData.append('name', name);
        formData.append('count_archives', titles.length);
        for (let i=0; i<titles.length; i++) {
            formData.append('title-'+i, titles[i]);
            formData.append(titles[i], archives[i]);
        }
        let assigned_modules = '';
        $(".assigned_modules").each(function() {
            if (assigned_modules != '') {
                assigned_modules += ";;";
            }
            assigned_modules += $(this).val();
        });
        formData.append('assigned_modules', assigned_modules);
        $.ajax({
            type: "POST",
            url: 'index.php?controller=courseController&action=editLesson&ajax=true',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.replace('index.php?controller=courseController&action=secretary');
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    $("#lesson-edit-form").append(msg);
                }
            }
        });
    });

    var base64URL = null;
    const header_image         = document.getElementById('header_image');
    const header_image_preview = document.getElementById('header_image_preview');
    if (header_image) {
        base64URL = header_image_preview.getAttribute('src');
        header_image.addEventListener('input', async (event) => {
            if (header_image.files[0]) {
                base64URL = await encodeFileAsBase64URL(header_image.files[0]);
                header_image_preview.setAttribute('src', base64URL);
            }
        });
    }

    $('#preview').summernote({
        toolbar: [
            ['view', ['undo', 'redo', 'codeview', 'help']],
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear', 'fontsize', 'fontname', 'color']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['insert', ['table', 'hr', 'link']],
        ],
        fontNames: ['Open Sans', 'Pacifico', 'Montserrat', 'Source Sans Pro', 'Quicksand'],
        fontNamesIgnoreCheck: ['Open Sans', 'Pacifico', 'Montserrat', 'Source Sans Pro', 'Quicksand'],
        height: 150,
    });

    $('#content').summernote({
        toolbar: [
            ['view', ['undo', 'redo', 'codeview', 'help']],
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear', 'fontsize', 'fontname', 'color']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['insert', ['table', 'hr', 'link', 'picture', 'video']],
        ],
        fontNames: ['Open Sans', 'Pacifico', 'Montserrat', 'Source Sans Pro', 'Quicksand'],
        fontNamesIgnoreCheck: ['Open Sans', 'Pacifico', 'Montserrat', 'Source Sans Pro', 'Quicksand'],
        height: 500,
    });

    $('#edit-module').on('click', async function(event) {
        event.preventDefault();
        let id            = $('#module-edit-id').val();
        let name          = $('#module-edit-name').val();
        let header_image  = base64URL;
        let preview       = $('#preview').summernote('code');
        let preview_image = document.getElementById('preview_image');
        preview_image.innerHTML = preview;
        await html2canvas(preview_image).then(function(canvas) {
            canvas.setAttribute('style', 'width: 100%; height: 100%');
            preview_image.innerHTML = "";
            preview_image = canvas.toDataURL();
        });
        let content = $('#content').summernote('code');
        let content_image = document.getElementById('content_image');
        content_image.innerHTML = content;
        await html2canvas(content_image).then(function(canvas) {
            canvas.setAttribute('style', 'width: 100%; height: 100%');
            content_image.innerHTML = "";
            content_image = canvas.toDataURL();
        });
        let assigned_subjects = '';
        $(".assigned_subjects").each(function() {
            if (assigned_subjects != '') {
                assigned_subjects += ";;";
            }
            assigned_subjects += $(this).val();
        });
        let assigned_lessons = '';
        $(".assigned_lessons").each(function() {
            if (assigned_lessons != '') {
                assigned_lessons += ";;";
            }
            assigned_lessons += $(this).val();
        });
        $.ajax({
            type: "POST",
            url: 'index.php?controller=courseController&action=editModule&ajax=true',
            data: {
                'id':                id,
                'name':              name,
                'header_image':      header_image,
                'preview':           preview,
                'preview_image':     preview_image,
                'content':           content,
                'content_image':     content_image,
                'assigned_subjects': assigned_subjects,
                'assigned_lessons':  assigned_lessons
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.replace('index.php?controller=courseController&action=secretary');
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    $("#module-edit-form").append(msg);
                }
            }
        });
    });

    $('#edit-subject').on('click', async function(event) {
        event.preventDefault();
        let id            = $('#subject-edit-id').val();
        let name          = $('#subject-edit-name').val();
        let header_image  = base64URL;
        let preview       = $('#preview').summernote('code');
        let preview_image = document.getElementById('preview_image');
        preview_image.innerHTML = preview;
        await html2canvas(preview_image).then(function(canvas) {
            canvas.setAttribute('style', 'width: 100%; height: 100%');
            preview_image.innerHTML = "";
            preview_image = canvas.toDataURL();
        });
        let content = $('#content').summernote('code');
        let content_image = document.getElementById('content_image');
        content_image.innerHTML = content;
        await html2canvas(content_image).then(function(canvas) {
            canvas.setAttribute('style', 'width: 100%; height: 100%');
            content_image.innerHTML = "";
            content_image = canvas.toDataURL();
        });
        let assigned_modules = '';
        $(".assigned_modules").each(function() {
            if (assigned_modules != '') {
                assigned_modules += ";;";
            }
            assigned_modules += $(this).val();
        });
        $.ajax({
            type: "POST",
            url: 'index.php?controller=courseController&action=editSubject&ajax=true',
            data: {
                'id':               id,
                'name':             name,
                'header_image':     header_image,
                'preview':          preview,
                'preview_image':    preview_image,
                'content':          content,
                'content_image':    content_image,
                'assigned_modules': assigned_modules
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.replace('index.php?controller=courseController&action=secretary');
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <i class="fa  fa-times-circle" aria-hidden="true"></i> <strong>¡Error!</strong> ${jsonData.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    $("#subject-edit-form").append(msg);
                }
            }
        });
    });

    $('#add-row-assigned_lessons').on('click', function(e) {
        e.preventDefault();
        let options_lessons = $(this).data('options_lessons');
        let row_assigned_lessons = `
            <div class='row-assigned_lessons'>
                <div class='grid-row-assigned_lessons btn btn-mod btn-circle'><i class='fa fa-grip-vertical'></i></div>
                <select class='assigned_lessons input-md round form-control'>` + options_lessons + `</select>
                <div class='delete-row-assigned_lessons btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>
            </div>`;
        $('#container-assigned_lessons').append(row_assigned_lessons);
    });

    $(document).on('click','.delete-row-assigned_lessons', function(e) {
        e.preventDefault();
        $(this).closest(".row-assigned_lessons").remove();
    });
    
    $('#add-row-assigned_modules').on('click', function(e) {
        e.preventDefault();
        let options_modules = $(this).data('options_modules');
        let row_assigned_modules = `
            <div class='row-assigned_modules'>
                <div class='grid-row-assigned_modules btn btn-mod btn-circle'><i class='fa fa-grip-vertical'></i></div>
                <select class='assigned_modules input-md round form-control'>` + options_modules + `</select>
                <div class='delete-row-assigned_modules btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>
            </div>`;
        $('#container-assigned_modules').append(row_assigned_modules);
    });

    $(document).on('click','.delete-row-assigned_modules', function(e) {
        e.preventDefault();
        $(this).closest(".row-assigned_modules").remove();
    });
    
    $('#add-row-assigned_subjects').on('click', function(e) {
        e.preventDefault();
        let options_subjects = $(this).data('options_subjects');
        let row_assigned_subjects = `
            <div class='row-assigned_subjects'>
                <div class='grid-row-assigned_subjects btn btn-mod btn-circle'><i class='fa fa-grip-vertical'></i></div>
                <select class='assigned_subjects input-md round form-control'>` + options_subjects + `</select>
                <div class='delete-row-assigned_subjects btn btn-mod btn-circle button-cancel'><i class='fa fa-times'></i></div>
            </div>`;
        $('#container-assigned_subjects').append(row_assigned_subjects);
    });

    $(document).on('click','.delete-row-assigned_subjects', function(e) {
        e.preventDefault();
        $(this).closest(".row-assigned_subjects").remove();
    });
/*
    $('#add-course-create-modules').on('click', function() {
        let row_modules = document.createElement("div");
        row_modules.setAttribute("class", "row-modules");
        let select = document.createElement("select");
        select.setAttribute("class", "modules");
        select.innerHTML = document.getElementById("select-modules").innerHTML;
        row_modules.appendChild(select);
        let input = document.createElement("input");
        input.setAttribute("class", "price-modules");
        input.setAttribute("placeholder", "Precio");
        input.setAttribute("type", "text");
        input.setAttribute("name", "name");
        row_modules.appendChild(input);
        let link = document.createElement("a");
        link.setAttribute("class", "delete-course-create-modules btn btn-mod btn-circle button-cancel");
        link.innerHTML = `<i class='fa fa-times'></i>`;
        link.onclick = function() {
            $(this).parent().remove();
        }
        row_modules.appendChild(link);
        $('#course-create-modules').append(row_modules);
    });
    */
});