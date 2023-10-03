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
                //console.log("SE HA MANDADO UN INICIO DE SESIÓN");
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
                //console.log("SE HA MANDADO UN REGISTRO DE SESIÓN");
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
});