<?php
    // Incluimos el archivo db.php para instanciar la clase como objeto,
    // esta clase va a gestionar la comunicación con la base de datos.
    require_once 'model/db.php';

    // Incluimos el archivo config.php para utilizar las constantes definidas en él.
    require_once 'config/config.php';
    
    // Incluimos el archivo user.php para instanciar la clase como objeto,
    // esta clase define los campos que van a tener los usuarios.
    require_once 'model/user.php';

    /* 
    * Esta clase hace de intermediaria entre el controlador userController con
    * funcionalidades de gestión de usuarios, y modelos como el de la base de 
    * datos db y el modelo que define los campos de los usuarios user.
    * De forma que termina de ejecutar las funcionalidades implementadas en el
    * controlador userController como crear, editar y eliminar usuarios, además
    * de iniciar sesión y resgistrar a los usuarios, haciendo comprobaciones con
    * la lista de usuarios actuales de la base de datos y posteriormente 
    * llamar a los métodos de la base de datos para terminar el proceso y 
    * devolver el resultado.
    * 
    * @author: Carlos Maroto
    * @version: v1.0.0 Carlos Maroto
    */
    class UserManagement {
        
        // Atributos
        private $db;
        private $users;

        /*
        * Creamos una instancia de Db al inicio para poder utilizarla más 
        * adelante, a su vez el constructor de esta clase crea una conexión
        * con la base de datos. Además actualiza la lista de usuarios, por
        * lo que siempre estamos trabajando con los nuevos datos.
        */
        function __construct() {
            $this->db = new Db();
            $this->updateUsers();
        }

        /*
         * Método que comprueba que el email introducido no lo tiene ningún
         * usuario en la base de datos, encripta la contraseña y llama a la
         * base de datos para crear el usuario. Si todo funciona correctamente
         * y se cumple las condiciones se actualiza la lista de usuarios para
         * extraer el que hemos creado previamente y se devuelve con el resultado,
         * en caso contrario se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros email, password,
         * name, last_name, phone_number, dni y type en el controlador y que sean
         * válidos.
         * 
         * @return JSON con parámetros success, en caso de error msg y en caso 
         *         de éxito user con todos los parámetros del usuario creado.
        */
        function createUser() {
            if (!$this->isRepeated(null, $_POST['email'])) {
                $_POST['password'] = password_hash($_POST['password'], constant('PASSWORD_HASH'), ['cost' => constant('PASSWORD_COST')]);
                if ($this->db->createUser()) {
                    $this->updateUsers();
                    $user = $this->getUserByEmail($_POST['email']);
                    $result = json_encode(
                        array(
                            'success' => 1, 
                            'user'    => array(
                                'id'           => $user->getId(),
                                'email'        => $user->getEmail(),
                                'password'     => $user->getPassword(),
                                'name'         => $user->getName(),
                                'last_name'    => $user->getLastName(),
                                'phone_number' => $user->getPhoneNumber(),
                                'dni'          => $user->getDni(),
                                'type'         => $user->getType()
                            )
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido crear el usuario en la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'Este correo ya está registrado.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de un 
         * usuario de la base de datos y llama a la base de datos para eliminar
         * el usuario. Si todo funciona correctamente y se cumple las 
         * condiciones se devuelve que ha tenido éxito, en caso contrario se 
         * muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que esté el parámetro id y que sea 
         * válido en el controlador.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function deleteUser() {
            if ($this->isRegistered($_GET['id'])) {
                if ($this->db->deleteUser()) {
                    $result = json_encode(
                        array(
                            'success' => 1
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido eliminar el usuario en la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'El usuario no se encuentra registrado.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que comprueba que el id introducido corresponde al id de un 
         * usuario de la base de datos, que el email introducido no lo tiene 
         * ningún usuario en la base de datos a parte de él mismo, entonces
         * comprueba si la contraseña guardada es diferente a la nueva para 
         * codificar la nueva y llama a la base de datos para editar el usuario.
         * Si todo funciona correctamente y se cumple las condiciones se 
         * devuelve que ha sido un éxito junto con la nueva contraseña 
         * codificada, en caso contrario se muestra un mensaje del error 
         * correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros id, email, 
         * password, name, last_name, phone_number, dni y type en el controlador
         * y que sean válidos.
         * 
         * @return JSON con parámetros success, en caso de error msg y en caso 
         *         de éxito password con la contraseña encriptada.
        */
        function editUser() {
            if ($this->isRegistered($_POST['id'])) {
                if (!$this->isRepeated($_POST['id'], $_POST['email'])) {
                    $user = $this->getUserById($_POST['id']);
                    if ($_POST['password'] != $user->getPassword()) {
                        $_POST['password'] = password_hash($_POST['password'], constant('PASSWORD_HASH'), ['cost' => constant('PASSWORD_COST')]);
                    }
                    if ($this->db->editUser()) {
                        $result = json_encode(
                            array(
                                'success' => 1, 
                                'password' => $_POST['password']
                            )
                        );
                    }
                    else {
                        $result = json_encode(
                            array(
                                'success' => 0, 
                                'msg'     => 'No se ha podido modificar el usuario en la base de datos.'
                            )
                        );
                    }
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'Este correo ya está registrado.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'El usuario no se encuentra registrado.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que devuelve el usuario dado por su email.
         * 
         * @param  String email del usuario a consultar.
         * @return Devuelve el usuario dado su email o null si no se encuentra.
        */
        private function getUserByEmail($email) {
            $result = null;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getEmail() == $email) {
                    $result = $this->users[$i];
                }
            }
            return $result;
        }

        /*
         * Método que devuelve el usuario dado por su id.
         * 
         * @param  int id del usuario a consultar.
         * @return Devuelve el usuario dado su id o null si no se encuentra.
        */
        private function getUserById($id) {
            $result = null;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getId() == $id) {
                    $result = $this->users[$i];
                }
            }
            return $result;
        }

        /*
        * Método de consulta que devuelve el array privado users que contiene
        * la lista de todos los usuarios actuales de la base de datos.
        * 
        * @return Lista de los usuarios de la base de datos.
        */
        function getUsers() {
            return $this->users;
        }

        /*
         * Método que devuelve true si el id lo tiene algún usuario guardado.
         * 
         * @param  int id del usuario a consultar.
         * @return Devuelve el true si el id lo tiene algún usuario guardado.
        */
        private function isRegistered($id) {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getId() == $id) {
                    $result = true;
                }
            }
            return $result;
        }

        /*
         * Método que devuelve true si el email lo tiene algún usuario, 
         * excluyendo el usuario que tenga el mismo id.
         * 
         * @param  int id del usuario a consultar.
         * @param  String email del usuario a consultar.
         * @return Devuelve el true si el id lo tiene algún usuario guardado
         *         excluyendo el usuario que tenga el mismo id.
        */
        private function isRepeated($id, $email) {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getEmail() == $email) {
                    if ($id != null) {
                        if ($this->users[$i]->getId() != $id) {
                            $result = true;
                        }
                    }
                    else {
                        $result = true;
                    }
                }
            }
            return $result;
        }

        /*
         * Método que consulta si el email coincide con algún usuario de los
         * guardados, en caso de que así sea se compara la contraseña
         * encriptada guardada y la introducida por el usuario. Si todo 
         * funciona correctamente y se cumplen las condiciones se inicia
         * sesión del usuario según su tipo y se devuelve true.
         * 
         * Previamente se ha comprobado que estén los parámetros email y
         * password y que sean válidos en el controlador.
         * 
         * @return Devuelve true si el email y la contraseña coincide
         *         con algún usuario registrado.
        */
        function isUser() {
            $result = false;
            $user = $this->getUserByEmail($_POST['email']);
            if ($user != null && $user->getEmail() == $_POST['email'] && password_verify($_POST['password'], $user->getPassword())) {
                $_SESSION["type"] = $user->getType();
                $result = true;
            }
            return $result;
        }

        /*
         * Método que consulta si el email no se repite con alguno de los 
         * usuarios de los guardados, en caso de que así sea se encripta 
         * la contraseña y se llama a la base de datos para registrar el 
         * nuevo usuario de tipo estudiante. Si todo funciona correctamente
         * y se cumplen las condiciones se inicia sesión del usuario de tipo
         * estudiante y se devuelve que ha tenido éxito, en caso contrario 
         * se muestra un mensaje del error correspondiente.
         * 
         * Previamente se ha comprobado que estén los parámetros email y
         * password y que sean válidos en el controlador.
         * 
         * @return JSON con parámetros success y en caso de error msg.
        */
        function registerUser() {
            if (!$this->isRepeated(null, $_POST['email'])) {
                $_POST['password'] = password_hash($_POST['password'], constant('PASSWORD_HASH'), ['cost' => constant('PASSWORD_COST')]);
                if ($this->db->registerUser()) {
                    $_SESSION["type"] = 'student';
                    $result = json_encode(
                        array(
                            'success' => 1
                        )
                    );
                }
                else {
                    $result = json_encode(
                        array(
                            'success' => 0, 
                            'msg'     => 'No se ha podido registrar el usuario en la base de datos.'
                        )
                    );
                }
            }
            else {
                $result = json_encode(
                    array(
                        'success' => 0, 
                        'msg'     => 'Este correo ya está registrado.'
                    )
                );
            }
            return $result;
        }

        /*
         * Método que guarda en el array users los datos de los usuarios
         * registados en la base de datos.
        */
        private function updateUsers() {
            $this->users = [];
            $query = $this->db->getUsers();
            foreach ($query as $row) {
                array_push($this->users, new User($row['id'], $row['email'], $row['password'], $row['name'], $row['last_name'], $row['phone_number'], $row['dni'], $row['type']));
            }
        }
    }
?>