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

    $('#module-duplicate').on('show.bs.modal', function(event) {
        let button = '<button id="btn-duplicate" class="btn btn-primary">Aceptar</button>';
        $('#duplicate-modal-footer').append(button);
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
                                echo "<td><img id='header_image_preview' src='${header_image}'></td>";
                                <td>${preview}</td>
                                <td>${content}</td>
                                <td> </td>
                                <td>
                                    <a href='index.php?controller=courseController&action=editModule&id=${id}' class='button-o button-sm button-rounded button-blue hover-fade' data-id='${id}' data-name='${name}' data-header_image='${header_image}' data-preview='${preview}' data-content='${content}'>Editar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-purple hover-fade' data-toggle='modal' data-target='#module-duplicate' data-id='${id}'>Duplicar</a>&nbsp;
                                    <a class='button-o button-sm button-rounded button-red hover-fade' data-toggle='modal' data-target='#module-delete' data-id_row='${id_row}' data-id='${id}'>Eliminar</a>
                                </td>
                            </tr>`;
                        $('#module-table').append(row);
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
                        $("#duplicate-form").append(msg);
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
        $('#delete-modal-footer').append(button);
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
                        $("#delete-form").append(msg);
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

    const header_image = document.querySelector('#header_image');
    const header_image_preview = document.querySelector('#header_image_preview');
    var base64URL = null;
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
        height: 300,
    });

    $('#create-module').on('click', function(event) {
        event.preventDefault();
        let name         = $('#module-create-name').val();
        let header_image = base64URL;
        let preview      = $('#preview').summernote('code')
        let content      = $('#content').summernote('code')
        $.ajax({
            type: "POST",
            url: 'index.php?controller=courseController&action=editModule&ajax=true',
            data: {
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
                    $("#module-create-form").append(msg);
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
    
    /*
    $('#create-module').on('click', function(event) {
        event.preventDefault();
        let name         = $('#module-create-name').val();
        let name_studies = "";
        $(".name-studies").each(function(){
            name_studies += $(this).val() + ";;";
        });
        let location_studies = "";
        $(".location-studies").each(function(){
            location_studies += $(this).val() + ";;";
        });
        let type_studies = "";
        $(".type-studies option:selected").each(function(){
            type_studies += $(this).val() + ";;";
        });
        let header_image = $('#header_image').val();
        let preview      = $('#preview').val();
        let content      = $('#content').summernote('code')
        //console.log("name: " + name);
        //console.log("name_studies: " + name_studies);
        //console.log("location_studies: " + location_studies);
        //console.log("type_studies: " + type_studies);
        //console.log("header_image: " + header_image);
        //console.log("preview: " + preview);
        //console.log("content: " + content);
        
        $.ajax({
            type: "POST",
            url: 'index.php?controller=courseController&action=editModule&ajax=true',
            data: {
                'name':             name,
                'name_studies':     name_studies,
                'location_studies': location_studies,
                'type_studies':     type_studies,
                'header_image':     header_image,
                'preview':          preview,
                'content':          content
            },
            success: function(response) {
                let jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    
                }
                else {
                    $(".alert").remove();
                    let msg = `
                        <div class="alert alert-danger alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>¡Error!</strong> ${jsonData.msg}
                        </div>
                    `;
                    $("#module-create-form").append(msg);
                }
            }
        });
    });*/
});