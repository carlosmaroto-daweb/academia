<?php
    require_once 'model/db.php';
    require_once 'model/user.php';

    class UserManagement {
        
        private $db;
        private $users;

        function __construct() {
            $this->db = new Db();
            $this->updateUsers();
        }

        function createUser() {
            $result = json_encode(array('success' => 0));
            if (!$this->isRepeated($_POST['email']) && $this->db->createUser()) {
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
            return $result;
        }

        function deleteUser() {
            $result = false;
            if ($this->isRegistered($_GET['id']) && $this->db->deleteUser()) {
                $result = true;
            }
            return $result;
        }

        function editUser() {
            $result = false;
            if ($this->isRegistered($_POST['id']) && $this->db->editUser()) {
                $result = true;
            }
            return $result;
        }

        private function getUser($email) {
            for ($i=0; $i<count($this->users); $i++) {
                if ($this->users[$i]->getEmail() == $email) {
                    $result = $this->users[$i];
                }
            }
            return $result;
        }

        function getUsers() {
            return $this->users;
        }

        function isUser() {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getEmail() == $_POST['email'] && $this->users[$i]->getPassword() == $_POST['password']) {
                    $_SESSION["type"] = $this->users[$i]->getType();
                    $result = true;
                }
            }
            return $result;
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

        private function isRepeated($email) {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getEmail() == $email) {
                    $result = true;
                }
            }
            return $result;
        }

        function registerUser() {
            $result = false;
            if (!$this->isRepeated($_POST['email']) && $this->db->registerUser()) {
                $_SESSION["type"] = $_POST['type'];
                $result = true;
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