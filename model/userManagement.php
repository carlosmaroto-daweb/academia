<?php
    require_once 'model/db.php';
    require_once 'config/config.php';
    require_once 'model/user.php';

    class UserManagement {
        
        private $db;
        private $users;

        function __construct() {
            $this->db = new Db();
            $this->updateUsers();
        }

        function createUser() {
            if (!$this->isRepeated(null, $_POST['email'])) {
                $_POST['password'] = password_hash($_POST['password'], constant('PASSWORD_HASH'), ['cost' => constant('PASSWORD_COST')]);
                if ($this->db->createUser()) {
                    $this->updateUsers();
                    $user = $this->getUser($_POST['email']);
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

        function editUser() {
            if ($this->isRegistered($_POST['id'])) {
                if (!$this->isRepeated($_POST['id'], $_POST['email'])) {
                    $user = $this->getUser($_POST['email']);
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

        private function getUser($email) {
            $result = null;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getEmail() == $email) {
                    $result = $this->users[$i];
                }
            }
            return $result;
        }

        function getUsers() {
            return $this->users;
        }

        private function isRegistered($id) {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getId() == $id) {
                    $result = true;
                }
            }
            return $result;
        }

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

        function isUser() {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getEmail() == $_POST['email'] && password_verify($_POST['password'], $this->users[$i]->getPassword())) {
                    $_SESSION["type"] = $this->users[$i]->getType();
                    $result = true;
                }
            }
            return $result;
        }

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

        private function updateUsers() {
            $this->users = [];
            $query = $this->db->getUsers();
            foreach ($query as $row) {
                array_push($this->users, new User($row['id'], $row['email'], $row['password'], $row['name'], $row['last_name'], $row['phone_number'], $row['dni'], $row['type']));
            }
        }
    }
?>