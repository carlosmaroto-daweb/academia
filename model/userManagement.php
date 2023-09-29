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
            if (!$this->isRepeated($_POST['dni']) && $this->db->createUser()) {
                $this->updateUsers();
                $user = $this->getUser($_POST['dni']);
                $result = json_encode(
                    array(
                        'success' => 1, 
                        'user' => array(
                            'id' => $user->getId(),
                            'dni' => $user->getDni(),
                            'name' => $user->getName(),
                            'last_name' => $user->getLastName(),
                            'phone_number' => $user->getPhoneNumber(),
                            'email' => $user->getEmail(),
                            'type' => $user->getType(),
                        )
                    )
                );
            }
            return $result;
        }

        function deleteUser() {
            $result = false;
            if ($this->isRegistered($_GET['id']) && $this->db->deleteUser()) {
                $this->updateUsers();
                $result = true;
            }
            return $result;
        }

        function editUser() {
            $result = false;
            if ($this->isRegistered($_POST['id']) && $this->db->editUser()) {
                $this->updateUsers();
                $result = true;
            }
            return $result;
        }

        private function getUser($dni) {
            for ($i=0; $i<count($this->users); $i++) {
                if ($this->users[$i]->getDni() == $dni) {
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

        private function isRepeated($dni) {
            $result = false;
            for ($i=0; $i<count($this->users) && !$result; $i++) {
                if ($this->users[$i]->getDni() == $dni) {
                    $result = true;
                }
            }
            return $result;
        }

        private function updateUsers() {
            $this->users = [];
            $query = $this->db->getUsers();
            foreach ($query as $row) {
                array_push($this->users, new User($row['id'], $row['dni'], $row['name'], $row['last_name'], $row['phone_number'], $row['email'], $row['type']));
            }
        }
    }
?>