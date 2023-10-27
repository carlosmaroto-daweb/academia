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
                        <div class="alert alert-danger alert-dismissible fade in col-sm-8 col-sm-offset-2">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>¡Error!</strong> ${jsonData.msg}
                        </div>
                    `;
                    $("#formLogin").append(msg);
                }
            }
        });
    });

    $("#btn-register").on('click', function(e) {
        e.preventDefault();
        let email    = $('#register-email').val();
        let password = $('#register-password').val();
        $.ajax({
            type: "POST",
            url: 'index.php?controller=userController&action=register&ajax=true',
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
                    <div class="alert alert-danger alert-dismissible fade in col-sm-8 col-sm-offset-2">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>¡Error!</strong> ${jsonData.msg}
                        </div>
                    `;
                    $("#formRegister").append(msg);
                }
            }
        });
    });

    $("#user-edit").on('show.bs.modal', function(event) {
        let button = '<button id="btn-edit" class="btn btn-primary">Guardar cambios</button>';
        $('#edit-modal-footer').append(button);
        let option = $(event.relatedTarget);
        let id_row       = option.data('id_row');
        let id           = option.data('id');
        let email        = option.data('email');
        let password     = option.data('password');
        let name         = option.data('name');
        let last_name    = option.data('last_name');
        let phone_number = option.data('phone_number');
        let dni          = option.data('dni');
        let type         = option.data('type');
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
                    <div class="alert alert-danger alert-dismissible fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>¡Error!</strong> No has cambiado los datos.
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
                                <td>${new_email}</td>
                                <td>${new_password.substring(0, 10)}...</td>
                                <td>${new_name}</td>
                                <td>${new_last_name}</td>
                                <td>${new_phone_number}</td>
                                <td>${new_dni}</td>
                                <td>${type}</td>
                                <td>
                                    <a class='button-o button-sm button-rounded button-blue hover-fade' data-toggle='modal' data-target='#user-edit' data-id_row='${id_row}' data-id='${id}' data-email='${new_email}' data-password='${new_password}' data-name='${new_name}' data-last_name='${new_last_name}' data-phone_number='${new_phone_number}' data-dni='${new_dni}' data-type='${new_type}'>Modificar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#user-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            `;
                            $('#' + id_row).html(row);
                            $("#user-edit").modal('hide');
                        }
                        else {
                            $(".alert").remove();
                            let msg = `
                                <div class="alert alert-danger alert-dismissible fade in">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>¡Error!</strong> ${jsonData.msg}
                                </div>
                            `;
                            $("#edit-form").append(msg);
                        }
                    }
                });
            }
        });
    });

    $('#user-edit').on('hidden.bs.modal', function() {
        $(".alert").remove();
        $('#edit-form').trigger("reset");
        $('#btn-edit').remove();
    });

    $("#user-delete").on('show.bs.modal', function(event) {
        let button = '<button id="btn-delete" class="btn btn-primary">Aceptar</button>';
        $('#delete-modal-footer').append(button);
        let option = $(event.relatedTarget);
        let id_row = option.data('id_row');
        let id = option.data('id');
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=userController&action=delete&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#' + id_row).remove();
                        $("#user-delete").modal('hide');
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>¡Error!</strong> ${jsonData.msg}
                            </div>
                        `;
                        $("#delete-form").append(msg);
                    }
                }
            });
        });
    });

    $('#user-delete').on('hidden.bs.modal', function() {
        $(".alert").remove();
        $('#btn-delete').remove();
    });

    $("#user-create").on('show.bs.modal', function() {
        let button = '<button id="btn-create" class="btn btn-primary">Crear usuario</button>';
        $('#create-modal-footer').append(button);
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
                                <td>${new_email}</td>
                                <td>${new_password.substring(0, 10)}...</td>
                                <td>${new_name}</td>
                                <td>${new_last_name}</td>
                                <td>${new_phone_number}</td>
                                <td>${new_dni}</td>
                                <td>${type}</td>
                                <td>
                                    <a class='button-o button-sm button-rounded button-blue hover-fade' data-toggle='modal' data-target='#user-edit' data-id_row='${id_row}' data-id='${id}' data-email='${new_email}' data-password='${new_password}' data-name='${new_name}' data-last_name='${new_last_name}' data-phone_number='${new_phone_number}' data-dni='${new_dni}' data-type='${new_type}'>Modificar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#user-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#user-table').append(row);
                        $("#user-create").modal('hide');
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>¡Error!</strong> ${jsonData.msg}
                            </div>
                        `;
                        $("#create-form").append(msg);
                    }
                }
            });
        });
    });

    $('#user-create').on('hidden.bs.modal', function() {
        $(".alert").remove();
        $('#create-form').trigger("reset");
        $('#btn-create').remove();
    });

    const canvas_preview = document.getElementsByClassName('canvas_preview');
    if (canvas_preview) {
        for (let i=0; i<canvas_preview.length; i++) {
            html2canvas(canvas_preview[i]).then(function(canvas) {
                canvas.setAttribute('style', 'width: 100%; height: 100%');
                canvas_preview[i].innerHTML = "";
                canvas_preview[i].appendChild(canvas);
            });
        }
    }

    const canvas_content = document.getElementsByClassName('canvas_content');
    if (canvas_content) {
        for (let i=0; i<canvas_content.length; i++) {
            html2canvas(canvas_content[i]).then(function(canvas) {
                canvas.setAttribute('style', 'width: 100%; height: 100%');
                canvas_content[i].innerHTML = "";
                canvas_content[i].appendChild(canvas);
            });
        }
    }
    
    $('#lesson-duplicate').on('show.bs.modal', function(event) {
        let button = '<button id="btn-duplicate" class="btn btn-primary">Aceptar</button>';
        $('#lesson-duplicate-footer').append(button);
        let option = $(event.relatedTarget);
        let id = option.data('id');
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
                                <td>${name}</td>
                                <td>${files}</td>
                                <td> </td>
                                <td>
                                    <a href='index.php?controller=courseController&action=editLesson&id=${id}' class='button-o button-sm button-rounded button-blue hover-fade'>Editar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-purple hover-fade' data-toggle='modal' data-target='#lesson-duplicate' data-id='${id}'>Duplicar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#lesson-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#lesson-table').append(row);
                        $("#lesson-duplicate").modal('hide');
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>¡Error!</strong> ${jsonData.msg}
                            </div>
                        `;
                        $("#lesson-duplicate-form").append(msg);
                    }
                }
            });
        });
    });

    $('#lesson-duplicate').on('hidden.bs.modal', function() {
        $(".alert").remove();
        $('#btn-duplicate').remove();
    });

    $("#lesson-delete").on('show.bs.modal', function(event) {
        let button = '<button id="btn-delete" class="btn btn-primary">Aceptar</button>';
        $('#lesson-delete-footer').append(button);
        let option = $(event.relatedTarget);
        let id_row = option.data('id_row');
        let id = option.data('id');
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=deleteLesson&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#' + id_row).remove();
                        $("#lesson-delete").modal('hide');
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>¡Error!</strong> ${jsonData.msg}
                            </div>
                        `;
                        $("#lesson-delete-form").append(msg);
                    }
                }
            });
        });
    });

    $('#lesson-delete').on('hidden.bs.modal', function() {
        $(".alert").remove();
        $('#btn-delete').remove();
    });
    
    $('#module-duplicate').on('show.bs.modal', function(event) {
        let button = '<button id="btn-duplicate" class="btn btn-primary">Aceptar</button>';
        $('#module-duplicate-footer').append(button);
        let option = $(event.relatedTarget);
        let id = option.data('id');
        $('#btn-duplicate').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=duplicateModule&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        let id           = jsonData.module.id;
                        let id_row       = 'row' + $('#module-table').children('tr').length;
                        let name         = jsonData.module.name;
                        let header_image = jsonData.module.header_image;
                        let preview      = jsonData.module.preview;
                        let content      = jsonData.module.content;
                        let row = 
                            `<tr id='${id_row}'>
                                <td>${name}</td>
                                <td><img class='header_image_preview' src='${header_image}'></td>
                                <td><div class='canvas_preview'>${preview}</div></td>
                                <td><div class='canvas_content'>${content}</div></td>
                                <td> </td>
                                <td>
                                    <a href='index.php?controller=courseController&action=editModule&id=${id}' class='button-o button-sm button-rounded button-blue hover-fade'>Editar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-purple hover-fade' data-toggle='modal' data-target='#module-duplicate' data-id='${id}'>Duplicar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#module-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#module-table').append(row);
                        let new_row = document.getElementById(id_row);
                        let canvas_preview = new_row.querySelector(".canvas_preview");
                        html2canvas(canvas_preview).then(function(canvas) {
                            canvas.setAttribute('style', 'width: 100%; height: 100%');
                            canvas_preview.innerHTML = "";
                            canvas_preview.appendChild(canvas);
                        });
                        let canvas_content = new_row.querySelector(".canvas_content");
                        html2canvas(canvas_content).then(function(canvas) {
                            canvas.setAttribute('style', 'width: 100%; height: 100%');
                            canvas_content.innerHTML = "";
                            canvas_content.appendChild(canvas);
                        });
                        $("#module-duplicate").modal('hide');
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>¡Error!</strong> ${jsonData.msg}
                            </div>
                        `;
                        $("#module-duplicate-form").append(msg);
                    }
                }
            });
        });
    });

    $('#module-duplicate').on('hidden.bs.modal', function() {
        $(".alert").remove();
        $('#btn-duplicate').remove();
    });

    $("#module-delete").on('show.bs.modal', function(event) {
        let button = '<button id="btn-delete" class="btn btn-primary">Aceptar</button>';
        $('#module-delete-footer').append(button);
        let option = $(event.relatedTarget);
        let id_row = option.data('id_row');
        let id = option.data('id');
        $('#btn-delete').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: 'index.php?controller=courseController&action=deleteModule&ajax=true&id=' + id,
                success: function(response) {
                    let jsonData = JSON.parse(response);
                    if (jsonData.success == "1") {
                        $('#' + id_row).remove();
                        $("#module-delete").modal('hide');
                    }
                    else {
                        $(".alert").remove();
                        let msg = `
                            <div class="alert alert-danger alert-dismissible fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>¡Error!</strong> ${jsonData.msg}
                            </div>
                        `;
                        $("#module-delete-form").append(msg);
                    }
                }
            });
        });
    });

    $('#module-delete').on('hidden.bs.modal', function() {
        $(".alert").remove();
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

    var base64URL = null;

    const files = document.getElementsByClassName('file');
    if (files) {
        for (let i=0; i<files.length; i++) {
            let file = files[i];
            file.addEventListener('input', async (event) => {
                base64URL = await encodeFileAsBase64URL(file.files[0]);
                if (base64URL.includes("video")) {
                    let video = document.createElement("video");
                    video.setAttribute('src', base64URL);
                    video.setAttribute('controls', '');
                    video.setAttribute('disablePictureInPicture', '');
                    video.setAttribute('controlsList', 'nodownload noplaybackrate');
                    let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                    file_type_preview.innerHTML = "";
                    file_type_preview.appendChild(video);
                }
                else if (base64URL.includes("pdf")) {
                    let embed = document.createElement("embed");
                    embed.setAttribute('src', base64URL);
                    embed.setAttribute('type', 'application/pdf');
                    let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                    file_type_preview.innerHTML = "";
                    file_type_preview.appendChild(embed);
                }
            });
        }
    }

    $('#add-lesson-edit-files').on('click', function() {
        let row_files_complete = document.createElement("div");
        row_files_complete.setAttribute("class", "row-files-complete");
        let row_files = document.createElement("div");
        row_files.setAttribute("class", "row-files");
        let title = document.createElement("input");
        title.setAttribute("placeholder", "Título");
        title.setAttribute("type", "text");
        title.setAttribute("name", "title");
        row_files.appendChild(title);
        let file = document.createElement("input");
        file.setAttribute("type", "file");
        file.setAttribute("name", "file");
        file.setAttribute("class", "file");
        file.addEventListener('input', async (event) => {
            base64URL = await encodeFileAsBase64URL(file.files[0]);
            if (base64URL.includes("video")) {
                let video = document.createElement("video");
                video.setAttribute('src', base64URL);
                video.setAttribute('controls', '');
                video.setAttribute('disablePictureInPicture', '');
                video.setAttribute('controlsList', 'nodownload noplaybackrate');
                let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                file_type_preview.innerHTML = "";
                file_type_preview.appendChild(video);
            }
            else if (base64URL.includes("pdf")) {
                let embed = document.createElement("embed");
                embed.setAttribute('src', base64URL);
                embed.setAttribute('type', 'application/pdf');
                let file_type_preview = file.closest(".row-files-complete").querySelector(".file-type-preview");
                file_type_preview.innerHTML = "";
                file_type_preview.appendChild(embed);
            }
        });
        row_files.appendChild(file);
        let button = document.createElement("div");
        button.setAttribute("class", "delete-lesson-edit-files button-3d button-xs button-circle button-danger");
        button.innerHTML = `<i class='fa fa-close'></i>`;
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

    $('#edit-lessons').on('click', function(event) {
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
                archive = row_files_complete[i].querySelector("input[name='file']").files[0];
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
        console.log(titles);
        console.log(archives);
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
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>¡Error!</strong> ${jsonData.msg}
                        </div>
                    `;
                    $("#lesson-edit-form").append(msg);
                }
            }
        });
    });

    const header_image         = document.getElementById('header_image');
    const header_image_preview = document.getElementById('header_image_preview');
    if (header_image) {
        base64URL = header_image_preview.getAttribute('src');
        header_image.addEventListener('input', async (event) => {
            base64URL = await encodeFileAsBase64URL(header_image.files[0]);
            header_image_preview.setAttribute('src', base64URL);
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

    $('#edit-module').on('click', function(event) {
        event.preventDefault();
        let id           = $('#module-edit-id').val();
        let name         = $('#module-edit-name').val();
        let header_image = base64URL;
        let preview      = $('#preview').summernote('code')
        let content      = $('#content').summernote('code')
        $.ajax({
            type: "POST",
            url: 'index.php?controller=courseController&action=editModule&ajax=true',
            data: {
                'id':           id,
                'name':         name,
                'header_image': header_image,
                'preview':      preview,
                'content':      content
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    location.replace('index.php?controller=courseController&action=secretary');
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>¡Error!</strong> ${jsonData.msg}
                        </div>
                    `;
                    $("#module-edit-form").append(msg);
                }
            }
        });
    });

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
        link.setAttribute("class", "delete-course-create-modules button-3d button-xs button-circle button-danger");
        link.innerHTML = `<i class='fa fa-close'></i>`;
        link.onclick = function() {
            $(this).parent().remove();
        }
        row_modules.appendChild(link);
        $('#course-create-modules').append(row_modules);
    });
});